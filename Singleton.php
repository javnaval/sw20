<?php


class Singleton {
    private static $instancia = null;

    public function __construct() {
        $this->mysqli = null;
    }

    public static function getSingleton() {
        if (Singleton::$instancia == null) {
            Singleton::$instancia = new Singleton();
        }
        return Singleton::$instancia;
    }

    private $mysqli;

    public function connection() {
        if (!$this->mysqli) {
            $this->mysqli = new mysqli('localhost', 'sounday', 'sounday2020', 'sounday');
        }
        return $this->mysqli;
    }

    public function shutdown() {
        if ($this->mysqli) {
            $this->mysqli->close;
        }
    }
}