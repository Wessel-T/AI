<?php

class User {
    private $id;
    private $name;
    private $email;
    private $subscriptionStatus;

    public function __construct($id, $name, $email, $subscriptionStatus = 'free') {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->subscriptionStatus = $subscriptionStatus;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSubscriptionStatus() {
        return $this->subscriptionStatus;
    }

    public function setSubscriptionStatus($status) {
        $this->subscriptionStatus = $status;
    }

    public function save() {
        // Code to save user data to the database
    }

    public static function findById($id) {
        // Code to find a user by ID from the database
    }

    public static function findByEmail($email) {
        // Code to find a user by email from the database
    }
}