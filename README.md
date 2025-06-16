# UpImg 圖床網站

<p align="center">
  <a href="https://upimg.jrytw.com" target="_blank">
    <img src="https://i.imgur.com/nviymd9.png" alt="UpImg 圖標" hight="160"/>
  </a>
</p>

一個免費且開源的圖片分享平台。

[UpImg 圖床網站](https://upimg.jrytw.com)

---

## 簡介

### 🌟 功能簡介
UpImg 提供以下功能，幫助用戶輕鬆管理與分享圖片：

- **圖片上傳**：支援 JPG、JPEG、PNG、GIF 格式圖片上傳。
- **圖片描述**：可為上傳的圖片添加描述。
- **連結分享**：提供圖片檢視連結，方便分享。
- **圖片大小限制**：每張圖片大小限制為 10MB。

網站採用 PHP 和 MySQL 開發，並使用 HTML、CSS 和 JavaScript 實現前端交互。

---

## 使用說明

### 1. 上傳圖片
- 點擊首頁的「上傳圖片」按鈕。
- 選擇圖片檔案並填寫描述。
- 點擊「上傳」，成功後會自動跳轉到圖片檢視頁面。

### 2. 查看圖片與分享
- 圖片檢視頁提供可複製的連結，方便與好友分享。

### 3. 移除圖片檔案
- 在上傳互動視窗中，可以點擊「移除檔案」按鈕來清除選擇的檔案。

---

## 技術細節

### 前端技術
- **HTML/CSS**：用於頁面結構和樣式設計。
- **Bootstrap 4**：快速設計響應式頁面。
- **JavaScript (jQuery)**：用於動態交互與表單處理。

### 後端技術
- **PHP**：處理上傳邏輯與資料庫操作。
- **MySQL**：存儲上傳的圖片資料與描述。

### 資料庫結構
```sql
CREATE TABLE `uploaded_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `is_public` int(1) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
```

### 安全性
- **圖片格式驗證**：限制上傳圖片格式為 JPG、JPEG、PNG、GIF。
- **大小限制**：限制圖片大小不超過 10MB。
- **資料庫防護**：使用 SQL 預處理語句，防止 SQL 注入。

---

## 部署指南

### 1. 建立資料夾結構
- 在 `UpImg` 目錄下新增一個名為 `uploads` 的資料夾，用來存放上傳的圖片。

### 2. 設定資料庫
- 將 `create_table.sql` 中的 SQL 指令執行於資料庫中，建立 `uploaded_images` 資料表。

### 3. 設定資料庫連線
- 修改 `upload.php` 與 `view.php` 中的以下變數，填入您自己的資料庫設定：
  ```php
  $servername = "SERVER_NAME";
  $username = "USER_NAME";
  $password = "PASSWORD";
  $dbname = "DATABASE_NAME";
  ```

### 4. 啟動網站
- 使用任一支援 PHP 的網頁主機服務 (如 InfinityFree) 上傳專案並啟用。

---

有任何問題或建議，請隨時聯繫我！ 🎉

