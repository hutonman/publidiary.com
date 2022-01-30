<?php
namespace controller\diary_login;

use db\UserQuery;
use lib\Auth;
use lib\Msg;
use model\UserModel;

function get() {
  
  \view\login\index();

}


function post() {
  
  $id = get_param('id', '');
  $pwd = get_param('pwd', '');
  if(Auth::login($id, $pwd)) {

    $user = UserModel::getSession();
    Msg::push(Msg::INFO, "Welcome {$user->nickname}.");
    redirect(GO_HOME);

  } else {
    Msg::push(Msg::ERROR, "ID or Password is wrong");
    redirect(GO_REFERER);
  }
}

?>