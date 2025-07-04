<?php

class CreateReminders extends Controller {

    public function index() {		
      $this->view('createreminder/index');
      die;
    }

    public function create() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $reminder_id = $_POST['reminder_id'];
          print_r($reminder_id);

          $reminder = $this->model('Reminder');
          $reminder->delete($reminder_id);

          $_SESSION['flash'] = "Reminder deleted successfully.";

          header("Location: /reminders");
          exit;
      }
    }

}