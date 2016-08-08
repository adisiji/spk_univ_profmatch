<?php
include_once 'includes/config.php';

$database = new Config();
$db = $database->getConnection();

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
                        <li class="active"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
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
                            <div class="hidden-xs hidden-sm">
                                <h2>Tambah Data</h2>
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
                      <p>
                 <a class="btn btn-primary" href="show_list.php" role="button">Back View Data</a>
                      </p>

                <?php
                if($_POST){

                 $product->nm = $_POST['nm'];

                 if($product->create()){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Success!</strong> Anda Berhasil, <a href="index.php">View Data</a>.
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
                <form method="post">
                  <div class="form-group">
                    <label for="nm">Name</label>
                    <input type="text" class="form-control" id="nm" name="nm">
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                </form>
                    </div>

                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="js/jquery-3.1.0.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/dash_menu.js"></script>
                  </body>
                </html>
