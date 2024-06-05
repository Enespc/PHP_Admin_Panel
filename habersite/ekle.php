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

// Haber ekleme formu
if (isset($_POST['submit'])) {
    $baslik = $_POST['baslik'];
    $yazar = $_POST['yazar'];
    $icerik = $_POST['icerik'];
    $tarih = date("Y-m-d H:i:s");

    $query = //Buraya kod yazmalısınız. ***
    $result = mysqli_query($conn, $query);

    if ($result) {
      echo "<script>alert('Yeni Haber Eklendi');</script>";
              header("Location: admin.php");
    } else {
        echo "Haber eklenemedi: ". mysqli_error($conn);
    }
}

// Haber ekleme formu
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

<!-- Haber ekleme formu -->
<div class="container">
  <h1>Haber Ekle</h1>
  <form action="" method="post">
    <div class="form-group">
      <label for="baslik">Başlık:</label>
      <input type="text" class="form-control" id="baslik" name="baslik" required>
    </div>
    <div class="form-group">
      <label for="yazar">Yazar:</label>
      <input type="text" class="form-control" id="yazar" name="yazar" required>
    </div>
    <div class="form-group">
      <label for="icerik">İçerik:</label>
      <textarea class="form-control" id="icerik" name="icerik" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Ekle</button>
  </form>
</div>

<!-- Veritabanı bağlantısını kapat -->
<?php mysqli_close($conn);?>