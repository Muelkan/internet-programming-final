<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $biography = mysqli_real_escape_string($conn, $_POST['biyografi']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'Kullanici Zaten Var'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Sifre Eslesmedi';
      }elseif($image_size > 2000000){
         $message[] = 'Resim Boyutu Cok Yuksek';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, biyografi) VALUES('$name', '$email', '$pass', '$image', '$biography')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Basarıyla kayıt olundu!';
            header('location:login.php');
         }else{
            $message[] = 'Kayit Basarisiz!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kayit</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Kayit Ol</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Kullanici Adini Gir" class="box" required>
      <input type="email" name="email" placeholder="e-posta" class="box" required>
      <input type="password" name="password" placeholder="sifre" class="box" required>
      <input type="password" name="cpassword" placeholder="sifre tekrar" class="box" required> <br> <br>
      <textarea id="w3review" name="biyografi" placeholder="Biyografi" rows="4" cols="30"></textarea>

      <br><p> Bir Profil Fotografi sec</p>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <br><br>
      <input type="submit" name="submit" value="kayit ol" class="btn">
      <p>Hesabin zaten warmi? <br><a href="login.php"> Giris yap</a></p>
   </form>

</div>

</body>
</html>