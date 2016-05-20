<?php

require_once('../Model/ActorModel.php');

class ActorController
{
    public $model;
    
    public function __construct()
    {
        $this->model = new ActorModel();
    }
    
    public function displayAction()
    {
        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }

    public function updateAction($actorID)
    {
        $currentActor = $this->model->getActor($actorID);

        include '../View/editActor.php';
    }

    public function commitUpdateAction($actorID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($actorID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->updateActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }


    public function commitDeleteAction($actorID)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($actorID);

        $lastOperationResults = $this->model->deleteActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }

    public function insertAction()
    {
        include '../View/insertActors.php';
    }

    public function commitInsertAction($fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = new Actor(0, $fName, $lName);

        $lastOperationResults = $this->model->insertActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }

    public function searchAction($actorName)
    {
        $arrayOfActors = $this->model->searchActor($actorName);

        include '../View/displayActors.php';
    }

}

?>
