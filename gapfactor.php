<?php
include_once 'includes/config.php';
$database = new Config();
$db = $database->getConnection();
$query1 = "SELECT * FROM bobot_gap";
$query2 = "SELECT * FROM bobot_nilai";
$query3 = "SELECT i.id,d.keterangan as dim_ind,i.keterangan,i.kelompok FROM indikator i
           JOIN dim_ind d ON i.dim=d.id";
$query4 = "SELECT * FROM dim_ind";
$stmt = $db->prepare( $query1 );
$stmt->execute();
$stmt2 = $db->prepare( $query2 );
$stmt2->execute();
$stmt3 = $db->prepare( $query3 );
$stmt3->execute();
$stmt4 = $db->prepare( $query4 );
$stmt4->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M Adi Darmawan">
    <title>SPK Universitas Terbaik</title>
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
                        <li><a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
                        <li><a href="show_list.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Universitas</span></a></li>
                        <li><a href="show_nilai.php"><i class="fa fa-table" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Penilaian</span></a></li>
                        <li class="active"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gap</span></a></li>
                        <li><a href="abouts.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">About Us</span></a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
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
                                <h2>Rules</h2>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://jskrishna.com/work/merkury/images/user-pic.jpg" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>JS Krishna</span>
                                                    <p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view btn-sm active">Log Out</a>
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
                      <!--isi nyda tari di bawah-->
                      <!-- EDIT HERE-->
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                            <div class="dimensi indikator">
                                <h2>Dimensi Indikator</h2>
                                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                       <tr>
                                         <th class="text-center">#</th>
                                         <th class="text-center">Keterangan</th>
                                         <th class="text-center">Prosentase</th>
                                       </tr>
                                </thead>
                                <tbody>
                               <?php
                               while ($row=$stmt4->fetch(PDO::FETCH_ASSOC)){
                               extract($row);
                               ?>
                               <tr>
                                <?php echo "<td>{$id}</td>" ?>
                                <?php echo "<td>{$keterangan}</td>" ?>
                                <?php echo "<td>{$prosentase}</td>"?>
                               </tr>
                               <?php
                               }
                               ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 gutter">
                            <div class="Indikator">
                                <h2>Indikator</h2>
                                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                       <tr>
                                         <th class="text-center">#</th>
                                         <th class="text-center">Dimensi Indikator</th>
                                         <th class="text-center">Keterangan</th>
                                         <th class="text-center">Kelompok</th>
                                       </tr>
                                </thead>
                                <tbody>
                               <?php
                               while ($row=$stmt3->fetch(PDO::FETCH_ASSOC)){
                               extract($row);
                               ?>
                               <tr>
                                <?php echo "<td>{$id}</td>" ?>
                                <?php echo "<td>{$dim_ind}</td>" ?>
                                <?php echo "<td>{$keterangan}</td>"?>
                                <?php echo "<td>{$kelompok}</td>"?>
                               </tr>
                               <?php
                               }
                               ?>
                                </tbody>
                                </table>
                            </div>

                    </div>
                    <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                          <div class="bobot nilai">
                              <h2>Bobot Nilai</h2>
                              <table class="table table-bordered table-hover table-striped">
                              <thead>
                                     <tr>
                                       <th class="text-center">Nilai</th>
                                       <th class="text-center">Keterangan</th>
                                     </tr>
                              </thead>
                              <tbody>
                             <?php
                             while ($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
                             extract($row);
                             ?>
                             <tr>
                              <?php echo "<td>{$nilai}</td>"?>
                              <?php echo "<td>{$keterangan}</td>"?>
                             </tr>
                             <?php
                             }
                             ?>
                              </tbody>
                              </table>
                          </div>
                      </div>
                      <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                          <div class="bobot gap">
                              <h2>Bobot Gap</h2>
                              <table class="table table-bordered table-hover table-striped">
                              <thead>
                                     <tr>
                                       <th class="text-center">#</th>
                                       <th class="text-center">Gap</th>
                                       <th class="text-center">Bobot</th>
                                       <th class="text-center">Keterangan</th>
                                     </tr>
                              </thead>
                              <tbody>
                             <?php
                             while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                             extract($row);
                             ?>
                             <tr>
                              <?php echo "<td>{$id}</td>" ?>
                              <?php echo "<td>{$gap}</td>" ?>
                              <?php echo "<td>{$bobot}</td>"?>
                              <?php echo "<td>{$keterangan}</td>"?>
                             </tr>
                             <?php
                             }
                             ?>
                              </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dash_menu.js"></script>
</body>
</html>
