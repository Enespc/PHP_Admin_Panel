<?php
// Start session
session_start();

// Veritabanına bağlan
$conn = mysqli_connect("localhost", "admin", "12345", "okul");

// Bağlantı kontrolü
if (!$conn) {
  die("Bağlantı başarısız: ". mysqli_connect_error());
}

// Haberleri seç
$query = 
$result = mysqli_query($conn, $query);
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- Menü -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Haber Portalı</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Anasayfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <?php // Check if user is logged in
            if (!isset($_SESSION['username']) ||!isset($_SESSION['password'])) {
              echo "Oturum Aç";            
            } else {echo "Admin Paneli";}
          ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cikis.php">
        <?php // Check if user is logged in
            if (isset($_SESSION['username']) ||isset($_SESSION['password'])) {
              echo "Oturumu Kapat";            
            } 
          ?></a>
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
    </tr>
    <?php
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>". $row['id']. "</td>";
      echo "<td>". $row['baslik']. "</td>";
      echo "<td>". $row['yazar']. "</td>";
      echo "<td>". $row['icerik']. "</td>";
      echo "<td>". $row['tarih']. "</td>";
      echo "</tr>";
    }
   ?>

  </table>
</div>

<!-- Veritabanı bağlantısını kapat -->
<?php mysqli_close($conn);?>