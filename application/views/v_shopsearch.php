<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Shop</title>

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
<div class="">
        <div class="searchbar" style="background-image: url('<?php echo base_url() ?>assets/type1/images/Vshop.jpg')">
          	<div class="container">
		 	 	<section class="page-search">
					<div class="col-md-12">
						
						<!-- Advance Search -->
						<div class="advance-search">
							<form action="<?php echo base_url(). 'Shop/searchBarang'?>" method="post">
								<div class="form-row" style="padding-left:25%;">
									<div class="form-group col-md-6">
										<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for" name="nama_barang">
									</div>						
									<button type="submit" class="btn btn-primary" style="background-color:#e10019;">Search</button>
								</div>	
							</form>
						</div>

					</div>
				</section>     
          	</div>
        </div> 
    </div>
<!-- Banner End -->


<div class="body">	
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom:10px;">
				
					<h2 style="font-family: 'Open Sans', sans-serif;">Results For "<?php echo $hasils; ?>"</h2>
					<p><?php echo $jumlah; ?> Results on <?php echo date("d F Y") ?></p>
				
			</div>
		</div>
		
		<div class="row">
		<?php include('left-shop.php') 
			?> 

			<div class="col-md-9">

				<div class="product-grid-list">
					<div class="row mt-30">
						<?php
							foreach($barang as $list){
						?>
						<!-- product card -->
						<div class="col-sm-12 col-lg-4 col-md-6">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
									<a href="<?php echo base_url() ?>Shop/ShopDetail/<?php echo $list->id_barang ?>">
										<?php
                                            
                                            echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar_barang).'" alt="Card image cap" />';
                                            
                                        ?>
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.html"><?php echo $list->nama_barang ?></a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-male"></i><?php echo $list->nama_pengguna ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-calendar"></i><?php echo $list->waktu_add ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-shopping-basket"></i><?php echo $list->stok_barang ?> left !</a>
											</li>
										</ul>
										<p class="card-text">Rp <?php echo $list->harga_barang ?></p>
									</div>
								</div>
							</div>
						</div>
						<!-- Product end -->
						<?php
							}
						?>
						</div>
						
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<!--Footer start -->

<?php
	include('footer.php');
?>

<!-- Footer  End -->


<!-- Login Ajax -->
<script type="text/javascript">


	$(document).ready(function() {

		function filter_data(minimum_price, maximum_price){
			
			$.ajax({
				url:"<?php echo base_url(). 'Shop/filterSearch';?>",
				type:"GET",
				dataType: "json",
				data:{minimum_price:minimum_price, maximum_price:maximum_price},
				success:function(data){
					$output = "";
					for($i = 0; $i < data.length; $i++){
						var nama = (data[$i].nama_bengkel == null) ? data[$i].nama_pengguna :data[$i].nama_bengkel;
						var alamat = (data[$i].alamat == null) ? data[$i].alamat_pengguna :data[$i].alamat;
						$output += "<div class='col-sm-12 col-lg-4 col-md-6'><div class='product-item bg-light'><div class='card'><div class='thumb-content'><a href='<?php echo base_url() ?>Shop/ShopDetail/"+data[$i].id_barang+"'><img class='card-img-top img-fluid' src='data:image/jpeg;base64,"+data[$i].gambar_barang+"' alt='Card image cap' /> </a></div><div class='card-body'><h4 class='card-title'><a href='<?php echo base_url() ?>Shop/ShopDetail/"+data[$i].id_barang+"'>"+data[$i].nama_barang+"</a></h4><ul class='list-inline product-meta'><li class='list-inline-item'><a href='single.html'><i class='fa fa-male'></i>"+nama+"</a></li><li class='list-inline-item'><a href='#'><i class='fa fa-calendar'></i>"+alamat+"</a></li><li class='list-inline-item'><a href='#'><i class='fa fa-shopping-basket'></i>"+data[$i].stok_barang+" left !</a></li></ul><p class='card-text'>Rp."+addCommas(data[$i].harga_barang)+"</p></div></div></div></div>";
					}
					$('.filter_data').html($output);
					
				}
			});
		}
		
		function addCommas(nStr) {
			nStr += '';
			var x = nStr.split('.');
			var x1 = x[0];
			var x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}
		$('#price_range').slider({
			range:true,
			min:10000,
			max:10000000,
			values:[10000,10000000],
			step:10000,
			slide:function(event,ui)
			{
				$('#price_show').html(addCommas(ui.values[0]) + ' - ' + addCommas(ui.values[1]));
				$('#minimum_price').val(addCommas(ui.values[0]));
				$('#maximum_price').val(addCommas(ui.values[1]));
				$('#hidden_minimum_price').val(ui.values[0]);
            	$('#hidden_maximum_price').val(ui.values[1]);	
				$('.filter_data').empty();
				filter_data(ui.values[0], ui.values[1]);		
			},

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

</html>