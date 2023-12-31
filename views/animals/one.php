<div class="container mt-4">
   <div class="animal-details mb-4">
      <h2>Détails de l'animal</h2>
      <table class="table">
         <tr>
            <td><label>Nom:</label></td>
            <td><?= htmlspecialchars($animal->name); ?></td>
         </tr>
         <tr>
         <tr>
            <td><label>Sexe:</label></td>
            <td><?= htmlspecialchars($animal->sex === 'M' ? 'Male' : 'Femelle'); ?></td>
         </tr>
         <tr>
            <td><label>Stérilisé :</label></td>
            <td><?= htmlspecialchars($animal->sterilized == 1 ? 'Stérilisé' : 'Non Stérilisé'); ?></td>
         </tr>
         <tr>
            <td><label>Date de naissance:</label></td>
            <td><?= htmlspecialchars($animal->birth_date); ?></td>
         </tr>
         <tr>
            <td><label>Numéro de puce:</label></td>
            <td><?= htmlspecialchars($animal->chip_id); ?></td>
         </tr>
      </table>
   </div>
   <div class="mb-4">
      <h2>Détails du Propriétaire</h2>
      <?php 
         if ($owner): 
         ?>
      <p>Nom: <?= htmlspecialchars($owner->first_name . ' ' . $owner->last_name); ?></p>
      <p>Email: <?= htmlspecialchars($owner->email); ?></p>
      <p>Téléphone: <?= htmlspecialchars($owner->phone); ?></p>
      <?php else: ?>
      <p>Pas de propriétaire</p>
      <?php endif; ?>
   </div>
   <tr>
            <td><label>Parent:</label></td>
            <td>
               <?php if ($parent): ?>
               <?= htmlspecialchars($parent->name); ?> 
               <?php else: ?>
               Pas de parent
               <?php endif; ?>
            </td>
         </tr>
   <?php if ($children): ?>
    <div class="mb-4">
        <h2>Enfants</h2>
        <ul>
            <?php foreach ($children as $child): ?>
                <li><?= htmlspecialchars($child->name); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
   <div class="back-link">
      <a href="/animals" class="btn btn-primary">Retour à la liste</a>
   </div>
</div>
