<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
include('../views/layout/top.php'); ?>
<?php $currentPage = 'stays'; ?>
<table>
    <thead>
        <tr>
            <th>Date de réservation</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Afficher</th>
            <th>Modifier</th>
            <th>Effacer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($stays as $stay): ?>
            <tr>
            <td><?= $stay->reservation_date; ?></td>
            <td><?= $stay->start_date; ?></td>
            <td><?= $stay->end_date; ?></td>
            <td><button class="xhr show" _id="<?= $stay->id; ?>">Afficher</button></td>
            <td><button class="xhr edit" _id="<?= $stay->id; ?>">Modifier</button></td>
            <td><button class="xhr delete" _id="<?= $stay->id; ?>">Effacer</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button class="xhr create">Nouveau séjour</button>
<?php include('../views/layout/bottom.php'); ?>

