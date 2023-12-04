<?php 

	include("../inc/koneksi.php");
	global $connect;

if (isset($_POST['tambahuser'])) {

	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM administrator WHERE username = '$username' OR email = '$email'";

	$result = mysqli_query($connect, $query);
	$row = mysqli_num_rows($result);

	if ($row > 0) {
		$error = "<div class='alert alert-danger' role='alert'>
  					Username Atau Email Sudah Pernah DIBUATKAN!
				  </div>";
		echo $error;
	} else {
		$sql = mysqli_query($connect, "INSERT INTO administrator VALUES ('', '$email', '$nama', '$username', '$password')");
		echo "<script> alert('Data Admin Berhasil Ditambahkan'); </script>";
	}
}

if (isset($_POST['edituser'])) {

	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_GET['id'];

	$query = "UPDATE administrator SET email= '$email', Nama= '$nama', username= '$username' WHERE ID = '$id'";
	$sql = mysqli_query($connect, $query);

	echo "<script> 
			alert('Data Berhasil Diubah'); 
			document.location.href = '?mod=useradmin';
		  </script>";
}

if (isset($_GET['act']) && $_GET['act'] =='edit') {

	$id = $_GET['id'];
	$query = "SELECT * FROM administrator WHERE ID = '$id'";
	$sql = mysqli_query($connect,$query);
	$hasil = mysqli_fetch_assoc($sql);
	$email = $hasil['email'];
	$nama = $hasil['Nama'];
	$username = $hasil['username'];
	$password = $hasil['password'];

}

if (isset($_GET['act']) && $_GET['act'] =='hapus') {

	$id = $_GET['id'];
	$query = "DELETE FROM administrator WHERE ID = '$id'";
	$sql = mysqli_query($connect,$query);
	$error = "	<script> 
				alert('Data Berhasil Dihapus'); 
				document.location.href = '?mod=useradmin';
		  		</script>";
	echo $error;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
		  	<h5 class="card-title text-center">Sign Up</h5>
				<form class="form-signin" action="" method="POST">
					<input type="hidden" name="userid" value="<?php if (isset($_GET['act']) && $_GET['act'] =='edit') { echo $id; } ?>">
					<div class="form-label-group">
						<label for="email">Email</label>
						<input type="text" id="email" value="<?php if (isset($_GET['act']) && $_GET['act'] =='edit') { echo $email; } ?>" name="email" class="form-control" placeholder="Email Address" required autofocus>
					</div>
					<div class="form-label-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" id="nama" value="<?php if (isset($_GET['act']) && $_GET['act'] =='edit') { echo $nama; } ?>" name="nama" class="form-control" placeholder="Nama Lengkap" required>
					</div>
					<div class="form-label-group">
						<label for="username">Username</label>
						<input type="text" id="username" value="<?php if (isset($_GET['act']) && $_GET['act'] =='edit') { echo $username; } ?>" name="username" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-label-group">
						<label for="password">Password</label>
						<input type="text" id="password" value="<?php if (isset($_GET['act']) && $_GET['act'] =='edit') { echo $password; } ?>" name="password" class="form-control" placeholder="Password" required>
					</div>
					
					<div class="custom-control custom-checkbox mb-1 mt-1"></div>
						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"
						name="<?=(isset($id) ? 'edituser' : 'tambahuser')?>"> <?=(isset($id) ? 'EDIT' : 'TAMBAH')?> </button>

						<br><p class="form-signin">Sudah Punya Akun? <a href="ceklogin.php">Login</a></p>

  					</div>
				</form>
		  	</div>
		  </div>
	</div>
</div>
</body>
</html>