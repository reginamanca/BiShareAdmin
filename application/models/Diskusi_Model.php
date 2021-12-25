<?php
class Diskusi_Model extends CI_Model
{

    public $database;
    public $fire;
    protected $dbname = 'diskusi';
    public function __construct()
    {
        $this->load->library('firebase');
        $this->fire = $this->firebase->init();
        $this->database = $this->fire->createDatabase();
    }

    public function get(string $userID = null)
    {
        if (empty($userID) || !isset($userID)) {return false;}
        if ($this->database->getReference($this->dbname)->orderByChild("dlt")
            ->equalTo(false)->getSnapshot()->hasChild($userID)) {
            return $this->database->getReference($this->dbname)->getChild($userID)->getValue();

        } else {
            return false;
        }
    }

    public function GetList()
    {
        $list = $this->database->getReference($this->dbname)
            ->orderByChild("dlt")
            ->equalTo(false)
            ->getValue();
        unset($list['count']);
        usort($list, function ($a, $b) {return strcmp($a["diskusiname"], $b["diskusiname"]);});

        return $list;
    }

   

    public function insert(array $data)
    {

        if (empty($data) || !isset($data)) {return false;}              
        $ref =   $this->database->getReference( $this->dbname)->push($data);
        $data['diskusiid'] = $ref->getKey();
        $this->database->getReference( $this->dbname . '/' . $data['diskusiid'] )->set($data);
        return $data;

    }
    public function update(array $data, string $userID)
    {

        if (empty($data) || !isset($data)) {return false;}

        $updates = [
            $this->dbname . '/' . $userID => $data,
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);

        return $data;

    }
    public function SoftDelete(int $userID)
    {
        if (empty($userID) || !isset($userID)) {return false;}
        if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)) {
            $data = $this->database->getReference($this->dbname)->getChild($userID)->getValue();
            $data['dlt'] = true;
            $updates = [
                $this->dbname . '/' . $userID => $data,
            ];
            $this->database->getReference() // this is the root reference
                ->update($updates);

            return true;
        } else {
            return false;
        }
    }
    public function delete(int $userID)
    {
        if (empty($userID) || !isset($userID)) {return false;}
        if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)) {
            $this->database->getReference($this->dbname)->getChild($userID)->remove();
            return true;
        } else {
            return false;
        }
    }
    public function AddCount()
    {        
        $count = $this->database->getReference($this->dbname)->getChild('count')->getValue() + 1;
        
        $this->database->getReference()->getChild($this->dbname)->getChild('count')->set($count);
        return $count;
    }

    public function GetEmpty()
    {
        return array(
            "diskusiid" => "",
            "diskusiname" => "",
            "dlt" => false,
            "diskusitype" => "",
            "diskusidesc" => "",            
        );

    }
}