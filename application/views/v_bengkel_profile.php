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

  <!-- Shop Stylesheet -->
  <!-- Bootstrap -->
  <!--<link rel="stylesheet" href="<?php echo base_url()?>assets/type2/plugins/bootstrap/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/type2/plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="<?php echo base_url()?>assets/type2/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="<?php echo base_url()?>assets/type2/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/type2/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="<?php echo base_url()?>assets/type2/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/type2/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="<?php echo base_url()?>assets/type2/css/style.css" rel="stylesheet">


  <!-- Login Stylesheet -->
  <link href="<?php echo base_url() ?>assets/type1/css/style1.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">

  <!-- Image Slide CSS -->
  <link href="<?php echo base_url() ?>assets/type2/css/image-slide.css" rel="stylesheet">

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
      <!-- start slide-item -->
      <div class="swiper-slide slide-item" style="height:140px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vbooking.jpeg">      
        </div>
    </div>
    </section>
    <!--  Banner End -->


<?php foreach($databengkel as $list){ ?>

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="<?php echo base_url() ?>assets/type1/images/home4.jpg" alt="" class="">
						</div>
						<!-- User Name -->
                        <h5 class="text-center" style="font-family: 'Open Sans', sans-serif;"><?php echo $list->nama_bengkel ?></h5>
                        <h6 style="color:gray;"><center>Member Since 
                            <?php $date1= $list->tanggal_registrasi;
                            $newDate = date("d F Y", strtotime($date1));
                            echo $newDate;   ?></center>
                        </h6>
                        
                        <br>
                        <center>
                            <button class="btn d-inline-block  btn-primary"  style="background-color:#e1001a;border-radius:20px;">CONTACT</button><br><br>
                            <a href="<?php echo base_url()?>Booking/Booking/<?php echo $list->id_bengkel ?>">
                                <button class="btn d-inline-block  btn-primary"  style="background-color:#e1001a;border-radius:20px;">BOOK SERVICE</button>
                            </a>
                        </center>   
					</div>
					<!-- Dashboard Links -->
					
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2 style="font-family: 'Open Sans', sans-serif;"><?php echo $list->nama_bengkel ?></h2>
                    <a><i class="fa fa-envelope-open"></i> <?php echo $list->email ?></a><br>
                    <a><i class="fa fa-comments"></i> <?php echo $list->telepon ?></a><br>
					<a><i class="fa fa-location-arrow"></i> <?php echo $list->alamat ?></a><br>
					
					<!-- Default -->
					

					<?php foreach($datarating as $list){ ?>
                        
                            <div class="product-ratings">
                                <ul class="list-inline">
                                    <li class="list-inline-item "><i class="fa <?php if($list->rating>=1){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                                    <li class="list-inline-item "><i class="fa <?php if($list->rating>=2){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                                    <li class="list-inline-item "><i class="fa <?php if($list->rating>=3){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                                    <li class="list-inline-item "><i class="fa <?php if($list->rating>=4){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                                    <li class="list-inline-item "><i class="fa <?php if($list->rating>=5){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                                </ul>
                            </div>
                        <?php echo $list->rating; ?>
                    <?php } ?>
					
					<br>
                    <!--
                    <center>
                        <h3>Give Rating</h3><br>
                        <ul class="list-inline">
                            <a href="<?php echo base_url() ?>Booking/RateBengkel/1/<?php echo $list->id_bengkel ?>"><li class="list-inline-item "><i class="fa fa-star-o"></i></li></a>
                            <a href="<?php echo base_url() ?>Booking/RateBengkel/2/<?php echo $list->id_bengkel ?>"><li class="list-inline-item "><i class="fa fa-star-o"></i></li></a>
                            <a href="<?php echo base_url() ?>Booking/RateBengkel/3/<?php echo $list->id_bengkel ?>"><li class="list-inline-item "><i class="fa fa-star-o"></i></li></a>
                            <a href="<?php echo base_url() ?>Booking/RateBengkel/4/<?php echo $list->id_bengkel ?>"><li class="list-inline-item "><i class="fa fa-star-o"></i></li></a>
                            <a href="<?php echo base_url() ?>Booking/RateBengkel/5/<?php echo $list->id_bengkel ?>"><li class="list-inline-item "><i class="fa fa-star-o"></i></li></a>
                        </ul>
                    </center>
                    -->

                    <h3 style="font-family: 'Open Sans', sans-serif;">Services :</h3>
                    <?php foreach($dataservice as $list){ ?>
                        <ul>
                            <li>
                                <?php echo $list->nama_service . " - Rp " . $list->harga_service ?><br>
                            </li>
                        </ul>
                    <?php } ?>
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php } ?>


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

<!-- Shop type2 -->

<!-- JAVASCRIPTS -->
<script src="<?php echo base_url() ?>assets/type2/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="<?php echo base_url() ?>assets/type2/plugins/tether/js/tether.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/raty/jquery.raty-fa.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url() ?>assets/type2/plugins/smoothscroll/SmoothScroll.min.js"></script>

<!-- Shop JS End -->

</body>
</html>