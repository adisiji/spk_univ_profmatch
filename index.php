<?php

include_once 'includes/config.php';

$database = new Config();
$db = $database->getConnection();
$nama = $database->nama();
$email = $database->email();

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
    <link href="css/accord-anim.css" rel="stylesheet">
    <link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
                        <li><a href="show_ranking.php"><i class="glyphicon glyphicon-star" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Ranking</span></a></li>
                        <li><a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tambah Data</span></a></li>
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
                                <h2>Selamat Datang</h2>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="add.php" class="add-project"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Data</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php echo $nama; ?></span>
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
                    <div class="row text-left">
                      <!--isi nyda tari di bawah-->
                      <!-- EDIT HERE-->
                      <h3>&ensp;Selamat datang di Sistem Penunjang Keputusan Web Universitas Negeri Terbaik</h3></br>
                      <h2>Penjelasan Menu</h2>
                    </div>
                    <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              <i class="glyphicon glyphicon-star" aria-hidden="true"></i>&nbsp;Ranking
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            Di bagian ini ditunjukkan hasil dari perhitungan tiap web universitas dan diurutkan dari yang terbaik berdasarkan nilai akhir.
                          </div>
                        </div>
                      </div>
      <!-- end of panel -->

        <div class="panel">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Data
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              Di bagian ini Anda bisa menambahkan data web universitas yang baru.
              <ul class="custom-bullet"><li>Caranya adalah dengan mengisi nama Universitas dan meng-klik setiap
                angka yang terdapat di bawah setiap indikator pertanyaan.</li></ul>
            </div>
          </div>
        </div>
      <!-- end of panel -->

        <div class="panel">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Data Universitas
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              Di bagian ini ditampilkan daftar nama web universitas yang tersimpan di database.
            </div>
          </div>
        </div>
        <!-- end of panel -->

        <div class="panel">
          <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="fa fa-table" aria-hidden="true"></i>&nbsp;&nbsp;Data Penilaian
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              Di bagian ini ditampilkan daftar nama web universitas dan nilai tiap indikator yang tersimpan di database.
            </div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-heading" role="tab" id="headingFive">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Rules
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
              Di bagian ini Anda dapat mengubah nilai tiap indikator dan aspek yang tersedia untuk perhitungan. <br/>
              <ul class="custom-bullet"><li>Caranya adalah dengan meng-klik setiap angka yang memiliki tanda garis bawah.</li></ul>
            </div>
          </div>
        </div>
        <!-- end of panel -->

        <div class="panel">
          <div class="panel-heading" role="tab" id="headingSix">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;About Us
              </a>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              Di bagian ini akan dipaparkan siapa saja yang berkontribusi dalam pembentukan aplikasi ini.
            </div>
          </div>
        </div>
      <!-- end of panel -->

      </div>
    <!-- end of #accordion -->
    </div>
      </div>
                      <!-- END EDIT !! -->

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
