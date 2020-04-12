<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>BengCool - Forgot Password</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/aos/aos.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/video-popup/modal-video.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/swiper/swiper.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/date-picker/datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/clock-picker/clockpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type1/plugins/devices.min.css">
  
  <!-- Icons font CSS-->
  <link href="<?php echo base_url() ?>assets/type1/plugins/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url() ?>assets/type1/css/main.css" rel="stylesheet" media="all">

	<!-- Login Stylesheet -->
	<link href="<?php echo base_url() ?>assets/type1/css/style1.css" rel="stylesheet">

   <!-- Main Stylesheet -->
   <link href="<?php echo base_url() ?>assets/type1/css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">

</head>

<body>
<!-- Header Start -->
<!-- Header Start -->

<?php
	include 'nav.php';
?>

<!-- Header Close -->


<?php
	include 'modal-login.php';
?>



<!--  Banner start -->
<section class="slider-hero hero-slider  hero-style-1 ">
  
    <div class="swiper-wrapper">
      <!-- start slide-item -->
      <div class="swiper-slide slide-item" style="height:120px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop.jpg" >
          
           

          </div>
        
      </div>
      <!-- end slide-item -->
      
  
    </div>

</section>
<!--  Banner End -->



<section style="padding: 100px 0;">
<div class="wrapper wrapper--w960">
    <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h4 class="title font2">Please type your email below to reset your password. </h4>
                    <form action="<?php echo base_url() ?>ForgotPassword/forgotPass" method="POST">
						<?php echo form_error('email', '<small class="text-danger">', '</small>') ?>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" style="background-color:#e10019;border-radius:40px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
</div>

</section>

<!--Footer start -->

<?php
	include('footer.php');
?>

<!-- Footer  End -->

<!-- Scroll JS -->
<script>
window.onscroll = () => {
	const nav = document.querySelector('#main-nav');
  	if(window.pageYOffset > 10){
		nav.classList.add('scroll');  
		} 
	else {
		nav.classList.remove('scroll');
		}
	};
</script>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/type1/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url() ?>assets/type1/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/shuffle/shuffle.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/date-picker/datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/clock-picker/clockpicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/video-popup/jquery-modal-video.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/swiper/swiper.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/instafeed/instafeed.min.js"></script>
<script src="<?php echo base_url() ?>assets/type1/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.js"></script>

 <!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script> 
<script src="<?php echo base_url() ?>assets/type1/plugins/google-map/gmap.js"></script>
<!-- Main Script -->
<script src="<?php echo base_url() ?>assets/type1/js/contact.js"></script>
<script src="<?php echo base_url() ?>assets/type1/js/script.js"></script>


<!-- Vendor JS-->
<script src="<?php echo base_url() ?>assets/type1/js/select2.min.js"></script>
    

    <!-- Main JS-->
    <script src="<?php echo base_url() ?>assets/type1/js/global.js"></script>

	<!-- Login Script -->
<script  src="<?php echo base_url() ?>assets/type1/js/script1.js"></script>

</html>