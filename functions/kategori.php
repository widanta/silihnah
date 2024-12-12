<?php
include 'connect.php';

class Kategori extends Connect
{
    public function create($data)
    {
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $query = "INSERT INTO kategori VALUES (NULL,'$nama', '$deskripsi')";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function edit($data)
    {
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $id = $data['id_kategori'];
        $query = "UPDATE kategori SET nama = '$nama', deskripsi = '$deskripsi' WHERE id_kategori = '$id'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function delete($data)
    {
        $id = $data['id_kategori'];
        $query = "DELETE FROM kategori WHERE id_kategori = '$id' ";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function getAllData()
    {
        $query = "SELECT * FROM kategori";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    
}
