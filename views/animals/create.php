<div class="container mt-4">
   <h2 class="mb-4">Créer un animal</h2>
   <form action="/animals/storeParent" method="post" class="store-parent">
      <div class="form-group">
         <input type="hidden" id="id" name="id" value="<?= $animal->id; ?>">
         <label for="name">Nom:</label>
         <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
      </div>
      <div class="form-group">
         <label for="sex">Sexe:</label>
         <select id="sex" name="sex" class="form-control">
            <option value="M">Mâle</option>
            <option value="F">Femelle</option>
         </select>
      </div>
      <div class="form-group">
         <label for="sterilized">Stérilisé:</label>
         <select id="sterilized" name="sterilized" class="form-control">
            <option value="1">Oui</option>
            <option value="0">Non</option>
         </select>
      </div>
      <div class="form-group">
         <label for="birth_date">Date de naissance:</label>
         <input type="date" id="birth_date" name="birth_date" class="form-control">
      </div>
      <div class="form-group">
         <label for="chip_id">Numéro de puce:</label>
         <input type="text" id="chip_id" name="chip_id" class="form-control" placeholder="Numéro de puce">
      </div>
      <div class="form-group">
         <label for="owner_id">Propriétaire:</label>
         <select id="owner_id" name="owner_id" class="form-control">
            <?php foreach ($owners as $owner) : ?>
            <option value="<?= $owner->id; ?>"><?= $owner->first_name . ' ' . $owner->last_name; ?></option>
            <?php endforeach; ?>
         </select>
      </div>
      <div class="form-group">
         <label for="parent_id">Parent:</label>
         <select id="parent_id" name="parent_id" class="form-control">
            <option value="">Pas de parent</option>
            <?php foreach ($possible_parents as $possible_parent) : ?>
            <option value="<?= $possible_parent->id; ?>"><?= $possible_parent->name; ?></option>
            <?php endforeach; ?>
         </select>
      </div>
      <div class="form-group">
         <input type="submit" class="btn btn-primary" value="Enregistrer">
      </div>
   </form>
</div>
