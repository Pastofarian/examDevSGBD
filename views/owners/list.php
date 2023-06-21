<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
include('../views/layout/top.php'); ?>
<?php $currentPage = 'owners'; ?>
<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Afficher</th>
            <th>Modifier</th>
            <th>Effacer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($owners as $owner): ?>
            <tr>
            <td><?= $owner->first_name; ?></td>
            <td><?= $owner->last_name; ?></td>
            <td><button class="xhr show" _id="<?= $owner->id; ?>">Afficher</button></td>
            <td><button class="xhr edit" _id="<?= $owner->id; ?>">Modifier</button></td>
            <td><button class="xhr delete" _id="<?= $owner->id; ?>">Effacer</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button class="xhr create">Nouveau propriétaire</button>
<?php include('../views/layout/bottom.php'); ?>