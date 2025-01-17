<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Current Booking</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

  <style>

.cont {
width: 93%;
max-width: 350px;
text-align: center;
margin: 4% auto;
padding: 30px 0;

color: #EEE;

overflow: hidden;
}

hr {
margin: 20px;
border: none;
border-bottom: thin solid rgba(255,255,255,.1);
}

div.title { font-size: 2em; }

h1 span {
font-weight: 300;
color: #Fd4;
}

div.stars {
width: 270px;
display: inline-block;
}

input.star { display: none; }

label.star {
float: right;
padding: 10px;
font-size: 36px;
color: #444;
transition: all .2s;
}

input.star:checked ~ label.star:before {
content: '\f005';
color: #e1001a;
transition: all .25s;
}

input.star-5:checked ~ label.star:before {
color: #FE7;
text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
content: '\f006';
font-family: FontAwesome;
}
</style>

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
        <h2 style="font-family: 'Open Sans', sans-serif;">Current Booking </h2>
			</div>
		</div>
		
		<div class="row">
			<?php
				include('left-booking.php')
			?>
			<div class="col-md-9">
				
                <div class="widget dashboard-container my-adslist">
          
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Services</th>
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
                  <span><strong style="padding-left:20px">Date : </strong><time><?php echo date("d F Y, H:i",strtotime($list->waktu_service)); ?></time> </span>
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
                   <?php $bintang = $list->rating_bengkel ?>

                   
                   <?php if($hasil == 3){ ?>
                        <span><strong style="padding-left:20px">Rate : </strong>
                        
                            <li class="list-inline-item "><i class="fa <?php if($bintang>=1){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                            <li class="list-inline-item "><i class="fa <?php if($bintang>=2){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                            <li class="list-inline-item "><i class="fa <?php if($bintang>=3){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                            <li class="list-inline-item "><i class="fa <?php if($bintang>=4){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                            <li class="list-inline-item "><i class="fa <?php if($bintang>=5){echo 'fa-star';}else{echo 'fa-star-o';}?>"></i></li>
                   <?php } ?>
                </td>
                <td>
                <?php if($hasil == 3){ ?>
                      <button class="btn btn-primary" style="background-color:#e1001a;border-radius:40px;" onclick="document.getElementById('id01').style.display='block'">Rate</button>

                  <!-- Modal -->
                  <div id="id01" class="w3-modal" style="z-index:999">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                      <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                        <img src="<?php echo base_url()?>assets/type1/images/Logo.png" style="width:30%" class=" w3-margin-top">
                      </div>

                      <form class="w3-container" action="<?php echo base_url()?>Booking/GoRate" method="POST">
                        <div class="w3-section">
                        <!--Stars-->
															<div class="cont">
                                <input type="hidden" name="idbengkel" value ="<?php echo $list->id_bengkel?>">
                                <input type="hidden" name="idservice" value ="<?php echo $list->id_service?>">
                                <h3 class="font2">
                                  Rate Your Experience !
                                </h3>
																<div class="stars">
																	
																	<input class="star star-5" id="star-5-2" type="radio" name="rating" value = "5"/>
																	<label class="star star-5" for="star-5-2"></label>
																	<input class="star star-4" id="star-4-2" type="radio" name="rating" value = "4"/>
																	<label class="star star-4" for="star-4-2"></label>
																	<input class="star star-3" id="star-3-2" type="radio" name="rating" value = "3"/>
																	<label class="star star-3" for="star-3-2"></label>
																	<input class="star star-2" id="star-2-2" type="radio" name="rating" value = "2"/>
																	<label class="star star-2" for="star-2-2"></label>
																	<input class="star star-1" id="star-1-2" type="radio" name="rating" value = "1"/>
																	<label class="star star-1" for="star-1-2"></label>
																	
																</div>
															</div>
															<!-- STars -->
                          <label><b>Comments</b></label>
                          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Any Comments ?" name="keterangan">
                        </div>
                      

                      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <!--<button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>-->
                        <span class="w3-right w3-padding w3-hide-small">
                          <button class="btn btn-primary" type ="submit" style="background-color:#e1001a;border-radius:40px;">Submit</button>
                        </span>
                      </div>
                      </form>
                    </div>
                  </div>
                   
                  <?php } ?>
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
                <!-- 
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
                -->
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

</html>