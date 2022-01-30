<?php
namespace controller\create;

use db\DiaryQuery;
use db\UserQuery;

use lib\Auth;
use lib\Msg;
use model\DiaryModel;
use model\UserModel;
use Throwable;

function get() {

  Auth::requireLogin();
  
    date_default_timezone_set('Asia/Tokyo');
  $date = date("Y-m-d");

    

  $diary = new DiaryModel;
  $diary->id = -1;
  $diary->title = '';
  $diary->date = $date;
  $diary->body = '';
  $diary->weather = 1;
  $diary->feeling = 1;
  $diary->comment = 1;
  $diary->published = 1;


  \view\edit\index($diary, false);

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
  $diary->id = get_param('id', null);
  if($_FILES['file']['error'] == 0) {
    $diary->file = time() . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], '/home/hutonman/publidiary.com/public_html/wp-content/themes/diary/img/user/' . $diary->file);
  }

  $user = UserModel::getSession();
  try {

    $is_success = DiaryQuery:: insert($diary, $user);

  } catch (Throwable $e) {

    Msg::push(Msg::DEBUG, $e->getMessage());
    $is_success = false;

  }

  if($is_success) {
    
    Msg::push(Msg::INFO, 'Successed create diary.');
    redirect('my_archive');
    
  } else {
    
    Msg::push(Msg::ERROR, 'Failed create diary.');
    redirect(GO_REFERER);

  }
  
}

?>