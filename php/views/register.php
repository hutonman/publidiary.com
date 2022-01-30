<?php
  namespace view\register;

  function index() {
      ?>

    
    <div class="container mt-5">

      <h2 class="text-center bg-secondary rounded text-light py-2 mb-0">Register</h2>
      <form action="<?php echo CURRENT_URI; ?>" method="post" class="border border-2 border-top-0 rounded-bottom py-4 bg-white px-5">

        <div class="form-group mb-4">
          <label for="id">User ID : (半角英数10文字以内)</label>
          <input type="text" id="id" name="id" class="form-control">
        </div>

        <div class="form-group mb-4">
          <label for="pwd">Password : (半角英数4文字以上)</label>
          <input type="password" id="pwd" name="pwd" class="form-control">
        </div>

        <div class="form-group mb-5">
          <label for="nickname">Nickname : (10文字以内)</label>
          <input type="text" id="nickname" name="nickname" class="form-control">
        </div>


        <div class="d-flex justify-content-between align-items-center">
          <div>
            <a href="<?php the_url('diary_login'); ?>" class="text-decoration-none">To Login</a>
          </div>
          <div class="text-center">
            <input type="submit" value="Register" class="btn btn-primary shadow-sm px-4">
          </div>
        </div>

      </form>
    </div>
    <?php
  } ?>