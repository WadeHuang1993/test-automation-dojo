<?php

namespace Tests\BookCrawlers;

use PHPUnit\Framework\TestCase;
use Src\BookCrawlers\TenlongCrawler;

/**
 * Class TenlongCrawlerTest
 *
 * 爬蟲的套件使用方式請參考：@link https://github.com/voku/simple_html_dom
 *
 * 請完成以下使用案例：
 * 1. 使用者搜集的書籍名稱：「領域驅動設計」；系統透過爬蟲向天瓏圖書執行關鍵字搜尋；爬蟲找到書籍並擷取出書籍內容（單本）
 * 2. 使用者搜尋「Object-oriented 物件導向」分類的書籍；系統透過爬蟲向天瓏圖書執行分類搜尋；爬蟲找到書籍並擷取出書籍內容（多本）
 *
 * 請依照使用案例開出來的需求規格（given、when、then）來完成測試案例。
 */
class TenlongCrawlerTest extends TestCase
{
    /**
     * 測試取得網頁 html
     */
    public function testGetHtml()
    {
        $target = new TenlongCrawler();
        $html = $target->getHtml();
        $this->assertNotEmpty($html);
    }

    /**
     * 使用案例：
     *
     * 使用者搜集的書籍名稱：「領域驅動設計」；系統透過爬蟲向天瓏圖書執行關鍵字搜尋；爬蟲找到書籍並擷取出書籍內容（單本）
     *
     * 請依照使用案例開出來的需求規格（given、when、then）來完成測試案例。
     *
     * Tips1: 請先執行 composer install 安裝爬蟲套件
     * Tips2: 請封裝爬蟲套件： @link https://github.com/voku/simple_html_dom#quick-start
     * Tips3: 爬蟲的目標 URL: https://www.tenlong.com.tw/search?utf8=✓&keyword=領域驅動設計
     * Tips4: 盡可能將複雜的實作邏輯封裝進受測物件內
     * Tips5: 盡可能設計出可讀性高的介面
     */
    public function testFindBookByName()
    {
        /** @given 要搜集的書籍名稱：領域驅動設計 */
        $bookName = '領域驅動設計';

        /** @when 系統透過爬蟲向天瓏圖書執行關鍵字搜尋 */
        $crawler = new TenlongCrawler();
        $book = $crawler->findBookByName($bookName);

        /** @then 爬蟲找到書籍並擷取出書籍內容 */
        $this->assertSame([
            "name" => "領域驅動設計：軟體核心複雜度的解決方法 (Domain-Driven Design: Tackling Complexity in the Heart of Software)",
            "lang" => "繁體中文",
            "author" => "Eric Evans",
            "publisher" => "博碩文化",
            "publishDate" => "2019-05-13",
            "price" => "530",
            "link" => "https://www.tenlong.com.tw/products/9789864343874?list_name=srh",
            "picture" => "https://cf-assets2.tenlong.com.tw/products/images/000/130/774/medium/9789864343874_bc.jpg?1554177163",
        ], $book);
    }

    /**
     * 以 書籍分類 爬取書籍內容（多本）
     *
     * 爬蟲的目標 URL: https://www.tenlong.com.tw/categories/object-oriented
     */
    public function testGetBooksByCategory()
    {
        /** @given 要搜集的分類名稱：object-oriented */
        $category = 'object-oriented';

        /** @when 系統透過爬蟲向天瓏圖書執行關鍵字搜尋 */
        $crawler = new TenlongCrawler();
        $books = $crawler->getBooksByCategory($category);

        /** @then 爬蟲找到書籍並擷取出書籍內容 */
        $this->assertContains(
            [
                "name" => "UML3 & XML3 物件導向 程式設計寶典 (舊名: UML3 & XML3 物件導向系統分析與設計)",
                "link" => "https://www.tenlong.com.tw/products/9789576154348?list_name=c-object-oriented",
                "picture" => "https://cf-assets2.tenlong.com.tw/products/images/000/151/629/medium/47166-RGB.jpg?1597825422",
            ],
            $books
        );
    }
}
