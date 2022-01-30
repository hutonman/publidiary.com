<?php
  namespace view\my_archive;

  function index($diaries, $user)
  {
    $diaries = escape($diaries);
      ?>

    <div class="d-flex justify-content-end">
      <a href="<?php the_url('create'); ?>"><div class="btn btn-primary mt-4">日記作成</div></a>
    </div>

    <ul class="list-group" style="list-style: none;">
      <?php

      foreach($diaries as $diary) {
        $url = get_url('detail?diary_id=' . $diary->id);
        \partials\diary_list_item($diary, $url, $user);
      }

      ?>
    </ul>
<?php
  } ?>