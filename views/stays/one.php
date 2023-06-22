<div class="container mt-4">
   <div class="animal-details mb-4">
      <h2>Détails du séjour</h2>
      <table class="table">
         <tr>
            <td><label>Date de réservation :</label></td>
            <td><?= htmlspecialchars($stay->reservation_date); ?></td>
         </tr>
         <tr>
            <td><label>Date de début :</label></td>
            <td><?= htmlspecialchars($stay->start_date); ?></td>
         </tr>
         <tr>
            <td><label>Date de fin : </label></td>
            <td><?= htmlspecialchars($stay->end_date); ?></td>
         </tr>
         <?php if($animal): ?>  
         <tr>
            <td><label>Id de l'animal : </label></td>
            <td><?= htmlspecialchars($animal->id); ?></td>
         </tr>
         <tr>
            <td><label>Nom de l'animal : </label></td>
            <td><?= htmlspecialchars($animal->name); ?></td>
         </tr>
         <?php endif; ?>
      </table>
   </div>
   <div class="back-link">
      <a href="/stays" class="btn btn-primary">Retour à la liste</a>
   </div>
</div>
