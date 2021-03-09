<?php
require(ROOT . "model/ListModel.php");


function index()
{
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable
    $list = getAllList();
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('list/index', ["list" => $list]);
}

function create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render("list/create");
}

function store(){
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    $titel = $_POST["titel"];
    createList($titel);
    //2. Bouw een url op en redirect hierheen
    $list = getAllList();
    header("location:" . URL . "list/index");
}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $list = getList($id);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render("list/update", array('list' => $list));
}

function update($id){
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    updateList($_POST, $id);
    //2. Bouw een url en redirect hierheen
    header('location: ' . URL);

}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $List = getList($id);
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
    render("list/delete", ['id' => $id]);
}

function destroy($id){
    //1. Delete een medewerker uit de database
    deleteList($id);
	//2. Bouw een url en redirect hierheen
    header("location:" . URL);
}
?>