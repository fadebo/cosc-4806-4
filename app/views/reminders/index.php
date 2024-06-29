<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p> <a href="/reminders/create">Create a reminder </a></p>
            </div>
        </div>
    </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">User Id</th>
        <th scope="col">Subject</th>
        <th scope="col">Created At</th>
        <th scope="col">Completed</th>
        <th scope="col">Deleted</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        global $reminders;
       // var_dump($reminders); // Add this line to view the $notes variable
        foreach ($reminders as $note): ?>
            <tr>
              <th scope="row"><?= $note['id']; ?></th>
              <td><?= $note['user_id']; ?></td>
              <td><?= $note['subject']; ?></td>
              <td><?= $note['created_at']; ?></td>
              <td><?= $note['completed'] ? 'Yes' : 'No'; ?></td>
              <td><?= $note['deleted'] ? 'Yes' : 'No'; ?></td>
              <td>
                  <a href="/reminders/edit/<?= $note['id']; ?>">Edit</a> 
                  <a href="/reminders/delete/<?= $note['id']; ?>">Delete</a>
              </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require_once 'app/views/templates/footer.php' ?>
          