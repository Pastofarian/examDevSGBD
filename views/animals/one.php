<div class="animal-details">
    <h2>Détail de l'animal</h2>
    <table>
        <tr>
            <td><label>Nom:</label></td>
            <td><?= htmlspecialchars($animal->name); ?></td>
        </tr>
        <tr>
            <td><label>Sexe:</label></td>
            <td><?= htmlspecialchars($animal->sex); ?></td>
        </tr>
        <tr>
            <td><label>Stérilisé :</label></td>
            <td><?= htmlspecialchars($animal->sterilized); ?></td>
        </tr>
        <tr>
            <td><label>Date de naissance:</label></td>
            <td><?= htmlspecialchars($animal->birth_date); ?></td>
        </tr>
        <tr>
            <td><label>Numéro de puce:</label></td>
            <td><?= htmlspecialchars($animal->chip_id); ?></td>
        </tr>
    </table>
</div>
<div class="owner-details">
    <h2>Détails du Propriétaire</h2>
    <?php 
        if ($owner): 
    ?>
        <p>Nom: <?= htmlspecialchars($owner->first_name . ' ' . $owner->last_name); ?></p>
        <p>Email: <?= htmlspecialchars($owner->email); ?></p>
        <p>Téléphone: <?= htmlspecialchars($owner->phone); ?></p>
    <?php else: ?>
        <p>Pas de propriétaire</p>
    <?php endif; ?>
</div>
<div class="back-link">
    <a href="/animals">Retour à la liste</a>
</div>
