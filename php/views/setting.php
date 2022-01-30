

    <div class="container mt-5">

      <h2 class="text-center bg-secondary rounded text-light py-2 mb-0">Setting</h2>
      <form action="<?php echo CURRENT_URI; ?>" class="border border-2 border-top-0 rounded-bottom" method="POST">

        <div class="form-group mx-3 mb-4 pt-4">
          <label for="nickname">ニックネームを変更する </label>
          <input type="text" id="nickname" name="nickname" class="form-control">
        </div>

        <div class="mx-auto my-0 text-center mb-3">
          <input type="submit" value="Change" class="btn btn-primary shadow-sm px-5">
        </div>

      </form>
    </div>