<!-- Sudah Login -->

<?php if($this->session->userdata('email') != null) {?>

<!-- Login Modal -->

<div class="modal" id="loginModal">
  <div class="modal-container">
    <div class="modal-left">
        <!-- Khusus untuk bengkel -->
        <?php if($this->session->userdata('tipe_user') == $bengkel){
                  if($member != null){?>
                    <a href="<?php echo base_url() ?>ReportingBengkel">
                      <button class="form-control">Reporting</button><br>
                    </a>
            <?php }
              } ?>
        <?php if($this->session->userdata('tipe_user') == $bengkel){?>
          <a href="<?php echo base_url() ?>Edit_profile/Bengkel">
            <button class="form-control">Edit Profile</button><br>
          </a>
        <?php }else{ ?>
          <a href="<?php echo base_url() ?>Edit_profile">
            <button class="form-control">Edit Profile</button><br>
          </a>
        <?php } ?>
        <a href="<?php echo base_url() ?>Login/changepassword">
          <button class="form-control">Change Password</button><br>
        </a>
        <a href="<?php echo base_url() ?>Login/logout">
          <button class="form-control">Log Out</button><br>
        </a>
    </div>
    <div class="modal-right">
      <img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80" alt="">
    </div>
    <button class="icon-button close-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
          <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
        </svg>
    </button>
  </div>
  
</div>

<!-- Belum Login -->
<?php }else{ ?>

<!-- Login Modal -->

<div class="modal" id="loginModal">
  <div class="modal-container">
    <div class="modal-left">
	<form>
      <h1 class="modal-title font2" style="color:black;">Welcome!</h1>
      <div class="input-block">
        <!--<label for="email" class="input-label">Email</label>-->
        <input type="email" name="email" id="email" placeholder="Email">
      </div>	
      <div class="input-block">
        <!--<label for="password" class="input-label">Password</label>-->
        <input type="password" name="password" id="password" placeholder="Password">
      </div>
	  <div class="alert alert-danger print-error-msg" style="display:none"></div>
      <div class="modal-buttons">
        <a href="<?php echo base_url()?>ForgotPassword" class="">Forgot your password?</a>
        <button class="input-button btn-submit" type="submit" style="background-color:#e10019">Login</button>
      </div>
      <p class="sign-up">Don't have an account? <a href="<?php echo base_url()?>Signup_pengguna/awal" style="color:#e10019;">Sign up now</a></p>
    </div>
    <div class="modal-right">
      <img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80" alt="">
	</form>
    </div>
    <button class="icon-button close-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
</svg>
      </button>
  </div>
  
</div>

<?php } ?>
