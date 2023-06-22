<div class="container mt-4">
   <h2 class="mb-4">Modifier les détails de l'animal</h2>
   <form action="/update" method="post" class="update">
      <input type="hidden" name="id" value="<?= $animal->id ?>">
      <div class="form-group">
         <label for="name">Nom:</label>
         <input type="text" id="name" name="name" class="form-control" value="<?= $animal->name ?>">
      </div>
      <div class="form-group">
         <label for="sex">Sexe:</label>
         <select id="sex" name="sex" class="form-control">
            <option value="M" <?= $animal->sex == 'M' ? 'selected' : '' ?>>Mâle</option>
            <option value="F" <?= $animal->sex == 'F' ? 'selected' : '' ?>>Femelle</option>
         </select>
      </div>
      <div class="form-group">
         <label for="sterilized">Stérilisé:</label>
         <select id="sterilized" name="sterilized" class="form-control">
            <option value="1" <?= $animal->sterilized == 1 ? 'selected' : '' ?>>Oui</option>
            <option value="0" <?= $animal->sterilized == 0 ? 'selected' : '' ?>>Non</option>
         </select>
      </div>
      <div class="form-group">
         <label for="birth_date">Date de naissance:</label>
         <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?= $animal->birth_date ?>">
      </div>
      <div class="form-group">
         <label for="chip_id">Numéro de puce:</label>
         <input type="text" id="chip_id" name="chip_id" class="form-control" value="<?= $animal->chip_id ?>">
      </div>
      <div class="form-group">
         <label for="owner_id">Propriétaire:</label>
         <select id="owner_id" name="owner_id" class="form-control">
            <?php foreach ($owners as $owner) : ?>
            <option value="<?= $owner->id; ?>" <?= $animal->owner_id == $owner->id ? 'selected' : '' ?>>
               <?= $owner->first_name . ' ' . $owner->last_name; ?>
            </option>
            <?php endforeach; ?>
         </select>
      </div>
      <div class="form-group">
         <input type="submit" class="btn btn-primary" value="Enregistrer">
      </div>
   </form>
</div>
