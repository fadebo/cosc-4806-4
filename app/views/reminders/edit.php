<?php 
global $reminder, $error;
require_once 'app/views/templates/header.php' ?>
<div class="container">
    <h1>Edit Reminder</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="/reminders/edit/<?= $reminder['id'] ?>" method="post">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" <?= $reminder['completed'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Update Reminder</button>
    </form>
</div>
<?php require_once 'app/views/templates/footer.php' ?>