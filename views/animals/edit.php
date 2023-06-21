<h2>Modifier les détails de l'animal</h2>

<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $animal->id ?>">
    <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="<?= $animal->name ?>">
    </div>
    <div>
        <label for="sex">Sexe:</label>
        <select id="sex" name="sex">
            <option value="M" <?= $animal->sex == 'M' ? 'selected' : '' ?>>Mâle</option>
            <option value="F" <?= $animal->sex == 'F' ? 'selected' : '' ?>>Femelle</option>
        </select>
    </div>
    <div>
        <label for="sterilized">Stérilisé:</label>
        <select id="sterilized" name="sterilized">
            <option value="1" <?= $animal->sterilized == 1 ? 'selected' : '' ?>>Oui</option>
            <option value="0" <?= $animal->sterilized == 0 ? 'selected' : '' ?>>Non</option>
        </select>
    </div>
    <div>
        <label for="birth_date">Date de naissance:</label>
        <input type="date" id="birth_date" name="birth_date" value="<?= $animal->birth_date ?>">
    </div>
    <div>
        <label for="chip_id">Numéro de puce:</label>
        <input type="text" id="chip_id" name="chip_id" value="<?= $animal->chip_id ?>">
    </div>
    <div>
        <label for="owner_id">Propriétaire:</label>
        <select id="owner_id" name="owner_id">
            <?php foreach ($owners as $owner) : ?>
                <option value="<?= $owner->id; ?>" <?= $animal->owner_id == $owner->id ? 'selected' : '' ?>>
                    <?= $owner->first_name . ' ' . $owner->last_name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>
