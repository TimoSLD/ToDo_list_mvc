<?php

function getAllList(){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT * FROM list");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;
}

function getList($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM list WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
 }

function createList($titel){
    // Maak hier de code om een medewerker toe te voegen
    $conn = openDatabaseConnection();
    $statement = $conn->prepare("INSERT INTO list (titel) VALUES (:titel)");
    $statement->bindParam(":titel", $titel);
    $statement->execute();
    }


 function updateList($data, $id){
    // Maak hier de code om een medewerker te bewerken
    $conn = openDatabaseConnection();
    $stmt = $conn->prepare("UPDATE list SET titel = :titel WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":titel", $data['titel']);

    $stmt->execute();
 }

 function deleteList($id){
    // Maak hier de code om een medewerker te verwijderen
    $conn = openDatabaseConnection();
    $stmt = $conn->prepare("DELETE FROM list WHERE id= :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
 }


?>