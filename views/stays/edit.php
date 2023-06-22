<h2>Modifier les détails du séjour</h2>

<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $stay->id ?>">
    <div>
        <label for="start_date">Date de début:</label>
        <input type="date" id="start_date" name="start_date" value="<?= $stay->start_date ?>">
    </div>
    <div>
        <label for="end_date">Date de fin:</label>
        <input type="date" id="end_date" name="end_date" value="<?= $stay->end_date ?>">
    </div>
    <div>
        <label for="animal_id">Animal:</label>
        <select id="animal_id" name="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id; ?>" <?= $stay->animal_id == $animal->id ? 'selected' : '' ?>>
                    <?= $animal->id . ' - ' . $animal->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>
