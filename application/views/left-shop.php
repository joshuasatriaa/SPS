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

					<a href = "<?php echo base_url() ?>Barang/MyItem">
						<div class="widget1 category-list">
							<h4 style="font-family: 'Open Sans', sans-serif;">
								<center>My Items</center>
							</h4>
						</div>
					</a>

					<div class="widget1 category-list">
						<h4 style="font-family: 'Open Sans', sans-serif;">
							<center>History<center>
						</h4>
					</div>
					<?php } ?>
					<div class="widget1 filter">
						<h4 class="widget-header">Show Produts</h4>
						<select>
							<option>Popularity</option>
							<option value="1">Top rated</option>
							<option value="2">Lowest Price</option>
							<option value="4">Highest Price</option>
						</select>
					</div>

					<div class="widget1 price-range w-100">
						<h4 class="widget-header">Price Range</h4>
						<div class="block">
						<input type="hidden" id="minimum_price" value="0" />
						<input type="hidden" id="maximum_price" value="100000000"/>
						<p id="price_show">1.000 - 100.000.000</p>
						<div id="price_range"></div>
						</div>
					</div>

					<div class="widget1 product-shorting">
						<h4 class="widget-header">By Condition</h4>
						<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							Brand New
						</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							Almost New
						</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							Gently New
						</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							Havely New
						</label>
						</div>
					</div>

				</div>
			</div>