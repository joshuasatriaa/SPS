<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Add Items</title>

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
      <div class="swiper-slide slide-item" style="height:1200px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop1.jpeg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
        
            <a href="<?php echo base_url()?>Shop">
                <span style="position:absolute;left:10%;">
                    <img src="https://image.flaticon.com/icons/svg/481/481117.svg" width="60" style="filter: invert(100%);">  
                </span>
            </a>
          <!-- Sign up form -->
          <section class="signup">
            <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Add Items</h2>
                        <?php echo form_open_multipart(base_url().'Barang/insertData');?>

                            <div class="form-group">
                                <input type="hidden" name="id_penjual" placeholder="Seller ID" readonly value = "<?php echo $this->session->userdata('id_user') ?>"/>
                            </div>

                            <div class="form-group">
                                <p>Item Name</p>
                                <input type="text" name="nama_barang" placeholder="Item Name" value="<?php echo set_value('nama_barang') ?>" />
                                <?php echo form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group">
                                <p>Description</p>
                                <input type="text" name="keterangan_barang" placeholder="Item Description" value="<?php echo set_value('keterangan_barang') ?>" />
                                <?php echo form_error('keterangan_barang', '<small class="text-danger">', '</small>') ?>
                            </div>
			              
                            <div class="form-group">
                                <p>Item Image</p>
                                <input type="file" name="userfile[]" size="20" class="mr-sm-2" multiple />
                                <?php echo form_error('userfile[]', '<small class="text-danger">', '</small>') ?>
                                <?php echo $error;?>
                            </div>

                            
							<div class="form-group">
                                <p>Price</p>
                                <input type="number" id="harga_barang" name="harga_barang" placeholder="Price" value="<?php echo set_value('harga_barang') ?>" />
                                <?php echo form_error('harga_barang', '<small class="text-danger">', '</small>') ?>
                            </div>
			                <div class="form-group">  
                                <p>Stock</p>
                                <input type="number" id="stok_barang" name="stok_barang" placeholder="Stock" value="<?php echo set_value('stok_barang') ?>"/>
                                <?php echo form_error('stok_barang', '<small class="text-danger">', '</small>') ?>
                            </div>
							              
                            <div class="form-group form-button">
                                <button type="submit" name="signup" id="signup" class="form-submit" value="Add" style="background-color:#e1001a;border-radius:40px;" />ADD </button>
                            </div>
                        </form>
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
    <!-- end swiper-wrapper -->
    <!-- swipper controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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