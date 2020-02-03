<header class="navigation ">
	<nav class="navbar navbar-expand-lg main-nav py-lg-3 position-absolute w-100" id="main-nav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url()?>Home">
				<img src="<?php echo base_url()?>assets/type1/images/logo.png" width="300px" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation"
				aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<div class="collapse navbar-collapse" id="navigation">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>Home">Home</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Shop">Shop</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>Service">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Forum</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Contact</a></li>

					<?php if($this->session->userdata('email') != null) {?>
						<li class="nav-item">
						
							<div class="dropdown" style="padding-left:30px;">
								<button class="dropbtn">
									<b>
										<?php echo $this->session->userdata('nama') ?>
										<i class="fa fa-caret-down"></i>
									</b>
								</button>
								<div class="dropdown-content">
									<a href="<?php echo base_url() ?>Edit_profile" class="nav-link">Profile</a>
									<a href="<?php echo base_url() ?>Login/changepassword" class="nav-link">Change Password</a>
									<a href="<?php echo base_url() ?>Login/logout" class="nav-link">Logout</a>    
								</div>
							</div>
						
						</li>
						
					<?php }else{ ?>
						<li class="nav-item"><a class="nav-link modal-button">LogIn</a></li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</nav>
</header>