<?php $currentPage = 'owners';
   include('../views/layout/top.php'); ?>
<div class="container mt-5">
   <table class="table table-striped table-hover">
      <thead>
         <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Animal</th>
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
            <td>
               <?php 
                  $ownerAnimals = array_key_exists($owner->id, $animals) ? $animals[$owner->id] : array();
                  if (!empty($ownerAnimals)) {
                      foreach($ownerAnimals as $animal) {
                          echo $animal->name . '<br>';
                      }
                  } else {
                      echo 'Pas d\'animal';
                  }
                  ?>
            </td>
            <td><button class="btn btn-primary xhr show" _id="<?= $owner->id; ?>">Afficher</button></td>
            <td><button class="btn btn-warning xhr edit" _id="<?= $owner->id; ?>">Modifier</button></td>
            <?php if(!empty($ownerAnimals)): ?>
            <td><button class="btn btn-danger xhr delete" _id="<?= $owner->id; ?>" disabled title="Propriétaire avec un animal, effacement impossible">Effacer</button></td>
            <?php else: ?>
            <td><button class="btn btn-danger xhr delete" _id="<?= $owner->id; ?>">Effacer</button></td>
            <?php endif; ?>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <button class="btn btn-success xhr create">Nouveau propriétaire</button>
</div>
<?php include('../views/layout/bottom.php'); ?>
