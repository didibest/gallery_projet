<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// قراءة البيانات من قاعدة البيانات
$sql2 = "SELECT * FROM settings WHERE id=1";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $page_home = $row['page_home'];
    $page_gallery = $row['page_gallery'];
    $page_contact = $row['page_contact'];
    $page_about = $row['page_about'];
    $photographer_name = $row['photographer_name'];
    $photographer_bio = $row['photographer_bio'];
    $site_name = $row['site_name'];
    $footer_text = $row['footer_text'];
    $icon1 = $row['icon1'];
    $icon2 = $row['icon2'];
    $icon3 = $row['icon3'];
    $icon4 = $row['icon4'];
    $url1 = $row['url1'];
    $url2 = $row['url2'];
    $url3 = $row['url3'];
    $url4 = $row['url4'];
    $logo_path = $row['logo_path'];
} else {
    echo "No settings found!";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?></title>
    <link rel="stylesheet" href="style.css">
    <!--################# google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--##################### font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
     <!--######################## lord icon-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
     <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>   
</head>
<body>
    <article></article>
    <div id="modal" class="modal">
        <span id="closeBtn" class="close-btn">&times;</span>
        <img id="modalImage" class="modal-image" src="" alt="Large Image">
    </div>
    <div class="continer">
        <div class="box box1">
            <div class="ch1 logo">
             <img src="/project/dshbord/<?php echo $logo_path; ?>" alt="Logo">
            </div>
            <span class="menu-icon">
                 <div></div>
                 <div></div>
                 <div></div>
            </span>
          <!-- <a href="#" class="menu-icon">
                <i class="fa-solid fa-bars"></i>
            </a> --> 
            <ul class="ch1">
               <li><a class="active"><?php echo $page_home; ?></a></li>
               <li><a href="/project/gallery/inndex.php"><?php echo $page_gallery; ?></a></li>
               <li><a href="/project/contact/inndex.php"><?php echo $page_contact; ?></a></li>
               <li><a><?php echo $page_about; ?></a></li>
               <?php
// اتصال بقاعدة البيانات
$connection = mysqli_connect("localhost", "root", "", "gallery");

// التحقق من نجاح الاتصال
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// فحص عنوان IP الزائر
$user_ip = $_SERVER['REMOTE_ADDR'];

// استعلام SQL للبحث عن العنوان IP في جدول ip_addresses
$query = "SELECT * FROM ip_addresses WHERE ip_address = '$user_ip'";
$result = mysqli_query($connection, $query);

// التحقق مما إذا كان هناك نتيجة للاستعلام
if (mysqli_num_rows($result) > 0) {
    // يوجد تطابق، يمكن عرض زر تسجيل الدخول
    echo '<a href="/project/dshbord/index2.php" id="loginButton" style="display: block;">تسجيل الدخول</a>';
} else {
    // لا يوجد تطابق، يمكن إخفاء زر تسجيل الدخول
    echo '<a id="loginButton" style="display: none;">تسجيل الدخول</a>';
}

// إغلاق اتصال قاعدة البيانات

?>

            </ul>
        </div>
        <div class="box box2">
              <h2><?php echo $photographer_name; ?></h2>
              <p><?php echo $photographer_bio; ?></p>
        </div>
        <div class="box box3">
            <div class="ele">
                <!--################################################-->
                <?php
                $imageCounter = 1;
// اتصال بقاعدة البيانات
              
// إنشاء اتصال

// استعلام SQL لاسترداد الصور
$sql = "SELECT image FROM foto LIMIT 7  ";
$result = $conn->query($sql);

// عرض الصور

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // استخراج البيانات الثنائية للصورة
        $imageData = $row['image'];
        $class = "im" . $imageCounter;
        // عرض الصورة باستخدام علامة الصورة base64
        echo '<div class="im '.$class.'" style="opacity: 1;">';
        echo '<h2>Watching</h2>';
        echo '<img src="data:image/jpeg;base64,'.base64_encode($imageData).'" alt="">';
        echo '<lord-icon src="https://cdn.lordicon.com/tyounuzx.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" class="lord"></lord-icon>';
        echo '</div>';
        $imageCounter++;
    }
} else {
    echo "";
}

// إغلاق الاتصال بقاعدة البيانات

?>

<!--#####################################################-->
       
            </div>
        </div>
    
        <div class="box box4">
            <h1><?php echo $site_name; ?></h1>
            <p><?php echo $footer_text; ?></p>
            <div>
                <a href=""><?php echo $icon1; ?></a>
                <a href=""><?php echo $icon2; ?></a>
                <a href=""><?php echo $icon3; ?></a>
                <a href=""><?php echo $icon3; ?></i></a>
                <?php $conn->close(); ?>
            </div>
            <span></span>
            <p>© 2024 Didi Tedjani</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>