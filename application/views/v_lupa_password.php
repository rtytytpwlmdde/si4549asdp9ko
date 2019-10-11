<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SURAT TUGAS FEB</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="<?php echo base_url(); ?>/assets/styles/shards-dashboards.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/extras.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/chartist/css/chartist-custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/datatable/css/datatable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/main/main.css">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/images/logo.jpg">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/images/logo.png">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	
    
  </head>
  <body class="h-100 bg-secondary">
    
    <div class="container-fluid icon-sidebar-nav h-100">
      <div class="row h-100">
        <!-- Main Sidebar -->
        
        <!-- End Main Sidebar -->
        <main class="main-content col">
          <div class="main-content-container container-fluid px-4 my-auto h-100">
				<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
				<div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-close text-white">x</i></span>
				</button>
				<i class="fa fa-info mx-2"></i>
				<strong>'.$notif.'</strong> 
				</div>
				';
			}
		?>
            <div class="row no-gutters h-100 ">
              <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto bg-light">
                <div class="px-4 py-4">
                  <div class="login_form">
                    <img class="auth-form__logo d-table mx-auto mb-3" style="height: 80px;width: 80px;" src="<?php echo base_url(); ?>/assets/images/avatars/ub.png" alt="User Avatar">
                    <h5 class="auth-form__title text-center mb-4">SIRUAS FEB</h5>
                    <h6 class="auth-form__title text-center mb-4">Silahkan Menghubungi Operator</h6><br>
                      <p class="auth-form__title text-center mb-4">PSIK | Gedung Dekanat Lt. 2 <br> Telp 132 | HP 081333555047</p>
                  </div><br>
                  <div class=" border-top">
                  <div class="auth-form__meta d-flex mt-4">
                  <a href="<?php echo base_url('auth/index/')?>" >Kembali ke halaman Login</a>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  
<iframe scrolling="no" allowtransparency="true" src="https://platform.twitter.com/widgets/widget_iframe.5b37191c1b7fd23797a519962bf78683.html?origin=https%3A%2F%2Fdesignrevision.com&amp;settingsEndpoint=https%3A%2F%2Fsyndication.twitter.com%2Fsettings" title="Twitter settings iframe" style="display: none;" frameborder="0"></iframe>
<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","1992161670810242");fbq("track","PageView");</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1992161670810242&amp;ev=PageView&amp;noscript=1"></noscript>



<script type="text/javascript" id="">!function(d,e,f,a,b,c){d.twq||(a=d.twq=function(){a.exe?a.exe.apply(a,arguments):a.queue.push(arguments)},a.version="1.1",a.queue=[],b=e.createElement(f),b.async=!0,b.src="//static.ads-twitter.com/uwt.js",c=e.getElementsByTagName(f)[0],c.parentNode.insertBefore(b,c))}(window,document,"script");twq("init","nzgqc");twq("track","PageView");</script>
<script src="https://analytics.twitter.com/i/adsct?p_id=Twitter&amp;p_user_id=0&amp;txn_id=nzgqc&amp;events=%5B%5B%22pageview%22%2Cnull%5D%5D&amp;tw_sale_amount=0&amp;tw_order_quantity=0&amp;tw_iframe_status=0&amp;tpx_cb=twttr.conversion.loadPixels&amp;tw_document_href=https%3A%2F%2Fdesignrevision.com%2Fdemo%2Fshards-dashboards%2Flogin.html" type="text/javascript"></script><iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0"></iframe></body>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/extras.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/shards-dashboards.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/app/app-blog-overview.1.0.0.js"></script>
	<script src="<?php echo base_url(); ?>/assets/chartist/js/chartist.min.js"></script>
  </body>
</html>

<script>
	$(document).ready(function ($) {
  $(".table-row").click(function () {
    var url = $(this).data("href");
    window.open(url,'_blank');
  });
});
</script>