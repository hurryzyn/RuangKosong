<?php

class Book extends Connection{
    public function getAllBook(){
        $sqlQuery = 'SELECT 
            b.id_book, 
            g.id_gedung, 
            g.nama_gedung, 
            g.lokasi, 
            u.nama, 
            b.status, 
            u.userid
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

    public function editBook($userId, $gedungId, $status, $bookId){
        $sqlQuery = "UPDATE book SET id_user=".$userId.", id_gedung=".$gedungId.", status='".$status."' WHERE id_book=".$bookId;
        $result = mysqli_query($this->connection, $sqlQuery);
        if ($result)
            return true;
        else
            return false;
    }

    public function deleteBookById($id) {
        $sql = "DELETE FROM book WHERE id_book = ".$id;
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }
}

?>