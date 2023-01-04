<style>
body {
  box-sizing: border-box;
  background-color: #eee;
  color: #555;
}

.container {
  max-width: 860px;
  margin: 0 auto;
  padding: 1rem;
  text-align: center;
  background-color: #fff;
  border-radius: 0.5em;
}

header > h1 {
  margin-top: 0;
  font-family: 'Catamaran', sans-serif;
  font-size: 2.5rem;
  border-bottom: 1px solid #eee;
}

.gallery {
  display: grid;
  margin: 3em 0;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-template-rows: 1fr;
  grid-gap: 1em;
  grid-auto-flow: dense;
}

figure {
  display: flex;
  margin: 0;
}

img {
  flex: 1;
  max-width: 100%;
  object-fit: cover;
}
</style>



<?php
require 'config.php';

$select = mysqli_query($conn, "SELECT * FROM `galery`") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
        



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kesfet</title>
</head>
<body>
    
<div class="container">
  <header><h1>Kesfet</h1></header>
  <main class="gallery">

<?php

if($stmt = $conn->query("SELECT image, kim FROM   `galery`")){

    echo "Toplulugun Yukledigi Resim Sayisi : ".$stmt->num_rows."<br>";
  
  while ($row = $stmt->fetch_assoc()) 
 {      //  echo "<a href='profile.php?profilcek=$row[id]' class='btn'>" 

 echo "<figure>";
 echo "<img src='galery/$row[image]'/>";
 echo "$row[kim]";
 echo "</figure>";

 }
  }else{
  echo $connection->error;
  }


?>
  </main>
</div>



</body>
</html>