

<!DOCTYPE html>
<html>
<head>
  <title>Liste</title>
</head>
<body>
  <h1>Ajouter un utilisateur</h1>
  <form method="POST" action="traitement.php">
    <label for="nom">Nom</label>
    <input type="text" name="nom">  
    <label for="nom">Prenom</label>  
    <input type="text" name="prenom">
    <label for="nom">Organisateur du meeting Numero ? (0 si ce n'est pas le cas)</label>  
    <input type="number" name="reunion" value="0">
    <input type="submit" value="Envoyer">  
  </form>
</body>
</html>