            <div class="col-md-3">
				<div class="category-sidebar">
					<?php if($this->session->userdata('email') != null) {?>
                            
                        <a href = "<?php echo base_url() ?>StatusBooking/CurrentBooking">
                            <div class="widget1 category-list" style="cursor:pointer">
							    <h4 style="font-family: 'Open Sans', sans-serif;">
								    <center>Current Booking</center>
							    </h4>
						    </div>
						</a>

                        <a href = "<?php echo base_url() ?>StatusBooking">
                            <div class="widget1 category-list" style="cursor:pointer">
                                <h4 style="font-family: 'Open Sans', sans-serif;">
                                    <center>History</center>
                                </h4>
                            </div>
                        </a>
					<?php } ?>
				</div>
			</div>