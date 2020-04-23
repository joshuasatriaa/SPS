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
  <!-- Jquery UI -->
  <link href="<?php echo base_url(); ?>assets/jquery-ui.css" rel = "stylesheet">
  <link href="<?php echo base_url(); ?>assets/jquery-ui.min.css" rel = "stylesheet">

  <!-- Login Stylesheet -->
  <link href="<?php echo base_url() ?>assets/type1/css/style1.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url() ?>assets/type1/images/logo1.png" type="image/x-icon">

  	<style>
		a.hoverstyle:hover
		{
			color: #e10019;
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
			<?php if($member == NULL && $this->session->userdata('email') != null){?>
			<a href="<?php echo base_url().'Shop/membership'?>"><button class="btn btn-dark btn-lg btn-block mb-30">Merchant/Workshop Owner but not a member yet? <br><br>Click to join our membership and get all the exclusive benefits!</button>
			</a>
			<?php }else if($this->session->flashdata('message')){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong><?php echo $this->session->flashdata('message');?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
			<?php }else{?>
			<?php }?>
			<div class="row">
				<?php include('left-shop.php') 
				?> 

				<div class="col-md-9">
					
	
					<div class="product-grid-list">
						<div class="row mt-30 filter_data">
							<?php
											foreach($barang as $list){
												?>
										<!-- product card -->
										<div class="col-sm-12 col-lg-4 col-md-6">
											<div class="product-item bg-light">
												<div class="card">
													<div class="thumb-content">
														<!-- <div class="price">$200</div> -->
														<a href="<?php echo base_url() ?>Shop/ShopDetail/<?php echo $list->id_barang ?>">
														<?php
															echo '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' .base64_encode($list->gambar_barang).'" alt="Card image cap" />';
															?>
														</a>
													</div>
													<div class="card-body" style="position:absolute;bottom:0px;">
														<hr>
														<h4 class="card-title font1"><a class="hoverstyle" href="<?php echo base_url() ?>Shop/ShopDetail/<?php echo $list->id_barang ?>"><?php echo $list->nama_barang ?></a></h4>
														<ul class="list-inline product-meta">
															<li class="list-inline-item">
																<a href="single.html"><i class="fa fa-male"></i><?php echo (substr($list->id_penjual, 0, 4) == "USER") ? $list->nama_pengguna : $list->nama_bengkel ?></a>
															</li>
															<li class="list-inline-item">
																<a href="#"><i class="fa fa-location-arrow"></i><?php echo (substr($list->id_penjual, 0, 4) == "USER") ? $list->alamat_pengguna : $list->alamat ?></a>
															</li>
															<li class="list-inline-item">
																<a href="#"><i class="fa fa-shopping-basket"></i><?php echo $list->stok_barang ?> left !</a>
															</li>
														</ul>
														<p class="card-text">Rp <?php echo number_format($list->harga_barang, 0, ",", "."); ?></p>
													</div>
												</div>
											</div>
										</div>
										<!-- Product end -->
										<?php
											}
											?>
										<!-- Barang non member -->

								
						</div>				
					</div>
				</div>
			</div>
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<!--
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							-->
							<?php
								
								//define berapa page
								$number_of_pages = ceil($totalbarang/$results_per_page);

								//sekarang page berapa
								// determine which page number visitor is currently on
								if (!isset($_GET['page'])) 
								{
									$page = 1;
								} 
								else 
								{
									$page = $_GET['page'];
								}

								// determine the sql LIMIT starting number for the results on the displaying page
								$this_page_first_result = ($page-1)*$results_per_page;
							?>
							<?php
							// angka pagination
							for ($page=1;$page<=$number_of_pages;$page++) 
							{
								//echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
								echo '<li class="page-item"><a class="page-link" href="'. base_url().'Shop?page='.$page.'">'.$page.'</a></li>';
							}
							?>
							<!--
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
							-->
							<!--
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
							-->
						</ul>
					</nav>
				</div>
		
</section>

<?php
	include('footer.php');
?>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/type1/plugins/jQuery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		

		window.addEventListener('load', 
				function() { 
					setInterval(updateChat, 1000, '<?php echo base_url(). 'Chat/update'?>', '<?php echo $this->session->userdata('id_user'); ?>');
				}, false
		);

		window.onscroll = () => {
  			const nav = document.querySelector('#main-nav');
  			if(window.pageYOffset > 10){
				nav.classList.add('scroll');  
			} 
			else {
				nav.classList.remove('scroll');
			}

		};
		
	});


</script>

<!-- CHAT -->
<script type="text/javascript">
var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
    myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
    element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement() {
    var messages = element.find('.messages');
    var textInput = element.find('.text-box');
    element.find('>i').hide();
    element.addClass('expand');
    element.find('.chat').addClass('enter');
    var strLength = textInput.val().length * 2;
    textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    element.off('click', openElement);
    element.find('.header button').click(closeElement);
    element.find('#sendMessage').click(sendNewMessage);
    messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
    element.find('.chat').removeClass('enter').hide();
    element.find('>i').show();
    element.removeClass('expand');
    element.find('.header button').off('click', closeElement);
    element.find('#sendMessage').off('click', sendNewMessage);
    element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
    setTimeout(function() {
        element.find('.chat').removeClass('enter').show()
        element.click(openElement);
    }, 500);
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function sendNewMessage() {
    var userInput = $('.text-box');
    var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

    if (!newMessage) return;

    var messagesContainer = $('.messages');

    messagesContainer.append([
        '<li class="self">',
        newMessage,
        '</li>'
    ].join(''));

    // clean out old message
    userInput.html('');
    // focus on input
    userInput.focus();

    messagesContainer.finish().animate({
        scrollTop: messagesContainer.prop("scrollHeight")
    }, 250);

    $.ajax({
					url: "<?php echo base_url() ?>Chat/sendChatAdmin",
					type:'POST',
					dataType: "json",
					data: {input_pesan:newMessage},
					success: function(data) {
						userInput.focus();
					}
				});
}

function onMetaAndEnter(event) {
    if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
        sendNewMessage();
    }
}

function updateChat(url, receiver){
	var messagesContainer = $('.messages');
	var count = $('.messages li').length;
	var lines = count-1;
	$.ajax({
		type: "POST",
		url: url,
		data: {  
				'function': 'update',
				'state' : lines,
				'receiver' : receiver,
				},
		dataType: "json",
		success: function(data){
			if(data.text){
				//$('.messages').empty();
				for (var i = 0; i < data.text.length; i++) {
					$id = data.text[i].id_pengirim;
					if($id.substring(0,5) == "ADMIN"){
						$nama = "other";
					}
					else{
						$nama = "self";
						}
					$('.messages').append($("<li class='"+$nama+"'>"+ data.text[i].pesan +"</li>"));
				}								  
			}
			document.getElementsByClassName('messages').scrollTop = document.getElementsByClassName('messages').scrollHeight - document.getElementsByClassName('messages').clientHeight;
			console.log("berhasil");
		},
		error: function(xhr, status, error) {
			console.log(xhr.responseText);
		},
	});
   
}
</script>
</html>

