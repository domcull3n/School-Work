<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Model/data/iActorDataModel.php';
class MySQLiActorDataModel implements iActorDataModel
{

    private $dbConnection;
    private $result;

    // iActorDataAccess methods
    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Sakila Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    public function selectActors()
    {
       $selectStatement = "SELECT * FROM actor";
       $selectStatement .= " LIMIT 0,15;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }

    }
    
    public function selectActorById($custID)
    {
       $selectStatement = "SELECT * FROM actor";
       $selectStatement .= " WHERE actor_id = $custID;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }
    }
    

    public function fetchActors()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }
    
    public function updateActor($custID,$first_name,$last_name)
    {
       $updateStatement = "UPDATE actor";
       $updateStatement .= " SET first_name = '$first_name',last_name='$last_name'";
       $updateStatement .= " WHERE actor_id = $custID;";
       $this->result = @$this->dbConnection->query($updateStatement);
       if(!$this->result)
       {
               die('Could not update records in the Sakila Database: ' .
                       $this->dbConnection->error);
       }
       
       return $this->dbConnection->affected_rows;
    }

    public function deleteActor($custID)
    {
        $updateStatement = "DELETE FROM actor";
        $updateStatement .= " WHERE actor_id = $custID;";

        $this->result = @$this->dbConnection->query($updateStatement);

        if(!$this->result)
        {
            die('Could not delete records in the Sakila Database: ' . $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function insertActor($first_name,$last_name)
    {
        $updateStatement = "INSERT INTO actor (first_name,last_name)";
        $updateStatement .= " VALUES ('$first_name','$last_name');";

        $this->result = @$this->dbConnection->query($updateStatement);

        if(!$this->result)
        {
            die('Could not insert records into the Sakila Database: ' . $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function searchActors($search)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " WHERE first_name LIKE '%$search%'";
        $selectStatement .= " OR last_name LIKE '%$search%' LIMIT 0,15;";
        $this->result = @$this->dbConnection->query($selectStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }
    
    public function fetchActorID($row)
    {
       return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
       return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
       return $row['last_name'];
    }

}

?>
