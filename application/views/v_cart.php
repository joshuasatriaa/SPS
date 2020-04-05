<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui.min.css">
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
  <link href="<?php echo base_url()?>assets/type1/css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/type1/images/favicon.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url()?>assets/type1/images/favicon.png" type="image/x-icon">

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


<section class="section-header bg-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <h1 class="text-capitalize mb-4 font-lg text-white">My Cart</h1>
        </div>
      </div>
    </div>
  </div>
</section>
        
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $i = 1;
                                 $total = 0;
                                 foreach($cart as $list) {
                                    ?>
                                <tr>
                                    <td class="cart-pic first-row">
                                    <?php
                                            
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($list->gambar_barang).'" height="100" width="100" alt="Card image cap" />';
                                            
                                        ?>
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo $list->nama_barang; ?></h5>
                                    </td>
                                    <td class="p-price first-row">Rp. <?php //echo $list->harga_barang; ?></td>
                                    <td class="qua-col first-row">
                                        
                                            <div class="pro-qty">
                                                <input type="text" value="1" style="width:40px;text-align:center">
                                            </div>
                                        
                                    </td>
                                    <td class="total-price first-row">$60.00</td>
                                    <td class="close-td first-row"><i class="ti-close"></i></td>
                                </tr>
                                 <?php }?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-lg-4" style="height: 320px !important;position: sticky;top: 0;padding-top: 10px;">
                    <div class="col-lg-12">
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
<?php //if($cart) {?>
<!-- <form action="" method="post">
    <section style="padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all">Select All Item</label>
                        </div>
                        <div>
							<?php 
							// $i = 1;
							// $total = 0;
                            // foreach($cart as $list) {
								?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck<?php //echo $i;?>">
                                    
                                    <label class="custom-control-label" for="customCheck<?php //echo $i;?>">
									<?php 
									// if($list->nama_bengkel == null){
									// 	echo $list->nama_pengguna;
									// }else{
									// 	echo $list->nama_bengkel;
									// } 
									?>
									</label>
									<div class="card">
									-->
										<!-- Delete -->
										<!-- <a href="<?php //echo base_url(). 'Shop/removeFromCart/'.$list->id_barang;?>" class="btn" style="position: absolute; right: 0;">
												<i class="fas fa-times-circle fa-lg"></i>
										</a> -->

										<!-- Edit -->
										<!-- <a href="<?php //echo base_url(). 'Shop/editCart/'.$list->id_barang;?>" class="btn" style="position: absolute; right: 0;padding-right:10%;">
											<i class="fas fa-pen fa-lg"></i>
										</a> -->
										
                                        <?php
                                            
                                            //echo '<img src="data:image/jpeg;base64,' . base64_encode($list->gambar_barang).'" height="100" width="100" alt="Card image cap" />';
                                            
                                        ?>
                                        <!-- <div class="card-body">
                                        <h5 class="card-title"><?php //echo $list->nama_barang?></h5>
                                        <p class="card-text"><?php //echo $list->keterangan_barang?></p>
                                        <p class="card-text">Jumlah yang dibeli = <?php //echo $list->jumlah_barang?> (@ = <?php //echo $list->harga_barang; ?>)</p>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                                <?php //$total += $list->harga_barang*$list->jumlah_barang; }?>
                        </div>
                </div>
                    
                <div class="col-md-4 mx-auto">
                    <div class="p-5 shadow rounded">
                        <h3 class="mb-3">Total : Rp. <?php //echo $total;?></h3>
                        <a href="https://themefisher.com/products/veggie-one-page-responsive-html5-restaurant-website-templates/" target="_blank" class="btn btn-main">Buy</a>			
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>  -->

<?php //}else{?>
    <!-- <section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
            <div class="text-center p-5 shadow rounded">
					<h2 class="mb-3">Sorry, your cart is empty.</h2>
					<h4 class="mb-3">Please check our store! We have a lot of stuff for you to see!</h4>
					<a href="<?php //echo base_url(). 'Shop'?>" class="btn btn-main">Shop Now</a>			
				</div>
            </div>
		</div>
	</div>
</section> -->

<?php //}?>

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

		<div class="row justify-content-center mt-5">
			<div class="col-lg-6 text-center">
				<h4 class="text-white-50 mb-3">Get latest food recipe at your inbox</h4>
				<form action="#" class="footer-newsletter">
					<div class="form-group">
						<button class="button"><span class="ti-email"></span></button>
						<input type="email" class="form-control" placeholder="Enter Email">
					</div>
				</form>
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


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/type1/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery-ui.min.js"></script>
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

<!-- Shop JS End -->
<script type="text/javascript">
$(document).ready(function (){
// Listen for click on toggle checkbox
    $('#select-all').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
    });
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });


});


</script>
</body>
</html>