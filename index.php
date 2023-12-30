<?php 
include_once("lib/fonksiyon.php");
$sinif = new kurumsal;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
 
  <title><?php echo $sinif->normaltitle; ?></title>
<meta name="title" content="<?php echo $sinif->metatitle; ?>"/>
<meta name="description" content="<?php echo $sinif->metadesc; ?>"/>
<meta name="keywords" content="<?php echo $sinif->metakey; ?>"/>
<meta name="author" content="<?php echo $sinif->metaaut; ?>"/>
<meta name="owner" content="<?php echo $sinif->metaown; ?>"/>
<meta name="copyright" content="<?php echo $sinif->metacopy; ?>"/>
  <!-- Fontlar -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap stil dosyası -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!--css--> 
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    <!-- Kütüphaneler -->
    <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="js/main.js"></script>
<script>
$(document).ready (function (e){
  $("#gonderbtn").click(function(){
    $.ajax({
      type:"POST",
      url:'lib/mail/gonder.php',
      data:$('#mailform').serialize(),
      success: function(donen){
      $('#mailform').trigger("reset");
      //$('#formtutucu').fadeOut(500);
      $('#mesajsonuc').show(500).html(donen);
    },
    });});
    });
</script>
</head>

<body id="body">
<!--üst bar--> 
<section id="topbar" class="d-none d-lg-block">
<div class="container clearfix">
<div class="contact-info float-left">
<i class="fa fa-envelope-o"></i>
<a href="<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?> </a>
<i class="fa fa-phone"></i><?php echo $sinif->telno; ?>
</div>
<div class="social-links float-right">
<a href="<?php echo $sinif->twit; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
<a href="<?php echo $sinif->face; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
<a href="<?php echo $sinif->ints; ?>" class="instagram"><i class="fa fa-instagram"></i></a>
</div>
</div>
</section>

<!--header--> 
<header id="header">
<div class="container">
<div id="logo" class="pull-left">
<h1><a href="#body" class="scrollto"><?php echo $sinif->logoyazi; ?></a></h1>
</div>
<nav id="nav-menu-container">
<ul class="nav-menu">
<li class="menu-active"><a href="#body">Anasayfa</a></li>
<li><a href="#hakkimizda">Hakkımızda</a></li>
<li><a href="#hizmetler">Hizmetler</a></li>
<li><a href="#filo">Galeri</a></li>
<li><a href="#iletisim">İletişim</a></li>
</ul>
</nav>
</div>
</header>

<!--intro--> 
<section id="intro">
<div class="intro-content">
<h2><?php echo $sinif->slogan; ?></h2>
</div>
<div id="intro-carousel" class="owl-carousel">
<?php $sinif->introbak($baglanti); ?>

</div>
</section>

<!--main--> 
<section id="hakkimizda" class="wow fadeInUp">
<div class="container">
<?php $sinif->hakkimizda($baglanti); ?>
</div>
</section>
<section id="hizmetler">
<div class="container">
<?php $sinif->hizmetler($baglanti); ?>
</div>
</section>
<!--referanslar-->
<section id="referanslar" class="wow fadeInUp">
<div class="container">
<?php $sinif->referans($baglanti); ?>
</div>
</section>
<!--galeri-->
<section id="filo" class="wow fadeInUp">
<div class="container">
<?php $sinif->galeri($baglanti); ?>
</div>
</section>
<section id="yorumlar" class="wow fadeInUp">

<div class="container">
<?php $sinif->yorumlar($baglanti); ?>
</div>
</section>
<section id="iletisim" class="wow fadeInUp">

<div class="container">


      <div class="section-header">
        <h2>İletişim</h2>
        <p> <?php echo $sinif->iletisimbaslik; ?></p>
       </div>
         
         <div class="row contact-info">
         
         <div class="col-md-4">
         <div class="contact-address">
         <i class="ion-ios-location-outline"></i>
         <h3>Adresimiz</h3>
         <address><?php echo $sinif->normaladres; ?></address>
         </div>
         </div>
         
          <div class="col-md-4">
         <div class="contact-phone">
         <i class="ion-ios-telephone-outline"></i>
         <h3>Telefon Numaramız</h3>
         <p><a href="tel:<?php echo $sinif->telno; ?>"><?php echo $sinif->telno; ?></a></p>
         </div>
         </div>
         
          <div class="col-md-4">
         <div class="contact-email">
         <i class="ion-ios-email-outline"></i>
         <h3>Mail</h3>
         <p><a href="mailto:<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?></a></p>
         </div>
         </div>
         
         
         
</div>

</div>

<div class="container mb-4">
<iframe src="<?php echo $sinif->haritabilgi; ?>"
 width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>


<div class="container">
<div class="form">

<div id="mesajsonuc"></div>

<div id="formtutucu">
<form id="mailform">

<div class="form-row">

<div class="form-group col-md-6">
<input type="text" name="isim" class="form-control" placeholder="Adınız" required="required" />

</div>

<div class="form-group col-md-6">
<input type="text" name="mail" class="form-control" placeholder="Mail Adresiniz" required="required" />

</div>
</div>



<div class="form-group">
<input type="text" name="konu" class="form-control" placeholder="Mesaj Konusu" required="required" />
</div>

<div class="form-group">
<textarea class="form-control" name="mesaj" rows="5"></textarea>
</div>



<div class="text-center"><input type="button"  value="Gönder" id="gonderbtn" class="btn btn-info"/></div>

</form>

</div>
</div>
</div>
</section>


</main>

<!-- footer -->

<footer id="footer">

<div class="container">
<div class="copyright">
<?php echo $sinif->footer; ?>
</div>
<div class="credits">
<?php echo $sinif->metaown; ?>
</div>
</div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



</body>
</html>
