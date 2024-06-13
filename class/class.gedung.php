<?php

class Gedung extends Connection{
    public function getAllGedung(){
        $sqlQuery = "SELECT * FROM tbl_gedung;";
        $result = mysqli_query($this->connection, $sqlQuery);
        return $result;
    }
}

?>