<?php
class Conection{
    private $mysqli;
    private $error;

    public function connect(){

        $mysqli = new mysqli("localhost", "root", "0TO6yljf", "bender");

        if ($mysqli->connect_errno) {
            $this->error = 'Fallo al contenctar a MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;

            return $this->error;
        }else{
            $mysqli->set_charset('UTF-8');
            $this->mysqli = $mysqli;
            $this->mysqli->query('SET CHARACTER SET utf8;');

            return $this->mysqli;
        }

    }

    public function close(){
        $this->mysqli->close();

        return true;
    }

}
?>