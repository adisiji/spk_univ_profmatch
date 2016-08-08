<?php
class Data{

 // database connection and table name
 private $conn;
 private $table_namex;

 // object properties
 public $id;
 public $nm,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,
        $i11,$i12,$i13,$i14,$i15,$i16,$i17,$i18,$i19,$i20,
        $i21,$i22;

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
   if($this->create_nilai()){
     return true;
   }
  }else{
   return false;
  }
 }

 function create_nilai(){
   $queid = "SELECT id FROM universitas WHERE nama='$this->nm' limit 1";
   $stmt2 = $this->conn->prepare($queid);
   if($stmt2->execute()){
   $dump = $stmt2->fetch(PDO::FETCH_ASSOC);
   $hsl = $dump['id'];
   $query = "INSERT INTO penilaian values('',$hsl,1,:i1);
             INSERT INTO penilaian values('',$hsl,2,:i2);
             INSERT INTO penilaian values('',$hsl,3,:i3);
             INSERT INTO penilaian values('',$hsl,4,:i4);
             INSERT INTO penilaian values('',$hsl,5,:i5);
             INSERT INTO penilaian values('',$hsl,6,:i6);
             INSERT INTO penilaian values('',$hsl,7,:i7);
             INSERT INTO penilaian values('',$hsl,8,:i8);
             INSERT INTO penilaian values('',$hsl,9,:i9);
             INSERT INTO penilaian values('',$hsl,10,:i10);
             INSERT INTO penilaian values('',$hsl,11,:i11);
             INSERT INTO penilaian values('',$hsl,12,:i12);
             INSERT INTO penilaian values('',$hsl,13,:i13);
             INSERT INTO penilaian values('',$hsl,14,:i14);
             INSERT INTO penilaian values('',$hsl,15,:i15);
             INSERT INTO penilaian values('',$hsl,16,:i16);
             INSERT INTO penilaian values('',$hsl,17,:i17);
             INSERT INTO penilaian values('',$hsl,18,:i18);
             INSERT INTO penilaian values('',$hsl,19,:i19);
             INSERT INTO penilaian values('',$hsl,20,:i20);
             INSERT INTO penilaian values('',$hsl,21,:i21);
             INSERT INTO penilaian values('',$hsl,22,:i22);";
   $stmt = $this->conn->prepare($query);
   $stmt->bindParam(':i1',$this->i1,PDO::PARAM_INT);
   $stmt->bindParam(':i2',$this->i2,PDO::PARAM_INT);
   $stmt->bindParam(':i3',$this->i3,PDO::PARAM_INT);
   $stmt->bindParam(':i4',$this->i4,PDO::PARAM_INT);
   $stmt->bindParam(':i5',$this->i5,PDO::PARAM_INT);
   $stmt->bindParam(':i6',$this->i6,PDO::PARAM_INT);
   $stmt->bindParam(':i7',$this->i7,PDO::PARAM_INT);
   $stmt->bindParam(':i8',$this->i8,PDO::PARAM_INT);
   $stmt->bindParam(':i9',$this->i9,PDO::PARAM_INT);
   $stmt->bindParam(':i10',$this->i10,PDO::PARAM_INT);
   $stmt->bindParam(':i11',$this->i11,PDO::PARAM_INT);
   $stmt->bindParam(':i12',$this->i12,PDO::PARAM_INT);
   $stmt->bindParam(':i13',$this->i13,PDO::PARAM_INT);
   $stmt->bindParam(':i14',$this->i14,PDO::PARAM_INT);
   $stmt->bindParam(':i15',$this->i15,PDO::PARAM_INT);
   $stmt->bindParam(':i16',$this->i16,PDO::PARAM_INT);
   $stmt->bindParam(':i17',$this->i17,PDO::PARAM_INT);
   $stmt->bindParam(':i18',$this->i18,PDO::PARAM_INT);
   $stmt->bindParam(':i19',$this->i19,PDO::PARAM_INT);
   $stmt->bindParam(':i20',$this->i20,PDO::PARAM_INT);
   $stmt->bindParam(':i21',$this->i21,PDO::PARAM_INT);
   $stmt->bindParam(':i22',$this->i22,PDO::PARAM_INT);

   if($stmt->execute()){
    return true;
   }else{
    return false;
   }
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

  $query = "DELETE FROM universitas WHERE id = :ID;
            DELETE FROM penilaian WHERE kd_univ = :ID";

  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(":ID", $this->id);

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
