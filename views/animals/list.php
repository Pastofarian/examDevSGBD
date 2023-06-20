<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
include('../views/layout/top.php'); ?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Age</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($animals as $animal): ?>
            <tr>
            <td><?= $animal->name; ?></td>
            <td><?= $animal->sex; ?></td>
            <td><?= $animal->birth_date; ?></td>
            <td><button class="xhr show" _id="<?= $animal->id; ?>">Show</button></td>
            <td><button class="xhr edit" _id="<?= $animal->id; ?>">Edit</button></td>
            <td><button class="xhr delete" _id="<?= $animal->id; ?>">Delete</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button class="xhr create">New Animal</button>
<?php include('../views/layout/bottom.php'); ?>