<?php
namespace view\edit;

function index($diary, $is_edit) {

    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y/m/d");
    $link = get_url('delete?diary_id=' . $diary->id);

    $header_title = $is_edit ? '日記編集' : '日記作成';
    ?>
    <h1 class="m-4"><?php echo $header_title; ?></h1>
    <div class="container border bg-white my-5 shadow note-wrap p-4" style="width: 90%;">
    <div>
      <?php if($is_edit) : ?>
      <a href="<?php echo $link ?>">
        <input type="submit" class="btn btn-danger pull-right" value="削除する">
      </a>
      <?php endif; ?>
    </div>
      <div class="note">
        <form action="<?php echo CURRENT_URI; ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $diary->id; ?>">
            
          <div class="form-group">
            <label for="title">タイトル : </label>
            <input type="text" id="title" name="title" class="form-control d-inline-block w-75" value="<?php if($is_edit) {echo $diary->title;} else {echo $date;} ?>">
          </div>
          
          <div class="form-group d-flex">
            <label for="date">日付 : </label>
            <input type="date" id="date" name="date" class="form-control d-inline-block w-75" value="<?php echo $diary->date; ?>">
          </div>
          
          <div class="form-group">
            <label for="weather">天気 : </label>
            <div class="input-container">
              <input type="radio" name="weather" id="sunny" value="1" <?php echo $diary->weather === 1 ? 'checked' : ''; ?>>
              <label for="sunny">
                <img src="<?php echo get_template_directory_uri(); ?>/img/sun.svg" alt="sun" width="30">
                </label>
            </div>
            <div class="input-container">
              <input type="radio" name="weather" id="cloudy" value="2" <?php echo $diary->weather === 2 ? 'checked' : ''; ?>>
              <label for="cloudy">
                <img src="<?php echo get_template_directory_uri(); ?>/img/cloud.svg" alt="cloud" width="30">
              </label>
            </div>
            <div class="input-container">
              <input type="radio" name="weather" id="rainy" value="3" <?php echo $diary->weather === 3 ? 'checked' : ''; ?>>
              <label for="rainy">
                <img src="<?php echo get_template_directory_uri(); ?>/img/umbrella.svg" alt="umbrella" width="30">
              </label>
            </div>
            <div class="input-container">
              <input type="radio" name="weather" id="thunder" value="4"<?php echo $diary->weather === 4 ? 'checked' : ''; ?>>
              <label for="thunder">
                <img src="<?php echo get_template_directory_uri(); ?>/img/thunder.svg" alt="thunder" width="30">
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="feeling">気分 : </label>
            <div class="input-container">
              <input type="radio" name="feeling" id="smile" value="1" <?php echo $diary->feeling === 1 ? 'checked' : ''; ?>>
              <label for="smile">
                <img src="<?php echo get_template_directory_uri(); ?>/img/smile.svg" alt="smile" width="30">
                </label>
            </div>
            <div class="input-container">
              <input type="radio" name="feeling" id="angry" value="2" <?php echo $diary->feeling === 2 ? 'checked' : ''; ?>>
              <label for="angry">
                <img src="<?php echo get_template_directory_uri(); ?>/img/angry.svg" alt="angry" width="30">
              </label>
            </div>
            <div class="input-container">
              <input type="radio" name="feeling" id="sad" value="3" <?php echo $diary->feeling === 3 ? 'checked' : ''; ?>>
              <label for="sad">
                <img src="<?php echo get_template_directory_uri(); ?>/img/sad.svg" alt="sad" width="30">
              </label>
            </div>
            <div class="input-container">
              <input type="radio" name="feeling" id="normal" value="4" <?php echo $diary->feeling === 4 ? 'checked' : ''; ?>>
              <label for="normal">
                <img src="<?php echo get_template_directory_uri(); ?>/img/normal.svg" alt="normal" width="30">
              </label>
            </div>
          </div>

          
          <div class="form-group">
            <label for="published">公開 : </label>
            <div class="input-container">
              <input type="radio" name="published" id="publish-on" value="1" <?php echo $diary->published ? 'checked' : ''; ?>>
              <label for="publish-on">
                ON
                </label>
            </div>
            <div class="input-container">
              <input type="radio" name="published" id="publish-off" value="0" <?php echo $diary->published ? '' : 'checked'; ?>>
              <label for="publish-off">
                OFF
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="comment">コメント表示 : </label>
            <div class="input-container">
              <input type="radio" name="comment" id="comment-on" value="1" <?php echo $diary->comment ? 'checked' : ''; ?>>
              <label for="comment-on">
                ON
                </label>
            </div>
            <div class="input-container">
              <input type="radio" name="comment" id="comment-off" value="0" <?php echo $diary->comment ? '' : 'checked'; ?>>
              <label for="comment-off">
                OFF
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label for="file">画像 : </label>
            <div class="input-container">
              <input type="file" name="file" id="file" accept="image/*">
            </div>
          </div>

          <textarea name="body" id="body" rows="20" class="w-100" placeholder="Please write your diary."><?php echo $diary->body; ?></textarea>

          
          <div>
            <div class=" text-center">
              <input type="submit" value="日記作成" class="btn btn-primary shadow-sm px-5">
            </div>
          </div>


        </form>
      </div>
    </div>

    <?php
} ?>