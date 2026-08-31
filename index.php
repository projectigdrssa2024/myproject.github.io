<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <!-- Google Fonts do not delete from page-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Vendor CSS Files Datatable-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- seleCT 2 -->
    <link href="css/select2.min.css" rel="stylesheet" />
    <script src="js/select2.min.js"></script>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    

    </head>



<?php
date_default_timezone_set('Asia/Jakarta'); // Menyesuaikan waktu dengan tempat kita tinggal
ob_start();
session_start();
include "model/koneksi.php";
if (($_SESSION['hak_akses']) == false) {
/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'login.php';
header("Location: http://$host$uri/$extra");
exit;

}
$hak_akses  = $_SESSION['hak_akses'];
unset($_SESSION['prwppa']);
$nama_login = $_SESSION['nama'];
?>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
              <marquee  style="color: aquamarine;" behavior="scroll" direction="left" width="100%" scrollamount="5" id="fulltime">
            </marquee>
           <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" id="tampil" action="search.php" method="GET" enctype="multipart/form-data">
            
                <div class="input-group">
                   
                    <input class="form-control me-2" type="search" id="isearch" name="isearch" placeholder="cari pasien" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        
                        <button class="btn btn-outline-success" onclick="loadDoc()" type="submit" name="submit" id="isearchbtn"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

           
            <!-- Navbar-->
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userDropdown" title="user keluar">logout <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg></a>
                        <!-- <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a> -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Activity Log</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"href="model/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                
        </nav>




        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Layouts
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Indikator Mutu
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="gelang_ID.php">Gelang Identitas</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Pages
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                            Authentication
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="login.html">Login</a>
                                                <a class="nav-link" href="register.html">Register</a>
                                                <a class="nav-link" href="password.html">Forgot Password</a>
                                            </nav>
                                        </div>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                            Error
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="401.html">401 Page</a>
                                                <a class="nav-link" href="404.html">404 Page</a>
                                                <a class="nav-link" href="500.html">500 Page</a>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Charts
                                </a>
                                <a class="nav-link" href="tables.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tables
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                                <div class="small">Logged in as:</div>
                                Start Bootstrap
                        </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                       
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <!-- <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div> -->
                            <div class="" id="pasien" role="menu">
                                <div class="modal-content">
                                    <div class="modal-header" align="center">
                                        <h4>Masukkan tanggal kedatangan</h4>
                                    </div>
                                    <form id="pasienfrm" method="GET" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="pasienawal" class="col-sm-2 col-form-label col-form-label-sm">Tanggal</label>
                                                <div class="col-md-4" style="margin-bottom: 5pt;">
                                                    <input type="datetime-local" name="awal" id="pasienawal" class="form-control form-control-sm">
                                                </div>
                                                <label for="pasienakhir" class="col-sm-2 col-form-label col-form-label-sm">Sampai dengan</label>
                                                <div class="col-md-4" style="margin-bottom: 5pt;">
                                                    <input type="datetime-local" name="akhir" id="pasienakhir" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label-sm" for="pasienruang">Rekap Pasien per ruang</label>
                                                <div class="col-md-4" style="margin-bottom: 5pt;">
                                                    <div class="input-group">
                                                        <input type="text" list="list_ruang" class="form-control form-control-sm" id="pasienruang" name="ruang" placeholder="ruang pelayanan" value="Reguler">
                                                        <datalist id="list_ruang" name="list_ruang">
                                                            <option value="covid" selected>covid</option>
                                                            <option value="reguler">reguler</option>
                                                        </datalist>
                                                        <span class="input-group-btn">
                                                            <button id="cetak_ruang" type="submit" name="cetak_ruang" class="btn btn-primary btn-sm">cetak</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================================= -->
              



<style>
    div.scroll-auto {
        background-color: whitesmoke;
        width: auto;
        height: 400px;
        overflow: auto;
        font-size: 12px;
    }
</style>

<body>

    <div class="page-wrapper" id="page_wrap">
        <nav class="navbar navbar-expand-lg" style="background: rgb(0,500,254);
                background: radial-gradient(circle, rgba(0,228,254,1) 0%, rgba(51,255,177,0.8972631288843662) 100%);" id="page-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0  h5 mb-2 text-gray-800">
                            <li class="nav-item">
                                <a class="navbar-brand" aria-current="page" href="index.php?link=<?= strtolower($_SESSION['hak_akses']); ?>" title="Home"><img src="./images/home.png" width="50" height="40"></a>
                            </li>
                            <div class="navbar-brand" id="ruangan">WorkSheet Perawat Gawat Darurat <?php echo $_SESSION['nama'] ?></div>
                        </ul>
                    </div>
        
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
            
            </div>
            <script>
                $(document).ready(function() {
                    time_load();
 					
                });
            </script>


                <p id="hak_akses" hidden><?php echo $hak_akses; ?></p>
                <div id="DisplayTable">
   
        <script>

 
            $(document).ready(function() {
     
                const url = new URL(document.location.href);
                var get_url = url.search;
             
              const idUrl=new URLSearchParams(window.location.search);
              
              let idPasien = parseInt(idUrl.get("link"), 10)
              let register = parseInt(idUrl.get("register"), 10)
              let statuscode = parseInt(idUrl.get("statuscode"), 10)
        

                if (get_url == "?link=admin") {
                    load_admin()

                    function load_admin() {
                        $.ajax({
                            url: "admin.php",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
                if (get_url == "?link=manajer") {
                    load_manajer()

                    function load_manajer() {
                        $.ajax({
                            url: "manajer.php",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
                if (get_url == "?link=rekap_pasien") {
                    load_rekap()

                    function load_rekap() {
                        $.ajax({
                            url: "rekap_pasien.php",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
                if (get_url == "?link=operan_jaga") {
                    load_operan()

                    function load_operan() {
                        $.ajax({
                            url: "operan_jaga.php",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }

            	if (get_url == "?link=print_resume") {
                    print_resume()

                    function print_resume() {
                        $.ajax({
                            url: "print_resume.php",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
            	if (get_url == "?link="+idPasien+"&register="+register+"&statuscode="+statuscode+"") {
                    dpjp()

                    function dpjp() {
                        $.ajax({
                            url: "dataview.php?link="+idPasien+"&register="+register+"&statuscode="+statuscode+"",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
            	if (get_url == "?link="+idPasien+"&register="+register+"&page=a") {
                    pengkajian()

                    function pengkajian() {
                        $.ajax({
                            url: "view_pengkajian.php?link="+idPasien+"&register="+register+"&page=a",
                            method: "GET",
                            success: function(data) {
                                $('#DisplayTable').html(data);
                            }
                        });
                    }
                }
            
           		                
                      
                    
            
            });
        

        
             

        </script>



            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
   
   

  
    <script src="js/templatescript.js"></script>
    <script src="js/autologoff.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>