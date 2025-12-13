<?php
require_once 'config/Database.php';

class Lesson {
    private $conn;
    private $table = 'lessons';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getByCourseId($course_id) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE course_id = :course_id 
                  ORDER BY `order` ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm mới bài học
    public function create($course_id, $title, $content, $video_url, $order) {
        $query = "INSERT INTO " . $this->table . " 
                  (course_id, title, content, video_url, `order`, created_at) 
                  VALUES (:course_id, :title, :content, :video_url, :order, NOW())";

        $stmt = $this->conn->prepare($query);

        // Clean data
        $title = htmlspecialchars(strip_tags($title));
        $content = htmlspecialchars($content);
        $video_url = htmlspecialchars(strip_tags($video_url));

        // Bind data
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':video_url', $video_url);
        $stmt->bindParam(':order', $order);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //Cập nhật bài học
    public function update($id, $title, $content, $video_url, $order) {
        $query = "UPDATE " . $this->table . " 
                  SET title = :title, 
                      content = :content, 
                      video_url = :video_url, 
                      `order` = :order 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':video_url', $video_url);
        $stmt->bindParam(':order', $order);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //Xóa bài học
    public function delete($id) {        
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
