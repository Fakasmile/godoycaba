<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title><?=$tituloPage;?></title>
        <meta name="description" content="<?=$site_description;?>">
        <meta name="keywords" content="<?=$site_description;?>">

        <meta property="og:url" content="http://godoyasesores.com">
        <meta property="og:title" content="<?=$tituloPage;?>">
        <meta property="og:description" content="<?=$site_description;?>">
        <meta property="og:site_name" content="<?=$tituloPage;?>">
        <meta property="og:image" content="http://godoyasesores.com/images/share.png">
        <meta property="og:type" content="website">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="http://godoyasesores.com">
        <meta name="twitter:title" content="<?=$tituloPage;?>">
        <meta name="twitter:description" content="<?=$site_description;?>">
        <meta name="twitter:image:src" content="http://godoyasesores.com/images/share.png">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=$base;?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base;?>css/jquery-ui.css">
        <link rel="stylesheet" href="<?=$base;?>css/index.css?v=<?=rand();?>">
        <link rel="icon" type="image/png" href="<?=$base;?>images/favicon.png">
		<?PHP
			foreach($cssFiles as $css) {
				echo '
        <link rel="stylesheet" href="'.$css.'">';
			}
		?>
		
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27150584-1', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- Facebook Pixel Code -->
		<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '562398213954064');fbq('track', 'PageView');</script>
		<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=562398213954064&ev=PageView&noscript=1"/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Facebook Pixel Code -->
		<script>
		  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '257508662515275');fbq('track', 'PageView');</script>
		<noscript><img height="1" width="1" style="display:none" src=https://www.facebook.com/tr?id=257508662515275&ev=PageView&noscript=1/></noscript>
		<!-- End Facebook Pixel Code -->

    </head>
    <body>


		<header class="site-header <?=$mainclass;?>">
			<h1 class="logo desktop">
				<a href="<?=$base;?>">
					<span><?=$tituloPage;?></span>
				</a>
			</h1>
			<nav>
				<h1 class="for-seo">Menu</h1>
				<ul>
					<li class="<?=$classHom;?>">
						<a href="<?=$base;?>">HOME</a>
					</li>
					<li class="<?=$classNos;?>">
						<a href="<?=$base;?>nosotros/">NOSOTROS</a>
					</li>
					<li class="<?=$classSer;?>">
						<a href="<?=$base;?>servicios/">SERVICIOS</a>
					</li>
					<li class="<?=$classInm;?>">
						<a href="<?=$base;?>inmuebles/">INMUEBLES</a>
					</li>
					<li class="<?=$classSerpa;?>">
						<a href="<?=$base;?>serparte/">SER PARTE</a>
					</li>
					 
					 
					<li class="<?=$classCon;?>">
						<a href="<?=$base;?>contact/">CONTACTO</a>
					</li>
					<li class="outline hide-mobile">
						<a data-action="appraisal" href="tasaciones/">TASACIONES</a>
					</li>
					<li class="outline hide-mobile<?=$classBus;?>">
						<a href="<?=$base;?>buscador/">BUSCADOR</a>
					</li>
					<!-- // <li class=""> -->
						<!-- // <a href="https://wa.me/541139001900" class="wtsIconMen"><i class="fab fa-whatsapp"></i></a> -->
					<!-- // </li> -->
				</ul>
			</nav>
			<!-- <a href="#" class="mobile-nav-toggle"><i class="icon icon-bars"></i></a> -->
	<!-- Top Navigation Menu -->
	
	<!-- Simulate a smartphone / tablet -->
<div class="mobile-container mobile-nav-toggle">

<!-- Top Navigation Menu -->
<div class="topnav">
		
	
			
			<h1 class="logo">
						<a href="<?=$base;?>">
							<span><?=$tituloPage;?></span>
						</a>
					</h1>
					
					
			  <div id="myLinks">
			  <ul>
					<li class="<?=$classHom;?>">
						<a href="<?=$base;?>">HOME</a>
					</li>
					<li class="<?=$classNos;?>">
						<a href="<?=$base;?>nosotros/">NOSOTROS</a>
					</li>
					<li class="<?=$classSer;?>">
						<a href="<?=$base;?>servicios/">SERVICIOS</a>
					</li>
					<li class="<?=$classInm;?>">
						<a href="<?=$base;?>inmuebles/">INMUEBLES</a>
					</li>
					<li class="<?=$classSerpa;?>">
						<a href="<?=$base;?>serparte/">SER PARTE</a>
					</li>
					 
					 
					<li class="<?=$classCon;?>">
						<a href="<?=$base;?>contact/">CONTACTO</a>
					</li>
					<li class="<?=$classTas;?>">
						<a data-action="appraisal" href="tasaciones/">TASACIONES</a>
					</li>
					<li class="outline hide-mobile<?=$classBus;?>">
						<a href="<?=$base;?>buscador/">BUSCADOR</a>
					</li>
					<!-- // <li class=""> -->
						<!-- // <a href="https://wa.me/541139001900" class="wtsIconMen"><i class="fab fa-whatsapp"></i></a> -->
					<!-- // </li> -->
				</ul>
     
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

 

<!-- End smartphone / tablet look -->
</div>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

		

		<!-- End smartphone / tablet look -->
		</div>

		<script>
		function myFunction() {
		  var x = document.getElementById("myLinks");
		  if (x.style.display === "block") {
			x.style.display = "none";
		  } else {
			x.style.display = "block";
		  }
		}
		</script>



		</header>