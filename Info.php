<?php

class Info {
    private $id;
    private $EmpId;
    private $name;
    private $password;
	private $repassword;
    private $contact;
    private $address;
    private $email;
    private $race;
    private $year;
    private $photo;
    private $title;
    private $role;

	
	public function getId() {
        return $this->id;
    }
	
    public function getEmpId(){
        return $this->EmpId;
    }

    public function setEmpId($x){
        $this->EmpId = $x;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

	public function getRePassword() {
        return $this->repassword;
    }

    public function getContact() {
        return $this->contact;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRace() {
        return $this->race;
    }

    public function getYear() {
        return $this->year;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getRole() {
        return $this->role;
    }
    public function setId($x) {
        $this->id = $x;
    }

    public function setName($x) {
        $this->name = $x;
    }

    public function setPassword($x) {
        $this->password = $x;
    }

    public function setContact($x) {
        $this->contact = $x;
    }

    public function setAddress($x) {
        $this->address = $x;
    }

    public function setEmail($x) {
        $this->email = $x;
    }

    public function setRace($x) {
        $this->race = $x;
    }

    public function setYear($x) {
        $this->year = $x;
    }

    public function setPhoto($x) {
        $this->photo = $x;
    }

    public function setTitle($x) {
        $this->title = $x;
    }

    public function setRole($x) {
        $this->role = $x;
    }
}
?>
