<?php
class Langkah{
  private $conn;
  private $table_namex;

  public function __construct($db, $table_name){
   $this->conn = $db;
   $this->table_namex = $table_name;
  }

  function hasil($from_record_num, $records_per_page){
    $query = "SELECT
      f.nama,
      ROUND(SUM(IF(f.id_aspek=1,f.nilai,0)),2) AS Ni,
      ROUND(SUM(IF(f.id_aspek=2,f.nilai,0)),2) AS Ns,
      ROUND(SUM(IF(f.id_aspek=3,f.nilai,0)),2) AS Np,
      ROUND((
        SUM(IF(f.id_aspek=1,f.nilai*f.persen,0))+
        SUM(IF(f.id_aspek=2,f.nilai*f.persen,0))+
        SUM(IF(f.id_aspek=3,f.nilai*f.persen,0))
      ),2) AS Hasil
    FROM
      (
        SELECT
          b.nama,
          c.id as id_aspek,
          c.prosentase/100 AS persen,
          (SUM(IF(d.kelompok='core',e.bobot,0))/SUM(IF(d.kelompok='core',1,0))*0.6+
           SUM(IF(d.kelompok='secondary',e.bobot,0))/SUM(IF(d.kelompok='secondary',1,0))*0.4) AS nilai
        FROM
          penilaian a
    JOIN universitas b ON a.kd_univ = b.id
    JOIN indikator d ON a.kd_indikator = d.id
    JOIN dim_ind c ON d.dim = c.id
    JOIN bobot_gap e ON a.nilai=(d.nilai+e.gap)
        GROUP BY b.nama, c.keterangan
        ORDER BY b.nama
      ) f
    GROUP BY f.nama
    ORDER BY Hasil DESC LIMIT
       {$from_record_num}, {$records_per_page}";
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
}
public function countAll(){

 $query = "SELECT id FROM " . $this->table_namex . "";

 $stmt = $this->conn->prepare( $query );
 $stmt->execute();

 $num = $stmt->rowCount();

 return $num;
}
}
?>
