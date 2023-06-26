<?php $currentPage = 'animals';
   include('../views/layout/top.php'); ?>
<div class="container mt-5">
   <table class="table table-striped table-hover">
      <thead>
         <tr>
            <th>Nom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Propriétaire</th>
            <th>Parent</th> <!-- Add a header for Parent -->
            <th>Afficher</th>
            <th>Modifier</th>
            <th>Effacer</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($animals as $animal): ?>
         <?php 
            $owner = $owners[$animal->id]; 
            $parent = $parents[$animal->id];  // Retrieve the parent for the current animal
         ?>
         <tr>
            <td><?= $animal->name; ?></td>
            <td><?= $animal->sex === 'M' ? 'Male' : 'Femelle'; ?></td>
            <td><?= $animal->birth_date; ?></td>
            <td><?= $owner->first_name . ' ' . $owner->last_name; ?></td>
            <td>
                <?php 
                    if($parent !== NULL) {
                        echo $parent->name;  
                    } else {
                        echo "Pas de parent";
                    }
                ?>
            </td>
            <td><button class="btn btn-primary xhr show" _id="<?= $animal->id; ?>">Afficher</button></td>
            <td><button class="btn btn-warning xhr edit" _id="<?= $animal->id; ?>">Modifier</button></td>
            <?php if(in_array($animal->id, $animalsWithStays)): ?>
            <td><button class="btn btn-danger xhr delete" _id="<?= $animal->id; ?>" disabled title="Animal réservé, effacement impossible">Effacer</button></td>
            <?php else: ?>
            <td><button class="btn btn-danger xhr delete" _id="<?= $animal->id; ?>">Effacer</button></td>
            <?php endif; ?>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <button class="btn btn-success xhr create">Nouvel Animal</button>
</div>
<?php include('../views/layout/bottom.php'); ?>
