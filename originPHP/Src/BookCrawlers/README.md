# 以 BDD 風格撰寫爬蟲測試案例

假設你正在開發一個 **分享讀書心得** 的網站，
在使用者分享讀書心得之前，需要先找到要分享的書籍。

然而你的網站並沒有串接需付費的圖書系統，取而代之的是：透過爬蟲撈取各大圖書網站的書籍資料。

本範例的練習目的為：

```
讓開發人員練習拆解需求，將需求轉成 BDD 測試用的使用案例，最後藉由使用案例來設計封裝良好的物件。
```

使用案例如下：

1. 使用者搜集的書籍名稱：「領域驅動設計」；系統透過爬蟲向天瓏圖書執行關鍵字搜尋；爬蟲找到書籍並擷取出書籍內容（單本）

2. 使用者搜尋「Object-oriented 物件導向」分類的書籍；系統透過爬蟲向天瓏圖書執行分類搜尋；爬蟲找到書籍並擷取出書籍內容（多本）

請依照使用案例拆解成 BDD 風格的需求規格（given、when、then）來完成測試案例。

## 爬蟲測試案例的目錄如下

### originPHP/Src/BookCrawlers

裡面包含專門向天瓏圖書爬取資料的爬蟲 `TenlongCrawler.php`。  
此次練習是要讓開發人員練習封裝，故只留下 TODO，方法名稱則讓開發人員自行發揮。

### originPHP/Tests/BookCrawlers

裡面包含 **天瓏圖書爬蟲** 的測試案例： `TenlongCrawlerTest.php`

注意，本次的練習總共需完成兩個測試案例。

你可以在 `TenlongCrawlerTest.php` 看見第一個使用案例已經寫成 BDD Cucumber 風格的測試案例。

希望你先透過第一個測試案例來設計「封裝良好的物件」

接著再練習將第二個使用案例拆解成 BDD Cucumber 風格的測試案例。


## 建置「爬蟲測試的環境」步驟如下：
### Clone test-automation-dojo

先把練習測試的專案從 Github Clone 一份回本機

```bash
git clone https://github.com/WadeHuang1993/test-automation-dojo.git .
```

###  cd 至 originPHP 目錄

originPHP 這個目錄專門用來讓大家在原生的 PHP 環境編寫測試案例。

故以下所有操作都應該先 cd 至 originPHP 目錄

```bash
cd {path to originPHP}
```

###  透過 Composer 安裝依賴套件

包含：
-  PHP 專屬的測試框架 phpunit 9
- 爬蟲套件 @link [voku/simple_html_dom](https://github.com/voku/simple_html_dom)

```bash
composer install
```

### 執行測試案例

透過 PHPUnit 執行爬蟲的測試案例

```bash
./vendor/bin/phpunit ./Tests/BookCrawlers/
```