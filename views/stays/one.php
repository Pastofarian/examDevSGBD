
<div class="stay-details">
    <h2>Détails du séjour</h2>
    <table>
        <tr>
            <td><label>Date de réservation :</label></td>
            <td><?= htmlspecialchars($stay->reservation_date); ?></td>
        </tr>
        <tr>
            <td><label>Date de début :</label></td>
            <td><?= htmlspecialchars($stay->start_date); ?></td>
        </tr>
        <tr>
            <td><label>Date de fin : </label></td>
            <td><?= htmlspecialchars($stay->end_date); ?></td>
        </tr>
        <?php if($stay->animal()): ?>
            <tr>
                <td><label>Id de l'animal : </label></td>
                <td><?= htmlspecialchars($stay->animal()->id); ?></td>
            </tr>
            <tr>
                <td><label>Nom de l'animal : </label></td>
                <td><?= htmlspecialchars($stay->animal()->name); ?></td>
            </tr>
        <?php endif; ?>
    </table>
</div>
<div class="back-link">
    <a href="/stays">Retour à la liste</a>
</div>
