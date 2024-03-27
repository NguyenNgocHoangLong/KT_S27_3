<?php

class Db {
    protected static $connection;

    public function connect() {
        // Load database configuration
        $config = parse_ini_file("config/config.ini");

        // Attempt to establish a connection
        self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

        // Check connection
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }

        return self::$connection;
    }

    public function query_execute($queryString) {
        $connection = $this->connect();
        $result = $connection->query($queryString);
        $connection->close();
        return $result;
    }

    public function select_to_array($queryString) {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result === false) {
            return false;
        }
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}

?>
