<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])){

if(isset($_FILES['file'])){
   $update_image = $_FILES['file']['name'];
   $update_image_size = $_FILES['file']['size'];
   $update_image_tmp_name = $_FILES['file']['tmp_name'];
   $update_image_folder = 'galery/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $stmt = $conn->prepare("INSERT INTO `galery`(kim,image) values (?,?)");
         $stmt ->execute([$user_id,$update_image]);
         if($stmt){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'ismage updated succssfully!';
         
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
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   


   <form action="" method="post" enctype="multipart/form-data">
     <input type="file" name="file" id="" required>
     <button type="submit" value="submit" name="submit">yukle</button><br><br>
     <a href="home.php">Ana Sayfaya Don</a>
   </form>

</div>

</body>
</html>