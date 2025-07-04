<?php

class Reminder {

    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function update_reminder () {
      $db = db_connect();
      // do update statement here
    }

    public function delete ($id) {
      $db = db_connect();
      $statement = $db->prepare("DELETE FROM reminders WHERE id = :id");
      $statement->bindValue(':id', $id);
      $statement->execute();
      
    }
}
?>
