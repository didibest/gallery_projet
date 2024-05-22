<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'gallery');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO message (full_name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $message);
      // Set parameters and execute
      $fullname = $_POST['fullname'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      if (!empty($fullname) && !empty($email) && !empty($message)) {
          $stmt->execute();
      } else {
          echo '  <div class="alert alert-danger" role="alert">
                    Please fill all the fields.
                  </div> ';
      }
        

      $sql = "SELECT * FROM message";
      $result = $conn->query($sql);

      $data = array();
     if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}



  



      $stmt->close();
      $conn->close();
      // تحويل البيانات إلى JSON
   $jsonData = json_encode($data, JSON_PRETTY_PRINT);

   // حفظ البيانات في ملف JS
    file_put_contents('data.js', "var data = $jsonData;");
  } 
  ?>




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
               <li><a href="../gallery/inndex.php">Galery</a></li>
               <li><a class="active" >Contact</a></li>
               <li><a>About</a></li>
            </ul>
        </div>
        <div class="box box3">
        <form method="POST" action="" class="form">
             <div class="form-group">
               <label for="fullname">Full Name:</label>
               <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name">
             </div>
             <div class="form-group">
               <label for="email">Email Address:</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
             </div>
             <div class="form-group">
               <label for="message">Message:</label>
              <textarea class="form-control" id="message" name="message" rows="3"></textarea>
             </div>
             <br>
             <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
        </form>

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