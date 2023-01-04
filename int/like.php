    <?php 
    include 'config.php';
    $stmt = $conn->query("SELECT image,kim,begeni FROM   `galery`");
    $row = $stmt->fetch_assoc();
    $begenisay = $row['begeni'];
    
        if (isset($_POST['submit'])) 
        {
            $idss = $_POST['id'];
            $begenisay++;
            $conn
            ->prepare("UPDATE galery SET begeni = ? where id = ?")
            ->execute([$begenisay,$idss]);          
        }

        header('Refresh: 0; url=home.php');

        if (isset($_POST['submit_sil'])) 
        {
            $idss = $_POST['id'];
echo "Silme Basarili";    
$conn
->prepare("DELETE FROM galery where id = ?")
->execute([$idss]);

        }

?>