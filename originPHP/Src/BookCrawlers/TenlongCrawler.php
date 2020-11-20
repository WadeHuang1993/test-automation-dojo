<?php

namespace Src\BookCrawlers;

use GuzzleHttp\Client;
use voku\helper\HtmlDomParser;

/**
 * Class TenlongCrawlerTest
 *
 * 天瓏圖書的爬蟲
 *
 * 爬蟲的套件(guzzleHttp/guzzle, voku/simple_html_dom)使用方式請參考：
 * @link https://docs.guzzlephp.org/en/stable/quickstart.html
 * @link https://github.com/voku/simple_html_dom
 */
class TenlongCrawler
{

    protected $baseURI = 'https://www.tenlong.com.tw';

    /**
     * 取得 天瓏圖書 網站的 html
     *
     * @param string $uri
     * @return string $html
     */
    public function getHtml($uri = "/")
    {
        $client = new Client([
            'base_uri' => $this->baseURI,
            'timeout'  => 5.0
        ]);
        $response = $client->request('GET', $uri);
        return (string) $response->getBody();
    }

    /**
     * 以 書籍名稱 爬取書籍內容（單本）
     *
     * @param string $bookName
     * @return array $book
     */
    public function findBookByName($bookName)
    {
        # GET HTML
        $queryURI = "search?utf8=✓&keyword=" . $bookName;
        $html = $this->getHtml($queryURI) ?? "";

        # GET DOMS
        $dom = HtmlDomParser::str_get_html($html);
        $domLi = $dom->findOne(".search-result-list>ul>li");
        $domBookData = $domLi->findOne('.book-data');
        $domItemInfo = $domLi->findOne('.item-info');
        $domName = $domBookData->findOne('strong>a');

        # GET BOOK INFO
        $picture     = $domLi->findOne('img')->getAttribute('src');
        $name        = $domName->text();
        $link        = $this->baseURI . $domName->getAttribute('href');
        $lang        = $domItemInfo->findOne('.lang')->text();
        $author      = $domItemInfo->findOne('.author')->text();
        $publisher   = $domItemInfo->findOne('.category')->text();
        $publishDate = str_replace('出版日期：', '', $domItemInfo->findOne('.publish-date')->text());
        $price       = str_replace('售價: $', '', $domItemInfo->findOne('.price')->text());

        return compact(["name", "lang", "author", "publisher", "publishDate", "price", "link", "picture"]);
    }

    /**
     * 以 書籍分類 爬取書籍內容（多本）
     *
     * @param string $category
     * @return array $books
     */
    public function getBooksByCategory($category)
    {
        # GET HTML
        $queryURI = "categories/" . $category;
        $html = $this->getHtml($queryURI) ?? "";

        # GET DOMS
        $dom = HtmlDomParser::str_get_html($html);
        $domBooks = (array) $dom->findOne('.book-list')->findMulti('li.single-book');

        # GET BOOKS
        $books = array_map(function ($domBook) {
            $domTitleLink = $domBook->findOne('.title>a');
            return [
                "name"    => html_entity_decode($domTitleLink->text()),
                "link"    => $this->baseURI . $domTitleLink->getAttribute('href'),
                "picture" => $domBook->findOne('img')->getAttribute('src'),
            ];
        }, $domBooks);
        return $books;
    }
}