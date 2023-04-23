<!DOCTYPE html>
<html lang="en">

<?php require_once('admin/dbconfig.php'); ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	// This is our actual script
	$(document).ready(function(){
					
		$('#inlock').click(function(){
		        var imei = document.getElementById('imei').value ;				
				var test = isIMEI(imei);
				
				if(!test){ alert("Enter valid IMEI"); return false;  }				
		   		$.ajax({
				url: "insert_ajax.php",
				type: 'POST',
				data: $("#imei-form").serialize(),
				success: function (data) {
				    data = data.replace(/\s+/g, '');
				    if(data=='1'){alert("Successfully Inserted")} else {alert("Duplicate EMEI or Not Inserted");}
					//$('#container').html(data);
				}
			});
		});
		 
		$('#check_status').click(function(){
            var imei = document.getElementById('imei').value ;
			var test = isIMEI(imei);
			
			if(!test){ alert("Enter valid IMEI"); return false;  }				
			$.ajax({
				url: 'show_ajax.php',
				type: 'POST',
				data: $("#imei-form").serialize(),
				success: function (data) {
				   // alert(data);
					$('#containershowdata').html(data);
				}
			});
		});
		
	});
	
	function isIMEI(s) {
		var etal = /^[0-9]{15}$/;
		if (!etal.test(s))
		return false;
		sum = 0; mul = 2; l = 14;
		for (i = 0; i < l; i++) {
		digit = s.substring(l-i-1,l-i);
		tp = parseInt(digit,10)*mul;
		if (tp >= 10)
		 sum += (tp % 10) +1;
		else
		 sum += tp;
		if (mul == 1)
		 mul++;
		else
		 mul--;
		}
		chk = ((10 - (sum % 10)) % 10);
		if (chk != parseInt(s.substring(14,15),10))
		return false;
		return true;
		}
	</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>

		

	</script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">MOBIL CIHAZLARIN IMEI KONTROL SERVİSİ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">Hakkında</a>
                    </li>
                    <li>
                        <a href="#services">&nbsp;Hizmetlerimiz</a>
                    </li>
                    <li>
                        <a href="#contact">İletişim</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message1">
                        <h1> E.BlkyGroup Unlock Service</h1>
                      <p> &nbsp;  &nbsp; &nbsp; www.MicroChipTecnology.com &nbsp;</p>
                        <p>Tüm üreticiler ve telefon modelleri desteklenir. Herhangi bir ımeı'yi kontrol edebilirsiniz - iPhone / Samsung / HTC / LG / Nokia / Lenovo / Huawei vb.&nbsp;</p>
                      <p><strong>EVRENSEL CEP TELEFONU IMEI KONTROL SERVİSİ </strong></p>
                      <p>&nbsp;Telefonun dünyanın herhangi bir yerinde kaybolduğu/çalındığı bildirilip bildirilmediğini kontrol edin.</p>
                      <p>&nbsp;IMEI denetleyicimiz yaklaşık %99,9 doğruluğa sahiptir.</p>
                      <p>&nbsp;Hemen hemen tüm ülkeler ve mobil operatörler desteklenmektedir</p>
                      <p>&nbsp;(ABD, Birleşik Krallık, Kanada, Avrupa Birliği, Japonya, Avustralya, Çin vb.Dahil).)</p>

<h3>Apple Kimliği şifrenizi mi unuttunuz? Apple ID hesabınızı kaldıramıyor musunuz? E.blky iGroup Unlock Global Service ile iPhone'unuzun kilidini saniyeler içinde açabilir. Yeni bir hesaba giriş yaparak tüm iCloud hizmetlerinizi ve Apple ID özelliklerinizi yeniden kazanın.&nbsp;</h3>
                      <h3>&nbsp;Yurtdışına seyahat ettiğinizde veya SIM kartınızı değiştirip yeniden başlattığınızda iPhone'unuz kilitlenebilir. E.blkyGroup - Ekran Kilidi ( iOS ), "SIM Destek Değil", "SIM Geçerli Değil", "SIM Kilitli" veya "gibi birçok yaygın senaryoda taşıyıcı SIM sorunlarını düzeltmenizi sağlar "Ağ Hizmeti Yok". Ayrıca, veri kaybetmeden AT&amp;T, Sprint, T-Mobile, Verizon vb.Gibi farklı ağlarla uluslararası kullanım için iPhone'unuzun kilidini hızlı bir şekilde açmanıza yardımcı olur.</h3>
                      <p>iPhone kilit ekranınızı, etkinleştirme kilidinizi vb. Güvenli bir şekilde kaldırır ve cihaz. İPhone / iPad'inizdeki verileri sileceğini lütfen unutmayın.&nbsp;</p>
                        <p>&nbsp;</p>
<hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    
    <!-- /.content-section-a -->

    <div>

        <div class="container">

            <div class="row">
						<form class="form-horizontal" id="imei-form" name="imei-form" role="form">
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">IMEI:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="imei" name="imei" placeholder="Enter IMEI">
						</div>
						</div>
						<div class="form-group"> </div>
						<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-default"  id="inlock">KİLİT AÇ&nbsp;</button>
						<button type="button" class="btn btn-default"  id="check_status">DURUMU KONTROL EDİNİZ</button>
						</div>
						</div>
						
							<br><br>
							
							<div style="margin:auto 0;"><div id="containershowdata" style="width:70%; margin:auto;">  </div></div>
						
			  </form>
						
						<br><br>
							<br>
            <div class="col-lg-5 col-sm-push-6  col-sm-6 col-lg-offset-0">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">E.blkyGroup Unlock&nbsp; SERVICE&nbsp;&nbsp;</h2>
                    <p class="lead">Cep telefonu dünyasının karmakarışık ve kaotik dünyasına açıklık ve şeffaflık sağlama vizyonuyla 2007 yılında doğdu. E.blkygroup Unlock'in amacı, modern ve ileri teknolojik bir hizmetle her türlü telefon hizmetini ve tasarrufunu sunmaktır. Böylece, mevcut zamanlara uyarlanmış özellikler üretilir ve özel müşterilere tanıtılır, işletmeler ve mobil operatörler her türlü teknoloji ile etkileşimlerini kolaylaştıran araçlara sahiptir. Teklif her geçen gün büyüyor ve simülasyon sürümlerinin titiz algoritmalarını kullanan ve cep telefonunun kilidini açan, eyaletiniz, kredi kontörleriniz veya SIM kartlarınız hakkında derinlemesine bilgi için check-up'ların kilidini açan bir Sihirbaz, Tasarruf ve Cep telefonu Oranlarının karşılaştırılmasını içeriyor... Bağları olmayan ve üçüncü tarafların kaprisleri olmayan cep telefonu. Kuruluşundan bu yana, optimizasyon hizmetleri, sürümleri, kontrolleri, yedekleri sayesinde 5 milyondan fazla kullanıcı operatörünüze para vermeyi bıraktı...&nbsp;</p>
              </div>
                <div class="col-sm-pull-6  col-sm-6 col-lg-5 col-lg-offset-1">
			
                    <img class="img-responsive" src="img/dog.png" alt="">
                </div>
          </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>E.blkyGroup Unlock Ramdisk&nbsp; &nbsp;</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/home" class="btn btn-default btn-lg whatshap"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/Emrebalkay4141" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">www.MicroChipTecnology.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
