<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header("Location: admin.php");
  exit;
}


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logosec">
            <div class="logo">Admin Panel</div>
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <!-- HTML form for login -->
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                
                <input type="text" id="username" name="username" placeholder="Username">
                
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </header>
</body>
</html>


<?php
// Connect to the database
$conn = @mysqli_connect("localhost", "root", "", "okul");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Check if the login button is clicked
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to select user from database
    $query = //Buraya kod yazmalısınız. ***
    $result = mysqli_query($conn, $query);

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to admin.php
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: admin.php");
        exit;
    } else {
        // User does not exist, display error message
        $error = "Invalid username or password";
    }
}

// Close database connection
mysqli_close($conn);
?>

<!-- Display error message if any -->
<?php if (isset($error)) { echo $error; }?>