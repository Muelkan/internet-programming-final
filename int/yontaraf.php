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
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>anasayfa</title>

    <!-- custom css file link  -->

</head>
<body>
   

   <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form`") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($stmt = $conn->query("SELECT image,id,name FROM   `user_form`")){

            echo "<center>Diğer Kullanicilar : ".$stmt->num_rows."<br></center>";
            echo "<a href='update_profile.php' class='btn'></a>";
          while ($row = $stmt->fetch_assoc()) 
         {

           //<tr>$row[id]</tr>
          echo 
          " 
                <tr>
                 <a href='profile2.php?profilcek=$row[id]' class='btn'>
                 <img src=uploaded_img/$row[image] class='rounded-circle' alt='$row[id]'> </a></tr>
                <tr>$row[name]</tr>
                
            ";
          
            

         }
          echo "</table>";
          }else{
          echo $connection->error;
          }
       
      ?>


</body>
</html>