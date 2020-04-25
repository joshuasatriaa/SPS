            <div class="col-md-3">
				<div class="category-sidebar">
				<?php if($this->session->userdata('email') != null) {?>
					<a href = "<?php echo base_url() ?>Barang">
						<div class="widget1 category-list" style="cursor:pointer">
							<h4 style="font-family: 'Open Sans', sans-serif;">
								<center>Add Items</center>
							</h4>
						</div>
					</a>

					<?php if($this->session->userdata('tipe_user') == $user || $this->session->userdata('tipe_user') == $bengkel){?>
						<a href = "<?php echo base_url() ?>Barang/MyItem">
							<div class="widget1 category-list">
								<h4 style="font-family: 'Open Sans', sans-serif;">
									<center>My Items</center>
								</h4>
							</div>
						</a>
					<?php } ?>

					<?php if($this->session->userdata('tipe_user') == $user || $this->session->userdata('tipe_user') == $bengkel){?>
						<a href = "<?php echo base_url() ?>Barang/History">
							<div class="widget1 category-list">
								<h4 style="font-family: 'Open Sans', sans-serif;">
									<center>History</center>
								</h4>
							</div>
						</a>
					<?php } ?>

					<?php } ?>
					

					<?php if($this->session->userdata('tipe_user') == $user){?>
						<div class="widget1 w-100" style="margin-top:30px;">
							<h5 style="font-family: 'Open Sans', sans-serif;text-align:center;">You have <br><?php echo $jumlahDiscountCodes; ?> discount codes</h5>
						</div>
					<?php }?>
					<div class="widget1 price-range w-100" style="margin-top:30px;">
						<h4 class="widget-header" style="font-family: 'Open Sans', sans-serif;">Price Range</h4>
						<div class="block">
						<input type="hidden" id="minimum_price" value="0" />
						<input type="hidden" id="maximum_price" value="100000000"/>
						<p id="price_show">10.000 - 10.000.000</p>
						</div>
						<div id="price_range"></div>
						<input type="hidden" id="hidden_minimum_price" value="" />
                    	<input type="hidden" id="hidden_maximum_price" value="" />
					</div>

					

				</div>
			</div>