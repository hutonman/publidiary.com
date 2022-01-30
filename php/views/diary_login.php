<?php
  namespace view\login;

  function index() {
      ?>

    <div class="container mt-5">

      <h2 class="text-center bg-secondary rounded text-light py-2 mb-0">Login</h2>
      <form action="<?php echo CURRENT_URI; ?>" method="post" class="border border-2 border-top-0 rounded-bottom py-4 bg-white px-5">

        <div class="form-group mb-4">
          <label for="id">User ID : </label>
          <input type="text" id="id" name="id" class="form-control">
        </div>

        <div class="form-group mb-5">
          <label for="pwd">Password : </label>
          <input type="password" id="pwd" name="pwd" class="form-control">
        </div>

        <div class="d-flex align-items-center justify-content-between">
          <div>
            <a href="<?php the_url('register'); ?>" class="text-decoration-none">Register</a>
          </div>
          <div class="text-center">
            <input type="submit" value="Login" class="btn btn-primary shadow-sm px-4">
          </div>
        </div>

      </form>
    </div>


    <?php } ?>