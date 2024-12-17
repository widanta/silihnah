<?php
include 'connect.php';

class Status extends Connect
{
    public function getAlldata()
    {
        $query = "SELECT * FROM status";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}
