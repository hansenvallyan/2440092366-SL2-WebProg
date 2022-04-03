<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <?php 
        session_start();
        
        if(isset($_SESSION['username'])){
            include("config.php");
            $str_query = "select * FROM customer WHERE username ='".$_SESSION['username']."'";
            $query= mysqli_query($connection, $str_query);
            $row=mysqli_fetch_array($query);
            
        }else{
            echo ("<script LANGUAGE='JavaScript'> window.location.href='./login.php';</script>");
        }
        
    ?>
    <div class="navbar">
        <div class="navLeft">
            Aplikasi Pengelolaan Keuangan
        </div>
        <div class="navCenter">
            <div class="btnItem">
                <a name="homeBtn" href="./home.php"><u>Home</u> </a> 
            </div>
            <div class="btnItem">
                <a name="profileBtn" href="./profile.php">Profile</a>
            </div>
        </div>
        <div class="navRight">
            <a href="prosesLogout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        Halo <b><?php if(!empty($_SESSION)){
            echo $row['namaDepan']. " ".$row['namaTengah']. " ".$row['namaBelakang'] ;
        }
        ?></b>, Selamat datang di Aplikasi pengelola keuangan
    </div>
</body>
<script src="./home.js"></script>
</html>