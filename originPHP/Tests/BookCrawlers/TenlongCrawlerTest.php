<?php


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
class TenlongCrawlerTest
{

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
    public function testXXX()
    {
        /** @given 要搜集的書籍名稱：領域驅動設計 */
        $bookName = '領域驅動設計';

        /** @when 系統透過爬蟲向天瓏圖書執行關鍵字搜尋 */
        // 爬蟲的目標 URL: https://www.tenlong.com.tw/search?utf8=✓&keyword=領域驅動設計
        $crawler = new TenlongCrawler();

        /** @then 爬蟲找到書籍並擷取出書籍內容 */
        // 完整書名：領域驅動設計：軟體核心複雜度的解決方法 (Domain-Driven Design: Tackling Complexity in the Heart of Software)
        // 書籍語言：繁體中文
        // 作者名稱：Eric Evans
        // 出版社：博碩文化
        // 出版日期：2019-05-13
        // 售價：530
        // 超連結：https://www.tenlong.com.tw/products/9789864343874?list_name=srh
        // 縮圖位置：https://cf-assets2.tenlong.com.tw/products/images/000/130/774/medium/9789864343874_bc.jpg?1554177163
    }

    /**
     * TODO: 完成第二個使用案例
     *
     * 爬蟲的目標 URL: https://www.tenlong.com.tw/categories/object-oriented
     */
}