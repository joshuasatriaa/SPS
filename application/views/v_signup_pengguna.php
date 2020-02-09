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
            

            <!-- Sign Up start -->
            <!-- Sign up form -->
            <section class="signup">
              <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                      <h2 class="form-title">Sign Up</h2>  
                      <?php echo form_open_multipart(base_url().'Signup_pengguna/insertData');?>
                
                        <fieldset>
                          <div class="form-group">
                            <input type="hidden" id="id" name="user_id" value="USER-<?php echo $count+1 ?>" readonly>
                            <input type="text" id="name" name="user_name" value="<?php echo set_value('user_name');?>" placeholder="Name">
                            <?php echo form_error('user_name', '<small class="text-danger">', '</small>') ?>
                            </div>

                          <div class="form-group">
                            <input type="email" id="email" name="user_email" value="<?php echo set_value('user_email');?>" placeholder="Email">
                            <?php echo form_error('user_email', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <input type="password" id="password" name="user_password" placeholder="Password" class=>
                            <?php echo form_error('user_password', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <input type="password" id="password" name="user_password2" placeholder="Confirm Password" class=>
                            <?php echo form_error('user_password', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <p> Choose Sex </p>
                            <select data-placeholder="Your Sex" class="standardSelect" tabindex="1"name="user_gender" id="gender">
                              <option value="" <?php echo set_select('user_gender','0', ( !empty($gender) && $gender == "1" ? TRUE : FALSE )); ?>>Choose Sex</option>
                              <option value="1" <?php echo set_select('user_gender','1', ( !empty($gender) && $gender == "1" ? TRUE : FALSE )); ?>>Male</option>
                              <option value="2" <?php echo set_select('user_gender','2', ( !empty($gender) && $gender == "2" ? TRUE : FALSE )); ?>>Female</option>
                            </select>
                            <?php echo form_error('user_gender', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">  
                            <p>Birth Date:</p>
                            <input type="date" id="birthdate" name="user_birthdate" value="<?php echo set_value('user_birthdate');?>">
                            <?php echo form_error('user_birthdate', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <input type="text" id="birthplace" name="user_birthplace" value="<?php echo set_value('user_birthplace');?>" placeholder="Birth Place">
                            <?php echo form_error('user_birthplace', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <input type="text" id="address" name="user_address" value="<?php echo set_value('user_address');?>" placeholder="Address">
                            <?php echo form_error('user_address', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                            <input type="number" id="phonenumber" name="user_phonenumber" value="<?php echo set_value('user_phonenumber');?>" placeholder="Phone Number">
                            <?php echo form_error('user_phonenumber', '<small class="text-danger">', '</small>') ?>
                          </div>

                          <div class="form-group">
                              <p> Profile Pictures </p>
                              <input type="file" name="userfile" size="20" class="mr-sm-2" />
                            </div>
                            <?php echo form_error('userfile', '<small class="text-danger">', '</small>') ?>
                            <?php echo $error;?>
                        </fieldset>
                        <button type="submit" class="form-submit">Sign Up</button>
                      </form>
                      </div>
                      <div class="signup-image">
                      <figure><img src="<?php echo base_url() ?>assets/type1/images/signup4.png" ></figure>
                    </div>
                  </div>
                </div>
              </section>
            
            <!-- Sign Up end -->
           
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

</html>