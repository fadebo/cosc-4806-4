<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Create a New Reminder</h1>
            <form action="/reminders/create" method="POST">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Reminder</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>