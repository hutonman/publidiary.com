<?php

namespace view\detail;

function index($diary, $comments, $user)
{
  $url = get_url('diary/detail?diary_id=' . $diary->id);
?>


  <ul class="list-group" style="list-style: none;">
    <?php

    \partials\diary_list_item($diary, $url, $user);
    if($diary->comment) :
      \partials\comment($comments);

    ?>
    <form action="<?php echo CURRENT_URI; ?>" method="POST">
      <textarea name="body" id="comment" rows="5" class="w-100" placeholder="Add comment"></textarea>
      <input type="submit" value="コメントする" class="btn btn-primary pull-right">
    </form>
    <?php endif; ?>
  </ul>
<?php
} ?>