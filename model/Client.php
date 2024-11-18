<?php

class Client{
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $address;
    public string $birthday;
    public string $phone;

    public function getLastname():string{
        return $this->lastname;
    }

    public function setLastname($lastname): self{
        $this->lastname = $lastname;
        return $this;
    }


    

    public function getFirstname():string{
        return $this->firstname;
    }

    public function setFirstname($firstname): self{
        $this->firstname = $firstname;
        return $this;
    }


    

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail($email): self{
        $this->email = $email;
        return $this;
    }

    
    

    public function getAddress():string{
        return $this->address;
    }

    public function setAddress($address): self{
        $this->address = $address;
        return $this;
    }




    public function getBirthday():string{
        return $this->birthday;
    }

    public function setBirthday($birthday): self{
        $this->birthday = $birthday;
        return $this;
    }



    
    public function getPhone():string{
        return $this->phone;
    }

    public function setPhone($phone): self{
        $this->phone = $phone;
        return $this;
    }

}