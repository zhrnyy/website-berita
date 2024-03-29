<?php 
include '../inc/koneksi.php';
include '../inc/fungsi.php';
session_start();

if(!isset($_SESSION["login"])) {
	header("Location: ceklogin.php");
	exit;
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo ambilprofilweb('meta_desc'); ?>">
  <meta name="keywords" content="<?php echo ambilprofilweb('meta_key'); ?>">
  <meta name="author" content="">
  <title>Administrator - <?php echo ambilprofilweb('title_site'); ?></title>
  <!-- Bootstrap core CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../icon.png" sizes="150x150" />
  <!-- Summer Note -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
  <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
<header>
<div class="navbar-dark navbar bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">PORTAL BERITA</a>
  </div>
</div>
</header>

<section>
  <nav style="background-color: #87C4FF;">
    <div class="container">
    <ul>
      <li><a class="nav-link text-light" href="./">Home</a></li>
      <li><a class="nav-link text-light" href="?mod=kategori">Kategori</a></li>
      <li><a class="nav-link text-light" href="?mod=berita">Berita</a></li>
      <li><a class="nav-link text-light" href="?mod=konfigurasi">Konfigurasi</a></li>
      <li><a class="nav-link text-light" href="?mod=useradmin">User Admin</a></li>
      <li><a class="nav-link text-light" href="logout.php">Log Out</a></li>
    </ul>
    </div>
  </nav>
  
  <article>
  <div class="lead mt-5">
    	<?php 
    		$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
    			switch ($mod) {
    				case 'useradmin':
    					include("useradmin.php");
    					break;
    				case 'konfigurasi':
              include("konfigurasi.php");
              break;
            case 'kategori':
              include("kategori.php");
              break;
            case 'berita':
              include("berita.php");
              break;
    				default:
    					echo "Selamat Datang " . $_SESSION['nama']. " ";
    					break;
    			}
    	?>
    </div>
  </article>
</section>


  <!-- Bootstrap core JavaScript -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript"> 
    $(document).ready(function() {
      $('.summernote').summernote({
        tabsize: 2,
        height: 300
      });
    });
  </script>
</body>

</html>