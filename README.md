# UpImg Image Hosting Website

<p align="center">
  <a href="https://upimg.jrytw.com" target="_blank">
    <img src="https://i.imgur.com/nviymd9.png" alt="UpImg Logo" hight="160"/>
  </a>
</p>

A free and open-source image sharing platform.

[UpImg Image Hosting Website](https://upimg.jrytw.com)

---

## Introduction

### 🌟 Features
UpImg provides the following features to help users easily manage and share images:

- **Image Upload**: Supports JPG, JPEG, PNG, and GIF formats.
- **Image Description**: Add a description to uploaded images.
- **Shareable Links**: Provides view links for easy sharing.
- **Image Size Limit**: Each image is limited to 10MB.

The website is developed with PHP and MySQL, and uses HTML, CSS, and JavaScript for frontend interaction.

---

## User Guide

### 1. Upload Images
- Click the "Upload Image" button on the homepage.
- Select an image file and fill in the description.
- Click "Upload". After a successful upload, you will be redirected to the image view page.

### 2. View and Share Images
- The image view page provides a copyable link for easy sharing with friends.

### 3. Remove Image File
- In the upload dialog, you can click the "Remove File" button to clear the selected file.

---

## Technical Details

### Frontend Technologies
- **HTML/CSS**: For page structure and styling.
- **Bootstrap 4**: For rapid responsive design.
- **JavaScript (jQuery)**: For dynamic interaction and form handling.

### Backend Technologies
- **PHP**: Handles upload logic and database operations.
- **MySQL**: Stores uploaded image data and descriptions.

### Database Structure
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

### Security
- **Image Format Validation**: Restricts uploads to JPG, JPEG, PNG, and GIF formats.
- **Size Limit**: Limits image size to no more than 10MB.
- **Database Protection**: Uses SQL prepared statements to prevent SQL injection.

---

## Deployment Guide

### 1. Create Folder Structure
- Create a folder named `uploads` under the `UpImg` directory to store uploaded images.

### 2. Set Up Database
- Execute the SQL command in `create_table.sql` in your database to create the `uploaded_images` table.

### 3. Configure Database Connection
- Edit the following variables in `upload.php` and `view.php` to match your own database settings:
  ```php
  $servername = "SERVER_NAME";
  $username = "USER_NAME";
  $password = "PASSWORD";
  $dbname = "DATABASE_NAME";
  ```

### 4. Launch the Website
- Upload the project to any PHP-supported web hosting service (such as InfinityFree) and activate it.

---

If you have any questions or suggestions, feel free to contact me! 🎉
