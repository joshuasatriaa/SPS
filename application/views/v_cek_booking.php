<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - All Booking</title>

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
      <!-- start slide-item -->
      <div class="swiper-slide slide-item" style="height:140px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vbooking.jpeg">      
        </div>
    </div>
</section>
<!--  Banner End -->


<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom:10px;">
				
				<h2 style="font-family: 'Open Sans', sans-serif;">All Booking</h2>
				
			</div>
		</div>
		
		<div class="row">
			<?php
				include('left-booking1.php');
			?>
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
                    foreach($databooking as $list){
                ?>
                <td class="product-thumb">
					<img class="card-img-top img-fluid" src="<?php echo base_url() ?>assets/type1/images/home4.jpg" alt="Card image cap">
                <td class="product-details">
                  <h3 class="title font2" style="padding-left:20px"><?php echo $list->nama_service . " - Rp" . $list->harga_service ?></h3>
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
                    else if($hasil == 2)
                    {
                        echo "Confirmed";
					}
					else
					{
						echo "Done";
					}
                   ?>
                   </span>
                  
                </td>
                <td class="product-category"><span class="categories"><?php echo $list->nama_pengguna ?></span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <?php if($hasil == 0){?>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url() ?>Booking/ConfirmBooking/<?php echo $list->id_booking ?>">
                          <i class="fa fa-check"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo base_url() ?>Booking/RejectBooking/<?php echo $list->id_booking ?>">
                          <i class="fa fa-close"></i>
                        </a>
                      </li>
					  <?php }else if($hasil == 2){?>
						<li class="list-inline-item">
                       	 	<button class="btn btn-primary" style="background-color:#e1001a;border-radius:40px;" id="myButton">
								Current<br> Booking
                        	</button>
                      	</li>
					  <?php }else if($hasil == 1){?>
					  	<li class="list-inline-item">
                       	 	<button class="btn btn-danger" style="background-color:#e1001a;border-radius:40px;">Rejected</button>
                      	</li>
					  <?php }else{?>
						<li class="list-inline-item">
                       	 	<button class="btn btn-primary" style="background-color:#e1001a;border-radius:40px;">Done</button>
                      	</li>
					  <?php }?>
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
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "<?php echo base_url(). 'Booking/CurrentBooking'?>";
    };
</script>
</html>