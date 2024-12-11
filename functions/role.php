<?php
include 'connect.php';

class Role extends Connect
{
    public function create($data)
    {
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $query = "INSERT INTO role VALUES (NULL,'$nama', '$deskripsi')";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function edit($data)
    {
        $nama = $data['nama'];
        $deskripsi = $data['deskripsi'];
        $id = $data['id_role'];
        $query = "UPDATE role SET nama = '$nama', deskripsi = '$deskripsi' WHERE id_role = '$id'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function delete($data)
    {
        $id = $data['id_role'];
        $query = "DELETE FROM role WHERE id_role = '$id' ";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function getAlldata()
    {
        $query = "SELECT * FROM role";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}
