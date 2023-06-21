<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
include('../views/layout/top.php'); ?>
<?php $currentPage = 'animals'; ?>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Afficher</th>
            <th>Modifier</th>
            <th>Effacer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($animals as $animal): ?>
            <tr>
            <td><?= $animal->name; ?></td>
            <td><?= $animal->sex; ?></td>
            <td><?= $animal->birth_date; ?></td>
            <td><button class="xhr show" _id="<?= $animal->id; ?>">Afficher</button></td>
            <td><button class="xhr edit" _id="<?= $animal->id; ?>">Modifier</button></td>
            <td><button class="xhr delete" _id="<?= $animal->id; ?>">Effacer</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button class="xhr create">Nouvel Animal</button>
<?php include('../views/layout/bottom.php'); ?>

