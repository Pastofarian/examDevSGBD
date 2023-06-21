<form action="/update" method="post" class="update">
    <input type="hidden" name="id" value="<?= $stay->id ?>">
    <input type="date" name="reservation_date" placeholder="Date de réservation">
    <input type="date" name="start_date" placeholder="Date de début">
    <input type="date" name="end_date" placeholder="Date de fin">
    <input type="submit" value="Enregistrer">
</form>