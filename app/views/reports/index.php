<?php require_once 'app/views/templates/header.php'; 

global $data;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center mt-5">
            <h1 class="display-4 text-white">Admin Dashboard</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">View All Reminders</h5>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($data['all_reminders'] as $reminder): ?>
                                <li class="list-group-item"><?= htmlspecialchars($reminder['subject']); ?> by <strong><?= htmlspecialchars($reminder['username']); ?> </strong></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Who Has the Most Reminders</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= htmlspecialchars($data['most_reminders']['username']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Logins by Username</h5>
                        <ul class="list-group list-group-flush">
                            <?php 
                                // var_dump($data['login_counts']);
                            foreach ($data['login_counts'] as $username => $count): 
                                // var_dump($count);
                                ?>
                                <li class="list-group-item"><?= htmlspecialchars($count['username'] . ' logged in ' . $count['login_count']); ?> time(s)</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">View All Reminders</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white">Updated project documentation</li>
                        <li class="list-group-item bg-dark text-white">Completed task: Design homepage</li>
                        <li class="list-group-item bg-dark text-white">New message from client</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>