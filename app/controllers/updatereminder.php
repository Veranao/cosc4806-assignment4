<?php

class UpdateReminder extends Controller {

    public function index() {		
      $this->view('updatereminder/index');
      die;
    }

    public function update() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $subject = $_POST['subject'];
          $reminder = $this->model('Reminder');
          $reminder->create($subject);

          $_SESSION['flash'] = "Reminder added successfully.";

          header("Location: /reminders");
          exit;
      }
    }

}