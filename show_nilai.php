<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 10;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'includes/config.php';
include_once 'includes/data.inc.php';

$database = new Config();
$db = $database->getConnection();
$table = 'universitas';
$product = new Data($db,$table);
$query = "SELECT * FROM indikator";
$stmt2 = $db -> prepare($query);
$stmt2->execute();
$stmt = $product->show_nilai($from_record_num, $records_per_page);
$num = $stmt->rowCount();
$i=($page-1)*10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M Adi Darmawan">
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
                        <li><a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
                        <li><a href="show_list.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Universitas</span></a></li>
                        <li class="active"><a href="#"><i class="fa fa-table" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Penilaian</span></a></li>
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
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-lg" aria-hidden="true"></i>
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
                <div id="show-indikator" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header login-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Indikator</h4>
                        </div>
                      <div class="modal-body">
                          <div class="row">
                                <div class="well">
                                  <ul class="list-unstyled" style="line-height: 2">
                                    <?php
                                    while ($rox=$stmt2->fetch(PDO::FETCH_ASSOC)){
                                    extract($rox);
                                    ?>
                                      <li><span class='fa fa-check text-success'></span>
                                        <?php echo "i{$id} : {$keterangan}"; ?>
                                      </li>
                                      <?php
                                      }
                                      ?>
                                  </ul>
                              </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="cancel" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
                <div class="user-dashboard">
                    <div class="container-fluid xyz">
                    <div class="row">
                      <!--isi nyda tari di bawah-->
                      <!-- EDIT HERE-->
                      <?php
                      if($num>0){
                      ?>
                       <table class="table table-bordered table-striped table-hover">
                       <caption>Data Nilai Universitas</caption>
                       <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama universitas</th>
                                <th class="text-center">i1</th>
                                <th class="text-center">i2</th>
                                <th class="text-center">i3</th>
                                <th class="text-center">i4</th>
                                <th class="text-center">i5</th>
                                <th class="text-center">i6</th>
                                <th class="text-center">i7</th>
                                <th class="text-center">i8</th>
                                <th class="text-center">i9</th>
                                <th class="text-center">i10</th>
                                <th class="text-center">i11</th>
                                <th class="text-center">i12</th>
                                <th class="text-center">i13</th>
                                <th class="text-center">i14</th>
                                <th class="text-center">i15</th>
                                <th class="text-center">i16</th>
                                <th class="text-center">i17</th>
                                <th class="text-center">i18</th>
                                <th class="text-center">i19</th>
                                <th class="text-center">i20</th>
                                <th class="text-center">i21</th>
                                <th class="text-center">i22</th>
                              </tr>
                       </thead>
                       <tbody>
                      <?php
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $i++;
                      extract($row);
                      ?>
                      <tr>
                       <?php echo "<td>{$i}</td>" ?>
                       <?php echo "<td>{$nama}</td>" ?>
                       <?php echo "<td>{$i1}</td>" ?>
                       <?php echo "<td>{$i2}</td>" ?>
                       <?php echo "<td>{$i3}</td>" ?>
                       <?php echo "<td>{$i4}</td>" ?>
                       <?php echo "<td>{$i5}</td>" ?>
                       <?php echo "<td>{$i6}</td>" ?>
                       <?php echo "<td>{$i7}</td>" ?>
                       <?php echo "<td>{$i8}</td>" ?>
                       <?php echo "<td>{$i9}</td>" ?>
                       <?php echo "<td>{$i10}</td>" ?>
                       <?php echo "<td>{$i11}</td>" ?>
                       <?php echo "<td>{$i12}</td>" ?>
                       <?php echo "<td>{$i13}</td>" ?>
                       <?php echo "<td>{$i14}</td>" ?>
                       <?php echo "<td>{$i15}</td>" ?>
                       <?php echo "<td>{$i16}</td>" ?>
                       <?php echo "<td>{$i17}</td>" ?>
                       <?php echo "<td>{$i18}</td>" ?>
                       <?php echo "<td>{$i19}</td>" ?>
                       <?php echo "<td>{$i20}</td>" ?>
                       <?php echo "<td>{$i21}</td>" ?>
                       <?php echo "<td>{$i22}</td>" ?>
                      </tr>
                      <?php
                      }
                      ?>
                       </tbody>
                       </table>
                       <div class="hidden-xs">
                         <a href="#" class="add-project" data-toggle="modal" data-target="#show-indikator">Indikator</a>
                       </div>

                      <?php
                      $page_dom = "show_nilai.php";
                      include_once 'includes/pagination.inc.php';
                      }
                      else{
                      ?>
                      <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Warning!</strong> Data Masih Kosong Tolong Diisi.
                      </div>
                      <?php
                      }
                      ?>
                    </div>

                  </div>

                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="js/jquery-3.1.0.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/dash_menu.js"></script>
                  </body>
                </html>
