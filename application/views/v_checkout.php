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


//  hitung manual barang
$arr = array();
$count = 0;
$sum = 0;
foreach($cart as $a){
    $arr[$count] = array(
        'id'=> $a->id_barang,
        'price'=>$a->harga_barang,
        'quantity'=>$a->jumlah_barang,
        'name'=>$a->nama_barang,
    );
    $sum = $sum + ($a->jumlah_barang * $a->harga_barang);
    $count++; 
}



if($promo > 0){
    $discount = intval($sum) * intval($promo) / 100;

    $promocounter = $count;
    $arr[$promocounter] = array(
        'id'=> $rowPromo['id_promo'],
        'price'=>($discount * -1),
        'quantity'=> 1,
        'name'=>"Discount ".$promo."%",
    );
    
    $gross_amount = intval($sum) - $discount;
}else{
    $gross_amount = $sum;
}


// Optional (contoh)
// $item1_details = array(
//     'id' => 'a1',
//     'price' => 18000,
//     'quantity' => 3,
//     'name' => "Apple"
// );

// Optional (contoh)
// $item2_details = array(
//     'id' => 'a2',
//     'price' => 20000,
//     'quantity' => 2,
//     'name' => "Orange"
// );

// Optional
$item_details = array();
for($ctr = 0 ; $ctr < count($arr); $ctr++ ){
    $item_details[] = $arr[$ctr];
}
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
foreach($profil as $a){
    $nama = split_name($a->nama_pengguna);
    $billing_address = array(
        'first_name'    => $nama[0],
        'last_name'     => $nama[1],
        'address'       => $a->alamat,
        'city'          => "Jakarta",
        'phone'         => $a->telepon,
        'country_code'  => 'IDN'
    );

    $shipping_address = array(
        'first_name'    => $nama[0],
        'last_name'     => $nama[1],
        'address'       => $a->alamat,
        'city'          => "Jakarta",
        'phone'         => $a->telepon,
        'country_code'  => 'IDN'
    );

    $customer_details = array(
        'first_name'    => $nama[0],
        'last_name'     => $nama[1],
        'email'         => $a->email,
        'phone'         => $a->telepon,
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
    'gross_amount' => $gross_amount, // no decimal allowed for creditcard
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
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">

<style>
    .pro-qty:hover
    {
        cursor:pointer;
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
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop.jpg" >
          
           

          </div>
        
      </div>
      <!-- end slide-item -->
      
  
    </div>

</section>
<!--  Banner End -->

<center>
    <h1 class="font2" style="margin-top:5%;">
        My Cart
    </h1>
</center>

<?php if($this->session->flashdata('message')){?>
    <div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
		<strong><?php echo $this->session->flashdata('message');?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>
<?php }?>

<?php if($cart) {?>  
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
                                    <td class="p-price first-row">Rp. <span id="harga"><?php echo number_format($list->harga_barang, 0, 0, "."); ?></span></td>
                                    <td class="qua-col first-row">
                                        
                                            <div class="pro-qty">
                                                <span class="dec qtybtn" onClick="decrement_quantity('<?php echo $list->id_barang; ?>', '<?php echo $list->harga_barang; ?>')">-</span>
                                                <input type="text" id="input-quantity-<?php echo $list->id_barang;?>" value="<?php echo $list->jumlah_barang;?>" style="width:40px;text-align:center">
                                                <span class="inc qtybtn" onClick="increment_quantity('<?php echo $list->id_barang; ?>', '<?php echo $list->harga_barang; ?>')">+</span>
                                            </div>
                                        
                                    </td>
                                    <td class="total-price first-row"><span id="cart-price-<?php echo $list->id_barang;?>">Rp. <?php echo number_format(($list->jumlah_barang*$list->harga_barang), 0, 0, ".");?></span></td>
                                    <td class="close-td first-row"><i class="ti-close"><a href="<?php echo base_url(). 'Shop/removeFromCart/'.$list->id_barang;?>" class="btn" style="position: absolute; right: 0;"></a></i></td>
                                </tr>
                                 <?php $total = $total + ($list->jumlah_barang*$list->harga_barang);}?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-lg-4" style="height: 320px !important;position: sticky;top: 0;padding-top: 10px;">
                    <div class="col-lg-12">
                        <div class="discount-coupon">
                            <h6 class="font2">Discount Codes</h6>
                            <form action="#" id="form_kode_diskon" class="coupon-form">
                                <div class="input-group">
                                    <select class="custom-select" id="kode_diskon">
                                        <option value="0">Don't use discount codes</option>
                                        <?php if($discountCodes){
                                                    $arr = [
                                                        1=>10,
                                                        2=>20,
                                                        3=>30,
                                                    ];
                                                    foreach($discountCodes as $a){?>
                                                        <option value="<?php echo $a->id_promo; ?>"><?php echo $a->kode_promo. " (". $arr[$a->jenis_promo]."%)";?></option>
                                            <?php   }
                                                } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm proceed-btn pay-button btn-danger" type="submit" style="color:#FFF;">Apply</button>
                                    </div>
                                </div>
                                <!-- <input type="" placeholder="Enter your codes">
                                <button type="submit" class="btn site-btn coupon-btn" style="background-color:#e1001a;">Apply</button> -->
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span id="subtotal">Rp. <?php echo number_format($total, 0, 0, ".");?></span></li>
                                <li class="subtotal" style="display: none;" id="li-diskon">Discount <strong id="jumlah_diskon"></strong><span id="hasil_diskon"></span></li>
                                <li class="cart-total">Total <span style="color:#e1001a;" id="total">Rp. <?php echo number_format($total, 0, 0, ".");?></span></li>
                            </ul>
                            <form action="<?php echo base_url(). 'Shop/process_checkout'?>" method="post">
                                <input type="hidden" name="total_cart" id="total_cart_hidden" value="<?php echo $total;?>">
                                <input type="hidden" name="promo_value" id="promo_value_hidden" value="0">
                                <input type="hidden" name="promo_id" id="promo_id_hidden" value="0">
                                <button class="proceed-btn pay-button" type="submit" style="background-color:#e1001a;">PROCEED TO CHECK OUT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <?php }else{?>
    <section style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
            <div class="text-center p-5 shadow rounded">
					<h2 class="mb-3">Sorry, your cart is empty.</h2>
					<h4 class="mb-3">Please check our store! We have a lot of stuff for you to see!</h4>
					<a href="<?php echo base_url(). 'Shop'?>" class="btn btn-main">Shop Now</a>			
				</div>
            </div>
		</div>
	</div>
</section>

<?php }?>

<?php
    include('footer.php');
?>


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
<script src='https://app.sandbox.midtrans.com/snap/snap.js' data-client-key='SB-Mid-client-tRXlSX7W2n9rJF1m'></script>
<script>
// SnapToken acquired from previous step 
snap.pay('<?php echo $snapToken; ?>', {
    onSuccess: function(result){
        /* You may add your own js here, this is just example */ //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    <?php foreach($cart as $a){?>
        $.ajax({
            url : "<?php echo base_url(). 'Shop/paidCart'?>",
            data : "id_pesanan=<?php echo $a->id_pesanan;?>&id_promo=<?php echo $rowPromo['id_promo'];?>",
            type : 'post',
            success : function(response) {
               
            }
        });
    <?php }?>
        location.href = "<?php echo base_url().'Shop/cart';?>";
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

<script type="text/javascript">
// Restricts input for the given textbox to the given inputFilter function.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
$(document).ready(function (){
    setInputFilter(document.getElementById("qty"), function(value) {
        return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });
});


</script>
<script>
function increment_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
}

function decrement_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
}

function save_to_db(cart_id, new_quantity, newPrice) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
	var priceElement = $("#cart-price-"+cart_id);
    $.ajax({
		url : "<?php echo base_url(). 'Shop/updateCart'?>",
		data : "id_barang="+cart_id+"&jumlah_barang="+new_quantity,
		type : 'post',
		success : function(response) {
			$(inputQuantityElement).val(new_quantity);
            $(priceElement).text("Rp. "+numberWithCommas(newPrice));
            var totalItemPrice = 0;
            $("span[id*='cart-price-']").each(function() {
                var cart_price = $(this).text().replace("Rp. ","");
                var price = cart_price.replace(/\./g,"");
                totalItemPrice = parseInt(totalItemPrice) + parseInt(price);
            });
            // $("#subtotal").text("Rp. "+numberWithCommas(totalItemPrice));
            // $("#total").text("Rp. "+numberWithCommas(totalItemPrice));
            // $("#total_cart_hidden").val(totalItemPrice);

            // if(1 == 2){

            // }
            // else{
            //     $("#subtotal").text("Rp. "+numberWithCommas(totalItemPrice));
            //     $("#total").text("Rp. "+numberWithCommas(totalItemPrice));
            //     $("#total_cart_hidden").val(totalItemPrice);
            // }
            if($('#jumlah_diskon').text().length != 0){
                var cart_discount = $('#jumlah_diskon').text().replace("%)","");
                var num = cart_discount.replace("(","");
                var discount = parseInt(num);
                var price_discount = parseInt(totalItemPrice) * discount / 100;
                var new_total_price = parseInt(totalItemPrice) - parseInt(price_discount);
                $("#subtotal").text("Rp. "+numberWithCommas(totalItemPrice));
                $("#total").text("Rp. "+numberWithCommas(new_total_price));
                $("#hasil_diskon").text("Rp. "+numberWithCommas(price_discount));
                $("#total_cart_hidden").val(new_total_price);
            }else{
                $("#subtotal").text("Rp. "+numberWithCommas(totalItemPrice));
                $("#total").text("Rp. "+numberWithCommas(totalItemPrice));
                $("#total_cart_hidden").val(totalItemPrice);
            }
		}
	});
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
</script>
<script>
$('#form_kode_diskon').on("submit", function (event){
    event.preventDefault();
    $kode = $('#kode_diskon').val();

    $.ajax({
        url :"<?php echo base_url(). 'Shop/applyCode'?>",
        data :"id_promo="+$kode,
        type : "POST",
        dataType: "json",
        success : function(response){
            if($.isEmptyObject(response.error)){
                var cart_price = $('#subtotal').text().replace("Rp. ","");
                var price = cart_price.replace(/\./g,"");
                
                var discount;
                if(response.promo == 1){
                    discount = 10;
                }
                else if(response.promo == 2){
                    discount = 20;
                }
                else if(response.promo == 3){
                    discount = 30;
                }
                else{
                    discount = 0;
                }

                if(discount > 0){
                    var price_discount = parseInt(price) * discount / 100;
                    var new_total_price = parseInt(price) - parseInt(price_discount);
                    $("#li-diskon").css('display','block');
                    $("#jumlah_diskon").text("("+discount+"%)");
                    $("#hasil_diskon").text("Rp. "+numberWithCommas(price_discount));
                    $("#total").text("Rp. "+numberWithCommas(new_total_price));
                    $("#total_cart_hidden").val(new_total_price);
                    $('#promo_value_hidden').val(discount);
                    $('#promo_id_hidden').val(response.id);
                }
                
            }else{
                alert('Code not found!');
            }
        }
    });
});
</script>
</body>
</html>