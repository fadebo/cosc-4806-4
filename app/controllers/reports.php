<?php
  class Reports extends Controller {
    public function index() {
      // Ensure only admin users can access
      if (!$_SESSION['is_admin']) {
          header('Location: /home');
          exit;
      }
      $this->view('reports/index');
    }
    public function allReminders() {
      // Ensure only admin users can access
      if (!$_SESSION['is_admin']) {
          header('Location: /home');
          exit;
      }
        // Logic to fetch all reminders
      
    }

    public function mostReminders() {
      // Ensure only admin users can access
      if (!$_SESSION['is_admin']) {
          header('Location: /home');
          exit;
      }
        // Logic to find who has the most reminders
    }

    public function totalLogins() {
      // Ensure only admin users can access
      if (!$_SESSION['is_admin']) {
          header('Location: /home');
          exit;
      }
        // Logic to count total logins by username
    }
  }
?>