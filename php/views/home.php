<?php 
namespace view\home;
function index() {
  
    ?>

      <h2 class="text-center bg-secondary rounded text-light py-2 mb-0">検索</h2>
      <form action="<?php echo BASE_CONTEXT_PATH; ?>" method="post" class="border border-2 border-top-0 rounded-bottom">

        <div class="form-group mx-3 mb-4 pt-4">
          <label for="keyword">キーワード: </label>
          <br>
          <input type="text" id="keyword" name="keyword" placeholder="" class="form-control w-50 d-inline">
        </div>

        <div class="form-group m-3 mb-4">
          <label>日付 : </label>
          <br>
          <div class="d-flex align-items-center">
            <input type="date" id="date_start" name="date_start" class="form-control d-inline-block mr-1" style="width: 50%;">
            <div>
             ～ 
            </div>
            <input type="date" id="date_end" name="date_end" class="form-control d-inline-block" style="width: 50%;">
          </div>
        </div>

        <div class="form-group m-3 mb-4">
          <label for="weather">天気 : </label>
          <br>
          <div class="input-container">
            <input type="radio" name="weather" id="sunny" value="1">
            <label for="sunny">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sun.svg" alt="sun" width="30">
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="cloudy" value="2">
            <label for="cloudy">
              <img src="<?php echo get_template_directory_uri(); ?>/img/cloud.svg" alt="cloud" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="rainy" value="3">
            <label for="rainy">
              <img src="<?php echo get_template_directory_uri(); ?>/img/umbrella.svg" alt="umbrella" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="thunder" value="4">
            <label for="thunder">
              <img src="<?php echo get_template_directory_uri(); ?>/img/thunder.svg" alt="thunder" width="30">
            </label>
          </div>
        </div>

        <div class="form-group m-3 mb-4">
          <label for="feeling">気分 : </label>
          <br>
          <div class="input-container">
            <input type="radio" name="feeling" id="smile" value="1">
            <label for="smile">
              <img src="<?php echo get_template_directory_uri(); ?>/img/smile.svg" alt="smile" width="30">
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="angry" value="2">
            <label for="angry">
              <img src="<?php echo get_template_directory_uri(); ?>/img/angry.svg" alt="angry" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="sad" value="3">
            <label for="sad">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sad.svg" alt="sad" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="normal" value="4">
            <label for="normal">
              <img src="<?php echo get_template_directory_uri(); ?>/img/normal.svg" alt="normal" width="30">
            </label>
          </div>
        </div>
        <div class="mx-auto my-0 text-center mb-3">
          <input type="submit" value="検索" class="btn btn-primary shadow-sm px-5">
        </div>

      </form>
    </div>

<?php
} ?>