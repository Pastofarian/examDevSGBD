<div class="container mt-4">
<h2 class="mb-4">Modifier les détails du séjour</h2>
<form action="/update" method="post" class="update">
   <input type="hidden" name="id" value="<?= $stay->id ?>">
   <div class="form-group">
      <label for="start_date">Date de début:</label>
      <input type="date" id="start_date" name="start_date" class="form-control" value="<?= $stay->start_date ?>">
   </div>
   <div class="form-group">
      <label for="end_date">Date de fin:</label>
      <input type="date" id="end_date" name="end_date" class="form-control" value="<?= $stay->end_date ?>">
   </div>
   <div class="form-group">
      <label for="animal_id">Animal:</label>
      <select id="animal_id" name="animal_id" class="form-control">
         <?php foreach ($animals as $animal) : ?>
         <option value="<?= $animal->id; ?>" <?= $stay->animal_id == $animal->id ? 'selected' : '' ?>>
            <?= $animal->id . ' - ' . $animal->name; ?>
         </option>
         <?php endforeach; ?>
      </select>
   </div>
   <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Enregistrer">
   </div>
</form>
