<?php
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Membangun koneksi ke database
		$connection = mysqli_connect("localhost", "root", "");
		// Mencegah MySQL injection
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		// Seleksi Database
		$db = mysqli_select_db($connection,"spk_univ");
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$result = mysqli_query($connection,"select * from tbl_users where user_password='$password' AND user_name='$username'")
						 or die(mysqli_error($connection));
		$rows = mysqli_num_rows($result) ;

		if ($rows == 1) {
				$_SESSION['login_user']=$username;
				// Membuat Sesi/session
				$row = mysqli_fetch_assoc($result);
				$_SESSION['login_email']=$row['user_email'];
				header("location: ../index.php"); // Mengarahkan ke halaman profil
				} else {
				$error = "Username atau Password belum terdaftar";
				}
				mysqli_free_result($result);
				mysqli_close($connection); // Menutup koneksi
	}
}
?>
