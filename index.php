<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 10;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'includes/config.php';
include_once 'includes/langkah.inc.php';
$database = new Config();
$db = $database->getConnection();
$table = 'universitas';
$product = new Langkah($db,$table);
$stmt = $product->hasil($from_record_num, $records_per_page);
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
                        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
                        <li><a href="show_list.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Universitas</span></a></li>
                        <li><a href="show_nilai.php"><i class="fa fa-table" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Data Penilaian</span></a></li>
                        <li><a href="gapfactor.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gap</span></a></li>
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
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="add.php" class="add-project">Add Data</a></li>
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
                      <h1>Hasil Perhitungan dengan Metode Profile Matching</h1>
                      <?php
                      if($num>0){
                      ?>
                       <table class="table table-bordered table-striped table-hover">
                       <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Universitas</th>
                                <th class="text-center">Ni</th>
                                <th class="text-center">Ns</th>
                                <th class="text-center">Np</th>
                                <th class="text-center">Hasil</th>
                              </tr>
                       </thead>
                       <tbody>
                      <?php
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $i++;
                      extract($row);
                      ?>
                      <tr>
                       <?php echo "<td class='text-center'>{$i}</td>" ?>
                       <?php echo "<td>{$nama}</td>" ?>
                       <?php echo "<td class='text-center'>{$Ni}</td>" ?>
                       <?php echo "<td class='text-center'>{$Ns}</td>" ?>
                       <?php echo "<td class='text-center'>{$Np}</td>" ?>
                       <?php echo "<td class='text-center'>{$Hasil}</td>" ?>
                      </tr>
                      <?php
                      }
                      ?>
                       </tbody>
                       </table>
                      <?php
                      $page_dom = "index.php";
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
                        <!-- END EDIT !! -->
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dash_menu.js"></script>
</body>
</html>
