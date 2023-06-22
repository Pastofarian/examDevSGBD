<div class="container mt-4">
<h2>Ajouter un nouveau propriétaire</h2>
<form action="/owners" method="post" class="store">
   <div class="form-group">
      <label for="first_name">Prénom:</label>
      <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Prénom">
   </div>
   <div class="form-group">
      <label for="last_name">Nom:</label>
      <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Nom de famille">
   </div>
   <div class="form-group">
      <label for="birth_date">Date de naissance:</label>
      <input type="date" id="birth_date" name="birth_date" class="form-control" placeholder="Date de naissance">
   </div>
   <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Adresse e-mail">
   </div>
   <div class="form-group">
      <label for="phone">Téléphone:</label>
      <input type="tel" id="phone" name="phone" class="form-control" placeholder="Numéro de téléphone">
   </div>
   <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Enregistrer">
   </div>
</form>
