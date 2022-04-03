<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>

<?php
    // session_start();
    include("config.php");
    
    $errorMsg = "";
    $namaDepan = $namaTengah = $namaBelakang = $tempatLahir= $tglLahir = $nik = $wargaNegara = $email = $noHp =$alamat = $kodePos = $fotoProfil = $username= $password1 =$password2 = "";
    $error = array();
    function startsWith ($string, $startString){
        return (substr($string, 0, strlen($startString)) === $startString);
    }

    if(!empty($_SESSION)){
        echo ("<script LANGUAGE='JavaScript'> window.alert('Anda sudah berhasil melakukan registrasi, silahkan Login !');window.location.href='./welcome.php';</script>");
    }
    // $_SERVER['REQUEST_METHOD']=='POST'
    if(isset($_POST['submit'])){
        $namaDepan = $_POST['namaDepan'];
        $namaTengah = $_POST['namaTengah'];
        $namaBelakang = $_POST['namaBelakang'];
        $tempatLahir= $_POST['tempatLahir'];
        $tglLahir = date('Y-m-d', strtotime($_POST['tglLahir']));
        $today = date('Y-m-d');
        $nik = $_POST['nik'];
        $wargaNegara = $_POST['wargaNegara'];
        $email = $_POST['email'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];
        $kodePos = $_POST['kodePos'];
        $filename = $_FILES['fotoProfil']['name'];
        $username = $_POST['username'];
        $password1= $_POST['password1'];
        $password2 = $_POST['password2'];
       
        if(empty(trim($_POST['namaDepan']))){
            array_push($error, "Nama depan tidak boleh kosong");
            // $namaDepan="";
        }else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['namaDepan'])){
            array_push($error,"Nama depan harus terdiri dari Huruf" );
            // $namaDepan="";
        }

        if(empty(trim($_POST['namaTengah']))){
            array_push($error,"Nama tengah tidak boleh kosong" );
            // $namaTengah="";
        }else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['namaTengah'])){
            array_push($error,"Nama tengah harus terdiri dari Huruf");
            // $namaTengah="";
        }

        if(empty(trim($_POST['namaBelakang']))){
            array_push($error,"Nama belakang tidak boleh kosong" );
            // $namaBelakang="";
        }else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['namaBelakang'])){
            array_push($error,"Nama belakang harus terdiri dari Huruf" );
            // $namaBelakang="";
        }

        if(empty(trim($_POST['tempatLahir']))){
            array_push($error,"Tempat Lahir tidak boleh kosong" );
            // $tempatLahir="";
        }else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['tempatLahir'])){
            array_push($error,"Tempat Lahir harus terdiri dari Huruf" );
            // $tempatLahir="";
        }

        if(empty($_POST['tglLahir'])){
            array_push($error,"Tanggal Lahir tidak boleh kosong" );
            $tglLahir="";
        }else if($_POST['tglLahir']>=$today){
            array_push($error,"Tanggal Lahir harus lebih kecil dari tanggal hari ini" );
        }

        
        $str_query ="select * from customer where NIK = '".$_POST['nik']."'";
        $query = mysqli_query($connection, $str_query);
        
        if(empty(trim($_POST['nik']))){
            array_push($error,"NIK tidak boleh kosong" );
            // $nik="";
        }else if(!ctype_digit($_POST['nik'])){
            array_push($error, "NIK hanya boleh berupa angka");
        }else if(mb_strlen($_POST['nik'])!=16){
            array_push($error,"NIK harus terdiri dari 16 digit" );
            // $tempatLahir="";
        }else if(mysqli_num_rows($query)){
            array_push($error,"NIK sudah pernah terdaftar sebelumnya !" );
        }

        if(empty(trim($_POST['wargaNegara']))){
            array_push($error,"Warga Negara tidak boleh kosong" );
            // $tempatLahir="";
        }else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['wargaNegara'])){
            array_push($error,"Warga Negara harus terdiri dari Huruf" );
            // $tempatLahir="";
        }

        if(empty($_POST['email'])){
            array_push($error,"Email tidak boleh kosong" );
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                array_push($error,"Format Email Salah" );
        }

        if(empty(trim($_POST['noHp']))){
            array_push($error,"No HP tidak boleh kosong" );
        }else if(!startsWith($_POST['noHp'], "+62")){
            array_push($error,"No HP harus diawali +62" );
        }else if(!ctype_digit(substr($_POST['noHp'],1))){
            array_push($error, "No HP hanya boleh berupa angka");
        }
        else if(!(mb_strlen($_POST['noHp'])>10 && mb_strlen($_POST['noHp'])<16 )){
            array_push($error,"No HP harus terdiri lebih dari 10 digit dan kurang dari 16 digit angka (Termasuk +62)" );
        }

        if(empty(trim($_POST['alamat']))){
            array_push($error,"Alamat tidak boleh kosong" );
        }

        if(empty(trim($_POST['kodePos']))){
            array_push($error,"Kode Pos tidak boleh kosong" );
        }else if(!ctype_digit($_POST['kodePos'])){
            array_push($error, "Kode Pos hanya boleh berupa angka");
        }else if(mb_strlen($_POST['kodePos'])!=5){
            array_push($error,"Kode Pos harus terdiri dari 5 digit" );
        }

        $allowedFormat = array('gif', 'png', 'jpeg', 'jpg');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(empty($_FILES['fotoProfil']['name'])){
            array_push($error,"Foto profil harus diupload" );
        }
        else if(!in_array($ext, $allowedFormat)){
            array_push($error,"Format Foto Profil yang diperbolehkan hanya berupa Gif, PNG, JPEG, dan JPG" );
        }else if($_FILES['fotoProfil']['size']>5000000 ){
            array_push($error,"Ukuran Maksimal Foto yang dapat diupload 5 MB" );
        }


        $str_query ="select * from customer where username = '".$_POST['username']."'";
        $query = mysqli_query($connection, $str_query);
        echo  mysqli_num_rows($query);

        if(empty(trim($_POST['username']))){
            array_push($error,"Username tidak boleh kosong" );
        }else if(preg_match("/\s/",$_POST['username'])){
            array_push($error,"Username tidak boleh terdapat spasi" );
        }
        else if(!ctype_alpha($_POST['username'])){
            array_push($error, "Username hanya boleh berupa huruf");
        }elseif(!ctype_lower($_POST['username'])){
            array_push($error, "Username hanya boleh berupa huruf kecil");
        }else if(mysqli_num_rows($query)){
            array_push($error,"Username sudah pernah terdaftar sebelumnya !" );
        }
        

        if(empty(trim($password1))){
            array_push($error, "Password 1 tidak boleh kosong");
        }if(empty(trim($password2))){
            array_push($error, "Password 2 tidak boleh kosong");
        }
        else if($password1 != $password2){
            array_push($error,"Password 1 dan Password 2 tidak sama" );
        }else if(strlen($password1)<8){
            array_push($error,"Password tidak boleh kurang dari 8 karakter" );
        }else if(!preg_match('@[0-9]@', $password1) ){
            array_push($error,"Password harus mengandung setidaknya satu angka");
        }else if(!preg_match('@[A-Z]@', $password1) ){
            array_push($error,"Password harus mengandung setidaknya satu Huruf Besar");
        }else if(!preg_match('@[a-z]@', $password1) ){
            array_push($error,"Password harus mengandung setidaknya satu Huruf Kecil");
        }

        if(count($error)==0){
            // $_SESSION['namaDepan'] = ucfirst($_POST['namaDepan']);
            // $_SESSION['namaTengah'] = ucfirst($_POST['namaTengah']);
            // $_SESSION['namaBelakang'] = ucfirst($_POST['namaBelakang']);
            // $_SESSION['tempatLahir']= ucfirst($_POST['tempatLahir']);
            // $_SESSION['tglLahir'] = date('Y-m-d', strtotime($_POST['tglLahir']));
            // $_SESSION['today'] = date('Y-m-d');
            // $_SESSION['nik'] = $_POST['nik'];
            // $_SESSION['wargaNegara'] = ucfirst($_POST['wargaNegara']);
            // $_SESSION['email'] = $_POST['email'];
            // $_SESSION['noHp'] = $_POST['noHp'];
            // $_SESSION['alamat'] = $_POST['alamat'];
            // $_SESSION['kodePos'] = $_POST['kodePos'];
            // $_SESSION['filename'] = $_FILES['fotoProfil']['name'];
            // $_SESSION['username'] = $_POST['username'];
            // $_SESSION['password1']= $_POST['password1'];
            // $_SESSION['password2'] = $_POST['password2'];
        
            $filename = $_FILES['fotoProfil']['name'];
            $tmpName= $_FILES['fotoProfil']['tmp_name'];
            $dirUpload="BerkasFoto/";
            if (!file_exists($dirUpload)) {
                mkdir($dirUpload, 0777, true);
            }
            $terupload = move_uploaded_file($tmpName, $dirUpload.$filename);

            $str_query= "insert into customer (namaDepan, namaTengah, namaBelakang, tempatLahir, tanggalLahir, NIK, wargaNegara, email, noHp, alamat, kodePos, fotoProfil,username, password) values ('".ucfirst($_POST['namaDepan'])."','"
            .ucfirst($_POST['namaTengah'])."','"
            .ucfirst($_POST['namaBelakang'])."','"
            .ucfirst($_POST['tempatLahir'])."','"
            .date('Y-m-d', strtotime($_POST['tglLahir']))."','"
            .$_POST['nik']."','"
            .ucfirst($_POST['wargaNegara'])."','"
            .$_POST['email']."','"
            .$_POST['noHp']."','"
            .$_POST['alamat']."','"
            .$_POST['kodePos']."','"
            .$_FILES['fotoProfil']['name']."','"
            .$_POST['username']."','"
            .$_POST['password1']."')";
            $query=mysqli_query($connection, $str_query);

            if($query){
                echo ("<script LANGUAGE='JavaScript'> window.alert('Registrasi Berhasil'); window.location.href='./welcome.php';</script>");
            }else{
                echo ("<script LANGUAGE='JavaScript'> window.alert('Registrasi Gagal');</script>");
            }
            
        }

    }

    function cek_error(){
        global $error;
        if(count($error)>0){
            if(count($error)<2){
                echo "<br><b><u>Error Message:</u></b><br><br>";
            }else{
                echo "<br><b><u>Error Messages:</u></b><br><br>";
            }
            foreach($error as $err){
                echo "<li>".$err. "</li><br/>";
            }
            echo "<br>";
        }
    }

    
    
    
