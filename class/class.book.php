<?php

class Book extends Connection{
    public function getAllBook(){
        $sqlQuery = 'SELECT 
            b.id_book, 
            g.id_gedung, 
            g.nama_gedung, 
            g.lokasi, 
            u.nama, 
            b.status 
        FROM book as b 
        left join tbl_gedung as g 
        on b.id_gedung=g.id_gedung 
        LEFT JOIN user as u 
        on b.id_user=u.userid;';
        $result = mysqli_query($this->connection, $sqlQuery);
        return $result;
    }

    public function addBook($userId, $gedungId){
        $sqlQuery = "INSERT INTO book (id_user, id_gedung, status) VALUES (". $userId .", ". $gedungId .", 'book')";
        $result = mysqli_query($this->connection, $sqlQuery);
        if ($result)
            return true;
        else
            return false;
    }
}

?>