<?php

class Reminder {

    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders where user_id = :user_id AND deleted_at IS NULL;");
      $statement->bindValue(':user_id', $_SESSION['user_id']);
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get ($id) {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders where id = :id;");
      $statement->bindValue(':id', $id);
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);

      return $rows;
    }

    public function update_reminder ($id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
      $statement->bindValue(':subject', $subject);
      $statement->bindValue(':id', $id);
      $statement->execute();
    }

    public function create($subject) {
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject)");
      $statement->bindValue(':user_id', $_SESSION['user_id']);
      $statement->bindValue(':subject', $subject);
      $statement->execute();
    }

    public function delete ($id) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET deleted_at = NOW(3) WHERE id = :id");
      $statement->bindValue(':id', $id);
      $statement->execute();
      
    }

    public function mark_complete ($id) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET completed_at = NOW(3) WHERE id = :id");
      $statement->bindValue(':id', $id);
      $statement->execute();
  
    }
}
?>
