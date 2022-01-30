<?php
  namespace partials;

  use db\DiaryQuery;

 

  function diary_list_item($diary, $title_url, $user) {


    $published_label = $diary->published ? '公開' : '非公開';
    $published_color = $diary->published ? '#285eb6' : '#cc4242';
?>
  <li>
    <div class="container border bg-white my-4 shadow note-wrap p-4" style="width: 90%;">
    <?php
      
      $url = parse_url(CURRENT_URI);
      $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);

      if($rpath === 'my_archive') {
        $link = $title_url;
      } elseif($rpath === 'detail' && $user->id === $diary->user_id) {
        $link = get_url('edit?diary_id=' . $diary->id);
      } else {
        $link = get_url('detail?diary_id=' . $diary->id);
      }
    ?>
      <a href="<?php echo $link ?>" class="text-decoration-none">
        <div class="text-dark note">
          <div>
            <?php
              if ($user->id === $diary->user_id) {
                ?>
                <span class="badge mr-1 align-bottom" style="background-color: <?php echo $published_color?>"><?php echo $published_label; ?></span>
                <?php
              }
            ?>
          </div>
          <h2><?php echo $diary->title; ?></h2>
          <div class="d-flex justify-content-between">
            <div style="display: inline; line-height: 4em;">
              <p><?php echo $diary->date; ?></p>
            </div>
            <div style="display: inline; line-height: 4em;">
            <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo weather($diary->weather); ?>.svg" alt="weather" width="30">
              <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo feeling($diary->feeling); ?>.svg" alt="emotion" width="30">
            </div>
          </div>
            <p class="d-flex mt-2" style="line-height: 3em; white-space: pre-wrap;"><?php echo $diary->body ?></p>
            <?php if($diary->file) : ?>
             <img src="<?php echo get_template_directory_uri(); ?>/img/user/<?php echo $diary->file ?>" alt="" style="width: 100%">
            <?php endif; ?>
        </div>
      </a>
      <div class="">
        <p class="d-inline"><?php echo DiaryQuery::commentCount($diary) ?>comment(s)</p>
      </div>
      <?php
        if ($user->id !== $diary->user_id) :
          ?>
          <div class="text-center">
            <p class="d-inline">Written by <a href="<?php echo get_url('other_archive?user_id=' . $diary->user_id); ?>" class="text-decoration-none"><?php echo DiaryQuery::getNickname($diary);?></a></p>
          </div>
          <?php
        endif;
      ?>
    </div>
  </li>
<?php
}
?>