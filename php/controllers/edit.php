<?php
namespace controller\edit;

use db\DiaryQuery;
use db\UserQuery;

use lib\Auth;
use lib\Msg;
use model\DiaryModel;
use model\UserModel;
use Throwable;

function get() {
  Auth::requireLogin();

  $diary = new DiaryModel;
  $diary->id = get_param('diary_id', null, false);

  $user = UserModel::getSession();
  Auth::requirePermission($diary->id, $user);

  $fetchedDiary = DiaryQuery::fetchById($diary);
  \view\edit\index($fetchedDiary, true);

}


function post() {
  Auth::requireLogin();

  $diary = new DiaryModel;
  $diary->title = get_param('title', null);
  $diary->body = get_param('body', null);
  $diary->date = get_param('date', null);
  $diary->weather = get_param('weather', null);
  $diary->feeling = get_param('feeling', null);
  $diary->published = get_param('published', null);
  $diary->comment = get_param('comment', null);
  $diary->id = get_param('diary_id', null, false);
  $diary->file = time() . $_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'], '/home/hutonman/publidiary.com/public_html/wp-content/themes/diary/img/user/' . $diary->file);


  $user = UserModel::getSession();
  Auth::requirePermission($diary->id, $user);
  try {

    $is_success = DiaryQuery::update($diary);


  } catch (Throwable $e) {

    Msg::push(Msg::DEBUG, $e->getMessage());
    $is_success = false;

  }

  if($is_success) {
    
    Msg::push(Msg::INFO, 'Successed update diary.');
    redirect('my_archive');
    
  } else {
    
    Msg::push(Msg::ERROR, 'Failed update diary.');
    redirect(GO_REFERER);

  }
  
}

?>