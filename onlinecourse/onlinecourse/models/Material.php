<?php
require_once 'config/Database.php';

class Material {
    private $conn;
    private $table = 'materials';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Hàm thêm mới tài liệu
    public function create($lesson_id, $filename, $file_path, $file_type) {
        $query = "INSERT INTO " . $this->table . " 
                  (lesson_id, filename, file_path, file_type, uploaded_at) 
                  VALUES (:lesson_id, :filename, :file_path, :file_type, NOW())";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lesson_id', $lesson_id);
        $stmt->bindParam(':filename', $filename);
        $stmt->bindParam(':file_path', $file_path);
        $stmt->bindParam(':file_type', $file_type);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function getByLessonId($lesson_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE lesson_id = :lesson_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lesson_id', $lesson_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
