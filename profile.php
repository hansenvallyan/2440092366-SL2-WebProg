<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
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
                <a name="homeBtn" href="./home.php">Home </a> 
            </div>
            <div class="btnItem">
                <a name="profileBtn" href="./profile.php"><u>Profile</u></a>
            </div>
        </div>
        <div class="navRight">
            <a href="prosesLogout.php">Logout</a>
        </div>
    </div>

    <div class="content">
    <div class="title">
        <b>Profil Pribadi</b>
    </div>
    <div class="edit">
        <a href="editProfile.php">Edit Profile</a>
    </div>
    <div class="row">
                    <div class="field">
                        <label for="namaDepan">Nama Depan</label>
                        <div class="container">
                            <?php echo "<b>". $row['namaDepan']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="namaTengah">Nama Tengah</label>
                        <div class="container">
                            <?php echo "<b>". $row['namaTengah']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="namaBelakang">Nama Belakang</label>
                        <div class="container">
                            <?php echo "<b>". $row['namaBelakang']. "</b>" ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <div class="container">
                            <?php echo "<b>". $row['tempatLahir']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="tglLahir">Tgl Lahir</label>
                        <div class="container">
                            <?php 
                            $newDate = date("d-m-Y", strtotime($row['tanggalLahir']));
                            echo "<b>". $newDate. "</b>" ;
                            ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="nik">NIK</label>
                        <div class="container">
                            <?php echo "<b>". $row['NIK']. "</b>" ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="wargaNegara">Warga Negara</label>
                        <div class="container">
                            <?php echo "<b>". $row['wargaNegara']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <div class="container">
                            <?php echo "<b>". $row['email']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="noHp">No HP</label>
                        <div class="container">
                            <?php echo "<b>". $row['noHp']. "</b>" ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="field" id="alamat">
                        <label for="alamat">Alamat</label>
                        <div class="container">
                            <?php echo "<b>". $row['alamat']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="kodePos">Kode Pos</label>
                        <div class="container">
                            <?php echo "<b>". $row['kodePos']. "</b>" ?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="fotoProfil">Foto Profil</label>
                        <img src="./BerkasFoto/<?php echo $row['fotoProfil']?>" alt="">
                        <br>
                    </div>
                    
                </div>
                <div class="row">
                    
                </div>
                
                
    </div>
    
</body>
<script src="profile.js"></script>
</html>