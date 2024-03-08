<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      $adresse = $_POST['adresse'];
      $ville = $_POST['ville'];
      $surface = $_POST['surface'];
      $chambres = $_POST['chambres'];
      $prix = $_POST['prix'];

      try {
            $stmt = $bdd->prepare("INSERT INTO annonces (titre, description, adresse, ville, surface, chambres, prix) VALUES (:titre, :description, :adresse, :ville, :surface, :chambres, :prix)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':surface', $surface);
            $stmt->bindParam(':chambres', $chambres);
            $stmt->bindParam(':prix', $prix);
            $stmt->execute();

            echo "Données enregistrées avec succès.";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une annonce</title>
</head>
<body>

<a href='index.html' title='back'>Back</a><br>
<h1>Ajouter une annonce</h1>
<form method="POST" action="annonce.php">
    
    <div class="form-floating">
        <label for="titre">Titre</label>
        <input type="text" name="titre" class="form-control" id="titre" placeholder="titre" required>
    </div>
    <div class="form-floating">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="description" required>
    </div>
    <div class="form-floating">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="adresse" required>
    </div>
    <div class="form-floating">
        <label for="ville">Ville</label>
        <input type="text" name="ville" class="form-control" id="ville" placeholder="ville" rfequired>
    </div>
    <div class="form-floating">
        <label for="surface">Surface</label>
        <input type="text" name="surface" class="form-control" id="surface" placeholder="surface" required>
    </div>
    <div class="form-floating">
        <label for="chambres">Chambres</label>
        <input type="text" name="chambres" class="form-control" id="chambres" placeholder="chambres" required>
    </div>
    <div class="form-floating">
        <label for="prix">Prix</label>
        <input type="text" name="prix" class="form-control" id="prix" placeholder="prix" required>
    </div>
    <button type="submit" class="btn">Envoyer</button>
</form>
</body>
</html>