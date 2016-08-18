<?php

include_once 'includes/config.php';

$database = new Config();
$db = $database->getConnection();
$nama = $database->nama();
$email = $database->email();
$query = "SELECT keterangan FROM indikator";
$stmt = $db->prepare( $query );
$stmt->execute();
$quest = array();
$quest=$stmt->fetchall(PDO::FETCH_COLUMN,'keterangan');
include_once 'includes/data.inc.php';
$table = 'universitas';
$product = new Data($db, $table);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SPK Web Universitas Terbaik</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dash_menu.css" rel="stylesheet">
    <link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="show_ranking.php"><i class="glyphicon glyphicon-star" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Ranking</span></a></li>
                        <li class="active"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
                        <li><a href="show_list.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Universitas</span></a></li>
                        <li><a href="show_nilai.php"><i class="fa fa-table" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Penilaian</span></a></li>
                        <li><a href="gapfactor.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Rules</span></a></li>
                        <li><a href="abouts.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">About Us</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="hidden-xs hidden-sm">
                                <h2>Tambah Data</h2>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span> <?php echo $nama; ?></span>
                                                    <p class="text-muted small">
                                                        <?php echo $email; ?>
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="logout.php" class="view btn-sm active">Log Out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                    <div class="container-fluid xyz">
                    <div class="row">
                      <p>
                 <a class="btn btn-primary" href="show_list.php" role="button">Back View Data</a>
                      </p>

                <?php
                if($_POST){

                 $product->nm = $_POST['nm'];
                 $product->i1 = $_POST['optradio1'];
                 $product->i2 = $_POST['optradio2'];
                 $product->i3 = $_POST['optradio3'];
                 $product->i4 = $_POST['optradio4'];
                 $product->i5 = $_POST['optradio5'];
                 $product->i6 = $_POST['optradio6'];
                 $product->i7 = $_POST['optradio7'];
                 $product->i8 = $_POST['optradio8'];
                 $product->i9 = $_POST['optradio9'];
                 $product->i10 = $_POST['optradio10'];
                 $product->i11 = $_POST['optradio11'];
                 $product->i12 = $_POST['optradio12'];
                 $product->i13 = $_POST['optradio13'];
                 $product->i14 = $_POST['optradio14'];
                 $product->i15 = $_POST['optradio15'];
                 $product->i16 = $_POST['optradio16'];
                 $product->i17 = $_POST['optradio17'];
                 $product->i18 = $_POST['optradio18'];
                 $product->i19 = $_POST['optradio19'];
                 $product->i20 = $_POST['optradio20'];
                 $product->i21 = $_POST['optradio21'];
                 $product->i22 = $_POST['optradio22'];

                 if($product->create()){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Success!</strong> Anda Berhasil, <a href="show_list.php">View Data</a>.
                </div>
                <?php
                 }else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Fail!</strong> Anda Gagal, Coba Lagi.
                </div>
                <?php
                 }
                }
                ?>
                <form method="post" role = "form">
                  <div class="form-group">
                    <label for="nm">Nama</label>
                    <input type="text" class="form-control" id="nm" placeholder = "Nama Universitas" name="nm">
                  </div>

    <p>Keterangan :</br> 1: sangat buruk, 2: buruk, 3: cukup, 4: baik, 5: sangat baik</p>
   <div class = "form-group" id="i1">
   <p><?php echo '1. '.$quest[0] ?></p>
   <div class = "radio radio-inline">
   <label for="i1">
      <input type = "radio" name = "optradio1" value=1 checked> 1 </label>
   <label for="i1">
      <input type="radio" name="optradio1" value=2 > 2 </label>
    <label>
      <input type="radio" name="optradio1" value=3 > 3 </label>
    <label>
       <input type="radio" name="optradio1" value=4 > 4 </label>
     <label>
       <input type="radio" name="optradio1" value=5 > 5 </label>
     </div> </div>

     <div class = "form-group">
     <p><?php echo '2. '.$quest[1] ?></p>
     <div class = "radio radio-inline">
     <label for="i2">
        <input type = "radio" name = "optradio2" value=1 checked> 1 </label>
     <label>
        <input type="radio" name="optradio2" value=2 > 2 </label>
      <label>
        <input type="radio" name="optradio2" value=3 > 3 </label>
      <label>
         <input type="radio" name="optradio2" value=4 > 4 </label>
       <label>
         <input type="radio" name="optradio2" value=5 > 5 </label>
     </div> </div>

     <div class = "form-group">
     <p><?php echo '3. '.$quest[2] ?></p>
     <div class = "radio radio-inline">
     <label for="i3">
        <input type = "radio" name = "optradio3" value=1 checked> 1 </label>
     <label>
        <input type="radio" name="optradio3" value=2 > 2 </label>
      <label>
        <input type="radio" name="optradio3" value=3 > 3 </label>
      <label>
         <input type="radio" name="optradio3" value=4 > 4 </label>
       <label>
         <input type="radio" name="optradio3" value=5 > 5 </label>
     </div> </div>

     <div class = "form-group">
     <p><?php echo '4. '.$quest[3] ?></p>
     <div class = "radio radio-inline">
     <label for="i4">
        <input type = "radio" name = "optradio4" value=1 checked> 1 </label>
     <label>
        <input type="radio" name="optradio4" value=2 > 2 </label>
      <label>
        <input type="radio" name="optradio4" value=3 > 3 </label>
      <label>
         <input type="radio" name="optradio4" value=4 > 4 </label>
       <label>
         <input type="radio" name="optradio4" value=5 > 5 </label>
      </div> </div>

      <div class = "form-group">
      <p><?php echo '5. '.$quest[4] ?></p>
      <div class = "radio radio-inline">
      <label for="i5">
         <input type = "radio" name = "optradio5" value=1 checked> 1 </label>
      <label>
         <input type="radio" name="optradio5" value=2 > 2 </label>
       <label>
         <input type="radio" name="optradio5" value=3 > 3 </label>
       <label>
          <input type="radio" name="optradio5" value=4 > 4 </label>
        <label>
          <input type="radio" name="optradio5" value=5 > 5 </label>
       </div> </div>

       <div class = "form-group">
       <p><?php echo '6. '.$quest[5] ?></p>
       <div class = "radio radio-inline">
       <label for="i6">
          <input type = "radio" name = "optradio6" value=1 checked> 1 </label>
       <label>
          <input type="radio" name="optradio6" value=2 > 2 </label>
        <label>
          <input type="radio" name="optradio6" value=3 > 3 </label>
        <label>
           <input type="radio" name="optradio6" value=4 > 4 </label>
         <label>
           <input type="radio" name="optradio6" value=5 > 5 </label>
         </div> </div>

         <div class = "form-group">
         <p><?php echo '7. '.$quest[6] ?></p>
         <div class = "radio radio-inline">
         <label for="i7">
            <input type = "radio" name = "optradio7" value=1 checked> 1 </label>
         <label>
            <input type="radio" name="optradio7" value=2 > 2 </label>
          <label>
            <input type="radio" name="optradio7" value=3 > 3 </label>
          <label>
             <input type="radio" name="optradio7" value=4 > 4 </label>
           <label>
             <input type="radio" name="optradio7" value=5 > 5 </label>
         </div> </div>

         <div class = "form-group">
         <p><?php echo '8. '.$quest[7] ?></p>
         <div class = "radio radio-inline">
         <label for="i8">
            <input type = "radio" name = "optradio8" value=1 checked> 1 </label>
         <label>
            <input type="radio" name="optradio8" value=2 > 2 </label>
          <label>
            <input type="radio" name="optradio8" value=3 > 3 </label>
          <label>
             <input type="radio" name="optradio8" value=4 > 4 </label>
           <label>
             <input type="radio" name="optradio8" value=5 > 5 </label>
         </div> </div>

         <div class = "form-group">
         <p><?php echo '9. '.$quest[8] ?></p>
         <div class = "radio radio-inline">
         <label for="i9">
            <input type = "radio" name = "optradio9" value=1 checked> 1 </label>
         <label>
            <input type="radio" name="optradio9" value=2 > 2 </label>
          <label>
            <input type="radio" name="optradio9" value=3 > 3 </label>
          <label>
             <input type="radio" name="optradio9" value=4 > 4 </label>
           <label>
             <input type="radio" name="optradio9" value=5 > 5 </label>
          </div> </div>

          <div class = "form-group">
          <p><?php echo '10. '.$quest[9] ?></p>
          <div class = "radio radio-inline">
          <label for="i10">
             <input type = "radio" name = "optradio10" value=1 checked> 1 </label>
          <label>
             <input type="radio" name="optradio10" value=2 > 2 </label>
           <label>
             <input type="radio" name="optradio10" value=3 > 3 </label>
           <label>
              <input type="radio" name="optradio10" value=4 > 4 </label>
            <label>
              <input type="radio" name="optradio10" value=5 > 5 </label>
           </div> </div>

           <div class = "form-group">
           <p><?php echo '11. '.$quest[10] ?></p>
           <div class = "radio radio-inline">
           <label for="i11">
              <input type = "radio" name = "optradio11" value=1 checked> 1 </label>
           <label>
              <input type="radio" name="optradio11" value=2 > 2 </label>
            <label>
              <input type="radio" name="optradio11" value=3 > 3 </label>
            <label>
               <input type="radio" name="optradio11" value=4 > 4 </label>
             <label>
               <input type="radio" name="optradio11" value=5 > 5 </label>
             </div> </div>

             <div class = "form-group">
             <p><?php echo '12. '.$quest[11] ?></p>
             <div class = "radio radio-inline">
             <label for="i12">
                <input type = "radio" name = "optradio12" value=1 checked> 1 </label>
             <label>
                <input type="radio" name="optradio12" value=2 > 2 </label>
              <label>
                <input type="radio" name="optradio12" value=3 > 3 </label>
              <label>
                 <input type="radio" name="optradio12" value=4 > 4 </label>
               <label>
                 <input type="radio" name="optradio12" value=5 > 5 </label>
             </div> </div>

             <div class = "form-group">
             <p><?php echo '13. '.$quest[12] ?></p>
             <div class = "radio radio-inline">
             <label for="i13">
                <input type = "radio" name = "optradio13" value=1 checked> 1 </label>
             <label>
                <input type="radio" name="optradio13" value=2 > 2 </label>
              <label>
                <input type="radio" name="optradio13" value=3 > 3 </label>
              <label>
                 <input type="radio" name="optradio13" value=4 > 4 </label>
               <label>
                 <input type="radio" name="optradio13" value=5 > 5 </label>
             </div> </div>

             <div class = "form-group">
             <p><?php echo '14. '.$quest[13] ?></p>
             <div class = "radio radio-inline">
             <label for="i14">
                <input type = "radio" name = "optradio14" value=1 checked> 1 </label>
             <label>
                <input type="radio" name="optradio14" value=2 > 2 </label>
              <label>
                <input type="radio" name="optradio14" value=3 > 3 </label>
              <label>
                 <input type="radio" name="optradio14" value=4 > 4 </label>
               <label>
                 <input type="radio" name="optradio14" value=5 > 5 </label>
              </div> </div>

              <div class = "form-group">
              <p><?php echo '15. '.$quest[14] ?></p>
              <div class = "radio radio-inline">
              <label for="i15">
                 <input type = "radio" name = "optradio15" value=1 checked> 1 </label>
              <label>
                 <input type="radio" name="optradio15" value=2 > 2 </label>
               <label>
                 <input type="radio" name="optradio15" value=3 > 3 </label>
               <label>
                  <input type="radio" name="optradio15" value=4 > 4 </label>
                <label>
                  <input type="radio" name="optradio15" value=5 > 5 </label>
               </div> </div>

               <div class = "form-group">
               <p><?php echo '16. '.$quest[15] ?></p>
               <div class = "radio radio-inline">
               <label for="i16">
                  <input type = "radio" name = "optradio16" value=1 checked> 1 </label>
               <label>
                  <input type="radio" name="optradio16" value=2 > 2 </label>
                <label>
                  <input type="radio" name="optradio16" value=3 > 3 </label>
                <label>
                   <input type="radio" name="optradio16" value=4 > 4 </label>
                 <label>
                   <input type="radio" name="optradio16" value=5 > 5 </label>
                 </div> </div>

                 <div class = "form-group">
                 <p><?php echo '17. '.$quest[16] ?></p>
                 <div class = "radio radio-inline">
                 <label for="i17">
                    <input type = "radio" name = "optradio17" value=1 checked> 1 </label>
                 <label>
                    <input type="radio" name="optradio17" value=2 > 2 </label>
                  <label>
                    <input type="radio" name="optradio17" value=3 > 3 </label>
                  <label>
                     <input type="radio" name="optradio17" value=4 > 4 </label>
                   <label>
                     <input type="radio" name="optradio17" value=5 > 5 </label>
                 </div> </div>

                 <div class = "form-group">
                 <p><?php echo '18. '.$quest[17] ?></p>
                 <div class = "radio radio-inline">
                 <label for="i18">
                    <input type = "radio" name = "optradio18" value=1 checked> 1 </label>
                 <label>
                    <input type="radio" name="optradio18" value=2 > 2 </label>
                  <label>
                    <input type="radio" name="optradio18" value=3 > 3 </label>
                  <label>
                     <input type="radio" name="optradio18" value=4 > 4 </label>
                   <label>
                     <input type="radio" name="optradio18" value=5 > 5 </label>
                 </div> </div>

                 <div class = "form-group">
                 <p><?php echo '19. '.$quest[18] ?></p>
                 <div class = "radio radio-inline">
                 <label for="i19">
                    <input type = "radio" name = "optradio19" value=1 checked> 1 </label>
                 <label>
                    <input type="radio" name="optradio19" value=2 > 2 </label>
                  <label>
                    <input type="radio" name="optradio19" value=3 > 3 </label>
                  <label>
                     <input type="radio" name="optradio19" value=4 > 4 </label>
                   <label>
                     <input type="radio" name="optradio19" value=5 > 5 </label>
                  </div> </div>

                  <div class = "form-group">
                  <p><?php echo '20. '.$quest[19] ?></p>
                  <div class = "radio radio-inline">
                  <label for="i20">
                     <input type = "radio" name = "optradio20" value=1 checked> 1 </label>
                  <label>
                     <input type="radio" name="optradio20" value=2 > 2 </label>
                   <label>
                     <input type="radio" name="optradio20" value=3 > 3 </label>
                   <label>
                      <input type="radio" name="optradio20" value=4 > 4 </label>
                    <label>
                      <input type="radio" name="optradio20" value=5 > 5 </label>
                   </div> </div>

                   <div class = "form-group">
                   <p><?php echo '21. '.$quest[20] ?></p>
                   <div class = "radio radio-inline">
                   <label for="i21">
                      <input type = "radio" name = "optradio21" value=1 checked> 1 </label>
                   <label>
                      <input type="radio" name="optradio21" value=2 > 2 </label>
                    <label>
                      <input type="radio" name="optradio21" value=3 > 3 </label>
                    <label>
                       <input type="radio" name="optradio21" value=4 > 4 </label>
                     <label>
                       <input type="radio" name="optradio21" value=5 > 5 </label>
                   </div> </div>

                   <div class = "form-group">
                   <p><?php echo '22. '.$quest[21] ?></p>
                   <div class = "radio radio-inline">
                   <label for="i22">
                      <input type = "radio" name = "optradio22" value=1 checked> 1 </label>
                   <label>
                      <input type="radio" name="optradio22" value=2 > 2 </label>
                    <label>
                      <input type="radio" name="optradio22" value=3 > 3 </label>
                    <label>
                       <input type="radio" name="optradio22" value=4 > 4 </label>
                     <label>
                       <input type="radio" name="optradio22" value=5 > 5 </label>
                   </div> </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                </div>

                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="js/jquery-3.1.0.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/dash_menu.js"></script>
                  </body>
                </html>
