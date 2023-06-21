<h2>Créer un nouvel animal</h2>

<form action="/animals" method="post" class="store">
    <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" placeholder="Nom">
    </div>
    <div>
        <label for="sex">Sexe:</label>
        <select id="sex" name="sex">
            <option value="Male">Mâle</option>
            <option value="Female">Femelle</option>
        </select>
    </div>
    <div>
        <label for="sterilized">Stérilisé:</label>
        <select id="sterilized" name="sterilized">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div>
        <label for="birth_date">Date de naissance:</label>
        <input type="date" id="birth_date" name="birth_date">
    </div>
    <div>
        <label for="chip_id">Numéro de puce:</label>
        <input type="text" id="chip_id" name="chip_id" placeholder="Numéro de puce">
    </div>
    <div>
        <label for="owner_id">Propriétaire:</label>
        <select id="owner_id" name="owner_id">
            <?php foreach ($owners as $owner) : ?>
                <option value="<?= $owner->id; ?>"><?= $owner->first_name . ' ' . $owner->last_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>
