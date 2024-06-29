<?php 

class Reminders extends Controller {
  
    public function index() {
      $R = $this->model('Reminder');
      $list_of_reminders = $R->get_all_reminders();
      $this->view('reminders/index', ['reminders' => $list_of_reminders]);
    }
    public function create() {
      $this->view('reminders/create');
    }

    public function action(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $
      }
    }
}

?>