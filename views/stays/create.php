<h2>Ajouter un nouveau séjour</h2>

<form action="/stays" method="post" class="store">
    <div>
        <label for="start_date">Date de début:</label>
        <input type="date" id="start_date" name="start_date" placeholder="Date de début">
    </div>
    <div>
        <label for="end_date">Date de fin:</label>
        <input type="date" id="end_date" name="end_date" placeholder="Date de fin">
    </div>
    <div>
        <label for="animal_id">Animal:</label>
        <select id="animal_id" name="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id; ?>">
                    <?= $animal->id . ' - ' . $animal->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>
