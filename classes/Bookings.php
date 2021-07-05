<?php
class Bookings {
    private $name;
    private $mailid;    
    private $no;
    private $event;
    private $status;
    
    public function __construct($name, $mailid, $no, $event, $status) {
        $this->name = $name;
        $this->mailid = $mailid;
        $this->no = $no;
        $this->event = $event;
        $this->status = $status;
    }
    
    public function getname() { return $this->name; }
    public function getmailid() { return $this->mailid; }
    public function getno() { return $this->no; }
    public function getevent() { return $this->event; }
    public function getstatus() { return $this->status; }
}
?>