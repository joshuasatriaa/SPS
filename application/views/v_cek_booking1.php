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

           

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Category">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
							</div>
							<div class="form-group col-md-2">
								
								<button type="submit" class="btn btn-primary">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
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


<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Current Booking</h2>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
				<?php if($this->session->userdata('email') != null) {?>
					<a href = "<?php echo base_url() ?>Booking/CheckBooking">
						<div class="widget1 category-list" style="cursor:pointer">
							<h4 class="widget-header">All Booking</h4>
						</div>
					</a>

					<a href = "<?php echo base_url() ?>Booking/CurrentBooking">
						<div class="widget1 category-list" style="cursor:pointer">
							<h4 class="widget-header">Current Booking</h4>
						</div>
					</a>

					<div class="widget1 category-list">
						<h4 class="widget-header">History</h4>
					</div>
				<?php } ?>


				</div>
			</div>
			<div class="col-md-9">
				
                <div class="widget dashboard-container my-adslist">
          
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Services</th>
                <th class="text-center">By</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                    foreach($databooking1 as $list){
                ?>
                <td class="product-thumb">
					<img class="card-img-top img-fluid" src="<?php echo base_url() ?>assets/type1/images/home4.jpg" alt="Card image cap">
                <td class="product-details">
                  <h3 class="title" style="padding-left:20px"><?php echo $list->nama_service . " - Rp" . $list->harga_service ?></h3>
                  <?php
                    $hasil = $list->status_booking;
                    ?>
                  <span><strong style="padding-left:20px">Date : </strong><time><?php echo $list->waktu_service ?></time> </span>
                  <span class="status <?php if($hasil == 2){echo 'active';} ?>" style="padding-left:20px"><strong>Status : </strong>
                  <?php
                    if($hasil == 0)
                    {
                        echo "Not Confirmed";
                    }
                    else if($hasil == 1)
                    {
                        echo "Rejected";
                    }
                    else
                    {
                        echo "Confirmed";
                    }
                   ?>
                   </span>
                  
                </td>
                <td class="product-category"><span class="categories"><?php echo $list->nama_pengguna ?></span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                        <a href="<?php echo base_url() ?>Booking/DoneBooking/<?php echo $list->id_booking ?>">
							<button class="btn btn-primary">DONE</button>
                        </a>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <?php
                    }
                    ?>
                
            </tbody>
          </table>

        </div>



						</div>
					</div>
				</div>
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
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

</html>