<div class="container mt-4">
<div class="animal-details mb-4">
    <h2>Détails du propriétaire</h2>
    <table class="table">
        <tr>
            <td><label>Prénom:</label></td>
            <td><?= htmlspecialchars($owner->first_name); ?></td>
        </tr>
        <tr>
            <td><label>Nom:</label></td>
            <td><?= htmlspecialchars($owner->last_name); ?></td>
        </tr>
        <tr>
            <td><label>Date de naissance:</label></td>
            <td><?= htmlspecialchars($owner->birth_date); ?></td>
        </tr>
        <tr>
            <td><label>Email:</label></td>
            <td><?= htmlspecialchars($owner->email); ?></td>
        </tr>
        <tr>
            <td><label>Téléphone:</label></td>
            <td><?= htmlspecialchars($owner->phone); ?></td>
        </tr>
    </table>
</div>
<div class="mb-4">
    <h2>Animal / Animaux</h2>
    <?php 
        $ownerAnimals = isset($animals) && is_array($animals) ? $animals : array(); 
        if (!empty($ownerAnimals)): 
    ?>
        <ul>
            <?php foreach($ownerAnimals as $animal): ?>
                <li><?= htmlspecialchars($animal->name); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Il n'y a pas d'animal</p>
    <?php endif; ?>
</div>

<div class="back-link">
    <a href="/owners" class="btn btn-primary">Retour à la liste</a>
</div>
