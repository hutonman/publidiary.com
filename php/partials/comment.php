<?php
  namespace partials;

  function comment($comments)
  {
      foreach ($comments as $comment) :
    ?>
    <div class="container" style="width: 90%;">
      <div class="comment bg-white border border-2 rouded rounded-3 p-3">
        <p style="white-space: pre-wrap;"><?php echo $comment['body']; ?></p>
      </div>
      <div class="d-flex justify-content-end">
        <p class="d-block mx-1"><?php echo $comment['updated_at']; ?> </p>
        <!-- <p class="d-block mx-1">19:42</p> -->
        <p class="mx-3"><a href="<?php the_url('other_archive?user_id=' . $comment['user_id']); ?>" class="text-decoration-none"><?php echo $comment['nickname']; ?></a></p>
      </div>

    </div>
    <?php endforeach;
  }?>