<h2>Modifier les détails du propriétaire</h2>

<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $owner->id ?>">
    <div>
        <label for="first_name">Prénom:</label>
        <input type="text" id="first_name" name="first_name" value="<?= $owner->first_name ?>">
    </div>
    <div>
        <label for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name" value="<?= $owner->last_name ?>">
    </div>
    <div>
        <label for="birth_date">Date de naissance:</label>
        <input type="date" id="birth_date" name="birth_date" value="<?= $owner->birth_date ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $owner->email ?>">
    </div>
    <div>
        <label for="phone">Téléphone:</label>
        <input type="text" id="phone" name="phone" value="<?= $owner->phone ?>">
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>