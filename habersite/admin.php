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

// Haberleri seç
$query = //Buraya kod yazmalısınız. ***
$result = mysqli_query($conn, $query);
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

<!-- Haberleri tablo şeklinde listele -->
<div class="container">
  <h1>Haberler</h1>
  <table class="table table-striped table-bordered">
    <tr>
      <th>ID</th>
      <th>Başlık</th>
      <th>Yazar</th>
      <th>İçerik</th>
      <th>Tarih</th>
      <th>Güncelle</th>
      <th>Sil</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>". $row['id']. "</td>";
      echo "<td>". $row['baslik']. "</td>";
      echo "<td>". $row['yazar']. "</td>";
      echo "<td>". $row['icerik']. "</td>";
      echo "<td>". $row['tarih']. "</td>";
      echo "<td><a href='guncelle.php?id=". $row['id']. "' class='btn btn-primary'>Güncelle</a></td>";
      echo "<td><a href='sil.php?id=". $row['id']. "' class='btn btn-danger'>Sil</a></td>";
      echo "</tr>";
    }
   ?>
    <tr>
      <td colspan="7">
        <a href="ekle.php" class="btn btn-success">Ekle</a>
      </td>
    </tr>
  </table>
</div>

<!-- Veritabanı bağlantısını kapat -->
<?php mysqli_close($conn);?>