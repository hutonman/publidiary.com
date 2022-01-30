
    <div class="container border bg-white my-5 shadow note-wrap p-4" style="width: 90%;">
      <div class="note">
        <form action="">
          
        <div class="form-group">
          <label for="title">Title : </label>
          <input type="text" id="title" name="title" class="form-control d-inline w-50">
        </div>
        
        <div class="form-group">
          <label for="date">Date : </label>
          <input type="date" id="date" name="date" class="form-control d-inline w-50">
        </div>
        
        <div class="form-group">
          <label for="weather">Weather : </label>
          <div class="input-container">
            <input type="radio" name="weather" id="sunny" value="1">
            <label for="sunny">
              <img src="<?php echo BASE_IMAGE_PATH ?>sun.svg" alt="" width="30">
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="cloudy" value="2">
            <label for="cloudy">
              <img src="<?php echo BASE_IMAGE_PATH ?>cloud.svg" alt="" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="rainy" value="3">
            <label for="rainy">
              <img src="<?php echo BASE_IMAGE_PATH ?>umbrella.svg" alt="" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="weather" id="thunder" value="4">
            <label for="thunder">
              <img src="<?php echo BASE_IMAGE_PATH ?>thunder.svg" alt="" width="30">
            </label>
          </div>
        </div>

        <div class="form-group">
          <label for="feeling">Emotion : </label>
          <div class="input-container">
            <input type="radio" name="feeling" id="smile" value="1">
            <label for="smile">
              <img src="<?php echo BASE_IMAGE_PATH ?>smile.svg" alt="" width="30">
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="angry" value="1">
            <label for="angry">
              <img src="<?php echo BASE_IMAGE_PATH ?>angry.svg" alt="" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="sad" value="1">
            <label for="sad">
              <img src="<?php echo BASE_IMAGE_PATH ?>sad.svg" alt="" width="30">
            </label>
          </div>
          <div class="input-container">
            <input type="radio" name="feeling" id="normal" value="1">
            <label for="normal">
              <img src="<?php echo BASE_IMAGE_PATH ?>normal.svg" alt="" width="30">
            </label>
          </div>
        </div>

        
        <div class="form-group">
          <label for="published">Published : </label>
          <div class="input-container">
            <input type="radio" name="published" id="publish-on">
            <label for="publish-on">
              ON
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="published" id="publish-off" >
            <label for="publish-off">
              OFF
            </label>
          </div>
        </div>

        <div class="form-group">
          <label for="comment">Comment : </label>
          <div class="input-container">
            <input type="radio" name="comment" id="comment-on">
            <label for="comment-on">
              ON
              </label>
          </div>
          <div class="input-container">
            <input type="radio" name="comment" id="comment-off" >
            <label for="comment-off">
              OFF
            </label>
          </div>
        </div>

        <textarea name="body" id="body" rows="20" class="w-100" placeholder="Please write your diary."></textarea>

        
        <div>
          <div class=" text-center">
            <input type="submit" value="Finish Writing" class="btn btn-primary shadow-sm px-5">
          </div>
        </div>


        </form>
      </div>
    </div>