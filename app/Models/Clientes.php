<?php

namespace App\Models;

use PDO;
use PDOException;
use Utils\Database\DbProvider;

class Clientes
{
     
    private $_db;
    
    public function __construct() {
        $this->_db = DbProvider::get();
    }

    public function getAll() : array
    {
        $result = [];

        try {
            $stm = $this->_db->prepare("SELECT * FROM vreporteclientes");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS,'\\App\\Models\\Clientes');
        } catch (PDOException $ex) {
        
        }
        return $result;
    }

    public function get(int $id) : ?Clientes
    {
         $result = null;
          
         try {

            $stm = $this->_db->prepare('SELECT * FROM vreporteclientes WHERE id = :id');
            $stm->execute(['id' => $id]);
            $data = $stm->fetchObject('\\App\\Models\\Clientes');

            if ($data) {
                $result = $data;
            }
            
            exit;

         } catch (PDOException $ex) {
        

         }

         return $result;
    }


}
