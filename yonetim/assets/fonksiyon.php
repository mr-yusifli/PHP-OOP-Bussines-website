<?php 
ob_start();
 try {
 $baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");
            $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            }catch(PDOException $e){
                die($e->getMessage());
            }
 
class yonetim 
{
    private $veriler=array();
    function sorgum($vt,$sorgu,$tercih=0){
       
        $al = $vt->prepare($sorgu);
        $al->execute();
        if($tercih==1):
            return $al->fetch();
            elseif($tercih==2):
            return $al;
        endif;
    

    }//genel sorgu
    function siteayar($baglanti) {
        $sonuc=self::sorgum($baglanti,"SELECT * FROM ayarlar",1 );
        if($_POST):
            $title=htmlspecialchars($_POST["title"]);
            $metatitle=htmlspecialchars($_POST["metatitle"]);
            $metadesc=htmlspecialchars($_POST["metadesc"]);
            $metakey=htmlspecialchars($_POST["metakey"]);
            $metaaut=htmlspecialchars($_POST["metaaut"]);
            $metaown=htmlspecialchars($_POST["metaown"]);
            $metacopy=htmlspecialchars($_POST["metacopy"]);
            $logoyazi=htmlspecialchars($_POST["logoyazi"]);
            $twit=htmlspecialchars($_POST["twit"]);
            $face=htmlspecialchars($_POST["face"]);
            $ints=htmlspecialchars($_POST["ints"]);
            $telno=htmlspecialchars($_POST["telno"]);
            $adres=htmlspecialchars($_POST["adres"]);
            $mailadres=htmlspecialchars($_POST["mailadres"]);
            $slogan=htmlspecialchars($_POST["slogan"]);
            $refsayfabas=htmlspecialchars($_POST["refsayfabas"]);
            $galerisayfabas=htmlspecialchars($_POST["galerisayfabas"]);
            $yorumsayfabas=htmlspecialchars($_POST["yorumsayfabas"]);
            $iletisimsayfabas=htmlspecialchars($_POST["iletisimsayfabas"]);
            $hizmetlersayfabas=htmlspecialchars($_POST["hizmetlersayfabas"]);
            $mesajtercih=htmlspecialchars($_POST["mesajtercih"]);
            $haritabilgi=htmlspecialchars($_POST["haritabilgi"]);
            $footer=htmlspecialchars($_POST["footer"]);
            $guncelleme=$baglanti->prepare("update ayarlar set 
            title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,twit=?,
            face=?,ints=?,telefonno=?,adres=?,mailadres=?,slogan=?,referansbaslik=?,galeribaslik=?,
            yorumbaslik=?,iletisimbaslik=?,hizmetlerbaslik=?,mesajtercih=?,haritabilgi=?,footer=? ");
            $guncelleme->bindParam(1,$title,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$metaaut,PDO::PARAM_STR);
            $guncelleme->bindParam(6,$metaown,PDO::PARAM_STR);
            $guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
            $guncelleme->bindParam(8,$logoyazi,PDO::PARAM_STR);
            $guncelleme->bindParam(9,$twit,PDO::PARAM_STR);
            $guncelleme->bindParam(10,$face,PDO::PARAM_STR);
            $guncelleme->bindParam(11,$ints,PDO::PARAM_STR);
            $guncelleme->bindParam(12,$telno,PDO::PARAM_STR);
            $guncelleme->bindParam(13,$adres,PDO::PARAM_STR);
            $guncelleme->bindParam(14,$mailadres,PDO::PARAM_STR);
            $guncelleme->bindParam(15,$slogan,PDO::PARAM_STR);
            $guncelleme->bindParam(16,$refsayfabas,PDO::PARAM_STR);
            $guncelleme->bindParam(17,$galerisayfabas,PDO::PARAM_STR);
            $guncelleme->bindParam(18,$yorumsayfabas,PDO::PARAM_STR);
            $guncelleme->bindParam(19,$iletisimsayfabas,PDO::PARAM_STR);
            $guncelleme->bindParam(20,$hizmetlersayfabas,PDO::PARAM_STR);
            $guncelleme->bindParam(21,$mesajtercih,PDO::PARAM_INT);
            $guncelleme->bindParam(22,$haritabilgi,PDO::PARAM_STR);
            $guncelleme->bindParam(23,$footer,PDO::PARAM_STR);
            $guncelleme->execute();
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>Site ayarları</strong> başarıyla güncellendi.
            </div>';
            header("refresh:2,url=control.php?sayfa=siteayar");
        else:
        ?>
      <form action="control.php?sayfa=siteayar" method="post">
        <div class="row">
        <div class="col-lg-8 mx-auto mt-2">
        <h3 class="text-info">Site Ayarları
     
        </h3>
        </div>
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Title</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="title" class="form-control" value="<?php echo $sonuc['title']; ?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Meta Title</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc['metatitle'];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Sayfa Acıklama</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Anahtar Kelimeler</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Yapımcı</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metaaut" class="form-control" value="<?php echo $sonuc["metaauthor"];?>" />
        </div>
        </div>
        </div>
         <!--ara-->
         <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Firma</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metaown" class="form-control" value="<?php echo $sonuc["metaowner"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Copyright</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc["metacopy"];?>"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Logo Yazisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="logoyazi" class="form-control" value="<?php echo $sonuc["logoyazisi"];?>"   />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Twitter</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"];?>"   />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Facebook</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="face" class="form-control" value="<?php echo $sonuc["face"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Instagram</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="ints" class="form-control" value="<?php echo $sonuc["ints"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Telefon Numarası</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="telno" class="form-control" value="<?php echo $sonuc["telefonno"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Adres</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="adres" class="form-control" value="<?php echo $sonuc["adres"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Mail adresi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Slogan</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="slogan" class="form-control" value="<?php echo $sonuc["slogan"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Referans Başlık</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="refsayfabas" class="form-control" value="<?php echo $sonuc["referansbaslik"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Galeri Başlık</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="galerisayfabas" class="form-control" value="<?php echo $sonuc["galeribaslik"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Yorum Sayfa Başlık</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="yorumsayfabas" class="form-control" value="<?php echo $sonuc["yorumbaslik"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">İletişim Sayfa Başlık</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="iletisimsayfabas" class="form-control" value="<?php echo $sonuc["iletisimbaslik"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Hizmetler Sayfa Başlık</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="hizmetlersayfabas" class="form-control" value="<?php echo $sonuc["hizmetlerbaslik"];?>"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Harita Bilgisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="haritabilgi" class="form-control" value="<?php echo $sonuc["haritabilgi"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Footer Bilgisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="footer" class="form-control" value="<?php echo $sonuc["footer"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">Mesaj Tercih</span>
        </div>
        <div class="col-lg-9 p-1">
        <div class="row">
        <div class="col-lg-4 pt-1 text-danger border-right">
        Sadece Mail
        <input type="radio" name="mesajtercih" value="1" class="mt-2" 
        <?php echo ($sonuc["mesajtercih"]==1) ? "checked='checked'":"";?> />
        </div>
        <div class="col-lg-4 pt-1 text-danger border-right ">
        Hem Mail Hem Mesaj
        <input type="radio" name="mesajtercih" value="2" class="mt-2"
        <?php echo ($sonuc["mesajtercih"]==2) ? "checked='checked'":"";?> />
        </div>
        <div class="col-lg-4 pt-1 text-danger">
        Sadece Mesaj
        <input type="radio" name="mesajtercih" value="3" class="mt-2"
        <?php echo ($sonuc["mesajtercih"]==3) ? "checked='checked'":"";?> />
        </div>
        </div>
        
        </div>
        </div>
        </div>
        <div class="col-lg-8 mx-auto mt-2 border-bottom">
        <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
        </div>
        </div>
        </form>
       <?php
      endif;
      
    } //siteayar kısmı
    function sifrele($veri){
        return base64_encode(gzdeflate(gzcompress(serialize($veri))));
        
    }
    function coz($veri){
        return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
    }
    function kuladial($vt){
        $cookid=$_COOKIE["kulbilgi"];
        $cozduk=self::coz($cookid);
        $sorgusonuc=self::sorgum($vt,"select * from yonetim where id=$cozduk",1);
        return $sorgusonuc["kulad"];
    }//kullanıcı adı ayarla
    function giriskontrol($kulad,$sifre,$vt)  {
        $sifrelihal=md5(sha1(md5($sifre)));
        $sor=$vt->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();
       
        if($sor->rowCount()==0):
            echo '
            <div class="container-fluid bg-white">
            <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-14 font-weight-bold">
            Bilgiler hatalı!</div>
            </div>';
     
            header("refresh:2,url=index.php");
        else:
        $gelendeger=$sor->fetch();
        $sor=$vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();
        echo '
        <div class="container-fluid bg-white">
        <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-success font-14 font-weight-bold">
        Giriş başarılı!</div>
        </div>';
      
        header("refresh:2,url=control.php");
        //cookie
        $id=self::sifrele($gelendeger["id"]);
        setcookie("kulbilgi",$id, time() + 60*60*24);
        endif;
    }///giris
    function cikis($vt){
        $cookid=$_COOKIE["kulbilgi"];
        $cozduk=self::coz($cookid);
        self::sorgum($vt,"update yonetim set aktif=0 where id=$cozduk",0);
        setcookie("kulbilgi",$cookid, time() - 5);
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Cıkış başarılı!</div>';
        header("refresh:2,url=index.php");
    }//cikis
    function konrolet($sayfa){
        if(isset($_COOKIE["kulbilgi"])):
            if($sayfa=="ind"):
                header("Location:control.php");
            endif;
        
        else:
            if($sayfa=="cot"):
                header("Location:index.php"); 
            endif;
        endif;

    }//cookie
    //intro---------------------
    function introayar($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info mb-2">
        <a href="control.php?sayfa=introresimekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
        İntro Resimleri</h4> </div>';
    //$introbilgiler=$vt->prepare("select * from intro");
    $introbilgiler=self::sorgum($vt,"select * from intro",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-lg-4">
        <div class="row card-bordered  p-1 m-1">
        <div class="col-lg-12">
        <img src="../'.$sonbilgi["resimyol"].'">
        <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
        <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="ti-reload m-2 text-success" style="font-size:20px;"></a>
        <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
        </kbd>
        </div> </div>
        </div>';
    endwhile;
    echo '</div>';
    }//vt resimleri geldi
    function introresimekleme($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=control.php?sayfa=introresimekle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=control.php?sayfa=introresimekle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=control.php?sayfa=introresimekle");
                    else://kosullar tamam
                        $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],'../img/carousel/'
                        .$_FILES["dosya"]["name"]);
                        echo '<div class="alert alert-success mt-5">
                        Yükleme başarılı.</div>';
                        header("refresh:2,url=control.php?sayfa=introayar");
//veritabanına ekleme-----------
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $kayıtekle=self::sorgum($vt,"insert into intro (resimyol) VALUES('$dosyaminyolu2')",0);
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">İntro resim yükleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';

    }//intro resime ekleme
    function introsil($vt){
        $introid=$_GET["id"];
        $verial=self::sorgum($vt,"select * from intro where id=$introid",1);
        echo '<div class="row text-center">
        <div class="col-lg-12">';
         //dosyayıdasil
        unlink("../".$verial["resimyol"]);
        //vtden sileme
      
        self::sorgum($vt,"delete  from intro where id=$introid",0);
       
       
        echo '<div class="alert alert-success mt-5">
        Silme başarılı.</div>';
      echo '</div></div>';
      header("refresh:2,url=control.php?sayfa=introayar");
    } 
    function introresimguncelleme($vt){
        $gelenintroid=$_GET["id"];
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            $formdangelenid=@$_POST["introid"];
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=control.php?sayfa=introayar");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=control.php?sayfa=introayar");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=control.php?sayfa=introayar");
                    else://kosullar tamam
                        //olanı sil yeniyi kaydet
                        $resimyolunabak=self::sorgum($vt,"select * from intro where id=$gelenintroid",1);
                        $dbgelenyol='../'.$resimyolunabak["resimyol"];
                        unlink($dbgelenyol);
                        $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        self::sorgum($vt,"update intro set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=control.php?sayfa=introayar");
                      
//veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">İntro resim güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             <input type="hidden" name="introId" value="<?php echo $gelenşntroid; ?>"/></p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    }

    //intro---------------------bitti
    function galeriayar($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info mb-2">
        <a href="control.php?sayfa=galeriresimekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
        Galeri Resimleri</h4> </div>';
      
       
      
    //$introbilgiler=$vt->prepare("select * from galeri");
    $introbilgiler=self::sorgum($vt,"select * from galeri",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-lg-4">
        <div class="row card-bordered  p-1 m-1">
        <div class="col-lg-12">
        <img src="../'.$sonbilgi["resimyol"].'">
        <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
        <a href="control.php?sayfa=galeriresimguncelle&id='.$sonbilgi["id"].'" class="ti-reload m-2 text-success" style="font-size:20px;"></a>
        <a href="control.php?sayfa=galeriresimsil&id='.$sonbilgi["id"].'" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
        </kbd>
        </div>

        </div>
        </div>';
    endwhile;
    echo '</div>';
    }//vt resimleri geldi
    function galeriresimekleme($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=control.php?sayfa=galeriresimekle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=control.php?sayfa=galeriresimekle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=control.php?sayfa=galeriresimekle");
                    else://kosullar tamam
                        $dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],'../img/filo/'
                        .$_FILES["dosya"]["name"]);
                        echo '<div class="alert alert-success mt-5">
                        Yükleme başarılı.</div>';
                        
//veritabanına ekleme-----------
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $kayıtekle=self::sorgum($vt,"insert into galeri (resimyol) VALUES('$dosyaminyolu2')",0);
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">Galeri resim yükleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';

    }//galeri resime ekleme
    function galerisil($vt){
        $introid=$_GET["id"];
        $verial=self::sorgum($vt,"select * from galeri where id=$introid",1);
        echo '<div class="row text-center">
        <div class="col-lg-12">';
         //dosyayıdasil
        unlink("../".$verial["resimyol"]);
        //vtden sileme
      
        self::sorgum($vt,"delete  from galeri where id=$introid",0);
       
       
        echo '<div class="alert alert-success mt-5">
        Silme başarılı.</div>';
      echo '</div></div>';
      header("refresh:2,url=control.php?sayfa=galeriayar");
    } 
    function galeriresimguncelleme($vt){
        $gelenintroid=$_GET["id"];
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            $formdangelenid=@$_POST["introid"];
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=control.php?sayfa=galeriayar");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=control.php?sayfa=galeriayar");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=control.php?sayfa=galeriayar");
                    else://kosullar tamam
                        //olanı sil yeniyi kaydet
                        $resimyolunabak=self::sorgum($vt,"select * from galeri where id=$gelenintroid",1);
                        $dbgelenyol='../'.$resimyolunabak["resimyol"];
                        unlink($dbgelenyol);
                        $dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        self::sorgum($vt,"update galeri set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=control.php?sayfa=galeriayar");
                      
//veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">Galeri resim güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             <input type="hidden" name="introId" value="<?php echo $gelenşntroid; ?>"/></p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    } //galeri--------------------bitti
    function hakkimizda($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom">
        <h4 class="float-left mt-3 text-info">Hakkımızda</h4>
        </div>';
    //$introbilgiler=$vt->prepare("select * from hakkimizda");
   
    if(!$_POST):
        $sonbilgi=self::sorgum($vt,"select * from hakkimizda",1);
   
        echo '<div class="col-lg-6 mx-auto">
        <div class="row card-bordered p-1 m-1">
        <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
        resim
        </div>
        <div class="col-lg-9 border-bottom">
        <img src="../'.$sonbilgi["resim"].'">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="dosya"/>
        </div>
        <div class="col-lg-3 border-bottom bg-light pt-2" id="hakkimizdayazilarn">
        Başlık
        </div>
        <div class="col-lg-9 border-bottom ">
        
        <input type="text" name="baslik" class="form-control m-2" value="'.$sonbilgi["baslik"].'"/>
        </div>
        <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
        İçerik
        </div>
        <div class="col-lg-9">
        <textarea name="icerik" class="form-control m-2 " rows="8">'.$sonbilgi["icerik"].'</textarea>
         </div>
        <div class="col-lg-12 border-top">
        <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
        </form>
         </div>
        </div>';
        else:

           $baslik=htmlspecialchars($_POST["baslik"]);
           $icerik=htmlspecialchars($_POST["icerik"]);
           if(@$_FILES["dosya"]["name"]!==""):

            if(@$_FILES["dosya"]["size"]<(1024*1024*5)):

            $izinverilen=array("image/png", "image/jpeg");
            if(in_array(@$_FILES["dosya"]["type"],$izinverilen)):

            $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                
            move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
            $veritabaniicin=str_replace('../','',$dosyaminyolu);
             //veritabanına ekleme----------
                endif;
            endif;
        endif;
        if(@$_FILES["dosya"]["name"]!==""):
            self::sorgum($vt,"update hakkimizda set baslik='$baslik', icerik='$icerik', resim='$veritabaniicin'",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Güncelleme basarılı</div></div>';
            header("refresh:2,url=control.php?sayfa=hakkimiz");
        else:
            self::sorgum($vt,"update hakkimizda set baslik='$baslik', icerik='$icerik'",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Güncelleme basarılı</div></div>';
            header("refresh:2,url=control.php?sayfa=hakkimiz");
        endif;
        echo '</div>';
    endif;
  
    }//hakkımızda--------------------bitti
    function hizmetlerhepsi($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info mb-2">
        <a href="control.php?sayfa=hizmetekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
        Hizmetler Ayarları</h4> </div>';
    //$introbilgiler=$vt->prepare("select * from galeri");
    $introbilgiler=self::sorgum($vt,"select * from hizmetler",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-lg-6">
        <div class="row card-bordered p-1 m-1 bg-light">
        <div class="col-lg-10 pt-1 pb-1">
        <h5>'.$sonbilgi["baslik"].'</h5>
        </div>
        <div class="col-lg-2 text-right">
        <a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi["id"].'" class="ti-reload  text-success" style="font-size:20px;"></a>
        <a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["id"].'" class="ti-trash  text-danger pl-1" style="font-size:20px;"></a>
        </div>
        <div class="col-lg-12 border-top text-secondary">
        '.$sonbilgi["icerik"].'
        </div>

        </div>
        </div>';
    endwhile;
    echo '</div>';
    }//vt resimleri geldi
    function hizmetekleme($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom">
        <h3 class=" mt-3 text-info">Hizmet Ekle<h3>
        </div>';
    //$introbilgiler=$vt->prepare("select * from galeri");
        if(!$_POST):
        
        echo '<div class="col-lg-6 mx-auto">
        <div class="row card-bordered p-1 m-1 bg-light">
        <div class="col-lg-2 pt-3">
        Başlık
        </div>
        <div class="col-lg-10 p-2">
        <form action="" method="post">
        <input type="text" name="baslik" class="form-control" />
        
        </div>

        <div class="col-lg-12 border-top p-2 ">
        İçerik
        </div>
        <div class="col-lg-12 border-top p-2">
        <textarea name="icerik" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-lg-12 border-top p-2">
        <input type="submit" name="buton" value="Hizmet Ekle" class="btn btn-primary"/>
        </form>
        </div>

        </div>
        </div>';
        else:
            $baslik=htmlspecialchars($_POST["baslik"]);
            $icerik=htmlspecialchars($_POST["icerik"]);
            if($baslik=="" && $icerik==""):
                echo '<div class="col-lg-6 mx-auto">
                <div class="alert alert-danger mt-5">
                Veriler boş olamaz.</div></div>';
                header("refresh:2,url=control.php?sayfa=hizmetler");
            else:
                self::sorgum($vt,"insert into hizmetler (baslik,icerik) values('$baslik','$icerik')",0);
                echo '<div class="col-lg-6 mx-auto">
                <div class="alert alert-success mt-5">
                Ekleme başarılı.</div></div>';
                header("refresh:2,url=control.php?sayfa=hizmetler");
            endif;
    endif;
    echo '</div>';
    }//hizmet ekleme bitti
    function hizmetguncelleme($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom">
        <h3 class=" mt-3 text-info">Hizmet Guncelleme<h3>
        </div>';
        /* gelen id alınacak
        id ile veritabanından bilgiler alınacak
        inputlara o veriler yazılacak
        hidden ile id postiçin tasınacak
        $introbilgiler=$vt->prepare("select * from hizmetler");
        */
        $kayitid=$_GET["id"];
        $kayitbilgial=self::sorgum($vt,"select * from hizmetler where id=$kayitid",1);
        if(!$_POST):
        
        echo '<div class="col-lg-6 mx-auto">
        <div class="row card-bordered p-1 m-1 bg-light">
        <div class="col-lg-2 pt-3">
        Başlık
        </div>
        <div class="col-lg-10 p-2">
        <form action="" method="post">
        <input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'"/>
        
        </div>

        <div class="col-lg-12 border-top p-2 ">
        İçerik
        </div>
        <div class="col-lg-12 border-top p-2">
        <textarea name="icerik" rows="5" class="form-control">'.$kayitbilgial["icerik"].'</textarea>
        </div>
        <div class="col-lg-12 border-top p-2">
        <input type="hidden" name="kayitidsi" value="'.$kayitid.'" />
        <input type="submit" name="buton" value="Hizmet Güncelle" class="btn btn-primary"/>
        </form>
        </div>

        </div>
        </div>';
        else:
            $baslik=htmlspecialchars($_POST["baslik"]);
            $icerik=htmlspecialchars($_POST["icerik"]);
            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);
            if($baslik=="" && $icerik==""):
                echo '<div class="col-lg-6 mx-auto">
                <div class="alert alert-danger mt-5">
                Veriler boş olamaz.</div></div>';
                header("refresh:2,url=control.php?sayfa=hizmetler");
            else:
                self::sorgum($vt,"update hizmetler set baslik='$baslik',icerik='$icerik' where id=$kayitidsi",0);
                echo '<div class="col-lg-6 mx-auto">
                <div class="alert alert-success mt-5">
                Güncelleme başarılı.</div></div>';
                header("refresh:2,url=control.php?sayfa=hizmetler");
            endif;
    endif;
    echo '</div>';
}//hizmet guncelleme bitti
function hizmetsil($vt){
    $kayitid=$_GET["id"];
    echo '<div class="row text-center">
    <div class="col-lg-12">';

    //vtden sileme
   self::sorgum($vt,"delete  from hizmetler where id=$kayitid",0);
   echo '<div class="alert alert-success mt-5">
    Silme başarılı.</div>';
  echo '</div></div>';
  header("refresh:2,url=control.php?sayfa=hizmetler");
}//hizmet sil
//referanslar
function referanslarhepsi($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=refekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
   Referans Ayarları</h4> </div>';
//$introbilgiler=$vt->prepare("select * from referanslar");
$introbilgiler=self::sorgum($vt,"select * from referanslar",2);
while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
    echo '<div class="col-lg-2">
    <div class="row card-bordered  p-1 m-1">
    <div class="col-lg-12">
    <img src="../'.$sonbilgi["resimyol"].'">
    </div>
    <a href="control.php?sayfa=refsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
    </div>
    </div>';
endwhile;
echo '</div>';
}//vt resimleri geldi
function refekleme($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12">';
    if($_POST):
        
        //dosya bos mu dolumu
        //boyut uygunmu
        //uzanttı 
        //son
        if($_FILES["dosya"]["name"]==""):
            echo '<div class="alert alert-danger mt-5">
            Dosya yüklenmedi, bu alan boş olamaz.</div>';
            header("refresh:2,url=control.php?sayfa=ref");
        else://bos degilese
            if($_FILES["dosya"]["size"]>(1024*1024*5)):
                echo '<div class="alert alert-danger mt-5">
                Dosya boyutu çok fazla!</div>';
                header("refresh:2,url=control.php?sayfa=ref");
            else://boyut uygunsa
                $izinverilen=array("image/png", "image/jpeg");
                if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                    echo '<div class="alert alert-danger mt-5">
                   İzin verilen uzantı değil!</div>';
                   header("refresh:2,url=control.php?sayfa=ref");
                else://kosullar tamam
                    $dosyaminyolu='../img/referans/'.$_FILES["dosya"]["name"];
                
                    move_uploaded_file($_FILES["dosya"]["tmp_name"],'../img/referans/'
                    .$_FILES["dosya"]["name"]);
                    echo '<div class="alert alert-success mt-5">
                    Yükleme başarılı.</div>';
                    header("refresh:2,url=control.php?sayfa=ref");
//veritabanına ekleme-----------
                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    $kayıtekle=self::sorgum($vt,"insert into referanslar (resimyol) VALUES('$dosyaminyolu2')",0);
                endif;
            endif; 
    endif;
  
    else:
         ?>
         <div class="col-lg-4 mx-auto mt-2">
         <div class="card card-bordered">
         <div class="card-body">
         <h5 class="title border-bottom">Galeri resim yükleme formu</h5>
         <form action="" method="post" enctype="multipart/form-data">
         <p class="card-text">
         <input type="file" name="dosya" /></p>
         <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
         </form>
         <p class="card-text text-left text-danger border-top">
         * İzin verilen formatlar : jpeg, png<br/>
         * izn verilen max. boyut : 5Mb
         </p>
         </div>
         </div>
         </div>
        <?php 
    endif;
    echo '</div></div>';

}//galeri resime ekleme
function refsil($vt){
    $introid=$_GET["id"];
    $verial=self::sorgum($vt,"select * from referanslar where id=$introid",1);
    echo '<div class="row text-center">
    <div class="col-lg-12">';
     //dosyayıdasil
    unlink("../".$verial["resimyol"]);
    //vtden sileme
  
    self::sorgum($vt,"delete  from referanslar where id=$introid",0);
   
   
    echo '<div class="alert alert-success mt-5">
    Silme başarılı.</div>';
  echo '</div></div>';
  header("refresh:2,url=control.php?sayfa=ref");
 

} //referanslar--------------------bitti*/
//musteri yorumları
function yorumlarhepsi($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=yorumlarekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
    Müşteri Yorumları</h4> </div>';
//$introbilgiler=$vt->prepare("select * from galeri");
$introbilgiler=self::sorgum($vt,"select * from yorumlar",2);
while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
    echo '<div class="col-lg-4">
    <div class="row card-bordered p-1 m-1 bg-light" style="border-radius:10px;">
    <div class="col-lg-9 pt-1 text-left">
    <h5>İsim:'.$sonbilgi["isim"].'</h5>
    </div>
    <div class="col-lg-3 text-right p-2">
    <a href="control.php?sayfa=yorumlarguncelle&id='.$sonbilgi["id"].'" class="ti-reload  text-success" style="font-size:20px;"></a>
    <a href="control.php?sayfa=yorumlarsil&id='.$sonbilgi["id"].'" class="ti-trash  text-danger pl-1" style="font-size:20px;"></a>
    </div>
    <div class="col-lg-12 border-top text-secondary">
    '.$sonbilgi["icerik"].'
    </div>

    </div>
    </div>';
endwhile;
echo '</div>';
}//yorumlar geldi
function yorumlarekleme($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">Yorum Ekle<h3>
    </div>';
//$introbilgiler=$vt->prepare("select * from galeri");
    if(!$_POST):
    
    echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light">
    <div class="col-lg-2 pt-3">
    İsim
    </div>
    <div class="col-lg-10 p-2">
    <form action="" method="post">
    <input type="text" name="isim" class="form-control" />
    
    </div>

    <div class="col-lg-12 border-top p-2 ">
    Mesaj
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="mesaj" rows="5" class="form-control"></textarea>
    </div>
    <div class="col-lg-12 border-top p-2">
    <input type="submit" name="buton" value="Yorum Ekle" class="btn btn-primary"/>
    </form>
    </div>

    </div>
    </div>';
    else:
        $isim=htmlspecialchars($_POST["isim"]);
        $mesaj=htmlspecialchars($_POST["mesaj"]);
        if($isim=="" && $mesaj==""):
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">
            Veriler boş olamaz.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        else:
            self::sorgum($vt,"insert into yorumlar (icerik,isim) values('$mesaj','$isim')",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Ekleme başarılı.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        endif;
endif;
echo '</div>';
}//yorum ekleme bitti
function yorumlarguncelleme($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">Yorum Guncelleme<h3>
    </div>';
    /* gelen id alınacak
    id ile veritabanından bilgiler alınacak
    inputlara o veriler yazılacak
    hidden ile id postiçin tasınacak
    $introbilgiler=$vt->prepare("select * from yorumlar");
    */
    $kayitid=$_GET["id"];
    $kayitbilgial=self::sorgum($vt,"select * from yorumlar where id=$kayitid",1);
    if(!$_POST):
    
    echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light">
    <div class="col-lg-2 pt-3">
    İsim
    </div>
    <div class="col-lg-10 p-2">
    <form action="" method="post">
    <input type="text" name="isim" class="form-control" value="'.$kayitbilgial["isim"].'"/>
    
    </div>

    <div class="col-lg-12 border-top p-2 ">
    Mesaj
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="mesaj" rows="5" class="form-control">'.$kayitbilgial["icerik"].'</textarea>
    </div>
    <div class="col-lg-12 border-top p-2">
    <input type="hidden" name="kayitidsi" value="'.$kayitid.'" />
    <input type="submit" name="buton" value="Yorum Güncelle" class="btn btn-primary"/>
    </form>
    </div>

    </div>
    </div>';
    else:
        $isim=htmlspecialchars($_POST["isim"]);
        $mesaj=htmlspecialchars($_POST["mesaj"]);
        $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);
        if($isim=="" && $mesaj==""):
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">
            Veriler boş olamaz.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        else:
            self::sorgum($vt,"update yorumlar set icerik='$mesaj',isim='$isim' where id=$kayitidsi",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Güncelleme başarılı.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        endif;
endif;
echo '</div>';
}//yorum guncelleme bitti
function yorumlarsil($vt){
$kayitid=$_GET["id"];
echo '<div class="row text-center">
<div class="col-lg-12">';

//vtden sileme
self::sorgum($vt,"delete  from yorumlar where id=$kayitid",0);
echo '<div class="alert alert-success mt-5">
Silme başarılı.</div>';
echo '</div></div>';
header("refresh:2,url=control.php?sayfa=yorumlar");
}//mesajlar kısmı
//tab sistemi örnek;

private function mailgetir($vt,$veriler){
    $sor=$vt->prepare("select * from $veriler[0] where  durum=$veriler[1]");
    $sor->execute();
    return $sor;
}
function gelenmesajlar($vt){
    echo '<div class="row">
    <div class="col-lg-12 mt-2">
    <div class="card">
    <div class="card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" role="tab"
    aria-control="gelen" aria-selected="true">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 0))->rowCount().'</kbd>Gelen Mesajlar</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"  id="okunmus-tab" data-toggle="tab" href="#okunmus" role="tab"
    aria-control="okunmus" aria-selected="false">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 1))->rowCount().'</kbd>Okunmus Mesajlar</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"  id="arsiv-tab" data-toggle="tab" href="#arsiv" role="tab"
    aria-control="arsiv" aria-selected="false">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 2))->rowCount().'</kbd>Arsivlenmiş Mesajlar</a>
    </li>
    </ul>
    <div class="tab-content mt-3" id="benimTab">
    <div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelbdy="gelen-tab">';
    $sonuc=self::mailgetir($vt,array("gelenmail", 0));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Gelen mesaj yok</div>';
    endif;
    echo'</div>
    <div class="tab-pane fade" id="okunmus" role="tabpanel" aria-labelbdy="okunmus-tab">
    ';
    $sonuc=self::mailgetir($vt,array("gelenmail", 1));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Okunmus mesaj yoktur.</div>';
    endif;
    echo'
    </div>
    <div class="tab-pane fade" id="arsiv" role="tabpanel" aria-labelbdy="arsiv-tab">
    ';
    $sonuc=self::mailgetir($vt,array("gelenmail", 2));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Arşivlenmiş mesaj yoktur.</div>';
    endif;
    echo'
    </div>
    </div></div></div></div></div>';
}
function mesajdetay($vt,$id){
    $mesajbilgi=self::sorgum($vt,"select * from gelenmail where id=$id",1);
 
            echo '<div class="row mt-2">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
            <div class="col-lg-1 p-1">

            <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div>
            <div class="row text-left p-2">
            <div class="col-lg-12">
            '.$mesajbilgi["mesaj"].'
            </div>
            </div></div></div></div>';
            self::sorgum($vt,"update gelenmail set durum=1 where id=$id",0);
            //durum guncellemesi bitti

}
function mesajarsivle($vt,$id){
             echo '<div class="row mt-2">
            <div class="col-lg-12 mt-2 font-weight-bold">
            <div class="alert alert-info mt-2 mb-2">Mesaj arşivlendi.</div>
            </div></div>';
            header("refresh:2,url=control.php?sayfa=gelenmesaj");
            self::sorgum($vt,"update gelenmail set durum=2 where id=$id",0);

}
function mesajsil($vt,$id){
    echo '<div class="row mt-2">
   <div class="col-lg-12 mt-2 font-weight-bold">
   <div class="alert alert-info mt-2 mb-2">Mesaj silindi.</div>
   </div></div>';
   header("refresh:2,url=control.php?sayfa=gelenmesaj");
   self::sorgum($vt,"delete from gelenmail where id=$id",0);

}
//-----MAİL AYARLARI--------------//
function mailayar($baglanti) {
    $sonuc=self::sorgum($baglanti,"SELECT * FROM gelenmailayar",1 );
    if($_POST):
        $host=htmlspecialchars($_POST["host"]);
        $mailadres=htmlspecialchars($_POST["mailadres"]);
        $sifre=htmlspecialchars($_POST["sifre"]);
        $port=htmlspecialchars($_POST["port"]);
        $alicimail=htmlspecialchars($_POST["alicimail"]);
        $guncelleme=$baglanti->prepare("update gelenmailayar set 
        host=?,mailadres=?,sifre=?,port=?, aliciadres=?");
        $guncelleme->bindParam(1,$host,PDO::PARAM_STR);
        $guncelleme->bindParam(2,$mailadres,PDO::PARAM_STR);
        $guncelleme->bindParam(3,$sifre,PDO::PARAM_STR);
        $guncelleme->bindParam(4,$port,PDO::PARAM_STR);
        $guncelleme->bindParam(5,$alicimail,PDO::PARAM_STR);
        $guncelleme->execute();
        echo '<div class="alert alert-success mt-5">
        <strong>Mail ayarları</strong> başarıyla güncellendi.
        </div>';
        header("refresh:2,url=control.php?sayfa=mailayar");
    else:
    ?>
  <form action="control.php?sayfa=mailayar" method="post">
    <div class="row text-center">
    <div class="col-lg-6 mx-auto">
    <div class="col-lg-12 mx-auto mt-2">
    <h3 class="text-info">Mail Ayarları
 
    </h3>
    </div>
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Host</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="host" class="form-control" value="<?php echo $sonuc['host']; ?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Mail Adresi</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc['mailadres'];?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Host Sifre</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="sifre" class="form-control" value="<?php echo $sonuc["sifre"];?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Port</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="port" class="form-control" value="<?php echo $sonuc["port"];?>" />
    </div>
    </div>
    </div>
        <!--ara-->
        <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Alıcı Mail</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="alicimail" class="form-control" value="<?php echo $sonuc["aliciadres"];?>" />
    </div>
    </div>
    </div>
  
    <div class="col-lg-12 mx-auto mt-2">
    <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
    </div>
    </div>
    </div>
    </form>
   <?php
  endif;
  
} //MAİL kısmı
//kullanıcı ayarları baslangıc
function ayarlar($baglanti) {
    $id=self::coz($_COOKIE["kulbilgi"]);
    $sonuc=self::sorgum($baglanti,"SELECT * FROM yonetim where id=$id",1 );
    if($_POST):
        @$kulad=htmlspecialchars($_POST["kulad"]);
        @$eskisif=htmlspecialchars($_POST["sifre"]);
        @$yenisif=htmlspecialchars($_POST["yenisifre"]);
        @$yenisif2=htmlspecialchars($_POST["yenisifre2"]);
        //eski şifreyi şifrele ve vt ile karsılastır.
        //yeni sifreler aynımı kontrol et
        //
        if($kulad=="" || $eskisif=="" || $yenisif=="" || $yenisif2==""):
            echo '<div class="alert alert-danger mt-5">Hiçbir alan boş geçilemez.</div>';
            header("refresh:2,url=control.php?sayfa=ayarlar");
        else:
        $sifrelihal=md5(sha1(md5($eskisif)));
        if($sonuc['sifre']!=$sifrelihal):
            echo '<div class="alert alert-danger mt-5">Eski şifre hatalı girildi.</div>';
            header("refresh:2,url=control.php?sayfa=ayarlar");
        else:
            if($yenisif!=$yenisif2):
                echo '<div class="alert alert-danger mt-5">Yeni şifreler eşleşmiyor.</div>';
                header("refresh:2,url=control.php?sayfa=ayarlar");
            else:
                $yenisifson=md5(sha1(md5($yenisif)));
                $guncelleme=$baglanti->prepare("update yonetim set 
                kulad=?,sifre=? where id=$id");
                $guncelleme->bindParam(1,$kulad,PDO::PARAM_STR);
                $guncelleme->bindParam(2,$yenisifson,PDO::PARAM_STR);
                $guncelleme->execute();
                echo '<div class="alert alert-success mt-5">
               Bilgiler başarıyla güncellendi.
                </div>';
                header("refresh:2,url=control.php?sayfa=ayarlar");
            endif;
        endif;
    endif;

    else:
    ?>
  <form action="control.php?sayfa=ayarlar" method="post">
    <div class="row text-center">
    <div class="col-lg-5 mx-auto">
    <div class="col-lg-12 mx-auto mt-2">
    <h3 class="text-info">Kullanıcı Ayarları
 
    </h3>
    </div>
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-4 border-right pt-3 text-left">
    <span id="siteayarfont">Kullanıcı Adı</span>
    </div>
    <div class="col-lg-8 p-1">
    <input type="text" name="kulad" class="form-control" value="<?php echo $sonuc['kulad']; ?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-4 border-right pt-3 text-left">
    <span id="siteayarfont">Şifre</span>
    </div>
    <div class="col-lg-8 p-1">
    <input type="password" name="sifre" class="form-control" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-4 border-right pt-3 text-left">
    <span id="siteayarfont">Yeni Sifre</span>
    </div>
    <div class="col-lg-8 p-1">
    <input type="password" name="yenisifre" class="form-control" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-4 border-right pt-3 text-left">
    <span id="siteayarfont">Yeni Sifre Tekrar</span>
    </div>
    <div class="col-lg-8 p-1">
    <input type="password" name="yenisifre2" class="form-control" />
    </div>
    </div>
    </div>
  
    <div class="col-lg-12 mx-auto mt-2">
    <input type="submit" name="buton" class="btn btn-info m-1" value="Değiştir" />
    </div>
    </div>
    </div>
    </form>
   <?php
  endif;
  
}// kullanıcı yönetimi baslangıc
function kullistele($vt){
    $al=self::sorgum($vt,"select * from yonetim",2);
    echo '<div class="row text-center">
    <div class="col-lg-6 mt-5 mx-auto">
    <div class="card">
    <div class="card-body">
    <h4 class="header-title">
    <a href="control.php?sayfa=yonekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
    Kullanıcı Listesi </h4>
    <div class="single-table">
    <div class="table-responsive">
    <table class="table text-center border">
    <thead class="text-uppercase">
    <tr>
    <th scope="col" class="border-right">Ad</th>
    <th scope="col">İşlem</th>
    </tr>
    </thead>
    <tbody>';
    while($yonson=$al->fetch(PDO::FETCH_ASSOC)):
        echo '<tr>
        <th scope="row" class="border-right">'.$yonson["kulad"].'</th>
        <th scope="row"><a href="control.php?sayfa=yonsil&id='.$yonson["id"].'">
        <i class="ti-trash text-danger" style="font-size:20px;"></i></a></th>
        </tr>';
    endwhile;

    echo '</tbody>
    </table>
    </div></div></div></div></div>';
}
function yonsil($vt,$id){
    echo '<div class="row mt-2">
   <div class="col-lg-12 mt-2 font-weight-bold">
   <div class="alert alert-info mt-2 mb-2">Yonetici silindi.</div>
   </div></div>';
   header("refresh:2,url=control.php?sayfa=kulayar");
   self::sorgum($vt,"delete from yonetim where id=$id",0);

}
function yonekle($vt){

    if($_POST):
        @$kulad=htmlspecialchars($_POST["kulad"]);
        @$yenisif=htmlspecialchars($_POST["yenisifre"]);
        @$yenisif2=htmlspecialchars($_POST["yenisifre2"]);
        //eski şifreyi şifrele ve vt ile karsılastır.
        //yeni sifreler aynımı kontrol et
        //
        if($kulad=="" ||  $yenisif=="" || $yenisif2==""):
            echo '<div class="alert alert-danger mt-5">Hiçbir alan boş geçilemez.</div>';
            header("refresh:2,url=control.php?sayfa=yonekle");
        else:
            if($yenisif!=$yenisif2):
                echo '<div class="alert alert-danger mt-5">Yeni şifreler eşleşmiyor.</div>';
                header("refresh:2,url=control.php?sayfa=yonekle");
            else:
                $yenisifson=md5(sha1(md5($yenisif)));
                $ekle=$vt->prepare("insert into yonetim (kulad,sifre) values(?,?)");
                $ekle->bindParam(1,$kulad,PDO::PARAM_STR);
                $ekle->bindParam(2,$yenisifson,PDO::PARAM_STR);
                $ekle->execute();
                echo '<div class="alert alert-success mt-5">
                Yönetici eklendi.
                </div>';
                header("refresh:2,url=control.php?sayfa=yonekle");
            endif;
        endif;
 

    else:
    ?>
  <form action="control.php?sayfa=yonekle" method="post">
    <div class="row text-center">
    <div class="col-lg-5 mx-auto">
    <div class="col-lg-12 mx-auto mt-2">
    <h3 class="text-info">Yönetici Ekle
 
    </h3>
    </div>
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-5 border-right pt-3 text-left">
    <span id="siteayarfont">Kullanıcı Adı</span>
    </div>
    <div class="col-lg-7 p-1">
    <input type="text" name="kulad" class="form-control" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-5 border-right pt-3 text-left">
    <span id="siteayarfont">Yeni Sifre</span>
    </div>
    <div class="col-lg-7 p-1">
    <input type="password" name="yenisifre" class="form-control" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-5 border-right pt-3 text-left">
    <span id="siteayarfont">Yeni Sifre (Tekrar)</span>
    </div>
    <div class="col-lg-7 p-1">
    <input type="password" name="yenisifre2" class="form-control" />
    </div>
    </div>
    </div>
  
    <div class="col-lg-12 mx-auto mt-2">
    <input type="submit" name="buton" class="btn btn-info m-1" value="Yönetici Ekle" />
    </div>
    </div>
    </div>
    </form>
   <?php
  endif;  
    
}


}
?>               
        
       


  






