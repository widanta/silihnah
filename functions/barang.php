<?php
include 'connect.php';

class barang extends Connect
{
    public function create($data)
    {
        $nama = $data['nama'];
        $stok = $data['stok'];
        $waktu = $data['waktu'];
        $idKategori = $data['id_kategori'];
        $idPetugas = $data['id_petugas'];
        $query = "INSERT INTO barang VALUES (NULL,'$nama', '$stok', '$waktu', '$idKategori', '$idPetugas')";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function edit($data)
    {
        $nama = $data['nama'];
        $stok = $data['stok'];
        $waktu = $data['waktu'];
        $idKategori = $data['id_kategori'];
        $idPetugas = $data['id_petugas'];
        $id = $data['id_barang'];
        $query = "UPDATE barang SET nama = '$nama', stok = '$stok', waktu = '$waktu', id_kategori = '$idKategori', id_petugas = '$idPetugas' WHERE id_barang = '$id'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function delete($data)
    {
        $id = $data['id_barang'];
        $query = "DELETE FROM barang WHERE id_barang = '$id' ";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function getDataKategori()
    {
        $query = "SELECT * FROM kategori";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllDataJoin()
    {
        $query = "SELECT barang.id_barang, barang.nama as nama_barang, barang.stok, barang.waktu, kategori.id_kategori, kategori.nama as nama_kategori, kategori.deskripsi, petugas.id_petugas, petugas.nama as nama_petugas FROM barang JOIN kategori ON barang.id_kategori = kategori.id_kategori JOIN petugas ON barang.id_petugas = petugas.id_petugas";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDataByUserId($id)
    {
        $query = "SELECT * FROM petugas Where id_user = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
