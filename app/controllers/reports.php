<?php
class Reports extends Controller {
    private $remindersModel;
    private $usersModel;
    private $data; // Declare $data as a class property

    public function __construct() {
        $this->remindersModel = $this->model('Reminder');
        $this->usersModel = $this->model('User');
        $this->data = []; // Initialize $data as an empty array
    }

    public function index() {
        // Ensure only admin users can access
        if (!$_SESSION['is_admin']) {
            header('Location: /home');
            exit;
        }

        // Reports data retrieval
        $this->data = [
            'all_reminders' => $this->remindersModel->get_all_reminders_with_username(),
            'most_reminders' => $this->remindersModel->get_user_with_most_reminders(),
            'login_counts' => $this->usersModel->get_login_counts()
        ];

        // Assign $data to the global scope
        global $data;
        $data = $this->data;

        $this->view('reports/index');
    }
}
?>