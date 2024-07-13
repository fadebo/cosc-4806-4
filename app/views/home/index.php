<?php require_once 'app/views/templates/header.php' ?>
<div class="container-fluid">
    <!-- Alert -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Welcome back!</strong> You have 3 new notifications.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center mt-5">
            <h1 class="display-4 text-white">Welcome <?php echo $_SESSION['username']; ?></h1>
            <p class="lead text-white"><?= date("F jS, Y"); ?></p>
            <a href="/logout" class="btn btn-light mt-3">Logout</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Projects</h5>
                        <p class="card-text">5 Active</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Tasks</h5>
                        <p class="card-text">12 Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Messages</h5>
                        <p class="card-text">3 Unread</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Recent Activity</h5>
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
<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notification</strong>
      <small>Just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      You have a new message from the team.
    </div>
  </div>
</div>
    <?php require_once 'app/views/templates/footer.php' ?>
<script>
    // Initialize toast
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
      return new bootstrap.Toast(toastEl)
    })
    toastList[0].show()
</script>