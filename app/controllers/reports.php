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
            //Didn't send be back to home page, same problem as last time. It's not redirecting to the specified location, tried to echo as you suggested last time and it works but still doesn't redirect.
            echo"You are not authorized to access this page.";
            header('Location: /home');
            exit;
        }
        // Fetch data for the chart
        $loginCounts = $this->usersModel->get_login_counts();

        // Prepare data for the chart
        $chartData = [
            'labels' => array_keys($loginCounts),
            'data' => array_values($loginCounts)
        ];
      
        // Reports data retrieval
        $this->data = [
            'all_reminders' => $this->remindersModel->get_all_reminders_with_username(),
            'most_reminders' => $this->remindersModel->get_user_with_most_reminders(),
            'login_counts' => $loginCounts,
            'chart_data' => json_encode($chartData) // Encode chart data as JSON for JavaScript
        ];

        // Assign $data to the global scope
        global $data;
        $data = $this->data;

        $this->view('reports/index');
    }
}
?>