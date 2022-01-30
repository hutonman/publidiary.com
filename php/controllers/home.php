<?php
namespace controller\home;
use db\DiaryQuery;
use model\DiaryModel;
use model\UserModel;
use lib\Msg;

function get() {

  $diaries = DiaryQuery::recent();
    $diaries = escape($diaries);
  
  $user = UserModel::getSession();

  echo '<h2 class="mt-4">最新の日記</h2>';
  echo '<ul style="list-style:none; padding: 0;">';
  echo '<div id="turn" style="z-index: 1;">';
  foreach($diaries as $diary) {
    $url = get_url('detail?diary_id=' . $diary->id);
    \partials\diary_list_item($diary, $url, $user);
  }
  echo '</div>';
  echo '</ul>';

\view\home\index();

}

function post() {

  $keyword = get_param('keyword', null);
  $date_start = get_param('date_start', null);
  $date_end = get_param('date_end', null);
  $weather = get_param('weather', null);
  $feeling = get_param('feeling', null);

  $diaries = DiaryQuery::search($keyword, $date_start, $date_end, $weather, $feeling);
  
  $user = UserModel::getSession();

  if(empty($diaries)) {
    Msg::push(Msg::ERROR, "検索に一致する日記がありませんでした。");
    redirect(GO_REFERER);
  }

  echo '<ul style="list-style:none; z-index: -1;">';
  foreach($diaries as $diary) {
    $url = get_url('detail?diary_id=' . $diary->id);
    \partials\diary_list_item($diary, $url, $user);
  }
  echo '</ul>';

\view\home\index();

  
}

?>