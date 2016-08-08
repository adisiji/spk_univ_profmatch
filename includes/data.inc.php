<?php
class Data{

 // database connection and table name
 private $conn;
 private $table_namex;

 // object properties
 public $id;
 public $nm;

 public function __construct($db, $table_name){
  $this->conn = $db;
  $this->table_namex = $table_name;
 }

 // create product
 function create(){
  //write query
  $query = "INSERT INTO " .$this->table_namex. " values('',?)";

  $stmt = $this->conn->prepare($query);

  $stmt->bindParam(1, $this->nm);

  if($stmt->execute()){
   return true;
  }else{
   return false;
  }

 }

 // read products
 function readAll($from_record_num, $records_per_page){

  $query = "SELECT * FROM " . $this->table_namex . " LIMIT
     {$from_record_num}, {$records_per_page}";

  $stmt = $this->conn->prepare( $query );
  $stmt->execute();

  return $stmt;
 }

 // used for paging products
 public function countAll(){

  $query = "SELECT id FROM " . $this->table_namex . "";

  $stmt = $this->conn->prepare( $query );
  $stmt->execute();

  $num = $stmt->rowCount();

  return $num;
 }

 // used when filling up the update product form
 function readOne(){

  $query = "SELECT
     *
    FROM
     " . $this->table_namex . "
    WHERE
     id = ?
    LIMIT
     0,1";

  $stmt = $this->conn->prepare( $query );
  $stmt->bindParam(1, $this->id);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $this->nm = $row['nama'];
 }

 // update the product
 function update(){

  $query = "UPDATE ". $this->table_namex ." SET nama = :nama WHERE id = :id ;";
  $stmt = $this->conn->prepare($query);

  $stmt->bindParam(":nama",$this->nm, PDO::PARAM_STR);
  $stmt->bindParam(":id",$this->id, PDO::PARAM_INT);

  // execute the query
  if($stmt->execute()){
   return true;
  }else{
   return false;
  }
 }

 // delete the product
 function delete(){

  $query = "DELETE FROM " . $this->table_namex . " WHERE id = ?";

  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(1, $this->id);

  if($result = $stmt->execute()){
   return true;
  }else{
   return false;
  }
 }

function show_nilai($from_record_num, $records_per_page){
  $query ="select x.nama,
  SUM(IF(x.id=1,x.nilai,0)) AS i1,
  SUM(IF(x.id=2,x.nilai,0)) AS i2,
  SUM(IF(x.id=3,x.nilai,0)) AS i3,
  SUM(IF(x.id=4,x.nilai,0)) AS i4,
  SUM(IF(x.id=5,x.nilai,0)) AS i5,
  SUM(IF(x.id=6,x.nilai,0)) AS i6,
  SUM(IF(x.id=7,x.nilai,0)) AS i7,
  SUM(IF(x.id=8,x.nilai,0)) AS i8,
  SUM(IF(x.id=9,x.nilai,0)) AS i9,
  SUM(IF(x.id=10,x.nilai,0)) AS i10,
  SUM(IF(x.id=11,x.nilai,0)) AS i11,
  SUM(IF(x.id=12,x.nilai,0)) AS i12,
  SUM(IF(x.id=13,x.nilai,0)) AS i13,
  SUM(IF(x.id=14,x.nilai,0)) AS i14,
  SUM(IF(x.id=15,x.nilai,0)) AS i15,
  SUM(IF(x.id=16,x.nilai,0)) AS i16,
  SUM(IF(x.id=17,x.nilai,0)) AS i17,
  SUM(IF(x.id=18,x.nilai,0)) AS i18,
  SUM(IF(x.id=19,x.nilai,0)) AS i19,
  SUM(IF(x.id=20,x.nilai,0)) AS i20,
  SUM(IF(x.id=21,x.nilai,0)) AS i21,
  SUM(IF(x.id=22,x.nilai,0)) AS i22
  from (
  select u.nama as nama,
          i.id as id,
          p.nilai as nilai
  FROM penilaian p

  JOIN universitas u ON p.kd_univ = u.id
  JOIN indikator i ON i.id = p.kd_indikator

  ORDER BY p.id) x
  group by x.nama
  Order by x.nama LIMIT
     {$from_record_num}, {$records_per_page}";
  $stmt = $this->conn->prepare($query);
  $stmt->execute();
  return $stmt;
 }
 }
?>
