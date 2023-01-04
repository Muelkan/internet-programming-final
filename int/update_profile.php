<style>
img {
    position: relative;
    width: 5cm;
    height: 5cm;
}
.rounded-circle {
    position: relative;
    width: 1cm;
    height: 1cm;
    border-style: solid;
    border-width: 0.01cm;
    border-radius: 3cm;
}
</style>

<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_biyografi = mysqli_real_escape_string($conn, $_POST['biyografi']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', biyografi = '$update_biyografi' , email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'eski şifre eşleşmedi!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'şifrenin eşleşmediğini onaylayin!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'şifre başariyla güncellendi!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Dosya Boyu Fazla Buyuk';
      }else{
         $fileNameNew = uniqid('', true).".".$fileActualExt;
         $fileDestination = 'uploads/'.$fileNameNew;

         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Resim Basariyla Yuklendi';
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
   <title>Profili Guncelle</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex"><br> <br>   
         <div class="inputBox">
            <span>Kullanici_Adi :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box"> <br> <br>        
            <span>E-Posta :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"> <br> <br>

            <span>Biyografiyi Guncelle</span>
            <textarea id="w3review" name="biyografi" rows="4" cols="30"> <?php echo $fetch['biyografi'];  ?> </textarea> <br><br>


            <span>Resmini Guncelle :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box"><br> <br>   
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>"><br> <br>   
            <span>Eski Sifre :</span>
            <input type="password" name="update_pass" placeholder="Eski Sifreni Gir" class="box"><br> <br>   
            <span>Yeni Sifre :</span>
            <input type="password" name="new_pass" placeholder="Yeni Sifreni Gir" class="box"><br> <br>   
            <span>Sifreyi Onayla :</span>
            <input type="password" name="confirm_pass" placeholder="Yeni Sifreni Birdaha Gir " class="box"><br> <br>   
         </div>
      </div>
      <input type="submit" value="Profili Guncelle" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Geri Git</a>




      
   </form>

</div>

</body>
</html>