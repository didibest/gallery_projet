<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "gallery"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    $insert = $conn->query("INSERT into foto (image) VALUES ('$imgContent')");
    /*if($insert) {
        echo '<div class="alert alert-info" role="alert">
        The image has been uploaded successfully
      </div>';
    } else {
        echo "حدث خطأ أثناء رفع الصورة.";
    } */
}

// Delete image
if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete = $conn->query("DELETE FROM foto WHERE id = '$id'");
    /*if($delete) {
        echo '<div class="alert alert-success" role="alert">
        The image has been deleted successfully
      </div>';
    } else {
        echo "حدث خطأ أثناء حذف الصورة.";
    }*/
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Brand Name</span>
                    </a>
                </li>

                <li class="dach">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <li class="me">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>
                <li class="setin">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="../inndex.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                  <label>
                     <input type="text" id="searchInput" placeholder="Search here">
                      <ion-icon name="search-outline"></ion-icon>
                 </label>
                 </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                            // توصيل بقاعدة البيانات
                        $servername = "localhost";
                        $username = "root";
                        $password = "";   
                        $dbname = "gallery";

                        // إنشاء الاتصال
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // التحقق من الاتصال
                       if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                     }

                    // استعلام SQL لجلب عدد الصور
                    $sql = "SELECT COUNT(*) AS total_photos FROM foto";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // إذا كان هناك نتائج
                    $row = $result->fetch_assoc();
                    $total_photos = $row["total_photos"];
                    echo '<div class="numbers"> ' . $total_photos . '</div>';
                    } 
                    else{
                        echo'<div class="numbers">0</div>';
                    }  
                    ?>
                        <div class="cardName">image</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="image-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                            // توصيل بقاعدة البيانات
                       

                        // إنشاء الاتصال
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // التحقق من الاتصال
                       if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                     }

                    // استعلام SQL لجلب عدد الصور
                    $sql = "SELECT COUNT(*) AS total_message FROM message";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // إذا كان هناك نتائج
                    $row = $result->fetch_assoc();
                    $total_message = $row["total_message"];
                    echo '<div class="numbers"> ' . $total_message . '</div>';
                    } 
                    else{
                        echo'<div class="numbers">0</div>';
                    }  
                    ?>
                        <div class="cardName">Messages</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <tbody>
                         <?php
                                  // استعلام SQL لاسترداد الصور
                                  $sql = "SELECT id, image FROM foto";
                                   $result = $conn->query($sql);

                                 // عرض الصور في بطاقات
                                  if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                 $imageData = base64_encode($row['image']); // تحويل البيانات إلى قاعدة64
                                 echo '
                                 <tr>
                                   <td> <a href="?delete_id='.$row['id'].'" class="btn btn-danger">Delete</a></td>
                                   <td>$1200</td>
                                   <td>Paid</td>
                                   <td><span class="status delivered"><img src="data:image/jpeg;base64,'.$imageData.'" style="width: 130px;"></span></td>
                                 </tr>
                                 ';
                
                                  }
                                  } else {
                                        //echo "لا توجد صور مخزنة في قاعدة البيانات.";
                                  }

                                
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= upload ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Upload image</h2>
                    </div>

                    <div class="sec1">
                        <form  action="" method="post" enctype="multipart/form-data"  class="input-group mb-3">
                              <input type="file" id="image" name="image" class="form-control" accept="image/jpeg, image/png,image/gif">
                              <input type="submit" value="Upload" class="btn btn-primary" name="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="messg">
                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Messages</th>
                            <th>Full name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="root">
                   <?php

                          // استعلام SQL لجلب البيانات
                         $sql = "SELECT full_name, email, message FROM message";
                            $result = $conn->query($sql);

                             // عرض البيانات داخل النموذج
                         if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                                  echo '<tr>';
                                  echo '<td><a class="btn-td">Reply</a></td>';
                                   echo '<td><p>' . $row['message'] . '</p></td>';
                                   echo '<td><span>' . $row['full_name'] . '</span></td>';
                                    echo '<td><span class="">' . $row['email'] . '</span></td>';
                                    echo '</tr>';
                        }
                        } else {
                            echo "0 results";
                        } 
                        $conn->close();
                       
                         ?>

            
                    </tbody>
                </table>
            </div>
            </div>
            <iframe src="setting.php" frameborder="0" class="iframe" scrolling="no" ></iframe>
        </div>


    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="../contact/data.js"></script>
    <script src="dataserch.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>