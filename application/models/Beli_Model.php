<?php
class Beli_Model extends CI_Model
{

    public $database;
    public $storage;
    public $fire;
    public $storageClient;
    public $defaultBucket;
    protected $dbname = 'beli';
    public function __construct()
    {
        $this->load->library('firebase');
        $this->fire = $this->firebase->init();
        $this->database = $this->fire->createDatabase();
        $this->storage = $this->fire->createStorage();

        $this->storageClient = $this->storage->getStorageClient();
        $this->defaultBucket = $this->storage->getBucket();
    }

    public function get(string $key = null)
    {
        if (empty($key) || !isset($key)) {    
            return false;
        }
        if ($this->database->getReference($this->dbname."/".$key)->getValue()) {
            return $this->database->getReference($this->dbname."/".$key)->getValue();
        } else {
            return false;
        }
    }

    public function tampil_data()
    {   
        return $this->database->getReference($this->dbname)->getValue();
    }

    public function tampil_databyToko($tokoid)
    {   
        return $this->database->getReference($this->dbname)->orderByChild("tokoid")->equalTo("$tokoid")->getValue();
    }

    public function tampil_dataInvoice(string $key)
    {   
        return $this->database->getReference($this->dbname . '/' . $key)->getValue();
    }

    public function GetList()
    {
        $list = $this->database->getReference($this->dbname)
            ->orderByChild("dlt")
            ->equalTo(false)
            ->getValue();
        unset($list['count']);
        usort($list, function ($a, $b) {
            return strcmp($a["belidate"], $b["belidate"]);
        });

        return $list;
    }
    public function GetListByUser($userId)
    {
        $list = $this->database->getReference($this->dbname)
            ->getValue();
        // var_dump($list);
        // usort($list, function ($a, $b) {
        //     return strcmp($a["belidate"], $b["belidate"]);
        // });
        $hasil = [];
        $array = array_values($list);

        if ($this->session->userdata('status') != "admin") {
            for ($x = 0; $x < count($array); $x++) {
                if ($array[$x]["tokoid"] == $userId && $array[$x]["dlt"] == false) {
                   array_push($hasil, $array[$x]);
                }
            }
        } else {
            for ($x = 0; $x < count($array); $x++) {
                if ($array[$x]["dlt"] == false) {
                   array_push($hasil, $array[$x]);
                }
            }
        }

        return $hasil;
    }



    public function insert(array $data, string $key)
    {
        if (empty($data) || !isset($data)) {
            return false;
        }

        $updates = [
            $this->dbname . '/' . $key => $data,
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);

        return $data;
    }
  
    public function delete(int $userID)
    {
        if (empty($userID) || !isset($userID)) {
            return false;
        }
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
            "alamat" => "",
            "belidate" => 0,
            "catatan" => "",
            "hargaadmin" => 0,
            "hargaproduk" => 0,
            "dlt" => false,
            "hargaongkir" => "",
            "komenpenjual" => "",
            "key" => "",
            "log" => "",
            "metodepembayaran" => "",
            "metodepengiriman" => "",
            "namalengkap" => "",
            "tokoid" => "",
            "tokoname" => [],
            "totalharga" => 0,
            "status" => "",
            "userid" => "",
            "username" => "",
        );
    }
    public function GetMediaEmpty()
    {
        return array(
            "harga" => "",
            "produkid" => 0,
            "mediaurl" => "",
            "produkname" => "",
            "stok" => 0,
            "tokoid" => "",
            "tokoname" => "",
            "userid" => "",
            "dlt" => false,
        );
    }
}
