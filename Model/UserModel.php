<?php


class UserModel
{
    protected int $id;
    public   $firstName;
    public   $lastName;
    protected int $age;
    protected string $email;
    protected string $phone;
    protected $dateRegistred;
    protected $conn;
    protected $query = "";
    protected $hasta = "";

    public function __construct()
    {
        $db = new DataBase();
        $this->conn = $db->connection();
    }
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function getage()
    {
        return $this->age;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getphone()
    {
        return $this->phone;
    }
    public function getdateRegistred()
    {
        return $this->dateRegistred;
    }
    public function gethasta()
    {
        return $this->hasta;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setage($age)
    {
        $this->age = $age;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function setphone($phone)
    {
        $this->phone = $phone;
    }
    public function setdateRegistred($dateRegistred)
    {
        $this->dateRegistred = $dateRegistred;
    }
    public function sethasta($hasta)
    {
        $this->hasta = $hasta;
    }

    public function search()
    {
        $firstName  = $this->getfirstName();
        $lastName = $this->getlastName();
        $desde = $this->getdateRegistred();
        $hasta = $this->gethasta();
        try {
            $this->query = "CALL searchByUsers (:firstName,:lastName,:desde,:hasta)";
            $stmt = $this->conn->prepare($this->query);
            $stmt->bindValue(':firstName', "%$firstName%", PDO::PARAM_STR);
            $stmt->bindValue(':lastName', "%$lastName%", PDO::PARAM_STR);
            $stmt->bindParam(':desde', $desde, PDO::PARAM_STR);
            $stmt->bindParam(':hasta', $hasta, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }
    public function login()
    {
        try {
            $this->query = "CALL indexUsers()" ;

            $stmt = $this->conn->prepare($this->query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }
    public function insert()
    {
        $firstName = $this->getfirstName();
        $lastName = $this->getlastName();
        $fecha = $this->getdateRegistred();
        try {
            $this->query = "CALL Insert_user (:firstName,:lastName,:fecha)";
            $stmt = $this->conn->prepare($this->query);
            $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }
    public function idLast()
    {
        try {
            $this->query = "SELECT * FROM usuario ORDER by id DESC limit 1";
            $stmt = $this->conn->prepare($this->query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }
}
