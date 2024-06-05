<?php

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) ||!isset($_SESSION['password'])) {
  header("Location: login.php");
  exit;
}

// Veritabanına bağlan
$conn = mysqli_connect("localhost", "root", "", "okul");

// Bağlantı kontrolü
if (!$conn) {
    die("Bağlantı başarısız: ". mysqli_connect_error());
}

// Haber ID'si alın
$id = $_GET['id'];

// Haber bilgilerini seç
$query = "SELECT * FROM haberler WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// Silme onay dialogu
if (isset($_POST['onay'])) {
    $onay = $_POST['onay'];
    if ($onay == 'Evet') {
        $query = //Buraya kod yazmalısınız. ***
        mysqli_query($conn, $query);
        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('Silme işlemi iptal edildi.');</script>";
        header("Location: admin.php");
    }
}

?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Menü -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin.php">Admin Paneli</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Anasayfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin Paneli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cikis.php">Oturumu Kapat</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Silme onay dialogu -->
<div class="container">
  <h1>Haber Sil</h1>
  <p>Silmek istediğinizden emin misiniz?</p>
  <form method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" name="onay" value="Evet" class="btn btn-danger">
    <input type="submit" name="onay" value="Hayır" class="btn btn-secondary">
  </form>
</div>
<!-- Veritabanı bağlantısını kapat -->
<?php mysqli_close($conn);?>