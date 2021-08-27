<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
//(new CardRepository($databaseManager))->get(); short version



if(isset($_POST['submitChanges']) && $_POST["bookName"]){
    $cardRepository->update();
    $cards = $cardRepository->get();
}

if(isset($_POST['submitNewCard']) && $_POST["userCard"]){
    $newUser = $cardRepository->create();
    $cards = $cardRepository->get();
}

if(isset($_POST['submitChanges']) && $_POST["bookName"]||isset($_POST['submitNewCard'])){
    $cards = $cardRepository->get();
    require 'overview.php';
} else{
    $cards = $cardRepository->get();
    require 'overview.php';
}
$connection = $databaseManager -> connection;
// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view


