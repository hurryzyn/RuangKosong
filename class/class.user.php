<?php
class User extends Connection
{
    private $userid = 0;
    private $email = '';
    private $password = '';
    private $nama = '';
    private $role = '';
    private $emp;

    private $hasil = false;
    private $message = '';

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

    public function AddUser()
    {
        $sql = "INSERT INTO user (email, password, nama ,role)
        values ('$this->email', '$this->password', '$this->nama', '$this->role')";
        
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }

    public function ValidateEmail($inputemail)
    {

        $sql = "SELECT * FROM user
            
            WHERE email = '$inputemail'";

        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($result);
            $this->userid = $data['userid'];
            $this->password = $data['password'];
            $this->nama = $data['nama'];
            $this->email = $data['email'];
            $this->role = $data['role'];
        }
    }

    public function getAllUser(){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function getOneUser()
{
    $sql = "SELECT * FROM user WHERE userid='$this->userid'";
    $resultOne = mysqli_query($this->connection, $sql);
    if (mysqli_num_rows($resultOne) == 1) {
        $this->hasil = true;
        $data = mysqli_fetch_assoc($resultOne);
        $this->userid = $data['userid'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->nama = $data['nama'];
        $this->role = $data['role'];
    }
}

}
