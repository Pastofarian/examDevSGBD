<div class="container mt-4">
   <h2 class="mb-4">Modifier les détails du propriétaire</h2>
   <form action="/update" method="post" class="update">
      <input type="hidden" name="id" value="<?= $owner->id ?>">
      <div class="form-group">
         <label for="first_name">Prénom:</label>
         <input type="text" id="first_name" name="first_name"class="form-control" value="<?= $owner->first_name ?>">
      </div>
      <div class="form-group">
         <label for="last_name">Nom:</label>
         <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $owner->last_name ?>">
      </div>
      <div class="form-group">
         <label for="birth_date">Date de naissance:</label>
         <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?= $owner->birth_date ?>">
      </div>
      <div class="form-group">
         <label for="email">Email:</label>
         <input type="text" id="email" name="email" class="form-control" value="<?= $owner->email ?>">
      </div>
      <div class="form-group">
         <label for="phone">Téléphone:</label>
         <input type="text" id="phone" name="phone"  class="form-control" value="<?= $owner->phone ?>">
      </div>
      <div class="form-group">
         <input type="submit" class="btn btn-primary" value="Enregistrer">
      </div>
   </form>
</div>
