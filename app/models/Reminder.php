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
    public function get_all_reminders_with_username() {
        $db = db_connect();
        $statement = $db->prepare("
            SELECT notes.*, users.username
            FROM notes
            JOIN users ON notes.user_id = users.id
            WHERE notes.deleted = 0
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_user_with_most_reminders() {
        $db = db_connect();
        $statement = $db->prepare("
            SELECT users.username, COUNT(*) as reminder_count 
            FROM notes 
            JOIN users ON notes.user_id = users.id 
            WHERE notes.deleted = 0 
            GROUP BY notes.user_id 
            ORDER BY reminder_count DESC 
            LIMIT 1
        ");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>
  