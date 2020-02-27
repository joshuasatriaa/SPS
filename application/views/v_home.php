<?php if(substr($this->session->userdata('id_user'),0,4) == 'ADMN'){
	redirect('Dashboard/Admin');
}?>

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
  <div class="swiper-container swiper-container-horizontal">
    <div class="swiper-wrapper">
      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/home4.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Collaborative</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">We unite workshops and community for growing together.</h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">About</a>
				
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!-- end slide-item -->
      
      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/home3.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Community</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">Community means second family. We bring together those who love all things that related to cars. </h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">About</a>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!-- end slide-item -->
      
      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/home1.jpeg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Marketplace</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">We deliver good quality goods with great service to our customers. Anybody can sell or buy things!</h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">About</a>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!-- end slide-item -->
    </div>
    <!-- end swiper-wrapper -->
    <!-- swipper controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>
<!--  Banner End -->

<!--  Intro start -->
<section class="intro">
	<div class="container">
		<div class="intro-wrap bg-white w-100">
			<div class="row no-gutters">
				<div class="col-lg-4 col-md-4">
					<div class="intro-item" data-aos="fade-up">
						<i class="icofont-users-social"></i>
						<h3 class="mt-3">Community Friendly</h3>
						<p>We care about cars community, here you can make your own community, join communities and their activities, and get social through our forum.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="intro-item bg-gray " data-aos="fade-up" data-aos-delay="300">
						<i class="icofont-tasks"></i>
						<h3 class="mt-3">Online Order</h3>
						<p>You can place your order for goods or service online, with our system. </p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="intro-item" data-aos="fade-up" data-aos-delay="600">
						<i class="icofont-map-pins"></i>
						<h3 class="mt-3">Location "known"</h3>
						<p>We store all location of your workshop, workshop owners! so your customers would know where are your workshop. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  Intro End -->

<!-- About start -->
<section class="section about">
	<div class="container">
		<div class="row  justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<span class="text-primary font-extra font-md">About Bengcool</span>
				<h2 class="mt-3 mb-4">We are a community website with marketplace-based system </h2>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 mb-5 mb-lg-0" data-aos="fade-up">
				<img src="<?php echo base_url() ?>assets/type1/images/about/img-1.jpg" alt="" class="img-fluid">
				<div class="mt-3">
					<h3>Quality Food</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.impedit maiores fugit illo deserunt!</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
				<img src="<?php echo base_url() ?>assets/type1/images/about/img-2.jpg" alt="" class="img-fluid">
				<div class="mt-3">
					<h3>Friendly place</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.impedit maiores fugit illo deserunt!</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="600">
				<img src="<?php echo base_url() ?>assets/type1/images/about/img-3.jpg" alt="" class="img-fluid">
				<div class="mt-3">
					<h3>Affordable price</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.impedit maiores fugit illo deserunt!</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- About  End -->

<!-- CTA start -->
<section class="section cta">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<span class="font-extra text-md-2 text-white-70">Innovate Through Automotive</span>
				<h2 class="mt-3 text-white mb-4">Come & Explore Our Great Store!</h2>

				<a href="<?php echo base_url().'Shop'?>" class="btn btn-white">Shop now</a>
			</div>
		</div>
	</div>
</section>
<!-- CTA  End -->

<!-- DISHES start -->
<section class="section menu">
	<div class="container">
		<div class="row  justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<span class="text-primary font-extra font-md">Bengcool Goods & Services</span>
				<h2 class="mt-3 mb-4">We provide the best goods and services, We care for you </h2>
			</div>
		</div>

		<div class="row shuffle-wrapper food-gallery">
			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;,&quot;illustration&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-1.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Vitello Tonato - <span>23$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;branding&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-2.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Crema di Pomodoro - <span>34$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;illustration&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-3.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Oatmeal Cookie - <span>13$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;,&quot;branding&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex  align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-4.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Seasonal Soup - <span>10$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;illustration&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-5.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Pizza Pane - <span>28$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-6.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Carpacio - <span>20$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>

					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;branding&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-7.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Insalata Rucola - <span>15$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 mb-4 shuffle-item"
				data-groups="[&quot;design&quot;,&quot;illustration&quot;,&quot;branding&quot;]">
				<div class="menu-item position-relative ">
					<div class="d-flex align-items-center">
						<img src="<?php echo base_url() ?>assets/type1/images/menu/menu-8.jpg" alt="" class="img-fluid mb-3 mb-lg-0">
						<div>
							<h4>Carpacio - <span>13$</span></h4>
							<p>Chinese mustard/Chipotle aiol</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center mt-5">
				<a href="menu.html" class="btn btn-black ">View full menu</a>
			</div>
		</div>
	</div>
</section>
<!-- DISHES  End -->

