<?php
class Booking extends Connection
{
    private $id_booking = '';
    private $id_gedung = '';
    private $nama_pemesan = '';
    private $tanggal = '';
    private $durasi = '';
    private $total_harga = '';
    private $foto = '';
    public $hasil = false;
    public $message = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function addBooking($id_gedung, $nama_pemesan, $tanggal, $durasi, $total_harga, $foto)
    {
        $this->id_gedung = $id_gedung;
        $this->nama_pemesan = $nama_pemesan;
        $this->tanggal = $tanggal;
        $this->durasi = $durasi;
        $this->total_harga = $total_harga;
        $this->foto = $foto;

        $sql = "INSERT INTO bookings (id_gedung, nama_pemesan, tanggal, durasi, total_harga, foto) VALUES ('$this->id_gedung', '$this->nama_pemesan', '$this->tanggal', '$this->durasi', '$this->total_harga', '$this->foto')";

        if ($this->connection->query($sql) === TRUE) {
            $this->hasil = true;
            $this->message = "Booking successful.";
        } else {
            $this->hasil = false;
            $this->message = "Error: " . $this->connection->error;
        }
    }

    public function getBookings()
    {
        $sql = "SELECT * FROM bookings";
        $result = $this->connection->query($sql);

<<<<<<< HEAD
        return $result;
    }
=======
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
>>>>>>> 6f9dcac27c687b3f1862d3e513191deb5859de04
}
?>
