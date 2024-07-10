<?php
$servername = "SERVER_NAME";
$username = "USER_NAME";
$password = "PASSWORD";
$dbname = "DATABASE_NAME";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("資料庫連接失敗: " . $conn->connect_error);
}

if (isset($_GET['file_name'])) {
    $file_name = $conn->real_escape_string($_GET['file_name']);
    $stmt = $conn->prepare("SELECT id, file_name, file_path, description, upload_date FROM uploaded_images WHERE file_name = ?");
    if ($stmt) {
        $stmt->bind_param("s", $file_name);
        $stmt->execute();
        $stmt->bind_result($id, $file_name, $file_path, $description, $upload_date);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("查詢失敗: " . $conn->error);
    }
} else {
    die("無效的請求。");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imgs/U.png">
    <title>UpImg - 免費且開源的圖床</title>
    <link href="styles_view.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand mx-auto" href="https://upimg.kesug.com">
                    <img src="imgs/UpImg.png" alt="Logo" height="50">
                </a>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h2 class="text-center">查看圖片</h2>
        <br>
        <div class="input-group mb-3">
            <input type="text" id="pageUrl" class="form-control" value="<?php echo htmlspecialchars("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" readonly>
            <div class="input-group-append">
                <button class="btn btn-warning copy-btn" onclick="copyToClipboard()">複製連結</button>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <img src="<?php echo htmlspecialchars($file_path); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($file_name); ?>">
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <p class="card-text">No. <?php echo htmlspecialchars($id); ?></p>
                <p class="card-text mt-3">上傳者說： <?php echo htmlspecialchars($description); ?></p>
                <p class="card-text mt-3">上傳時間： <?php echo htmlspecialchars($upload_date); ?></p>
            </div>
        </div>
        <br>
    </div>

    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("pageUrl");
            copyText.select();
            document.execCommand("copy");
            alert("複製成功");
        }
    </script>
</body>
</html>
