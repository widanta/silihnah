<?php
include 'connect.php';

class Peminjaman extends Connect
{
    public function create($data)
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

            if (!empty($jumlah_barang) && $jumlah_barang > 0) {
                $query = "INSERT INTO detail_peminjaman VALUES (NULL, '$idPeminjaman', '$barang', '$jumlah_barang')";
                mysqli_query($this->conn, $query);

                $query = "UPDATE barang SET stok = stok - '$jumlah_barang' WHERE id_barang = '$barang'";
                mysqli_query($this->conn, $query);
            }
        }
        return mysqli_affected_rows($this->conn);
    }

    public function edit($data)
    {
        $idPetugas = $data['id_petugas'];
        $idStatus = $data['id_status'];
        $idPeminjaman = $data['id_peminjaman'];
        $query = "UPDATE peminjaman SET id_petugas = '$idPetugas', id_status = '$idStatus' WHERE id_peminjaman = '$idPeminjaman'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }


    public function getAllData()
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status, 
            GROUP_CONCAT(CONCAT(barang.nama, ' (', kategori.nama, ')') SEPARATOR ', ') AS barang_dipinjam,
            GROUP_CONCAT(detail_peminjaman.jumlah SEPARATOR ', ') AS jumlah_barang
        FROM 
            peminjaman 
        LEFT JOIN 
            detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman
        LEFT JOIN 
            barang ON detail_peminjaman.id_barang = barang.id_barang
        LEFT JOIN 
            kategori ON barang.id_kategori = kategori.id_kategori
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDataPeminjamanMahasiswaById($id)
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status, 
            GROUP_CONCAT(CONCAT(barang.nama, ' (', kategori.nama, ')') SEPARATOR ', ') AS barang_dipinjam,
            GROUP_CONCAT(detail_peminjaman.jumlah SEPARATOR ', ') AS jumlah_barang
        FROM 
            peminjaman 
        LEFT JOIN 
            detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman
        LEFT JOIN 
            barang ON detail_peminjaman.id_barang = barang.id_barang
        LEFT JOIN 
            kategori ON barang.id_kategori = kategori.id_kategori
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        WHERE peminjaman.id_mahasiswa = '$id'
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDataPeminjamanMahasiswaStatusBelumById($id)
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status, 
            GROUP_CONCAT(CONCAT(barang.nama, ' (', kategori.nama, ')') SEPARATOR ', ') AS barang_dipinjam,
            GROUP_CONCAT(detail_peminjaman.jumlah SEPARATOR ', ') AS jumlah_barang
        FROM 
            peminjaman 
        LEFT JOIN 
            detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman
        LEFT JOIN 
            barang ON detail_peminjaman.id_barang = barang.id_barang
        LEFT JOIN 
            kategori ON barang.id_kategori = kategori.id_kategori
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        WHERE peminjaman.id_mahasiswa = '$id' AND (peminjaman.id_status = 1 or peminjaman.id_status = 2)
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllDataStatusPendding()
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status, 
            GROUP_CONCAT(CONCAT(barang.nama, ' (', kategori.nama, ')') SEPARATOR ', ') AS barang_dipinjam,
            GROUP_CONCAT(detail_peminjaman.jumlah SEPARATOR ', ') AS jumlah_barang
        FROM 
            peminjaman 
        LEFT JOIN 
            detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman
        LEFT JOIN 
            barang ON detail_peminjaman.id_barang = barang.id_barang
        LEFT JOIN 
            kategori ON barang.id_kategori = kategori.id_kategori
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        WHERE peminjaman.id_status = 2
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDataKembaliById($id)
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status, 
            GROUP_CONCAT(CONCAT(barang.nama, ' (', kategori.nama, ')') SEPARATOR ', ') AS barang_dipinjam,
            GROUP_CONCAT(detail_peminjaman.jumlah SEPARATOR ', ') AS jumlah_barang
        FROM 
            peminjaman 
        LEFT JOIN 
            detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman
        LEFT JOIN 
            barang ON detail_peminjaman.id_barang = barang.id_barang
        LEFT JOIN 
            kategori ON barang.id_kategori = kategori.id_kategori
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        WHERE peminjaman.id_status = 3 && peminjaman.id_peminjaman = '$id'
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getDataPeminjamanStatus()
    {
        $query = "SELECT 
            peminjaman.id_peminjaman,
            peminjaman.id_mahasiswa,
            peminjaman.id_petugas,
            peminjaman.id_status,
            peminjaman.id_peminjaman, 
            peminjaman.tanggal_pinjam, 
            peminjaman.tanggal_kembali, 
            mahasiswa.nama AS nama_mahasiswa, 
            petugas.nama AS nama_petugas, 
            status.nama_status AS nama_status
        FROM 
            peminjaman 
        LEFT JOIN 
            mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
        LEFT JOIN 
            petugas ON peminjaman.id_petugas = petugas.id_petugas
        LEFT JOIN 
            status ON peminjaman.id_status = status.id_status
        WHERE peminjaman.id_status = 3
        GROUP BY 
            peminjaman.id_peminjaman";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDataStatus()
    {
        $query = "SELECT * FROM status";
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

    public function getDataPetugasByUserId($id)
    {
        $query = "SELECT * FROM petugas Where id_user = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getDataMahasiswaByUserId($id)
    {
        $query = "SELECT * FROM mahasiswa Where id_user = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function pengembalian($data)
    {
        $idPeminjaman = $data['id_peminjaman'];
        $idPetugas = $data['id_petugas'];
        $idStatus = $data['id_status'];

        $query = "INSERT INTO pengembalian VALUES (NULL, '$idPeminjaman','$idStatus', '$idPetugas')";
        mysqli_query($this->conn, $query);

        $query = "UPDATE peminjaman SET id_status = '$idStatus' WHERE id_peminjaman = '$idPeminjaman'";
        mysqli_query($this->conn, $query);

        $query = "SELECT id_barang, jumlah FROM detail_peminjaman WHERE id_peminjaman = '$idPeminjaman'";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $idBarang = $row['id_barang'];
            $jumlah = $row['jumlah'];

            $query = "UPDATE barang SET stok = stok + '$jumlah' WHERE id_barang = '$idBarang'";
            mysqli_query($this->conn, $query);
        }

        return mysqli_affected_rows($this->conn);
    }
}
