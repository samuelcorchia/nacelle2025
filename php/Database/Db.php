<?php
/* 
 * Design pattern : Singleton
 * Permet de s'assurer qu'une classe n'a qu'une seule instance et de fournir un point d'accès global à cette instance.
 * @see https://refactoring.guru/fr/design-patterns/singleton
 */
namespace Database;
use PDO;
use PDOException;

const DBHOST = 'db';
const DBUSER = 'samuel.corchia';
const DBPASS = 'Br6dd534';
const DBNAME = 'monapp';

class Db extends PDO
{
    private static $oInstance = null;

    private function __construct()
    {
        $dns = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
        try{
            parent::__construct($dns, DBUSER, DBPASS);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }   

    public static function getInstance()
    {        
        if (self::$oInstance === null) {
            self::$oInstance = new self();
        }
        return self::$oInstance;
    }
}