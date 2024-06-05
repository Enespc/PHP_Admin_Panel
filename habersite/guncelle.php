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

// Form için değerleri ayarla
$baslik = $row['baslik'];
$yazar = $row['yazar'];
$icerik = $row['icerik'];
$tarih = $row['tarih'];

// Form gönderildiğinde güncelleme işlemi yap
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baslik = $_POST['baslik'];
    $yazar = $_POST['yazar'];
    $icerik = $_POST['icerik'];
    $tarih = $_POST['tarih'];

    $query = //Buraya kod yazmalısınız. ***
    mysqli_query($conn, $query);

    header("Location: admin.php");
    exit;
}?>

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

<!-- Form -->
<div class="container">
  <h1>Haber Güncelle</h1>
  <form method="post">
    <div class="form-group">
      <label for="baslik">Başlık:</label>
      <input type="text" class="form-control" id="baslik" name="baslik" value="<?php echo $baslik;?>">
    </div>
    <div class="form-group">
      <label for="yazar">Yazar:</label>
      <input type="text" class="form-control" id="yazar" name="yazar" value="<?php echo $yazar;?>">
    </div>
    <div class="form-group">
      <label for="icerik">İçerik:</label>
      <textarea class="form-control" id="icerik" name="icerik"><?php echo $icerik;?></textarea>
    </div>
    <div class="form-group">
      <label for="tarih">Tarih:</label>
      <input type="date" class="form-control" id="tarih" name="tarih" value="<?php echo $tarih;?>">
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
  </form>
</div>

<!-- Veritabanı bağlantısını kapat -->
<?php mysqli_close($conn);?>