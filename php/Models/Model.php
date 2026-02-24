<?php
namespace Models;

//use App\Autoloader;
use Database\Db;

class Model
{
    protected string $sTable;
    private $Db;

    public function query(string $sQuery, ?array $aParams = null)
    {
        $this->Db = DB::getInstance();

        if (!empty($aParams)) {
            $query = $this->Db->prepare($sQuery);
            foreach ($aParams as $sKey => $sValue) {
                $query->bindValue(":" . $sKey, $sValue);
            }
            $query->execute();
            return $query;
        } else {
            return $this->Db->query($sQuery);
        }
    }

    public function findAll()
    {
        $sQuery = "SELECT * FROM " . $this->sTable;
        
        return $this->query($sQuery)->fetchAll();
    }

    public function findById(int $iId)
    {
        $sQuery = "SELECT * FROM " . $this->sTable . " WHERE id = :id";
        
        return $this->query($sQuery, ["id" => $iId])->fetch();        
    }

    public function add(Model $oModel)
    {
        $aData = get_object_vars($oModel);
        
        unset($aData["Db"]);
        unset($aData["sTable"]);

        $sFields = implode(", ", array_keys($aData));
        $sValues = ":" . implode(", :", array_keys($aData));

        $sQuery = "INSERT INTO " . $this->sTable . " (" . $sFields . ") VALUES (" . $sValues . ")";
        
        return $this->query($sQuery, $aData);
    }

    public function update(Model $oModel)
    {
        $aData = get_object_vars($oModel);
        unset($aData["Db"]);
        unset($aData["sTable"]);

        $sFields = "";
        foreach ($aData as $sKey => $sValue) {
            $sFields .= $sKey . " = :" . $sKey . ", ";
        }
        $sFields = rtrim($sFields, ", ");

        $sQuery = "UPDATE " . $this->sTable . " SET " . $sFields . " WHERE id = :id";
        
        return $this->query($sQuery, $aData);
    }   

    public function hydrate(array $aData): self
    {
        foreach ($aData as $sKey => $sValue) {
            $sMethod = "set" . ucfirst($sKey);
            if (method_exists($this, $sMethod)) {
                $this->$sMethod($sValue);
            }
        }
        
        return $this;
    }

    public function delete(int $iId)
    {
        $sQuery = "DELETE FROM " . $this->sTable . " WHERE id = :id";
        
        return $this->query($sQuery, ["id" => $iId]);
    }
}