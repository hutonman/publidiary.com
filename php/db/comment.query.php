<?php
namespace db;

use db\DataSource;
use model\CommentModel;

class CommentQuery {
  public static function fetchByDiaryId($diary) {

    if(!$diary->isValidId()) {
      return false;
    }
    $db = new DataSource;
    $sql = 'select c.*, u.nickname from comments c 
      inner join users u 
      on c.user_id = u.id 
      where c.diary_id = :id
      and c.body != ""
      and c.del_flg != 1
      and u.del_flg != 1
      order by c.id desc ;';

    $result = $db->select($sql, [
      ':id' => $diary->id
    ]);

    return $result;
  }

  public static function insert($comment) {
    $db = new DataSource;
    $sql = 'insert into comments(diary_id, body, user_id) values (:diary_id, :body, :user_id)';

    return $db->execute($sql, [
          ':diary_id' => $comment->diary_id,
          ':body' => $comment->body,
          ':user_id' => $comment->user_id,
    ]);
  }
}

?>