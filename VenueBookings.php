<?php
class VenueBookings {
    private $name;
    private $mailid;    
    private $venue;
    private $eventdescription;
    private $artistinfo;    
    private $start;
    private $end;
    
    public function __construct($name, $mailid, $venue, $eventdescription, $artistinfo, $start, $end) {
        $this->name = $name;
        $this->mailid = $mailid;
        $this->venue = $venue;
        $this->eventdescription = $eventdescription;
        $this->$artistinfo = $artistinfo;    
        $this->$start = $start;
        $this->$end = $end;
    }
    
    public function getname() { return $this->name; }
    public function getmailid() { return $this->mailid; }
    public function getvenue() { return $this->venue; }
    public function geteventdescription() { return $this->eventdescription; }
    public function getartistinfo() { return $this->artistinfo; }
    public function getstart() { return $this->start; }
    public function getend() { return $this->end; }
}
?>