<!--App start -->
<section class="section download">
	<div class="container">
		<div class="row ">
			<div class="col-lg-10 col-md-12">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6">
						<!-- <img src="<?php echo base_url() ?>assets/type1/images/about/2-mbl.png" alt="" class="img-fluid"> -->


						<!-- for change phone model follow this link: https://marvelapp.github.io/devices.css/ -->
						<div class="marvel-device iphone-x">
							<div class="notch">
								<div class="camera"></div>
								<div class="speaker"></div>
							</div>
							<div class="top-bar"></div>
							<div class="sleep"></div>
							<div class="bottom-bar"></div>
							<div class="volume"></div>
							<div class="overflow">
								<div class="shadow shadow--tr"></div>
								<div class="shadow shadow--tl"></div>
								<div class="shadow shadow--br"></div>
								<div class="shadow shadow--bl"></div>
							</div>
							<div class="inner-shadow"></div>
							<div class="screen">
								<img src="<?php echo base_url() ?>assets/type1/images/CafeDine.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<span class="text-primary font-md font-extra">Make it easy</span>
						<h2 class="mt-3">the Bengcool App</h2>
						<p class="mt-4">Under Development right now! </p>

						<div class="mt-5">
							<a href="#" target="_blank" class="btn-download active mb-2">
								<i class="ti ti-android"></i>
								<div class="btn-text">
									<span>Get it later on</span>
									Google Play
								</div>
							</a>
							<a href="#" target="_blank" class="btn-download">
								<i class="ti ti-apple"></i>
								<div class="btn-text">
									<span>Get it later on</span>
									app store
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- App  End -->

<!-- Slider main container -->
<section class="instgram position-relative">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <h3 class="insta-title">@Instagram</h3>

      <div class="swiper-container" id="gallery-slider">
        <!-- for instagram post remove comments from bottom line and replace your user id and access token -->
        <!-- <div class="swiper-wrapper" id="instafeed" data-userId="4044026246" data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div> -->

        <!-- this is static <?php echo base_url() ?>assets/type1/images. after setup instagram, remove this bottom code to the end -->
        <div class="swiper-wrapper" id="instafeed">
          <!-- Slides -->
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-4.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-3.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-3.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-5.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-5.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-7.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-7.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-1.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-1.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide ">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-2.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-2.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-3.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-3.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-4.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </a>
          </div>
          <div class="swiper-slide">
            <a class="popup-gallery" href="<?php echo base_url() ?>assets/type1/images/gallery/gallery-5.jpg">
              <img src="<?php echo base_url() ?>assets/type1/images/gallery/gallery-5.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <!-- end -->
      </div>
    </div>
  </div>
</section>

<!--Footer start -->
<footer class="section footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-3 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">About</h4>
					<p></p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i
									class="ti-facebook mr-2"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="ti-twitter mr-2 "></i></a>
						</li>
						<li class="list-inline-item"><a href="https://github.com/themefisher/"><i class="ti-github mr-2 "></i></a>
						</li>
						<li class="list-inline-item"><a href="https://dribbble.com/themefisher/"><i
									class="ti-dribbble mr-2 "></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 ml-auto col-md-5 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">Contact Info</h4>

					<ul class="list-unstyled mb-0 footer-contact">
						<li><i class="ti-mobile"></i>+1 987 654 3210</li>
						<li><i class="ti-email"></i>mail@support.com</li>
						<li><i class="ti-map"></i>1234 Altschul, New York,NY 10027-0000</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">Office</h4>

					<div class="info mb-4">
						<p class="mb-0">​</p>
						<h5>Jl. Tanjung Duren Timur 6 No.2A, Tj.Duren Selatan, Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470</h5>
					</div>
					<div class="info">
						<p class="mb-0">Monday - Friday</p>
						<h5>07:00 AM - 05:00 PM</h5>
					</div>
				</div>
			</div>
		</div>

	</div>
</footer>

<section class="footer-btm py-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
					<p class="mb-0 ">Copyright &copy; 2019 a theme by <a href="https://themefisher.com/"
							class="text-white">themefisher.com</a></p>

					<div class="footer-menu mt-3 mt-lg-0">
						<ul class="list-inline mb-0">
							<li class="list-inline-item pl-2"><a href="index.html">Home</a></li>
							<li class="list-inline-item pl-2"><a href="about.html">About Us</a></li>
							<li class="list-inline-item pl-2"><a href="gallery.html">Gallery</a></li>
							<li class="list-inline-item pl-2"><a href="policy.html">Privacy Policy</a></li>
							<li class="list-inline-item pl-2"><a href="terms.html">Use of terms</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer  End -->

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

<!-- Login Ajax -->
<script type="text/javascript">


	$(document).ready(function() {
	    $(".btn-submit").click(function(e){
	    	e.preventDefault();
	    	var email = $("input[name='email']").val();
	    	var password = $("input[name='password']").val();
	    	

				$.ajax({
					url: "<?php echo base_url() ?>Login",
					type:'POST',
					dataType: "json",
					data: {email:email, password:password},
					success: function(data) {
						if($.isEmptyObject(data.error)){
							$(".print-error-msg").css('display','none');
							window.location.reload(true);
							
						}else{
							$(".print-error-msg").css('display','block');
							$(".print-error-msg").html(data.error);
						}
						
					}
				});
			


	    }); 

		$("#password").on("input", function(){
        	$(".print-error-msg").css('display','none');
	    });
		


	});


</script>
</html>