<?php
include 'connect.php';

class Mahasiswa extends Connect
{
    public function edit($data)
    {
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_user = $data['id_user'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $telpon = $data['telpon'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $alamat = $data['alamat'];
        $agama = $data['agama'];
        $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', telpon = '$telpon', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama' WHERE id_mahasiswa = '$id_mahasiswa'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function delete($data)
    {
        $id = $data['id_mahasiswa'];
        $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id' ";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function getDataByUserId($id)
    {
        $query = "SELECT * FROM mahasiswa Where id_user = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
