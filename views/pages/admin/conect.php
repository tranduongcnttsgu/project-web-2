<?php
class DbConnect
{
    private $host = 'localhost';
    private $dbName = 'store'; // Tên cơ sở dữ liệu của bạn
    private $user = 'root';
    private $pass = '';
    private static $instance = null; // Đối tượng instance

    private $conn; // Kết nối MySQLi

    // Hàm khởi tạo
    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbName);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Phương thức getInstance() để trả về đối tượng instance
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DbConnect();
        }
        return self::$instance->conn; // Trả về kết nối MySQLi
    }
}
