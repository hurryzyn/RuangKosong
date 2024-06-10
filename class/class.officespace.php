<?php
class officespace extends Connection
{
    private $id_gedung = '';
    private $nama_gedung = '';
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

    public function AddGedung()
    {
        $sql = "INSERT INTO tbl_gedung (id_gedung, nama_gedung,harga,lokasi,kapasitas,deskripsi,foto)
                VALUES ('$this->id_gedung','$this->nama_gedung','$this->harga','$this->lokasi','$this->kapasitas','$this->deskripsi', '$this->foto')";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }

    public function UpdateGedung()
    {
        $sql = "UPDATE tbl_gedung
                SET id_gedung ='$this->id_gedung',
                nama_gedung = '$this->nama_gedung',
                harga = '$this->harga',
                lokasi = '$this->lokasi',
                kapasitas = '$this->kapasitas',
                deskripsi = '$this->deskripsi',
                foto = '$this->foto'
                WHERE id_gedung = '$this->id_gedung'";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil diubah!';
        else
            $this->message = 'Data gagal diubah!';
    }

    public function DeleteGedung()
    {
        $sql = "DELETE FROM tbl_gedung WHERE id_gedung ='$this->id_gedung'";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil dihapus!';
        else
            $this->message = 'Data gagal dihapus!';
    }

    public function SelectAllGedung()
    {
        $sql = "SELECT * FROM tbl_gedung";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;
        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {
                $objofficespace = new officespace();
                $objofficespace->id_gedung = $data['id_gedung'];
                $objofficespace->nama_gedung = $data['nama_gedung'];
                $objofficespace->harga = $data['harga'];
                $objofficespace->lokasi = $data['lokasi'];
                $objofficespace->kapasitas = $data['kapasitas'];
                $objofficespace->deskripsi = $data['deskripsi'];
                $objofficespace->foto = $data['foto'];
                $arrResult[$count] = $objofficespace;
                $count++;
            }
        }
        return $arrResult;
    }

    public function SelectOneGedung()
    {
        $sql = "SELECT * FROM tbl_gedung WHERE id_gedung='$this->id_gedung'";
        $resultOne = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $this->id_gedung = $data['id_gedung'];
            $this->nama_gedung = $data['nama_gedung'];
            $this->harga = $data['harga'];
            $this->lokasi = $data['lokasi'];
            $this->kapasitas = $data['kapasitas'];
            $this->deskripsi = $data['deskripsi'];
            $this->foto = $data['foto'];
        }
    }
}
