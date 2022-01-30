<?php
namespace db;

use db\DataSource;
use model\DiaryModel;

class DiaryQuery {
  public static function fetchByUserId($user) {

    if(!$user->isValidId()) {
      return false;
    }
    $db = new DataSource;
    $sql = '
    select * from diaries 
    where user_id = :id 
    and del_flg != 1 
    order by id desc;';

    $result = $db->select($sql, [
      ':id' => $user->id
    ], DataSource::CLS, DiaryModel::class);

    return $result;
  }

  
  public static function fetchByOtherUserId($user_id) {

    $db = new DataSource;
    $sql = '
    select * from diaries 
    where user_id = :id 
    and published = 1
    and del_flg != 1 
    order by date desc;';

    $result = $db->select($sql, [
      ':id' => $user_id
    ], DataSource::CLS, DiaryModel::class);

    return $result;
  }
  
  public static function fetchByDiaryId($diary_id) {

    $db = new DataSource;
    $sql = '
    select * from diaries 
    where id = :id
    and published = 1
    and del_flg != 1;';

    $result = $db->selectOne($sql, [
      ':id' => $diary_id
    ], DataSource::CLS, DiaryModel::class);

    return $result;
  }

  
  public static function fetchPublishedDiaries() {

    $db = new DataSource;
    $sql = 'select d.*, u.nickname from diaries d
      inner join users u 
      on d.user_id = u.id 
      and d.del_flg != 1
      and u.del_flg != 1
      order by d.id desc ;';

    $result = $db->select($sql, [], DataSource::CLS, DiaryModel::class);

    return $result;
  }
  
  public static function fetchById($diary) {

    if(!$diary->isValidId()) {
      return false;
    }

    $db = new DataSource;
    $sql = 'select d.*, u.nickname from diaries d
      inner join users u 
        on d.user_id = u.id
      where d.id = :id 
        and d.del_flg != 1
        and u.del_flg != 1
      order by d.id desc ;';

    $result = $db->selectOne($sql, [
      ':id' => $diary->id
    ], DataSource::CLS, DiaryModel::class);

    return $result;
  }

  
  public static function isUserOwnDiary($diary_id, $user) {

    if(!(DiaryModel::validateId($diary_id) && $user->isValidId())) {
      return false;
    }

    $db = new DataSource;
    $sql = '
    select count(1) as count from diaries d 
    where d.id = :diary_id
      and d.user_id = :user_id
      and d.del_flg != 1;';

    $result =  $db->selectOne($sql, [
      ':diary_id' => $diary_id,
      ':user_id' => $user->id,
    ]);

    return !empty($result) && $result['count'] != 0;
    
  }

  public static function update($diary) {

    //check value
    $db = new DataSource;
    $sql = '
    update diaries 
    set title = :title,
      body = :body,
      date = :date,
      weather = :weather,
      feeling = :feeling,
      published = :published,
      comment = :comment,
      file = :file
    where id = :diary_id';

    return $db->execute($sql, [
          ':diary_id' => $diary->id,
          ':title' => $diary->title,
          ':body' => $diary->body,
          ':date' => $diary->date,
          ':weather' => $diary->weather,
          ':feeling' => $diary->feeling,
          ':published' => $diary->published,
          ':comment' => $diary->comment,
          ':file' => $diary->file,
    ]);

    // return true;
  }
  public static function insert($diary, $user) {

    //value check

    $db = new DataSource;
    $sql = '
    insert into diaries(title, date, body, weather, feeling, published, comment, user_id, file) 
    values (:title, :date, :body, :weather, :feeling, :published, :comment, :user_id, :file)';


    return $db->execute($sql, [
      ':title' => $diary->title,
      ':date' => $diary->date,
      ':body' => $diary->body,
      ':weather' => $diary->weather,
      ':feeling' => $diary->feeling,
      ':published' => $diary->published,
      ':comment' => $diary->comment,
      ':user_id' => $user->id,
      ':file' => $diary->file,
    ]);
  }

  public static function recent() {

    $db = new DataSource();
    $sql = '
    select * from diaries d
    where published = 1
   and del_flg != 1
    order by updated_at desc
    limit 30';

    $result = $db->select($sql, [], DataSource::CLS, DiaryModel::class);

    return $result;
  }
  
  public static function search($keyword, $date_start, $date_end, $weather, $feeling) {

    $db = new DataSource();
    $sql = '
    select * from diaries d
    where published = 1
    and del_flg != 1';

    $conditions = array();

    if(!empty($keyword)) {

      $sql = $sql . ' and (title like :title_keyword
              or body like :body_keyword)';

      $conditions = $conditions + array(
      ':title_keyword' => "%{$keyword}%",
      ':body_keyword' => "%{$keyword}%",);

    }

    if(!empty($date_start) && !empty($date_end)) {

      $sql = $sql . ' and date BETWEEN :date_start and :date_end';

      
      $conditions = $conditions + array(
      ':date_start' => $date_start,
      ':date_end' => $date_end,);

    }

    
    if(!empty($weather)) {

      $sql = $sql . ' and weather = :weather';

      $conditions = $conditions + array(
      ':weather' => $weather,);

    }

    if(!empty($feeling)) {

      $sql = $sql . ' and feeling = :feeling';

      $conditions = $conditions + array(
      ':feeling' => $feeling,);

    }

    $sql = $sql . ' order by updated_at desc;';
    

    $result = $db->select($sql, $conditions, DataSource::CLS, DiaryModel::class);

    return $result;
  }

  public static function getNickname($diary) {
    
    $db = new DataSource;
    $sql = '
    select d.*, u.nickname from diaries d
    inner join users u 
      on d.user_id = u.id
    where d.id = :diary_id
      and d.del_flg != 1
      and u.del_flg != 1
    order by d.id desc ;';

    $result = $db->selectOne($sql, [
      ':diary_id' => $diary->id
    ], DataSource::CLS, DiaryModel::class);

    return $result->nickname;
  }

  public static function commentCount($diary) {

    $db = new DataSource;
    $sql = '
    select count(0) as cnt from comments c
    where diary_id = :diary_id;';


    $result = $db->selectOne($sql, [
      ':diary_id' => $diary->id,
    ], DataSource::CLS, DiaryModel::class);

    return $result->cnt;
  }

  public static function delete($diary) {

    $db = new DataSource;
    $sql = '
    update diaries
    set del_flg = 1 
    where id = :diary_id;';

    $result = $db->execute($sql, [
      ':diary_id' => $diary->id,
    ]);

    return $result;

  }
  
  public static function commentedList($user) {

    $db = new DataSource();
    $sql = 'select distinct diary_id from comments 
    where user_id = :user_id
    order by diary_id desc;';

    $result = $db->select($sql, [
      ':user_id' => $user->id,
    ]);

    return $result;
  }
}
