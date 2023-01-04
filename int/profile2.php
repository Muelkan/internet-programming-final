<style>

:root {
    font-size: 10px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: "Open Sans", Arial, sans-serif;
    min-height: 100vh;
    background-color: #fafafa;
    color: #262626;
    padding-bottom: 3rem;
}

img {
    display: block;
}

.container {
    max-width: 93.5rem;
    margin: 0 auto;
    padding: 0 2rem;
}

.btn {
    display: inline-block;
    font: inherit;
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
}

.btn:focus {
    outline: 0.5rem auto #4d90fe;
}

.visually-hidden {
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden;
    clip: rect(1px, 1px, 1px, 1px);
}

/* Profile Section */

.profile {
    padding: 5rem 0;
}

.profile::after {
    content: "";
    display: block;
    clear: both;
}

.profile-image {
    float: left;
    width: calc(33.333% - 1rem);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 3rem;
}

.profile-image img {
    border-radius: 50%;
}

.profile-user-settings,
.profile-stats,
.profile-bio {
    float: left;
    width: calc(66.666% - 2rem);
}

.profile-user-settings {
    margin-top: 1.1rem;
}

.profile-user-name {
    display: inline-block;
    font-size: 3.2rem;
    font-weight: 300;
}

.profile-edit-btn {
    font-size: 1.4rem;
    line-height: 1.8;
    border: 0.1rem solid #dbdbdb;
    border-radius: 0.3rem;
    padding: 0 2.4rem;
    margin-left: 2rem;
}

.profile-settings-btn {
    font-size: 2rem;
    margin-left: 1rem;
}

.profile-stats {
    margin-top: 2.3rem;
}

.profile-stats li {
    display: inline-block;
    font-size: 1.6rem;
    line-height: 1.5;
    margin-right: 4rem;
    cursor: pointer;
}

.profile-stats li:last-of-type {
    margin-right: 0;
}

.profile-bio {
    font-size: 1.6rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 2.3rem;
}

.profile-real-name,
.profile-stat-count,
.profile-edit-btn {
    font-weight: 600;
}

/* Gallery Section */

.gallery {
    display: flex;
    flex-wrap: wrap;
    margin: -1rem -1rem;
    padding-bottom: 3rem;
}

.gallery-item {
    position: relative;
    flex: 1 0 22rem;
    margin: 1rem;
    color: #fff;
    cursor: pointer;
}

.gallery-item:hover .gallery-item-info,
.gallery-item:focus .gallery-item-info {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
}

.gallery-item-info {
    display: none;
}

.gallery-item-info li {
    display: inline-block;
    font-size: 1.7rem;
    font-weight: 600;
}

.gallery-item-likes {
    margin-right: 2.2rem;
}

.gallery-item-type {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2.5rem;
    text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
}

