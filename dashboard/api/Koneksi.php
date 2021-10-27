<?php
class Koneksi
{
    private $HOST = 'tomboati.bgskr-project.my.id';
    private $USER = 'tomboati';
    private $PASS = '1sampaitombo';
    private $con = null;

    public function __construct($DATABASE)
    {
        $this->con = new mysqli($this->HOST, $this->USER, $this->PASS, $DATABASE);
        if ($this->con->connect_errno) {
            echo ("Koneksi Error : " . $this->con->connect_error);
        }
        return $this->con;
    }

    public function execute($query)
    {
        return $this->con->query($query);
    }
}
