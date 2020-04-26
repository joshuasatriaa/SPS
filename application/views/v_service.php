<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>BengCool - Book Services</title>

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

<!-- Login Modal -->
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
							<form action="<?php echo base_url(). 'Booking/searchBengkel'?>" method="post">
								<div class="form-row" style="padding-left:25%;">
									<div class="form-group col-md-6">
										<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="Search for BengCool Partners" name="nama_barang">
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
				
				<h2 style="font-family: 'Open Sans', sans-serif;">BengCool Partner </h2>
					<p><?php echo $jumlah; ?> Partner on <?php echo date("d F Y")?></p>
				</div>
			
		</div>
		<div class="row">
			<?php
				include('left-booking.php');
			?>
			<div class="col-md-9">
				
				<div class="product-grid-list">
					<div class="row mt-30">
						<?php
							foreach($bengkels as $list){
						?>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<img class="card-img-top img-fluid" src="<?php echo base_url() ?>assets/type1/images/home4.jpg" alt="Card image cap">
									</div>
									<div class="card-body">
										<a href="<?php echo base_url() ?>Booking/ProfileBengkel/<?php echo $list->id_bengkel ?>">
											<h4 class="card-title font2">
												<?php echo $list->nama_bengkel ?>
											</h4>
										</a>
										
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a><i class="fa fa-envelope-open"></i><?php echo $list->email ?></a>
											</li>
											<li class="list-inline-item">
												<a><i class="fa fa-comments"></i><?php echo $list->telepon ?></a>
											</li>
											
											<li class="list-inline-item">
												<a><i class="fa fa-location-arrow"></i><?php echo $list->alamat ?></a>
											</li>
										</ul>
										<a href="<?php echo base_url()?>Booking/Booking/<?php echo $list->id_bengkel ?>">
											<p class="card-text">
												<button class="form-control">Book Service</button>
											</p>
										</a>
									</div>
								</div>
							</div>
 						</div>
						 <!-- product end -->
						 <?php
								}
							?>
						</div>
						<!-- Modal -->
						<!-- <div class="modal fade" id="inputDosen" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Dosen/insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                <input type="text" class="form-control" placeholder = "NIDN" name="nidn">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                <input name="nama_dosen" type="text" class="form-control" placeholder = "Nama Dosen">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Kelamin</label><br>
                                                <select data-placeholder="Pilih Jenis Kelamin" class="standardSelect form-control" tabindex="1" name="jenis_kelamin">
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                <input  name="email" type="text" class="form-control" placeholder = "Email">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input name="password" type="password" class="form-control cc-name valid" placeholder = "Password">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                <input id="cc-name" name="password2" type="password" class="form-control cc-name valid" placeholder = "Konfirmasi Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Dosen</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect form-control" tabindex="1" name="tipe_dosen">
                                                    <option value="3">Dosen Reguler</option>
                                                    <option value="2">Dosen Pembimbing Akademik</option>
                                                    <option value="1">Kepala Program Studi</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                <input id="cc-name" name="tmpt_lahir" type="text" class="form-control cc-name valid" placeholder = "Tempat Lahir">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tanggal Lahir</label>
                                                <input id="cc-name" name="tgl_lahir" type="date" class="form-control cc-name valid" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Alamat</label>
                                                <input id="cc-name" name="alamat" type="text" class="form-control cc-name valid" placeholder = "Alamat">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">No Telepon</label>
                                                <input id="cc-name" name="no_telp" type="text" class="form-control cc-name valid" placeholder = "No Telepon">
                                            </div>
                                            <div class="form-group has-success">
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Agama</label><br>
                                                <select data-placeholder="Pilih Agama" class="standardSelect form-control" tabindex="1" name="agama">
                                                    <option value="1">Kristen</option>
                                                    <option value="2">Katolik</option>
                                                    <option value="3">Islam</option>
                                                    <option value="4">Buddha</option>
                                                    <option value="5">Hindu</option>
                                                    <option value="6">Kong Hu Cu</option>
                                                </select>
                                            </div>
                                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div> -->
						
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
								echo '<li class="page-item"><a class="page-link" href="'. base_url().'Booking?page='.$page.'">'.$page.'</a></li>';
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