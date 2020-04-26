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

<!-- Shop JS End -->


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