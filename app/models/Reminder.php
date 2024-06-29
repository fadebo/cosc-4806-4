<?php

class Reminder {

    public function __construct() {

    }

    public function get_all_reminders(){
      $db = db_connect();
      $statement = $db->prepare("select * from notes;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
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
  