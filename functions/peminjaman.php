<?php
include 'connect.php';

class Peminjaman extends Connect
{
    public function createData($data)
    {
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_barang = $data['id_barang'];
        $jumlah = $data['jumlah'];
        $tanggal_pinjam = $data['tanggal_pinjam'];
        $tanggal_kembali = $data['tanggal_kembali'];

        $query = "INSERT INTO peminjaman VALUES (NULL,'$id_mahasiswa', '$tanggal_pinjam','$tanggal_kembali', NULL, 2)";
        mysqli_query($this->conn, $query);

        $idPeminjaman = mysqli_insert_id($this->conn);

        foreach ($id_barang as $index => $barang) {
            $jumlah_barang = $jumlah[$index];
            $query = "INSERT INTO detail_peminjaman VALUES (NULL, '$idPeminjaman', '$barang', '$jumlah_barang')";

            mysqli_query($this->conn, $query);
        }
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

    public function getDataBarang()
    {
        $query = "SELECT barang.id_barang, barang.nama as nama_barang, barang.stok, barang.waktu, kategori.id_kategori, kategori.nama as nama_kategori, kategori.deskripsi FROM barang JOIN kategori ON barang.id_kategori = kategori.id_kategori";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
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
