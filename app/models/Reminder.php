<?php

class Reminder {

    public function __construct() {

    }

    public function get_all_reminders_by_user($user_id){
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM notes WHERE user_id = :user_id AND deleted = 0");
      $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_reminder($user_id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO notes (user_id, subject) VALUES (:user_id, :subject)");
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':subject', $subject);
      return $statement->execute();
    }
   
}
?>
  