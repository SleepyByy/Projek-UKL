<?php

if(isset($_POST['login'])){
    // jika tombol login di klik
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;

    include_once("conn.php");

    // insert to db
    $cekdb = mysqli_query($mysqli, "SELECT * FROM user where username ='$username'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $passwordsekarang = $pw['password'];

    if($hitung>0){
        if($password==$passwordsekarang){
        header('location:adminpage.php');
        }
        else{
            echo '
            <script>
                alert("Password Salah");
                window.location.href="register.php";
            </script>
            ';
        }
    }else{
        echo '
        <script>
            alert("Login Gagal");
            window.location.href="login.php";
        </script>
        ';
    }
}
?>