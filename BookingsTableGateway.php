<?php
require_once 'Bookings.php';

class BookingsTableGateway {

    private $connect;
    
    public function __construct($c) {
        $this->connect = $c;
    }
    
    public function getPendingBookings() {
        // execute a query to get all events
        $sqlQuery = "SELECT * from bookings where status = 0";
        
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }
    
    public function getAcceptedBookings() {
        // execute a query to get all events
        $sqlQuery = "SELECT * from bookings where status = 1";
        
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }
    
    public function getEventsByLocationId($id) {
        // execute a query to get all events
        $sqlQuery = "SELECT e.*, l.name " .
                    "FROM events e " .
                    "LEFT JOIN locations l ON e.locationID = l.locationID " .
                    "WHERE e.locationID=:locationId";
        
        $params = array(
            "locationId" => $id
        );
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }
    
    public function getEventsById($id) {
        // execute a query to get an event with the specified id
        $sqlQuery = "SELECT * FROM events WHERE eventID = :id";
        
        $statement = $this->connect->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve Event ID");
        }
        
        return $statement;
    }
    
    public function insert($p) {
        $sql = "INSERT INTO events(Title, Description, StartDate, EndDate, Cost, LocationID) " .
                "VALUES (:Title, :Description, :StartDate, :EndDate, :Cost, :LocationID)";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "Title"           => $p->getTitle(),
            "Description"     => $p->getDescription(),            
            "StartDate"       => $p->getStartDate(),
            "EndDate"         => $p->getEndDate(),
            "Cost"            => $p->getCost(),
            "LocationID"      => $p->getLocationID()
        );
        
        echo "<pre>";
        print_r($p);
        print_r($params);
        echo "</pre>";
        
        $status = $statement->execute($params);
        
        
        if (!$status) {
            die("Could not insert event");
        }
        
        $id = $this->connect->lastInsertId();
        
        return $id;
    }

    public function update($p) {
        $sql = "UPDATE events SET " .
                "Title = :Title, " . 
                "Description = :Description, " .                
                "StartDate = :StartDate, " .
                "EndDate = :EndDate, " .
                "Cost = :Cost, " .
                "LocationID = :LocationID, " .
                " WHERE eventID = :id";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "Title"          => $p->getTitle(),
            "Description"    => $p->getDescription(),            
            "StartDate"      => $p->getStartDate(),
            "EndDate"        => $p->getEndDate(),
            "Cost"           => $p->getCost(),
            "LocationID"     => $p->getLocationID(),
            "id"             => $p->getId()
        );
        
        echo "<pre>";
        print_r($p);
        print_r($params);
        print_r($statement);
        echo "</pre>";
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update event details");
        }
    }
    
    public function delete($mailid) {
        $sql = "DELETE FROM bookings WHERE mailid = :mailid";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "mailid" => $mailid
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not reject request");
        }
    }    

    public function accept($name) {
        $sql = "UPDATE bookings SET status = 1 where name = :name ";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "name" => $name
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not accept request");
        }
    } 

    
}