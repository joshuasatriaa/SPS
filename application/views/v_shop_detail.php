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

  <!-- Image Slide CSS from w3schools-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
		color: #FD4;
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
<section class="slider-hero hero-slider  hero-style-1 ">
  
    <div class="swiper-wrapper">
      <!-- start slide-item -->
      <div class="swiper-slide slide-item" style="height:120px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/home5.jpeg" >
          
           

          </div>
        
      </div>
      <!-- end slide-item -->
      
  
    </div>

</section>
<!--  Banner End -->


<section class="section-sm">
	<div class="container">
		
		
		<div class="row">
		
			
			<div class="col-md-12">
			<?php foreach($barang as $list){ ?>
			
			
				<!-- Container Start -->
				<div class="container">
					<div class="row">
						<!-- Left sidebar -->
						<div class="col-md-8">
							<div class="product-details">
								<h1 class="product-title" style="font-family: 'Open Sans', sans-serif;"><?php echo $list->nama_barang ?></h1>
								<div class="product-meta">
									<ul class="list-inline">
										<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">
										<?php
											if($list->nama_pengguna == null)
											{
												echo $list->nama_bengkel;
											}
											else
											{
												echo $list->nama_pengguna;
											}
										?>	

										</a></li>
										<?php if($list->nama_pengguna == null)
										{
											?>
										<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location <a href=""><?php echo $list->alamat ?></a>
										<?php } ?>
									</li>
									</ul>
								</div>

								
								<!-- product slider -->
								
								<div class="w3-content w3-display-container">
									
									<?php foreach($foto as $list) { ?>
									
									<div class="w3-display-container mySlides">
										
										<?php    
                                            echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar_barang).'" width="100%" />';
                                        ?>
									</div>

									<?php } ?>

									<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
									<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

								</div>

								<!-- Script Image Slider-->
								<script>
								var slideIndex = 1;
								showDivs(slideIndex);

								function plusDivs(n) {
								showDivs(slideIndex += n);
								}

								function showDivs(n) {
								var i;
								var x = document.getElementsByClassName("mySlides");
								if (n > x.length) {slideIndex = 1}
								if (n < 1) {slideIndex = x.length}
								for (i = 0; i < x.length; i++) {
									x[i].style.display = "none";  
								}
								x[slideIndex-1].style.display = "block";  
								}
								</script>
								<!-- product slider -->

								<div class="content mt-5 pt-5">
									<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
											aria-selected="true">Product Details</a>
										</li>
										
										<li class="nav-item">
											<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
											aria-selected="false">Reviews</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<h3 class="tab-title" style="font-family: 'Open Sans', sans-serif;">Product Description</h3>
											<p>
												<?php echo $list->keterangan_barang; ?>
											</p>

										</div>
										
										<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
											<h3 class="tab-title">Product Review</h3>
											<div class="product-review">
												<div class="media">
													<!-- Avater -->
													<img src="images/user/user-thumb.jpg" alt="avater">
													<div class="media-body">
														<!-- review -->
														<?php foreach($review as $list1){ ?>
															<!-- Ratings -->
															<div class="ratings">
																<ul class="list-inline">
																	<li class="list-inline-item">
																		<i class="fa fa-star"></i>
																	</li>
																	<li class="list-inline-item">
																		<i class="fa fa-star"></i>
																	</li>
																	<li class="list-inline-item">
																		<i class="fa fa-star"></i>
																	</li>
																	<li class="list-inline-item">
																		<i class="fa fa-star"></i>
																	</li>
																	<li class="list-inline-item">
																		<i class="fa fa-star"></i>
																	</li>
																</ul>
															</div>

														
															<div class="name">
																<h5><?php echo $list1->id_pemberi_rating ?></h5>
															</div>
															<div class="date">
																<p><?php echo $list1->waktu_rating ?></p>
															</div>
															<div class="review-comment">
																<p>
																	<?php echo $list1->keterangan ?>
																</p>
															</div>
															<hr style="background-color:black;margin-left:0%">
														<?php } ?>
														<!-- end review-->
													</div>
												</div>
												<div class="review-submission">
													<h3 class="tab-title">Submit your review</h3>
													<!-- Rate -->
													
													<div class="review-submit">
														<form action="<?php echo base_url()?>Barang/ratingBarang" class="row rating" method="post">
															<!--Stars-->
															<div class="cont">
																<div class="stars">
																	
																	<input class="star star-5" id="star-5-2" type="radio" name="ratingbarang" value = "5"/>
																	<label class="star star-5" for="star-5-2"></label>
																	<input class="star star-4" id="star-4-2" type="radio" name="ratingbarang" value = "4"/>
																	<label class="star star-4" for="star-4-2"></label>
																	<input class="star star-3" id="star-3-2" type="radio" name="ratingbarang" value = "3"/>
																	<label class="star star-3" for="star-3-2"></label>
																	<input class="star star-2" id="star-2-2" type="radio" name="ratingbarang" value = "2"/>
																	<label class="star star-2" for="star-2-2"></label>
																	<input class="star star-1" id="star-1-2" type="radio" name="ratingbarang" value = "1"/>
																	<label class="star star-1" for="star-1-2"></label>
																	
																</div>
															</div>
															<!-- STars -->

															<input type = "hidden" name="idbarang" value = "<?php echo $list->id_barang ?>">
															<div class="col-12">
																<textarea name="keterangan" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
															</div>
															<div class="col-12">
																<button type="submit" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Submit</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?> 

						<?php foreach($barang as $list){ ?>
						<div class="col-md-4">
							<div class="sidebar">
								<div class="widget text-center" >
									
									<h2 style="font-family: 'Open Sans', sans-serif;">Rp <?php echo $list->harga_barang?></h2>
								</div>
								<!-- User Profile widget -->
								<div class="widget user text-center">
								
									<?php
                                            echo '<img class="rounded-circle img-fluid mb-5 px-5 " src="data:image/jpeg;base64,' .base64_encode($list->gambar).'" width="100%" />';   
                                        ?>
								
									<h4 style="font-family: 'Open Sans', sans-serif;"><a href=""><?php if($list->nama_pengguna == null)
											{
												echo $list->nama_bengkel;
											}
											else
											{
												echo $list->nama_pengguna;
											} ?></a></h4>
									
									
									<form action="<?php echo base_url(). 'Shop/addCart'; ?>" method="post">
											<input type="hidden" name="id_barang" value="<?php echo $list->id_barang;?>">
											Amount : <input type="number" name="jumlah_barang" value="1" min="1" max="<?php echo $list->stok_barang;?>" > 
											<ul class="list-inline mt-20">
												<li class="list-inline-item"><a href="<?php echo base_url()?>Chat/checkChatBarang/<?php echo $this->session->userdata('id_user') ?>/<?php echo $list->id_penjual ?>" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
												<?php if($this->session->userdata('id_user')){?>
												<li class="list-inline-item">
													<a><button type="submit" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Buy Item</button></a>
												</li>
												<?php }else{?>
													<li class="list-inline-item"><a class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3 btn-add-cart text-white">Buy Item</a></li>
												<?php }?>
											</ul>
									</form>
								</div>
								
							</div>
						</div>

					</div>
				</div>
				<!-- Container End -->


			<?php } ?> 
				
				
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
<script src="<?php echo base_url() ?>assets/type1/js/script1.js"></script>

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

<!-- Star Rating Script -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>

<!-- Shop JS End -->

<script type="text/javascript">
/*$(document).ready(function() {
	    $(".btn-submit").click(function(e){
	    	e.preventDefault();
			var id = "<?php //echo $barang->id_barang ?>" ;
	    	
			
	        $.ajax({
	            url: "<?php //echo base_url() ?>Shop/cart",
	            type:'POST',
	            dataType: "json",
	            data: {id:id},
	            success: function(data) {
					
	                if($.isEmptyObject(data.error)){
						$('#successModal').modal('show');
						
	                }else{
						$('#failModal').modal('show');
	                }
					
	            }
	        });


	    }); 
	}); */
</script>
<script>
$(document).ready(function(){
	$(".btn-add-cart").click(function(e){
		const modal = document.querySelector(".modal");
		modal.classList.add("is-open");
  		body.style.overflow = "hidden";
	});

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

</body>
</html>