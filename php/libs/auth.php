<?php
namespace lib;

use db\DiaryQuery;
use db\UserQuery;
use model\UserModel;
use Throwable;

class Auth {

  public static function login($id, $pwd) {
    try {
      if(!(UserModel::validateId($id)
        * UserModel::validatePwd($pwd))) {
        return false;
      }
      $is_success = false;
    
      $user = UserQuery::fetchById($id);
    
      if(!empty($user) && $user->del_flg !== 1) {
    
        if(password_verify($pwd, $user->pwd)) {
          $is_success = true;
          UserModel::setSession($user);
        } else {
          Msg::push(Msg::ERROR, 'Wrong Password.');
        }
      } else {
        Msg::push(Msg::ERROR, 'Cant find User.');
      }

    } catch (Throwable $e) {
      $is_success = false;
      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'Failed login process.');
    }

    return $is_success;

  }

  public static function regist($user) {
    try {
      if(!($user->isValidId()
        * $user->isValidPwd()
        * $user->isValidNickname())) {
        return false;
      }

      $is_success = false;

      $exist_user = UserQuery::fetchById($user->id);

      if(!empty($exist_user)) {
        Msg::push(Msg::ERROR, 'Already exist the user.');
        return false;
      }

      $is_success = UserQuery::insert($user);


      if($is_success) {
        UserModel::setSession($user);
      }

    } catch (Throwable $e) {

      $is_success = false;
      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'Failed regist process.');

    }
    return $is_success;
  }

  public static function isLogin() {
    try {
      $user = UserModel::getSession();

    } catch (Throwable $e) {

      UserModel::clearSession();
      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'Error happened.');
      return false;
      
    }

    if(isset($user)) {
      return true;
    } else {
      return false;
    }
  }

  public static function logout() {
    try {

      UserModel::clearSession();
      
    } catch (Throwable $e) {

      Msg::push(Msg::DEBUG, $e->getMessage());
      return false;

    }

    return true;
  }

  public static function requireLogin() {
    if(!static::isLogin()) {
      Msg::push(Msg::ERROR, 'Please Login.');
      redirect('diary_login');
    }
  }

  public static function hasPermission($diary_id, $user) {
    return DiaryQuery::isUserOwnDiary($diary_id, $user);
  }

  public static function requirePermission($diary_id, $user) {

    if(!static::hasPermission($diary_id, $user)) {
      Msg::push(Msg::ERROR, 'You don\'t have authority. Please login.');
      redirect('diary_login');

    }

  }

}


?>