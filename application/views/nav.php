<header class="navigation">
	<nav class="navbar navbar-expand-lg main-nav py-lg-3 position-fixed w-100" id="main-nav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url()?>Home">
				<img src="<?php echo base_url()?>assets/type1/images/logo.png" width="300px" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation"
				aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<?php
				$bengkel = "BID";
				$user = "USER";
				$admin = "ADMN";
			?>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>Home">Home</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Shop">Shop</a></li>
					<?php 
						if($this->session->userdata('tipe_user') == $bengkel) {
							?>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Service">Service</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Booking/CheckBooking">Booking</a></li>
					<?php
						}
						?>
					<?php 
						if($this->session->userdata('tipe_user') == $user) {
							?>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Booking">Booking</a></li>
					<?php
						}
						?>
					<li class="nav-item"><a class="nav-link" href="gallery.html">Forum</a></li>
					<!--
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
							<span class="ho1">nama</span>
						</a>
					</li>
					-->
                    

					<!-- buat LogOut -->
					<?php if($this->session->userdata('email') != null) {?>
						<li class="nav-item">
							<a class="nav-link modal-button">
								<span class="ho1"> <?php echo $this->session->userdata('nama') ?> </span>
							</a>
						</li>
					<?php }else{ ?>
						<li class="nav-item"><a class="nav-link modal-button">LogIn</a></li>
					<?php } ?>

					<!-- Shopping Cart -->
					<?php if($this->session->userdata('tipe_user') == $user){ ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url()?>Shop/cart">
							<i class="fas fa-shopping-cart"></i>
							<span class='badge badge-warning' id='lblCartCount'><?php echo $countCart?></span>
						</a>
					</li>
					
					<?php } ?>
					
					<!-- Chat -->
					<?php if($this->session->userdata('email') != null) {?>
					<li class="nav-item">
					<div class="dropdown">
						<a class="nav-link" data-toggle="dropdown">
							<i class="fas fa-comments"></i>
							<span class='badge badge-warning' id='lblCartCount'>0</span>
						</a>

						<!-- ISI -->
						<ul class="dropdown-menu">
								<?php 
								if($notif){
										foreach($notif as $list){
									?>
								<li class="nav-item">
									<small class="float-right"><?php echo date('d/m/Y H:i:s', strtotime($list->waktu_notifikasi)); ?></small>
									<a href="<?php switch($list->id_tipe_notifikasi){
										case 1: echo base_url().'Notif/CurrentBooking/'.$list->id_notifikasi;break;
										case 2: echo base_url().'Notif/CurrentBooking/'.$list->id_notifikasi;break;}?>">
										<?php echo ucwords(strtolower($list->isi_notifikasi));?>
									</a>
								</li>
								<!-- <li class="nav-item"><a href="#">HTML</a></li>
								<li class="nav-item"><a href="#">CSS</a></li>
								<li class="nav-item"><a href="#">JavaScript</a></li> -->
										<?php }?>
								<?php }else{?>
									<li class="nav-item"><a>You don't have any Messages!</a></li>
								<?php }?>
								
						</ul>

					</li>
					<?php } ?>

					<!-- Notifications -->
					<?php if($this->session->userdata('tipe_user') == $user){?>
					<li class="nav-item">
						<div class="dropdown">
						<a class="nav-link" data-toggle="dropdown">
							<i class="fas fa-bell"></i>
							<span class='badge badge-warning' id='lblCartCount'><?php echo $countNotif?></span>
						</a>
							<ul class="dropdown-menu">
								<?php 
								if($notif){
										foreach($notif as $list){
									?>
								<li class="nav-item">
									<small class="float-right"><?php echo date('d/m/Y H:i:s', strtotime($list->waktu_notifikasi)); ?></small>
									<a href="<?php switch($list->id_tipe_notifikasi){
										case 1: echo base_url().'Notif/CurrentBooking/'.$list->id_notifikasi;break;
										case 2: echo base_url().'Notif/CurrentBooking/'.$list->id_notifikasi;break;}?>">
										<?php echo ucwords(strtolower($list->isi_notifikasi));?>
									</a>
								</li>
								<!-- <li class="nav-item"><a href="#">HTML</a></li>
								<li class="nav-item"><a href="#">CSS</a></li>
								<li class="nav-item"><a href="#">JavaScript</a></li> -->
										<?php }?>
								<?php }else{?>
									<li class="nav-item"><a>You don't have any notifications!</a></li>
								<?php }?>
								
							</ul>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</nav>
</header>

<!-- Login Script -->