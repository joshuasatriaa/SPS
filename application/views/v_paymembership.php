<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../../midtrans-php-master/Midtrans.php';

//Set Your server key
Config::$serverKey = "SB-Mid-server-WSw3DC8IrsG8INjSlWvinCcD";

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

if($myMember != null){

	// Optional (contoh)
	 $item1_details = array(
		'id' => $checkmember['id_membership'],
		'price' => 150000,
		'quantity' => 1,
		'name' => "Monthly Subcription Bengcool Membership"
	);


}
else{
	// Optional (contoh)
	$item1_details = array(
		'id' => 'MBR-'.$this->session->userdata('id_user').'-1',
		'price' => 150000,
		'quantity' => 1,
		'name' => "Monthly Subcription Bengcool Membership"
	);
}

// Optional (contoh)
// $item2_details = array(
//     'id' => 'a2',
//     'price' => 20000,
//     'quantity' => 2,
//     'name' => "Orange"
// );

// Optional
$item_details = array($item1_details);

//$item_details = array ($item1_details, $item2_details);

// Optional
$billing_address = array();
$shipping_address = array();
$customer_details  =array();

function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}

$text = substr($this->session->userdata('id_user'),0,4);
if($text == "USER"){
		$nama = split_name($profil['nama_pengguna']);

		$billing_address = array(
			'first_name'    => $nama[0],
			'last_name'     => $nama[1],
			'address'       => $alamat,
			'phone'         => $profil['telepon'],
			'country_code'  => 'IDN'
		);
	
		$customer_details = array(
			'first_name'    => $nama[0],
			'last_name'     => $nama[1],
			'email'         => $profil['email'],
			'phone'         => $profil['telepon'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);
}
else{
		$billing_address = array(
			'first_name'    => $profil['nama_bengkel'],
			'last_name'     => '',
			'address'       => $alamat['alamat'],
			'phone'         => $profil['telepon'],
			'country_code'  => 'IDN'
		);
	
		$customer_details = array(
			'first_name'    => $profil['nama_bengkel'],
			'last_name'     => '',
			'email'         => $profil['email'],
			'phone'         => $profil['telepon'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);
}
    
    

// $billing_address = array(
//     'first_name'    => "Andri",
//     'last_name'     => "Litani",
//     'address'       => "Mangga 20",
//     'city'          => "Jakarta",
//     'postal_code'   => "16602",
//     'phone'         => "081122334455",
//     'country_code'  => 'IDN'
// );

// Optional
// $shipping_address = array(
//     'first_name'    => "Obet",
//     'last_name'     => "Supriadi",
//     'address'       => "Manggis 90",
//     'city'          => "Jakarta",
//     'postal_code'   => "16601",
//     'phone'         => "08113366345",
//     'country_code'  => 'IDN'
// );

// Optional
// $customer_details = array(
//     'first_name'    => "Andri",
//     'last_name'     => "Litani",
//     'email'         => "andri@litani.com",
//     'phone'         => "081122334455",
//     'billing_address'  => $billing_address,
//     'shipping_address' => $shipping_address
// );

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card','gopay','bca_va');

// Required
$today = getdate();
$transaction_details = array(
    'order_id' => $this->session->userdata('id_user')."".$today['mday']."".$today['mon']."".$today['year']."".$today['hours']."".$today['minutes']."".$today['seconds'],
    'gross_amount' => 150000, // no decimal allowed for creditcard
);

// Fill transaction details
$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
//echo "snapToken = ".$snapToken;

//buat tes pembayaran
//pakai credit card
//Card Number: 4811 1111 1111 1114 
// CVV: 123 
// Expiry: <any future date>

// pakai VA
// untuk bca : https://simulator.sandbox.midtrans.com/bca/va/index

//pakai gopay atau QRIS
// test disini : https://simulator.sandbox.midtrans.com/gopay/ui/index 

?>
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
  <!-- Jquery UI -->
  <link href="<?php echo base_url(); ?>assets/jquery-ui.css" rel = "stylesheet">
  <link href="<?php echo base_url(); ?>assets/jquery-ui.min.css" rel = "stylesheet">

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
<section class="">
  
    <div class="">
      <!-- start slide-item -->
      <div class="">
        <div class="searchbar" style="background-image: url('<?php echo base_url() ?>assets/type1/images/Vshop.jpg')">
          <div class="container">
			
		 	 <section class="page-search">
				<div class="container">
					
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
<div class="body">
<?php if($checkmember == null){?>
<section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="text-center p-5 shadow rounded">
					<h2 class="mb-3 font2">Membership</h2>
					<h4 class="mb-3 font2">To get access to all the feature we provide for customer members </h4>
					<h4 class="font2">Why go member?</h4>
					<ul class="list-unstyled mb-4">
						<li>Full Ads Support</li>
						<li>Free and easy to use</li>
						<li>Pay only when needed</li>
						<li>Analytics</li>
						<li>Subscription-based payment</li>
					</ul>
					<form action="<?php echo base_url(). 'Shop/paymembership'?>" method="post">
						<button class="btn btn-main pay-button" type="submit" style="background-color:#e10019;border-radius:30px;">Become Member</button>			
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }else{?>
	<section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="text-center p-5 shadow rounded">
					<h2 class="mb-3">Renew Membership</h2>
					<h4 class="mb-3">We have detected that you had been our member before. <br> Your latest membership ends in <?php echo date("d F Y", strtotime($checkmember['tanggal_selesai']))?>.</h4>
					<h4>Renew your membership?</h4>
					<form action="<?php echo base_url(). 'Shop/paymembership'?>" method="post">
						<button class="btn btn-main pay-button" type="submit" style="background-color:#e10019;border-radius:30px;">Become Member</button>			
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<?php }?>
<!--Footer start -->

<?php
	include('footer.php');
?>

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
<script src="<?php echo base_url() ?>assets/jquery-ui.min.js"></script>
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
<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-tRXlSX7W2n9rJF1m"></script> 
<!-- Shop JS End -->
<!-- <script>
jQuery(function()
{		
	// function untuk mengambil semua data
	function getAll()
	{
		$.ajax({
			url: 'ProductController.php',
			data: 'action=show-all',
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#show-product").html(response);
			}
		});			
	}
	
	getAll(); // load ketika document ready

	// ketika ada event change
	$("#getProduct").change(function()
	{				
		var id = $(this).find(":selected").val();
		var dataString = 'action='+ id;
				
		$.ajax({
			url: 'ProductController.php',
			data: dataString,
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#show-product").html(response);
			} 
		});
	})
});
</script>
-->

