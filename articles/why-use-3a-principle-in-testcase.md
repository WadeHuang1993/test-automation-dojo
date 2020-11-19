# 為什麼在測試案例中要用 3A 原則

當我們奉行 TDD 的時候，就應該要把測試案例試為 Production Code 來對待。
這意味著開發人員在寫測試案例的過程中，應該保持測試案例的 可讀性 。

在 TDD 盛行多年下來，社群上歸納了一套 撰寫測試案例的風格 來提升可讀性，這個風格就是 3A 原則。

## 3A 原則是哪 3 個 A?
3A 原則將每個測試案例拆分成三個步驟，分別為：

1. Arrange: 準備測試資料階段
2. Act: 執行受測方法
3. Assert: 判斷執行結果是否符合預期

而這三個步驟就是對應一個測試案例必備的要素： Input>執行受測程式>Output

![3A 寫法範例](https://github.com/WadeHuang1993/test-automation-dojo/blob/main/articles/images/3a-principle-example.png)

## 這麼做的優點是？
當所有的測試案例都按照 3A 原則撰寫時，可以大幅提升測試案例的可讀性。
測試案例會變得像原始碼的文件，可以讓開發人員知道輸入輸出是什麼。

## 還有更好的寫法嗎？
有的，可以將 3A 替換成 BDD 的 Cucumber（given、when、then）

而 BDD 的背後的思維會在日後的練習再提到。