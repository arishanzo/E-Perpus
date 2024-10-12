
<section class="background-radial-gradient overflow-hidden">
  

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          E-Perpus <br />
          <span style="color: hsl(218, 81%, 75%)">Untuk Santri </span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
         Selamat datang di aplikasi e-perpus untuk santri. Manajemen perpustakan jadi lebih mudah dengan menggunakan aplikasi e-perpus
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            
          <form action="" method="post" style="max-width: 600px;">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                <h1 class="fw-bold" class="primary">
                Login <br />
                </div>
              
              </div>
              <?php if (!$this->session->flashdata('authmsg')) : ?>

<?= $this->session->flashdata('authmsg') ?>

<?php endif ?>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                
              <label class="form-label " for="form3Example3">Username</label>
              <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'invalid' : '' ?>" placeholder="Your username or email" value="<?= set_value('username') ?>" required />
              </div>

              
              <div class="invalid-feedback">
                                            <?= form_error('username') ?>
                                        </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label " for="form3Example4">Password</label>
              <input type="password" name="password" class="form-control <?= form_error('password') ? 'invalid' : '' ?>" placeholder="Enter your password" value="<?= set_value('password') ?>" required />                  
              </div>
              <div class="invalid-feedback">
                                            <?= form_error('password') ?>
                                        </div>
             
              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn form-control btn-primary btn-block mb-4">
                Login
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Support by:</p>
                <div class="simple-footer">
                             Copyright &copy; PP SUNAN DRAJAT<?= date('Y') ?>  @ <a href="https://www.instagram.com/aris.wahyudi86">Aris Wahyudi</a>
</div>
                </button>

               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->