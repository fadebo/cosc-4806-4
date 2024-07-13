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

    <!-- Chart -->
    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h5 class="card-title">Login Counts Chart</h5>
                    <canvas id="loginCountsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var chartData = <?php echo $data['chart_data']; ?>;

        console.log(chartData); // Print chart data to console for debugging

        var usernames = chartData.data.map(function(entry) {
            return entry.username;
        });

        console.log(usernames); // Print usernames to console

        var ctx = document.getElementById('loginCountsChart').getContext('2d');
        var loginCountsChart = new Chart(ctx, {
            type: 'bar', // Specify the chart type (bar, line, pie, etc.)
            data: {
                labels: usernames, // Use extracted usernames as labels
                datasets: [{
                    label: 'Login Counts',
                    data: chartData.data.map(function(entry) {
                        return entry.login_count;
                    }),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', 
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                }
            }
        });
    });
</script>
<?php require_once 'app/views/templates/footer.php'; ?>