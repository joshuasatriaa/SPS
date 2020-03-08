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
  <!-- Jquery UI -->
  <link href="<?php echo base_url(); ?>assets/jquery-ui.css" rel = "stylesheet">
  <link href="<?php echo base_url(); ?>assets/jquery-ui.min.css" rel = "stylesheet">

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
<section class="">
  
    <div class="">
      <!-- start slide-item -->
      <div class="">
        <div class="searchbar" style="background-image: url('<?php echo base_url() ?>assets/type1/images/Vshop.jpg')">
          <div class="container">
			
		 	 <section class="page-search">
				<div class="container">
					
				</div>
			</section>     

          </div>
        </div> 
      </div>
      <!-- end slide-item -->
      
  
    </div>
    <!-- end swiper-wrapper -->
    <!-- swipper controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  
</section>
<!--  Banner End -->
<div class="body">
<?php if($checkmember == null){?>
<section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="text-center p-5 shadow rounded">
					<h2 class="mb-3">Membership</h2>
					<h4 class="mb-3">To get access to all the feature we provide for customer members </h4>
					<h4>Why go member?</h4>
					<ul class="list-unstyled mb-4">
						<li>Full Ads Support</li>
						<li>Free and easy to use</li>
						<li>Pay only when needed</li>
						<li>Analytics</li>
						<li>Subscription-based payment</li>
					</ul>
					<a href="<?php echo base_url(). 'Shop/goMember'?>" class="btn btn-main">Become Member</a>			
				</div>
			</div>
		</div>
	</div>
</section>
<?php }else{?>
	<section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="text-center p-5 shadow rounded">
					<h2 class="mb-3">Renew Membership</h2>
					<h4 class="mb-3">We have detected that you had been our member before. <br> Your latest membership ends in <?php echo date("d F Y", strtotime($checkmember['tanggal_selesai']))?></h4>
					<h4>Renew your membership?</h4>
					<a href="<?php echo base_url(). 'Shop/editMembership'?>" class="btn btn-main">Become Member</a>			
				</div>
			</div>
		</div>
	</div>
</section>


<?php }?>
<!--Footer start -->
<footer class="section footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-3 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">About</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nam!</p>
					
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
			<h4 class="mb-3">Opening Hours</h4>
			
			<div class="info mb-4">
				<p class="mb-0">Monday - Thursday</p>
				<h5>10:00 AM - 11:00 PM</h5>
			</div>
			<div class="info">
				<p class="mb-0">Friday - Sunday</p>
				<h5>12:00 AM - 03:00 AM</h5>
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
</div>
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

<!-- Shop type2 -->

<!-- JAVASCRIPTS -->
<script src="<?php echo base_url() ?>assets/type2/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery-ui.min.js"></script>
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
<!-- <script>
jQuery(function()
{		
	// function untuk mengambil semua data
	function getAll()
	{
		$.ajax({
			url: 'ProductController.php',
			data: 'action=show-all',
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#show-product").html(response);
			}
		});			
	}
	
	getAll(); // load ketika document ready

	// ketika ada event change
	$("#getProduct").change(function()
	{				
		var id = $(this).find(":selected").val();
		var dataString = 'action='+ id;
				
		$.ajax({
			url: 'ProductController.php',
			data: dataString,
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#show-product").html(response);
			} 
		});
	})
});
</script>
-->

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

