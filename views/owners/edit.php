<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $owner->id ?>">
    <input type="text" name="first_name" placeholder="Prénom">
    <input type="text" name="last_name" placeholder="Nom">
    <input type="date" name="birth_date" placeholder="Date de naissance">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="phone" placeholder="Téléphone">
    <input type="submit" value="Enregistrer">
</form>