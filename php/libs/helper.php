<?php

function get_param($key, $default_val, $is_post = true) {
  $arry = $is_post ? $_POST : $_GET;
  return $arry[$key] ?? $default_val;
}

function redirect($path) {
  if($path === GO_HOME) {
    $path = get_url('');
  } elseif ($path === GO_REFERER) {
    $path = $_SERVER['HTTP_REFERER'];
  } else {
    $path = get_url($path);
  }
  
  header("Location: {$path}");
  die();
}

function the_url($path) {
  echo get_url($path);
}

function get_url($path) {
  return BASE_CONTEXT_PATH . trim($path, '/');
}

function is_alnum($val) {
  return preg_match("/^[a-zA-Z0-9]+$/", $val);
}


function weather($val) {
  if($val == 1) {
    return 'sun';
  } elseif ($val == 2) {
    return 'cloud';
  } elseif ($val == 3) {
    return 'umbrella';
  } elseif ($val == 4) {
    return 'thunder';
  } 
}

function feeling($val) {
  if($val == 1) {
    return 'smile';
  } elseif ($val == 2) {
    return 'angry';
  } elseif ($val == 3) {
    return 'sad';
  } elseif ($val == 4) {
    return 'normal';
  } 
}

function escape($data) {
  if(is_array($data)) {

    foreach($data as $prop => $val) {
      $data[$prop] = escape($val);
    }

    return $data;
  } elseif(is_object($data)) {

    foreach($data as $prop => $val) {
      $data->$prop = escape($val);
    }

    return $data;

  } else {

    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    
  }
}

?>