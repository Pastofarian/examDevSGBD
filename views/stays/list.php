<?php $currentPage = 'stays';
   include('../views/layout/top.php'); ?>
<div class="container mt-5">
   <table class="table table-striped table-hover">
      <thead>
         <tr>
            <th>N°puce de l'animal</th>
            <th>Nom de l'animal</th>
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
         <?php 
            if (!array_key_exists($stay->animal_id, $animalsById)) {
                continue; 
            }
            
            $animal = $animalsById[$stay->animal_id]; 
            //var_dump($animal);
            ?>
         <tr>
            <td><?= $animalsById[$stay->animal_id]->chip_id; ?></td>
            <td><?= $animalsById[$stay->animal_id]->name; ?></td>
            <td><?= $stay->reservation_date; ?></td>
            <td><?= $stay->start_date; ?></td>
            <td><?= $stay->end_date; ?></td>
            <td><button class="btn btn-primary  xhr show" _id="<?= $stay->id; ?>">Afficher</button></td>
            <td><button class="btn btn-warning  xhr edit" _id="<?= $stay->id; ?>">Modifier</button></td>
            <td><button class="btn btn-danger xhr delete" _id="<?= $stay->id; ?>">Effacer</button></td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <button class="btn btn-success xhr create">Nouveau séjour</button>
</div>
<?php include('../views/layout/bottom.php'); ?>
