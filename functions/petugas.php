

<?php
include 'connect.php';

class petugas extends Connect
{
    public function registerPetugas($username, $email, $password, $role)
    {
        $username = strtolower(stripslashes($_POST["username"]));
        $email = strtolower(stripslashes($_POST["email"]));
        $password = mysqli_real_escape_string($this->conn, $_POST["password"]);
        $password2 = mysqli_real_escape_string($this->conn, $_POST["passwordConfirm"]);
        $role = $_POST["id_role"];

        $result = mysqli_query($this->conn, "SELECT email FROM user WHERE email = '$email'");
        if (mysqli_fetch_assoc($result)) {
            echo "
        <script>
            alert('email telah terdaftar');
        </script>
                ";
            return false;
        }

        if ($password !== $password2) {
            echo "
            <script>
                alert('password salah');
            </script>
            ";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($this->conn, "INSERT INTO user VALUES(NULL,'$username','$email','$password','$role')");

        $lastUser = mysqli_query($this->conn, "SELECT id_user FROM user where username = '$username'");
        $dataLastUserResult = mysqli_fetch_assoc($lastUser);
        $dataLastUserId = $dataLastUserResult['id_user'];

        mysqli_query($this->conn, "INSERT INTO petugas VALUES(NULL,'$dataLastUserId',NULL,NULL,NULL,NULL,NULL,NULL)");
        return mysqli_affected_rows($this->conn);
    }

    public function editUser($username, $email, $password, $idRole, $idUser)
    {
        $username = strtolower(stripslashes($_POST["username"]));
        $email = strtolower(stripslashes($_POST["email"]));
        $password = mysqli_real_escape_string($this->conn, $_POST["password"]);
        $password2 = mysqli_real_escape_string($this->conn, $_POST["passwordConfirm"]);
        $idRole = $_POST["id_role"];
        $idUser = $_POST["id_user"];

        if ($password !== $password2) {
            echo "
            <script>
                alert('password salah');
            </script>
            ";
            return false;
        }
        $query = "UPDATE user SET username = '$username', email = '$email', password = '$password', id_role = '$idRole' WHERE id_user = '$idUser'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function deleteUser($data)
    {
        $id = $data['id_user'];
        $query = "DELETE FROM user WHERE id_user = '$id' ";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function edit($data)
    {
        $id_petugas = $data['id_petugas'];
        $nama = $data['nama'];
        $telpon = $data['telpon'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $alamat = $data['alamat'];
        $agama = $data['agama'];
        $query = "UPDATE petugas SET nama = '$nama', telpon = '$telpon', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama' WHERE id_petugas = '$id_petugas'";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function getAllData()
    {
        $query = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // kecuali role mahasiswa
    public function getDataRole()
    {
        $query = "SELECT * FROM role WHERE id_role != 3;";
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
