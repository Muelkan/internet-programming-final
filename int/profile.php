<style>
img {
    position: relative;
    width: 5cm;
    height: 5cm;}
</style>

<?php
include 'config.php';
$user_id = $_GET['profilcek'];

$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0)
{
   $fetch = mysqli_fetch_assoc($select);
}
    $selectgalery = mysqli_query($conn, "SELECT * FROM `galery`") or die('query failed');
    if(mysqli_num_rows($selectgalery) > 0)
    {
       $fetch1 = mysqli_fetch_assoc($selectgalery);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


    <link href="img/favicon.ico" rel="icon">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src=<?php echo "uploaded_img/".$fetch['image'] ?> alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;"> <?php echo $fetch['name']; ?> </h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="home.php" class="btn btn-outline-light mr-5">Geri Git</a>
                    </div><br> <br>
                    <h3 class="text-white font-weight-normal mb-3">Yukledigi Resimleri gormek icin Asagi Kaydir</h3>
                </div>
            </div>
        </div>
    </div>





    
<?php

if($stmt = $conn->query("SELECT image,kim FROM   `galery`")){

    echo "<center> <h3>Yukledigi Resimler : </h3></center>"."<br>";

    while ($row = $stmt->fetch_assoc()) 
    {      //  echo "<a href='profile.php?profilcek=$row[id]' class='btn'>" $fetch1['kim']
        if($row['kim'] == $_GET['profilcek'])
        {
            echo "<figure>";
            echo "<img src='galery/$row[image]'/>";
            echo "</figure>";

        }

    }
     }else{
     echo $connection->error;
     }

?>

    <!-- Header End -->


</body>

</html>