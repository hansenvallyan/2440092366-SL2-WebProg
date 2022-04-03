<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <?php 
        include("config.php");
        $username=$password="";
        $errorMsg=array();
        
        // if(empty($_SESSION)){
        //     array_push($errorMsg , "Sebelum login, silahkan Registrasi terlebih dahulu !");
        // }
            

        if(isset($_POST['submit']) ){
            $username=$_POST['username'];
            $password = $_POST['password'];

            $str_query="SELECT * FROM customer where username = '".$_POST['username']."'";
            $query = mysqli_query($connection, $str_query);
            $found_username = mysqli_num_rows($query);
            $row = mysqli_fetch_array($query);
            
            if(empty(trim($_POST['username']))){
                // $errorMsg="Username harus di isi !";
                array_push($errorMsg , "Username harus di isi !");
            }else if(empty(trim($_POST['password']))){
                // $errorMsg="Password harus di isi !";
                array_push($errorMsg , "Password harus di isi !");
            }
            else if(!$found_username){
                // $errorMsg="Username atau Password tidak sama pada saat registrasi !";
                array_push($errorMsg , "Username tidak ditemukan !");
            }else if($row['password']!=$_POST['password']){
                array_push($errorMsg , "Password salah !");
            }

            if(count($errorMsg)==0){
                session_start();
                $_SESSION['username']=$row['username'];
                // echo $row['ID'];
                header('Location: ./home.php');
            }

        }

        function cek_error(){
            global $errorMsg;
            if(count($errorMsg)>0){
                foreach($errorMsg as $err){
                    echo $err. "<br/>";
                }
                echo "<br>";
            }
        }

    ?>
    <div class="content">
        <div class="title">
            Login
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="boxContainer">
                <div class="fieldContainer">
                    <div class="field">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="" value="<?php echo $username ?>" >
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" value="<?php echo $password ?>">
                    </div>  
                </div>
                <span>
                    <?php 
                        echo cek_error(); 
                    ?>
                </span>
                <div class="buttonContainer">
                    <input type="submit" name="submit" value="Login" id="login">
                    <div  id="kembali">
                        Kembali
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</body>
<script src="login.js"></script>
</html>