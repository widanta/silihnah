<?php
session_start();

define('BASE_URL', 'http://localhost/silihnah');

class Connect
{

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'silihnah';

    protected $conn;


    function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $query = mysqli_query($this->conn, $sql);
        $row = $query->num_rows;

        if ($row == 1) {
            $data = $query->fetch_assoc();
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = [
                    'id_user' => $data['id_user'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'id_role' => $data['id_role']
                ];

                if ($_SESSION['user']['id_role'] == "1" || $_SESSION['user']['id_role'] == "2") {
                    $_SESSION['id_user'] = $data['id_user'];
                    header("Location: views/admin/dashboard.php");
                } else {
                    header("Location: views/dashboard.php");
                }
            } else {
                echo "
                <script>
                    alert('password salah');
                </script>
                ";
                return false;
            }
        }
    }

    public function registerMahasiswa($username, $email, $password)
    {
        $username = strtolower(stripslashes($_POST["username"]));
        $email = strtolower(stripslashes($_POST["email"]));
        $password = mysqli_real_escape_string($this->conn, $_POST["password"]);
        $password2 = mysqli_real_escape_string($this->conn, $_POST["passwordConfirm"]);

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
        mysqli_query($this->conn, "INSERT INTO user VALUES(NULL,'$username','$email','$password',3)");
        return mysqli_affected_rows($this->conn);
    }
}
