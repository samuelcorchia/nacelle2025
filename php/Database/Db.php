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
// const DBUSER = getenv('APP_USER');
// const DBPASS = getenv('APP_PASSWORD');
// const DBNAME = getenv('APP_DATABASE');

class Db extends PDO
{
    private static $oInstance = null;

    private function __construct()
    {
        $dns = 'mysql:host=' . DBHOST . ';dbname=' . getenv('APP_DATABASE');
        try{
            parent::__construct($dns, getenv('APP_USER'), getenv('APP_PASSWORD'));
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