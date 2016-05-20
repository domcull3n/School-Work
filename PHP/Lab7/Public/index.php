<?php

require_once '../Controller/ActorController.php';

$actorController = new ActorController();

if(isset($_GET['idUpdate']))
{
    $actorController->updateAction($_GET['idUpdate']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $actorController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_GET['idDelete']))
{
    $actorController->commitDeleteAction($_GET['idDelete']);
}
elseif (isset($_POST['insBtn']))
{
    $actorController->InsertAction();
}
elseif (isset($_POST['InsertBtn']))
{
    $actorController->commitInsertAction($_POST['firstName'], $_POST['lastName']);
}
elseif (isset($_POST['searchSubmit']))
{
    $actorController->searchAction($_POST['actorSearch']);
}
else
{
    $actorController->displayAction();
}

?>