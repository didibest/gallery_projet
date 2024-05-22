<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!--################# google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--##################### font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--######################## lord icon-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>   

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
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
               <img src="./image/D (1).png" alt="">
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
               <li><a href="../inndex.php" >Home</a></li>
               <li><a class="active">Galery</a></li>
               <li><a href="../contact/inndex.php" >Contact</a></li>
               <li><a>About</a></li>
            </ul>
        </div>
        <div class="box box2">
          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <?php
               
               // اتصال بقاعدة البيانات
                              $servername = "localhost"; 
                              $username = "root";
                              $password = ""; 
                              $dbname = "gallery"; 
               // إنشاء اتصال
               $conn = new mysqli($servername, $username, $password, $dbname);
               
               // التحقق من الاتصال
               if ($conn->connect_error) {
                   die("فشل الاتصال: " . $conn->connect_error);
               }
               
               // استعلام SQL لاسترداد الصور
               $sql = "SELECT image FROM foto LIMIT 3";
               $result = $conn->query($sql);
               
               // عرض الصور
               
               if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                       // استخراج البيانات الثنائية للصورة
                       $imageData = $row['image'];
                       // عرض الصورة باستخدام علامة الصورة base64
                       echo '<div class="carousel-item active">';
                       echo '<img src="data:image/jpeg;base64,'.base64_encode($imageData).'"class="d-block w-100" alt="">';
                       echo '</div>';
                   }
               } else {
                   echo "";
               }
               
               ?>
               
             
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="box box3">
            <div class="ele">
            <?php
                $imageCounter = 1;
// اتصال بقاعدة البيانات

// استعلام SQL لاسترداد الصور
$sql = "SELECT image FROM foto";
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
$conn->close();
?>
            </div>
        </div>
        <div class="box box4">
            <h1>Gallery Didi</h1>
            <p>Lorem ipsum dolor sit amet similique autem? Rem, voluptatibus dolorum. Nisi molestias aliquid sapiente est.</p>
            <div>
                <a href="https://www.facebook.com/profile.php?id=100022881158933&mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/didi_tedjani?igsh=NWh1NG5lZDdlMHFi"><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
                <a href=""><i class="fa-brands fa-square-twitter"></i></a>
            </div>
            <span></span>
            <p>© 2024 Didi Tedjani</p>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>






          
