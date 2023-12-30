<?php 
include_once("assets/fonksiyon.php");
$yonetim = new yonetim;
$yonetim->konrolet("cot");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Site-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>


    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="control.php"><img src="assets/images/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
            <ul class="metismenu" id="menu">
        
                <li><a href="control.php?sayfa=introayar"><i class="ti-image"></i> <span>İntro Ayarları</span></a></li>
                <li><a href="control.php?sayfa=hakkimiz"><i class="ti-flag"></i> <span>Hakkımızda Ayarları</span></a></li>
                <li><a href="control.php?sayfa=hizmetler"><i class="ti-medall"></i> <span>Hizmetlerimiz Ayarları</span></a></li>
                <li><a href="control.php?sayfa=ref"><i class="ti-eye"></i> <span>Referanslar Ayarları</span></a></li>
                <li><a href="control.php?sayfa=galeriayar"><i class="ti-car"></i> <span>Galeri</span></a></li>
                <li><a href="control.php?sayfa=yorumlar"><i class="ti-comment-alt"></i> <span>Müşteri Yorumları</span></a></li>
                <li><a href="control.php?sayfa=gelenmesaj"><i class="fa fa-envelope"></i> <span>Gelen Mesajlar</span></a></li>
                <li><a href="javascript:void(0)" aria-expanded="true">
                <i class="fa fa-cog"></i> <span>Ayarlar</span></a>
                <ul class="collapse">
                <li><a href="control.php?sayfa=siteayar"><i class="ti-pencil"></i> <span>Site Ayarları</span></a></li>
                <li><a href="control.php?sayfa=mailayar"><i class="fa fa-cog"></i> <span>Mail Ayarları</span></a></li>
                </ul>
                </li>
                </ul>
                    </nav>
                </div>
            </div>
            </div>  
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                    <!-- profil ayarlar çıkıs -->
                     <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right "style="max-height:40px;" >
                            
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user mr-2"></i>
                            <?php echo $yonetim->kuladial($baglanti); ?>
                            <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="control.php?sayfa=ayarlar" disabled="disabled">Ayarlar</a>
                            <a class="dropdown-item" href="control.php?sayfa=kulayar" disabled="disabled">Kullanıcı Ayarları</a>
                            <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="main-content-inner">
                <!-- sales report area start -->
               <div class="row">
                    <div class="col-lg-12 mt-2 bg-white text-center" style="min-height:500px;">
                   
                   
                    <?php 
                     @$sayfa = $_GET["sayfa"];
                     switch($sayfa) :
                     case "siteayar":
                     $yonetim->siteayar($baglanti); 
                     break;
                     case "cikis":
                     $yonetim->cikis($baglanti); 
                     break;
                     case "introayar":
                     $yonetim->introayar($baglanti); 
                     break;
                     case "introresimguncelle":
                     $yonetim->introresimguncelleme($baglanti); 
                     break;
                     case "introresimsil":
                     $yonetim->introsil($baglanti); 
                     break;
                     case "introresimekle":
                     $yonetim->introresimekleme($baglanti); 
                     break;
                     case "galeriayar":
                     $yonetim->galeriayar($baglanti); 
                     break;
                     case "galeriresimguncelle":
                     $yonetim->galeriresimguncelleme($baglanti); 
                     break;
                     case "galeriresimsil":
                     $yonetim->galerisil($baglanti); 
                     break;
                     case "galeriresimekle":
                     $yonetim->galeriresimekleme($baglanti); 
                     break;
                     case "hakkimiz":
                     $yonetim->hakkimizda($baglanti); 
                     break;
                     case "hizmetler":
                     $yonetim->hizmetlerhepsi($baglanti); 
                     break;
                     case "hizmetguncelle":
                     $yonetim->hizmetguncelleme($baglanti); 
                     break;
                     case "hizmetsil":
                     $yonetim->hizmetsil($baglanti); 
                     break;
                     case "hizmetekle":
                     $yonetim->hizmetekleme($baglanti); 
                     break;
                     case "ref":
                     $yonetim->referanslarhepsi($baglanti); 
                     break;
                     case "refsil":
                     $yonetim->refsil($baglanti); 
                     break;
                     case "refekle":
                     $yonetim->refekleme($baglanti); 
                     break;
                     case "yorumlar":
                     $yonetim->yorumlarhepsi($baglanti); 
                     break;
                     case "yorumlarguncelle":
                     $yonetim->yorumlarguncelleme($baglanti); 
                     break;
                     case "yorumlarsil":
                     $yonetim->yorumlarsil($baglanti); 
                     break;
                     case "yorumlarekle":
                     $yonetim->yorumlarekleme($baglanti); 
                     break;
                     case "gelenmesaj":
                     $yonetim->gelenmesajlar($baglanti); 
                     break;
                     case "mesajoku":
                     $yonetim->mesajdetay($baglanti,$_GET["id"]); 
                     break;
                     case "mesajarsivle":
                     $yonetim->mesajarsivle($baglanti,$_GET["id"]); 
                     break;
                     case "mesajsil":
                     $yonetim->mesajsil($baglanti,$_GET["id"]); 
                     break;
                     case "mailayar":
                     $yonetim->mailayar($baglanti); 
                     break;
                     case "ayarlar":
                     $yonetim->ayarlar($baglanti); 
                     break;
                     case "kulayar":
                     $yonetim->kullistele($baglanti); 
                     break;
                     case "yonsil":
                     $yonetim->yonsil($baglanti,$_GET["id"]); 
                     break;
                     case "yonekle":
                     $yonetim->yonekle($baglanti); 
                     break;
                     default:
                     $yonetim->siteayar($baglanti);
                     endswitch;
                     ?>
                </div>
            </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>
  
    
   
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script> 
     <!-- bootstrap 4 js -->
     <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>  

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