?>
    <div class="content">
        
        <div class="title">
            Register
        </div>
        <div class="formContainer">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="field">
                        <label for="namaDepan">Nama Depan</label>
                        <input type="text" name="namaDepan" id="" value="<?php echo $namaDepan ?>">
                    </div>
                    <div class="field">
                        <label for="namaTengah">Nama Tengah</label>
                        <input type="text" name="namaTengah" id="" value="<?php echo $namaTengah ?>">
                    </div>
                    <div class="field">
                        <label for="namaBelakang">Nama Belakang</label>
                        <input type="text" name="namaBelakang" id="" value="<?php echo $namaBelakang ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" name="tempatLahir" id="" value="<?php echo $tempatLahir ?>">
                    </div>
                    <div class="field">
                        <label for="tglLahir">Tgl Lahir</label>
                        <input type="date" name="tglLahir" id="" value="<?php echo $tglLahir ?>">
                    </div>
                    <div class="field">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="" value="<?php echo $nik ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="wargaNegara">Warga Negara</label>
                        <input type="text" name="wargaNegara" id="" value="<?php echo $wargaNegara ?>">
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="" value="<?php echo $email ?>">
                    </div>
                    <div class="field">
                        <label for="noHp">No HP</label>
                        <input type="text" name="noHp" id="" value="<?php echo $noHp ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat"  id="" cols="25" rows="5"><?php echo $alamat ?></textarea>
                    </div>
                    <div class="field">
                        <label for="kodePos">Kode Pos</label>
                        <input type="number" name="kodePos" id="" value="<?php echo $kodePos ?>">
                    </div>
                    <div class="field">
                        <label for="fotoProfil">Foto Profil</label>
                        <input type="file" id="fotoProfil" name="fotoProfil" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="" value="<?php echo $username ?>">
                    </div>
                    <div class="field">
                        <label for="password1">Password 1</label>
                        <input type="password" name="password1" id="" value="<?php echo $password1 ?>">
                    </div>
                    <div class="field">
                        <label for="password2">Password 2</label>
                        <input type="password" name="password2" id="" value="<?php echo $password2 ?>">
                    </div>
                </div>
                <div class="errorMsg">
                    <?php echo cek_error(); ?>
                </div>
                <div class="button">
                    <div id="kembali">
                        Kembali
                    </div>
                  
                    <input type="submit" value="Register" id="register" class="submit" name ="submit">
                </div>
            </form>
        </div>
    </div>
    
</body>
<script src="register.js"></script>
</html>