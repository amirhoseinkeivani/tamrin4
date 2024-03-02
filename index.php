
<?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ایجاد دیتابیس
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// انتخاب دیتابیس
$conn->select_db($dbname);

// ایجاد جدول کاربر
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    family VARCHAR(30) NOT NULL,
    age int NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// وارد کردن کاربران در جدول
$sql = "INSERT INTO users (name, family,age)
VALUES ('amirhosein', 'keivani',22), ('ali', 'fanaei',21), ('mmd', 'karimi',34), ('arya', 'poori',63)";

if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully";
} else {
    echo "Error inserting records: " . $conn->error;
}

//حذف یک کاربر

$sql = "DELETE FROM users WHERE name='ali' AND family='fanaei'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>

