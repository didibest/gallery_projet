<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استلام البيانات من النموذج
$page_home = $_POST['page_home'];
$page_gallery = $_POST['page_gallery'];
$page_contact = $_POST['page_contact'];
$page_about = $_POST['page_about'];
$photographer_name = $_POST['photographer_name'];
$photographer_bio = $_POST['photographer_bio'];
$site_name = $_POST['site_name'];
$footer_text = $_POST['footer_text'];
$icon1 = $_POST['icon1'];
$icon2 = $_POST['icon2'];
$icon3 = $_POST['icon3'];
$icon4 = $_POST['icon4'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
$url3 = $_POST['url3'];
$url4 = $_POST['url4'];
$logo_path = "";
if ($_FILES['logo']['name']) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        $logo_path = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }
}

// تحديث البيانات في قاعدة البيانات
$sql = "UPDATE settings SET 
    page_home='$page_home', 
    page_gallery='$page_gallery', 
    page_contact='$page_contact', 
    page_about='$page_about', 
    photographer_name='$photographer_name', 
    photographer_bio='$photographer_bio', 
    site_name='$site_name', 
    footer_text='$footer_text', 
    icon1='$icon1', 
    icon2='$icon2', 
    icon3='$icon3',
    icon4='$icon4',
    url1='$url1',
    url2='$url2',
    url3='$url3',
    url4='$url4'";

if ($logo_path) {
    $sql .= ", logo_path='$logo_path'";
}

$sql .= " WHERE id=1"; // نفترض وجود سجل واحد فقط في جدول الإعدادات

if ($conn->query($sql) === TRUE) {
    echo '';
} else {
    echo '';
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="set-style/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    
        <div class="settings">
            <h1>Panel Settings</h1>
            <form action="setting.php" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                <div class="col">
                <label class="form-label">Home page name:</label>
                <input class="form-control" type="text" name="page_home" value="<?php echo isset($_POST['page_home']) ? $_POST['page_home'] : 'Home'; ?>">
                </div>
                <div class="col">
                <label class="form-label">gallery page name:</label>
                <input class="form-control" type="text" name="page_gallery" value="<?php echo isset($_POST['page_gallery']) ? $_POST['page_gallery'] : 'Gallery'; ?>">
                </div>
                </div>
                <div class="row g-3">
                <div class="col">
                <label class="form-label">Contact Page name: </label>
                <input class="form-control" type="text" name="page_contact" value="<?php echo isset($_POST['page_contact']) ? $_POST['page_contact'] : 'Contact'; ?>">
                </div>
                <div class="col">
                <label class="form-label">About Page name: </label>
                <input class="form-control" type="text" name="page_about" value="<?php echo isset($_POST['page_about']) ? $_POST['page_about'] : 'About'; ?>">
                </div>
                </div>
                <div class="mb-3">
                <label class="form-label">Photographer's name: </label>
                <input class="form-control" type="text" name="photographer_name" value="<?php echo isset($_POST['photographer_name']) ? $_POST['photographer_name'] : 'Your name'; ?>">
                </div>
                <div class="mb-3">
                <label class="form-label">photographer Bio: </label>
                <textarea class="form-control" name="photographer_bio" value="<?php echo isset($_POST['photographer_bio']) ? $_POST['photographer_bio'] : 'your bio'; ?>"></textarea>
                </div>
                <div class="mb-3">
                <label class="form-label">Website name: </label>
                <input class="form-control" type="text" name="site_name" value="<?php echo isset($_POST['site_name']) ? $_POST['site_name'] : 'Gallery'; ?>">
                </div>
                <div class="mb-3">
                <label class="form-label">Footer text: </label>
                <textarea class="form-control" name="footer_text" value="<?php echo isset($_POST['footer_text']) ? $_POST['footer_text'] : 'Paragraph'; ?>"></textarea>
                </div>
                <div class="row g-3">
                <div class="col">
                <label class="form-label">Icon 1: </label>
                <input class="form-control" type="text" name="icon1" value="<?php echo isset($_POST['icon1']) ? $_POST['icon1'] : '<i class="fa-brands fa-facebook"></i>'; ?>">
                </div>
                <div class="col">
                <label class="form-label">Icon 2: </label>
                <input class="form-control" type="text" name="icon2" value="<?php echo isset($_POST['icon2']) ? $_POST['icon2'] : '<i class="fa-brands fa-linkedin"></i>'; ?>">
                </div>
                </div>
                <div class="row g-3">
                <div class="col">
                <label class="form-label">Icon 3: </label>
                <input class="form-control" type="text" name="icon3" value="<?php echo isset($_POST['icon3']) ? $_POST['icon3'] : '<i class="fa-brands fa-instagram"></i>'; ?>">
                </div>
                <div class="col">
                <label class="form-label">Icon 4: </label>
                <input class="form-control" type="text" name="icon4" value="<?php echo isset($_POST['icon4']) ? $_POST['icon4'] : '<i class="fa-brands fa-square-twitter"></i>'; ?>">
                </div>
                </div>
                <div class="mb-3">
                <label class="form-label">Url for Icon 1: </label>
                <input class="form-control" type="text" name="url1" value="<?php echo isset($_POST['url1']) ? $_POST['url1'] : '<i class="fa-brands fa-square-twitter"></i>'; ?>">
                </div>
                <div class="mb-3">
                <label class="form-label">Url for Icon 2: </label>
                <input class="form-control" type="text" name="url2" value="<?php echo isset($_POST['url2']) ? $_POST['url2'] : '<i class="fa-brands fa-square-twitter"></i>'; ?>">
                </div>
                <div class="mb-3">
                <label class="form-label">Url for Icon 3: </label>
                <input class="form-control" type="text" name="url3" value="<?php echo isset($_POST['url3']) ? $_POST['url3'] : '<i class="fa-brands fa-square-twitter"></i>'; ?>">
                </div>
                <div class="mb-3">
                <label class="form-label">Url for Icon 4: </label>
                <input class="form-control" type="text" name="url4" value="<?php echo isset($_POST['url4']) ? $_POST['url4'] : '<i class="fa-brands fa-square-twitter"></i>'; ?>">
                </div>
                <div class="mb-3">
                 <label class="form-label">Upload the logo image:</label>
                <input class="form-control" type="file" name="logo">
                 </div>
                <input class="btn btn-primary" type="submit" value="Save">
              </form>
        </div>
        
   

    <!-- =========== Scripts =========  -->
    <script src="set-style/setin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>