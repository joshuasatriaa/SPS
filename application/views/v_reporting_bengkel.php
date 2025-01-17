<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool</title>

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

  <!-- Main Stylesheet -->
  <link href="<?php echo base_url() ?>assets/type1/css/style.css" rel="stylesheet">

  <!-- Login Stylesheet -->
  <link href="<?php echo base_url() ?>assets/type1/css/style1.css" rel="stylesheet">

  <!-- SignUp Stylesheet -->
  <link href="<?php echo base_url() ?>assets/type1/css/style3.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">

</head>

<body>
  
<!-- Header Start -->

<?php
	include 'nav.php';
?>

<!-- Header Close -->


<?php
	include 'modal-login.php';
?>


<!--  Banner start -->
<section class="slider-hero hero-slider  hero-style-1  ">
  
    <div class="swiper-wrapper">
      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/home5.jpeg">
          <!-- <div class="overlay"></div> -->
          <div class="container">

        <!-- Form -->
        <section class="signup" >
            <div class="container1"> 
                <div class="col-lg-12" style="padding-top:5%;">
                    <center>
                        <h4 style="font-family: 'Open Sans', sans-serif;" class="por-title"> <?php echo $this->session->userdata('nama') ?>
                        <br>
                        Reporting on <?php echo date("d F Y") ?>
                        </h4>
                    </center>
                </div>

                <div class="signup-content">
                
                <!-- Start First Part -->
                <div class="col-lg-4" >
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> Last Month Item Sold</h4>
                            <div class="por-txt"><?php echo $r1; ?> Item Sold</div>
                        </div><br>
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> Last Month Services</h4>
                            <div class="por-txt"><?php echo $r4; ?> Services</div>
                        </div><br>
                    </div> <hr>
                </div>
                <div class="col-lg-4" >
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> This Month Item Sold</h4>
                            <div class="por-txt"><?php echo $r2; ?> Item Sold</div>
                        </div><br>
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> This Month Services</h4>
                            <div class="por-txt"><?php echo $r5; ?> Services</div>
                        </div><br>
                    </div> <hr>
                </div>
                <div class="col-lg-4" >
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> Total Item Sold</h4>
                            <div class="por-txt"><?php echo $r3; ?> Item Sold</div>
                        </div><br>
                        <div class="progress-box progress-1">
                            <h4 class="por-title font1"> Total Services</h4>
                            <div class="por-txt"><?php echo $r6; ?> Services</div>
                        </div><br>
                    </div> <hr>
                </div>
             </div> 
             <!-- End First Part -->


            <!-- Start Second Part -->
            <!--
            <div class="col-lg-4" >
                    <div class="card-body" style="margin-top:-20%;">
                            <h4 class="por-title"> Last Month Item Sold</h4>
                            <div class="por-txt">100,000 Item Sold</div>
                        <br>
                        <div class="progress-box progress-1">
                            <h4 class="por-title"> Last Month Services</h4>
                            <div class="por-txt">100,000 Services</div>
                        </div><br>
                    </div> <hr>
                </div>
                -->
            <!-- End Second Part -->

        </section>
</section>
<!--  Banner End -->


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

<!-- Login Script -->
<script  src="<?php echo base_url() ?>assets/type1/js/script1.js"></script>

</html>