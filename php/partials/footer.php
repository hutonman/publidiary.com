<?php
namespace partials;

function footer() {
    ?>
    <footer>
      <div class="d-flex text-center mt-5 justify-content-center" style="font-size: 14px;">
        <div class="mx-2">
          <a href="<?php the_url('privacy'); ?>">プライバシーポリシー</a>
        </div>
        <div class="mx-2">
          <a href="<?php the_url('credit'); ?>">クレジット</a>
        </div>
      </div>
      <div class="text-center mb-5">
        &copy;Hutonman
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.1.7.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/turn.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/turn_act.js"></script>

  </body>
</html>
<?php
} ?>