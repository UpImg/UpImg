<?php
$servername = "SERVER_NAME";
$username = "USER_NAME";
$password = "PASSWORD";
$dbname = "DATABASE_NAME";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("資料庫連接失敗: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    $target_dir = "uploads/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $randomFileName = uniqid();
    $target_file = $target_dir . $randomFileName . '.' . $imageFileType;
    $uploadOk = 1;
    $message = "";

    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowed_types)) {
        $message = "對不起，僅支援上傳 JPG, JPEG, PN, GIF 格式。";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 10485760) {
        $message = "對不起，您的圖片太大了。";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : "";
            $stmt = $conn->prepare("INSERT INTO uploaded_images (file_name, file_path, description) VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $randomFileName, $target_file, $description);
                if ($stmt->execute()) {
                    $message = "文件 " . basename($_FILES["image"]["name"]) . " 上傳成功。";
                    header("Location: view.php?file_name=" . $randomFileName);
                    exit();
                } else {
                    $message = "對不起，上傳您的圖片時發生問題: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $message = "對不起，處理您的圖片時發生問題: " . $conn->error;
            }
        } else {
            $message = "對不起，上傳您的圖片時發生問題。";
        }
    }

    $conn->close();
    echo "<script>alert('$message'); window.location.href = 'index.html';</script>";
} else {
    header("Location: index.html");
    exit();
}
?>