.fa-clone,
.fa-comment {
    transform: rotateY(180deg);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Loader */

.loader {
    width: 5rem;
    height: 5rem;
    border: 0.6rem solid #999;
    border-bottom-color: transparent;
    border-radius: 50%;
    margin: 0 auto;
    animation: loader 500ms linear infinite;
}

/* Media Query */

@media screen and (max-width: 40rem) {
    .profile {
        display: flex;
        flex-wrap: wrap;
        padding: 4rem 0;
    }

    .profile::after {
        display: none;
    }

    .profile-image,
    .profile-user-settings,
    .profile-bio,
    .profile-stats {
        float: none;
        width: auto;
    }

    .profile-image img {
        width: 7.7rem;
    }

    .profile-user-settings {
        flex-basis: calc(100% - 10.7rem);
        display: flex;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .profile-user-name {
        font-size: 2.2rem;
    }

    .profile-edit-btn {
        order: 1;
        padding: 0;
        text-align: center;
        margin-top: 1rem;
    }

    .profile-edit-btn {
        margin-left: 0;
    }

    .profile-bio {
        font-size: 1.4rem;
        margin-top: 1.5rem;
    }

    .profile-edit-btn,
    .profile-bio,
    .profile-stats {
        flex-basis: 100%;
    }

    .profile-stats {
        order: 1;
        margin-top: 1.5rem;
    }

    .profile-stats ul {
        display: flex;
        text-align: center;
        padding: 1.2rem 0;
        border-top: 0.1rem solid #dadada;
        border-bottom: 0.1rem solid #dadada;
    }

    .profile-stats li {
        font-size: 1.4rem;
        flex: 1;
        margin: 0;
    }

    .profile-stat-count {
        display: block;
    }
}

/* Spinner Animation */

@keyframes loader {
    to {
        transform: rotate(360deg);
    }
}

@supports (display: grid) {
    .profile {
        display: grid;
        grid-template-columns: 1fr 2fr;
        grid-template-rows: repeat(3, auto);
        grid-column-gap: 3rem;
        align-items: center;
    }

    .profile-image {
        grid-row: 1 / -1;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
        grid-gap: 2rem;
    }

    .profile-image,
    .profile-user-settings,
    .profile-stats,
    .profile-bio,
    .gallery-item,
    .gallery {
        width: auto;
        margin: 0;
    }

    @media (max-width: 40rem) {
        .profile {
            grid-template-columns: auto 1fr;
            grid-row-gap: 1.5rem;
        }

        .profile-image {
            grid-row: 1 / 2;
        }

        .profile-user-settings {
            display: grid;
            grid-template-columns: auto 1fr;
            grid-gap: 1rem;
        }

        .profile-edit-btn,
        .profile-stats,
        .profile-bio {
            grid-column: 1 / -1;
        }

        .profile-user-settings,
        .profile-edit-btn,
        .profile-settings-btn,
        .profile-bio,
        .profile-stats {
            margin: 0;
        }
    }
}

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
    
$toplampost = 0;                 
if($stmt = $conn->query("SELECT image , kim FROM   `galery`"))
{
    while ($row = $stmt->fetch_assoc()) 
    {
        if($row['kim'] == $_GET['profilcek'])
        {
            $toplampost++;  
        }

    }

}

?>
<a href="home.php"><h2>Ana Sayfaya Dön</h2></a>
<form action="" method="post" enctype="multipart/form-data">
<header>
	<div class="container">
		<div class="profile">
			<div class="profile-image">
				<img src="<?php echo "uploaded_img/".$fetch['image'] ?>" alt="" width="200px" height="200px">
			</div>
			<div class="profile-user-settings">
			    <h1 class="profile-user-name"><?php echo $fetch['name']; ?>&nbsp;&nbsp;&nbsp;

			<h1>	 </h1>
				<button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>
			</div>

<?php   
    $topbegeni = 0;
    if($stmt = $conn->query("SELECT image,kim,begeni FROM   `galery`"))
    {
        while ($row = $stmt->fetch_assoc()) 
        {      
            if($row['kim'] == $_GET['profilcek'])
            {
              $topbegeni += $row['begeni'];
            }

        }
        
    }

?>

			<div class="profile-stats">
				<ul>
					<li><span class="profile-stat-count">
                    <?php echo $toplampost ; ?></span> Göderi</li>
					<li><span class="profile-stat-count"><?php echo $topbegeni; ?></span> Toplam Begeni</li>
				<?php	//<li><span class="profile-stat-count">206</span> following</li> ?>
				</ul>

			</div>
			<div class="profile-bio">
				<p><span class="profile-real-name"><?php echo "Biyografi <br>"; ?></span> <?php echo $fetch['biyografi']; ?> </p>
			</div>
		</div>
	</div>
</header>
<main>
	<div class="container">
		<div class="gallery">
        <?php
        $kisibilgisi = $conn->query("SELECT * FROM   `user_form` WHERE id=$user_id");
        $gonderipaycek = $kisibilgisi->fetch_assoc();
            if($stmt = $conn->query("SELECT * FROM   `galery`"))
            {
                
                while ($row = $stmt->fetch_assoc()) 
                {
                    $idss =$row['id'];
                     
                    if($row['kim'] == $_GET['profilcek'])
                    {
                        $sil = "<li class='gallery-item-likes'><h1><button type='submit' name='submit' class='btn'</button>sil</h1></li> ";
                          echo "<form action='like.php' method='post'><div class='gallery-item' tabindex='0'>
                          <img src='galery/$row[image]' class='gallery-image' alt=''>
                          <div class='gallery-item-info'>
                          
                            <ul>
                              <li class='gallery-item-likes'><span class='visually-hidden'>Likes:</span><i class='fas fa-heart' aria-hidden='true'></i>❤️ $row[begeni]</li>
                              <li class='gallery-item-likes'><span class='visually-hidden'>Likes:</span><i class='fas fa-heart' aria-hidden='true'></i>$gonderipaycek[name]</li>
                              <li class='gallery-item-likes'> <input type='' name='id' value='$idss' hidden></li>
                              <li class='gallery-item-likes'><h1><button type='submit' name='submit' class='btn'</button>Begen</h1></li>";
                              echo "

                            </ul>
                          </div>
                          
                          </form>
                      </div>";
                  
                      

                    }
                }
            }
            else
            {
                echo $connection->error;
            }

        ?>
	</div>
    </form>
</main>