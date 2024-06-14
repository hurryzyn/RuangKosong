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

        return $result;
    }
}
?>
