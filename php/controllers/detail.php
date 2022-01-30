<?php
namespace controller\detail;

use db\CommentQuery;
use db\DataSource;
use lib\Auth;
use lib\Msg;
use model\UserModel;
use db\DiaryQuery;
use model\CommentModel;
use model\DiaryModel;
use Throwable;

function get() {

  $user = UserModel::getSession();

  $diary = new DiaryModel;
  $diary->id = get_param('diary_id', null, false);

  $diary = DiaryQuery::fetchById($diary);
  $comments = CommentQuery::fetchByDiaryId($diary);

    $diary = escape($diary);
     $comments = escape($comments);

  if(!$diary) {
    Msg::push(Msg::ERROR, 'Diary is not found.');
    redirect('404');
  }

  \view\detail\index($diary, $comments, $user);

  
}

function post() {

  Auth::requireLogin();
  
  $comment = new CommentModel;
  $user = UserModel::getSession();

  $comment->diary_id = get_param('diary_id', null, false);
  $comment->body = get_param('body', null);
  $comment->user_id = $user->id;
  $comment->nickname = $user->nickname;

  $is_success = CommentQuery::insert($comment);

  if($is_success) {
    
    Msg::push(Msg::INFO, 'Successed add comment.');
    redirect('detail?diary_id=' . $comment->diary_id);
    
  } else {
    
    Msg::push(Msg::ERROR, 'Failed add comment.');
    redirect(GO_REFERER);

  }

}

?>