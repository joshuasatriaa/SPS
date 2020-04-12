<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Edit Profile</title>

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

          <!-- Form -->
          <section class="signup">
            <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Edit Profile</h2>
                        <?php echo $this->session->flashdata('message'); ?>
                          <form action="<?php echo base_url().'Edit_profile/updateData'?>" method="POST" novalidate="novalidate">
                          <?php foreach($pengguna as $list) { ?>
                            
                                <input type="hidden" name="user_id" value="<?php echo $list->id_pengguna?>">

                                <div class="form-group">
                                  <p>Name</p>
                                  <input type="text" id="name" name="user_name" value="<?php echo $list->nama_pengguna ?>">
                                  <?php echo form_error('user_name', '<small class="text-danger">', '</small>') ?>  
                                </div>
                                
                                <div class="form-group">
                                  <p>Email</p>
                                  <input type="email" id="email" name="user_email" value="<?php echo $list->email ?>">
                                  <?php echo form_error('user_email', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Gender<p>
                                  <select data-placeholder="Your Gender" class="standardSelect form-control" tabindex="1"name="user_gender" id="gender">
                                    <option value="1" <?php echo ($list->jenis_kelamin == 1 ? "selected" : "") ?>>Laki - Laki</option>
                                    <option value="2" <?php echo ($list->jenis_kelamin == 2 ? "selected" : "") ?>>Perempuan</option>
                                  </select>
                                  <?php echo form_error('user_gender', '<small class="text-danger">', '</small>') ?>
                                </div>
                                
                                <div class="form-group">
                                  <p>Birth Date</p>
                                  <input type="date" id="birthdate" name="user_birthdate" value="<?php echo $list->tanggal_lahir ?>">
                                  <?php echo form_error('user_birthdate', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Birth Place</p>
                                  <input type="text" id="birthplace" name="user_birthplace" value="<?php echo $list->tempat_lahir ?>">
                                  <?php echo form_error('user_birthplace', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Address</p>
                                  <input type="text" id="address" name="user_address" value="<?php echo $list->alamat ?>">
                                  <?php echo form_error('user_address', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Phone Number</p>
                                  <input type="number" id="phonenumber" name="user_phonenumber" value="<?php echo $list->telepon ?>">
                                  <?php echo form_error('user_phonenumber', '<small class="text-danger">', '</small>') ?>
                                </div>
                                
                                <div class="form-group form-button">
                                  <button type="submit" name="signup" id="signup" class="form-submit" value="Add" style="background-color:#e10019;border-radius:30px;"/>Confirm Edit </button>
                                </div>
                              
                            </form>
                            <?php } ?>
                    
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url() ?>assets/type1/images/signup-image.jpg" ></figure>

                    </div>
                </div>
            </div>
         </section>

            
           
          </div>
        </div> 
      </div>
      <!-- end slide-item -->
      
  
    </div>
    
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