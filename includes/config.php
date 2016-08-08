<?php
class Config{

 // specify your own database credentials
 private $host = "localhost";
 private $db_name = "spk_univ";
 private $username= "root";
 private $password= "";
 public $nama;
 public $conn;

 // get the database connection
 public function getConnection(){

  $this->conn = null;

  try{
   $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
   $db = $this->conn;
   session_start();
   if(session_status() == PHP_SESSION_NONE ){
   	mysqli_close($connection); // Menutup koneksi
   	header('Location: ../login/index.php'); // Mengarahkan ke Login Page
    exit;
   }
   else if(session_status() == PHP_SESSION_ACTIVE){
     $user_check=$_SESSION['login_user'];
     // Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
     $query1= "select user_name from tbl_users where user_name='$user_check'";
     $stmt = $db -> prepare($query1);
     $stmt-> execute();
     $row   = $stmt->fetch(PDO::FETCH_ASSOC);
     $login_session = $row['user_name'];
     $this->nama = $login_session;
   }
  }catch(PDOException $exception){
   echo "Connection error: " . $exception->getMessage();
  }

  return $this->conn;
 }

 public function nama(){
   return $this->nama;
 }
}
?>
