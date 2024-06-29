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
    public function get_reminder($id) {
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM notes WHERE id = :id AND deleted = 0");
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();
      return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function create_reminder($user_id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO notes (user_id, subject) VALUES (:user_id, :subject)");
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':subject', $subject);
      return $statement->execute();
    }

    public function update_reminder($id, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET subject = :subject, completed = :completed WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        $statement->bindParam(':completed', $completed, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function delete_reminder($id) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET deleted = 1 WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function mark_completed($id) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET completed = 1 WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
?>
  