<!-- Login Ajax -->
<script type="text/javascript">


	$(document).ready(function() {
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

<script src='https://app.sandbox.midtrans.com/snap/snap.js' data-client-key='SB-Mid-client-tRXlSX7W2n9rJF1m'></script>
<script>
// SnapToken acquired from previous step 
snap.pay('<?php echo $snapToken; ?>', {
    onSuccess: function(result){
        /* You may add your own js here, this is just example */ //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
	<?php 
	if($myMember != null){
	?>
			$.ajax({
				url : "<?php echo base_url(). 'Shop/payMember'?>",
				data : "id_member=<?php echo $checkmember['id_membership'];?>",
				type : 'post',
				success : function(response) {
				
				}
			});
	<?php }
	else{?>
			$.ajax({
				url : "<?php echo base_url(). 'Shop/payMember'?>",
				data : "id_member=<?php echo 'MBR-'.$this->session->userdata('id_user').'-1';?>",
				type : 'post',
				success : function(response) {
				
				}
			});
	<?php } ?>
        location.href= "<?php echo base_url(). 'Shop/index'?>";
    },
    // Optional
    onPending: function(result){
        /* You may add your own js here, this is just example */ //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    },
    // Optional
    onError: function(result){
        /* You may add your own js here, this is just example */ //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    }
});
</script>


</html>

