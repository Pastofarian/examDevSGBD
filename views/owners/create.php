<h2>Ajouter un nouveau propriétaire</h2>

<form action="/owners" method="post" class="store">
    <div>
        <label for="first_name">Prénom:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Prénom">
    </div>
    <div>
        <label for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Nom de famille">
    </div>
    <div>
        <label for="birth_date">Date de naissance:</label>
        <input type="date" id="birth_date" name="birth_date" placeholder="Date de naissance">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Adresse e-mail">
    </div>
    <div>
        <label for="phone">Téléphone:</label>
        <input type="tel" id="phone" name="phone" placeholder="Numéro de téléphone">
    </div>
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form>


