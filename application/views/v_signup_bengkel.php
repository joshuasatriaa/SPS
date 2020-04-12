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
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">

            <!-- Sign Up start -->
            <!-- Sign up form -->
            <section class="signup">
              <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        
                        <?php echo form_open_multipart(base_url().'Signup_bengkel/insertData');?>
                          <fieldset>  
                            <div class="form-group">
                              <input type="text" id="name" name="user_name" value="<?php echo set_value('user_name');?>" placeholder="Workshop/Garage Name">
                              <?php echo form_error('user_name', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                              <input type="email" id="email" name="user_email" value="<?php echo set_value('user_email');?>" placeholder="Workshop/Garage Email">
                              <?php echo form_error('user_email', '<small class="text-danger">', '</small>') ?>
                            </div>
                    
                            <div class="form-group">
                              <input type="password" id="password" name="user_password" placeholder="Password">
                              <?php echo form_error('user_password', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                              <input type="password" id="password" name="user_password2" placeholder="Confirm Password">
                              <?php echo form_error('user_password', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                              <p>Open Time:</p>
                              <input type="time" id="opentime" name="user_opentime" value="<?php echo set_value('user_opentime');?>">
                              <?php echo form_error('user_opentime', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                              <p>Close Time:</p>
                              <input type="time" id="closetime" name="user_closetime" value="<?php echo set_value('user_closetime');?>">
                              <?php echo form_error('user_closetime', '<small class="text-danger">', '</small>') ?>
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
                          <div class="form-group form-button">
                            <button type="submit" class="form-submit" style="background-color:#e1001a;border-radius:40px;">Sign Up</button>
                          </div>
                        </form>
                      </div>
                      <div class="signup-image">
                      <figure><img src="<?php echo base_url() ?>assets/type1/images/signup4.png" ></figure>
                    </div>
                  </div>
                </div>
              </section>
            <!-- Sign Up end -->
             
</section>
<!--  Banner End -->
<!-- Footer Start

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