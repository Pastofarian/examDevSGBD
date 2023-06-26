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
            <th>Parent</th> 
            <th>Enfants</th>
            <th>Afficher</th>
            <th>Modifier</th>
            <th>Effacer</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($animals as $animal): ?>
         <?php 
            $owner = $owners[$animal->id]; 
            $parent = $parents[$animal->id]; 
         ?>
         <tr>
            <td><?= $animal->name; ?></td>
            <td><?= $animal->sex === 'M' ? 'Male' : 'Femelle'; ?></td>
            <td><?= $animal->birth_date; ?></td>
            <td><?= $owner->first_name . ' ' . $owner->last_name; ?></td>
            <td>
               <?php if ($parent): ?>
                  <?= htmlspecialchars($parent->name); ?> 
               <?php else: ?>
                  Pas de parent
               <?php endif; ?>   
            </td>
            <td>
               <?php 
                  $children = array_filter($animals, function ($childAnimal) use ($animal) {
                     return $childAnimal->parent_id == $animal->id;
                  });

                  if (!empty($children)) {
                     $childNames = array_map(function ($childAnimal) {
                        return $childAnimal->name;
                     }, $children);
                     echo implode(', ', $childNames);
                  }
               ?>
            </td>
            <td><button class="btn btn-primary xhr show" _id="<?= $animal->id; ?>">Afficher</button></td>
            <td><button class="btn btn-warning xhr edit" _id="<?= $animal->id; ?>">Modifier</button></td>
            <?php if (in_array($animal->id, $animalsWithStays)): ?>
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
