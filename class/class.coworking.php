<?php
class coworking extends Connection
{
    private $id_coworking = '';
    private $nama_coworking = '';
    private $harga = '';
    private $lokasi = '';
    private $kapasitas = '';
    private $deskripsi = '';
    private $foto = '';
    public $hasil = false;
    public $message = '';

    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }

    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }

    public function AddCoworking()
    {
        $sql = "INSERT INTO tbl_coworking (id_coworking, nama_gedung,harga,lokasi,kapasitas,deskripsi,foto)
                VALUES ('$this->id_gedung','$this->nama_gedung','$this->harga','$this->lokasi','$this->kapasitas','$this->deskripsi' '$this->foto')";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }

    public function UpdateCoworking()
    {
        $sql = "UPDATE tbl_coworking
                SET id_coworking ='$this->id_coworking',
                nama_coworking = '$this->nama_coworking',
                harga = '$this->harga',
                lokasi = '$this->lokasi',
                kapasitas = '$this->kapasitas',
                deskripsi = '$this->deskripsi',
                foto = '$this->foto'
                WHERE id_coworking = '$this->id_coworking'";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil diubah!';
        else
            $this->message = 'Data gagal diubah!';
    }

    public function DeleteCoworking()
    {
        $sql = "DELETE FROM tbl_coworking  WHERE id_coworking ='$this->id_coworking'";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil dihapus!';
        else
            $this->message = 'Data gagal dihapus!';
    }

    public function SelectCoworking()
    {
        $sql = "SELECT * FROM tbl_coworking";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;
        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {
                $objcoworking = new coworking();
                $objcoworking->id_coworking = $data['id_coworking'];
                $objcoworking->nama_coworking = $data['nama_coworking'];
                $objcoworking->harga = $data['harga'];
                $objcoworking->lokasi = $data['lokasi'];
                $objcoworking->kapasitas = $data['kapasitas'];
                $objcoworking->deskripsi = $data['deskripsi'];
                $objcoworking->foto = $data['foto'];
                $arrResult[$count] = $objcoworking;
                $count++;
            }
        }
        return $arrResult;
    }

    public function SelectOneCoworking()
    {
        $sql = "SELECT * FROM tbl_coworking WHERE id_coworking='$this->id_coworking'";
        $resultOne = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $this->id_coworking = $data['id_coworking'];
            $this->nama_coworking = $data['nama_coworking'];
            $this->harga = $data['harga'];
            $this->lokasi = $data['lokasi'];
            $this->kapasitas = $data['kapasitas'];
            $this->deskripsi = $data['deskripsi'];
            $this->foto = $data['foto'];
        }
    }
}
