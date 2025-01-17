<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Chat</title>

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
    .bubbleWrapper {
        padding: 10px 100px;
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        align-self: flex-end;
        color: #fff;
    }
    .inlineContainer {
        display: inline-flex;
    }
    .inlineContainer.own {
        flex-direction: row-reverse;
    }
    .inlineIcon {
        width:20px;
        object-fit: contain;
    }
    .ownBubble {
        min-width: 60px;
        max-width: 700px;
        padding: 14px 18px;
        margin: 6px 8px;
        background-color: #5b5377;
        border-radius: 16px 16px 0 16px;
        border: 1px solid #443f56;
    
    }
    .otherBubble {
        min-width: 60px;
        max-width: 700px;
        padding: 14px 18px;
        margin: 6px 8px;
        background-color: #e1001a;
        border-radius: 16px 16px 16px 0;
        border: 1px solid #e1001a;
    
    }
    .own {
        align-self: flex-end;
    }
    .other {
        align-self: flex-start;
    }
    span.own,
    span.other{
        font-size: 14px;
        color: white;
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
      <div class="swiper-slide slide-item" >
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="<?php echo base_url() ?>assets/type1/images/Vshop.jpg" >
            <div class="container">

                <section class="section-sm">
	                <div class="container" >
                        <div style="height:420px;width:80%;margin-left:10%;margin-right:10%;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                            <?php foreach($chat1 as $list) {?>
                                <?php if($list->id_pengirim == $this->session->userdata('id_user')){?>
                                    <div class="bubbleWrapper font2">
                                        <div class="inlineContainer">
                                            <img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
                                            <div class="otherBubble other">
                                                Me<br>
                                                <?php echo $list->pesan ?>
                                            </div>
                                        </div><span class="other"><?php echo date("d F Y H:i",strtotime($list->waktu_kirim)); ?></span>
                                    </div>
                                <?php }else{ ?>
                                    <div class="bubbleWrapper font2">
                                        <div class="inlineContainer own">
                                            <img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
                                            <div class="otherBubble other">
                                                <?php echo $list->nama_penerima ?><br>
                                                <?php echo $list->pesan ?>
                                            </div>
                                        </div><span class="own"><?php echo date("d F Y H:i",strtotime($list->waktu_kirim)); ?></span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                            <!-- Chat -->
                            <section class="page-search">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="advance-search">
                                                <form action="<?php echo base_url()?>Chat/sendChat/<?php echo $idsaya?>/<?php echo $iddia ?>" method="post">
                                                    <div class="form-row" >
                                                        <div class="form-group col-md-8" style="margin-left:10%;">
                                                            <input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="Type a Message" name="input_pesan">
                                                        </div>
                                                            
                                                        <button type="submit" class="btn btn-primary" style="background-color: #e1001a;">Send</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>     
                            <!-- End Chat -->
                    </div>
                </section>
            
            </div>
        </div>
    </div>
    </div>

</section>



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
/*$(document).ready(function() {
	    $(".btn-submit").click(function(e){
	    	e.preventDefault();
			var id = "<?php //echo $barang->id_barang ?>" ;
	    	
			
	        $.ajax({
	            url: "<?php //echo base_url() ?>Shop/cart",
	            type:'POST',
	            dataType: "json",
	            data: {id:id},
	            success: function(data) {
					
	                if($.isEmptyObject(data.error)){
						$('#successModal').modal('show');
						
	                }else{
						$('#failModal').modal('show');
	                }
					
	            }
	        });


	    }); 
	}); */
</script>
<script>
$(document).ready(function(){
	$(".btn-add-cart").click(function(e){
		const modal = document.querySelector(".modal");
		modal.classList.add("is-open");
  		body.style.overflow = "hidden";
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

</body>
</html>