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
      <div class="swiper-slide slide-item" style="height:1200px">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop1.jpeg">
          <!-- <div class="overlay"></div> -->
          <div class="container">

          <!-- Form -->
          <section class="signup">
            <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                    <?php echo $this->session->flashdata('message'); ?>
                        <h2 class="form-title">Edit Item</h2>
                          <?php echo form_open_multipart(base_url().'Barang/updateData');?>
                          <?php foreach($barangEdit as $list) { ?>
                            
                                <input type="hidden" name="id_barang" value="<?php echo $list->id_barang?>">

                                <div class="form-group">
                                  <p>Item Name</p>
                                  <input type="text" name="nama" value="<?php echo $list->nama_barang ?>">
                                  <?php echo form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Description</p>
                                  <input type="text" name="keterangan_barang" value="<?php echo $list->keterangan_barang ?>" />
                                  <?php echo form_error('keterangan_barang', '<small class="text-danger">', '</small>') ?>
                                </div>
                                
                                  <input type="hidden" name="id_penjual" value="<?php echo $list->id_penjual ?>">

                                <div class="form-group">
                                  <p>Item Image</p>
                                  <input type="file" name="userfile[]" size="20" id="userfile" class="mr-sm-2" multiple />
                                  <?php echo form_error('userfile[]', '<small class="text-danger">', '</small>') ?>
                                  <?php echo $error;?>
                                </div>
                                <output id="list"></output>
                                <div class="form-group">
                                  <p>Price</p>
                                  <input type="numbers" name="harga" value="<?php echo $list->harga_barang ?>">
                                  <?php echo form_error('harga', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                  <p>Stock</p>
                                  <input type="numbers" name="stok_barang" value="<?php echo $list->stok_barang ?>">
                                  <?php echo form_error('stok_barang', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group form-button">
                                  <button type="submit" name="signup" id="signup" style="background-color:#e1001a;border-radius:40px;" class="form-submit" value="Add"/>Save Changes </button>
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
    <!-- end swiper-wrapper -->
    <!-- swipper controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  
</section>
<!--  Banner End -->

<?php include('footer.php');?>


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

<script>
function handleFileSelect(evt) {
  while (document.getElementById('list').firstChild) {
    document.getElementById('list').removeChild(document.getElementById('list').firstChild);
  }
  
    
    var files = evt.target.files;

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = 
          [
            '<img style="height: 75px; border: 1px solid #000; margin: 5px" src="', 
            e.target.result,
            '" title="', escape(theFile.name), 
            '"/>'
          ].join('');
          
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('userfile').addEventListener('change', handleFileSelect, false);
</script>
</html>