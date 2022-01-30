<?php
namespace controller\logout;

use lib\Auth;
use lib\Msg;


function get() {
  if(Auth::logout()) {

    Msg::push(Msg::INFO, 'Successed Logout.');

  } else {

    Msg::push(Msg::INFO, 'Failed Logout.');

  }

  redirect(GO_HOME);
}


?>