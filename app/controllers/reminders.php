<?php 

class Reminders extends Controller {
    private $remindersModel;
    private $user_id;
    public function __construct() {
      
      $this->remindersModel = $this->model('Reminder');
      $this->user_id = $_SESSION['user_id'];
    }
    public function index() {
      // $user_id = $_SESSION['user_id'];
      // $R = $this->model('Reminder');
      
      $list_of_reminders = $this->remindersModel->get_all_reminders_by_user($this->user_id);
      //var_dump($list_of_reminders);
      // $data['reminders'] = $list_of_reminders;
      global $reminders;
      $reminders = $list_of_reminders;
      $this->view('reminders/index');
      //$this->view('reminders/index', ['notes' => $list_of_reminders]);
    }
    public function create() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $subject = $_REQUEST['subject'];
        $user_id = $_SESSION['user_id'];
        $R = $this->model('Reminder');
        $R->create_reminder($user_id, $subject);

        header('Location: /reminders');
        exit;
      } else{
        $this->view('reminders/create');
      }
    }

  public function edit($id) {
      global $reminder, $error;

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $subject = $_POST['subject'];
          $completed = isset($_POST['completed']) ? 1 : 0;

          if ($this->remindersModel->update_reminder($id, $subject, $completed)) {
              header('Location: /reminders');
              exit;
          } else {
              $error = 'Failed to update reminder';
              $reminder = $this->remindersModel->get_reminder($id);
          }
      } else {
          $reminder = $this->remindersModel->get_reminder($id);
          if (!$reminder) {
              header('Location: /reminders');
              exit;
          }
      }

      $this->view('reminders/edit');
  }
    public function delete($id) {
        if ($this->remindersModel->delete_reminder($id)) {
            header('Location: /reminders');
            exit;
        } else {
            // Handle error
            $this->view('reminders/index', ['error' => 'Failed to delete reminder']);
        }
    }

    public function complete($id) {
        if ($this->remindersModel->mark_completed($id)) {
            header('Location: /reminders');
            exit;
        } else {
            // Handle error
            $this->view('reminders/index', ['error' => 'Failed to mark reminder as completed']);
        }
    }
}

?>