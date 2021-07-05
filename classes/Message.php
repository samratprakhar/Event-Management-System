<?php
class Message {
    private $name;
    private $mailid;    
    private $message;
    
    public function __construct($name, $mailid, $message) {
        $this->name = $name;
        $this->mailid = $mailid;
        $this->message = $message;
    }
    
    public function getname() { return $this->name; }
    public function getmailid() { return $this->mailid; }
    public function getno() { return $this->message; }
}
?>