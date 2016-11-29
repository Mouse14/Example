<?php
class Library
{
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=pemesanan','root','lunalu1302');
    }
    public function addOrder($nama, $dari, $ke, $jadwal, $jumlah, $total, $statusPemb){
        $sql = "INSERT INTO customer (nama, dari, ke, jadwal, jumlah, total, statusPemb) VALUES($nama, $dari, $ke, $jadwal, $jumlah, $total, $statusPemb)";
        $query = $this->db->query($sql);
        if(!$query){
            return "Failed";
        }
        else{
            return "Success";
        }
    }
    
    public function updateData($nama, $dari, $ke, $jadwal, $jumlah, $total, $statusPemb){
        $sql = "UPDATE cutomer SET nama='$nama', dari='$dari', ke='$ke', jadwal='$jadwal', jumlah='$jumlah', total='$total', statusPemb='$statusPemb'";
        $query = $this->db->query($sql);
        if(!$query){
            return "Failed";
        }
        else{
            return "Success";
        }
    }
    
    public function showOrder(){
        $sql = "SELECT * FROM cutomer";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function showOrder1($sql){
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function deleteOrder($name){
        $sql = "DELETE FROM customer WHERE nama='$nama'";
        $query = $this->db->query($sql);
    }
}
?>