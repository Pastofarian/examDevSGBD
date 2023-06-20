<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $animal->id ?>">
    <input type="text" name="name" placeholder="Nom">
    <input type="text" name="sex" placeholder="Sexe">
    <input type="text" name="sterilized" placeholder="Sterilisé">
    <input type="date" name="birth_date" placeholder="Date de naissance">
    <input type="text" name="chip_id" placeholder="Numéro puce">
    <input type="submit" value="Enregistrer">
</form>