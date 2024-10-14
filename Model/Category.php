<?php
 class Category{
     private $conn;
     public function __construct(){
        include('Connect.php');
        $this->conn = $conn;
     }
     function getAll(){
        $sql = 'SELECT * FROM categories';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

     }
     function store($name){
      $sql = 'INSERT INTO categories (name) VALUES (:name)';
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      if ($stmt->execute()) {
          return "Thêm danh mục thành công";
      } else {
          return "Thêm danh mục thất bại";
      }
  }
     public function getProductID($id)
{
    include('Connect.php');

    // Sử dụng câu truy vấn chuẩn bị sẵn
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    // Lấy ra một kết quả (thay vì mảng nhiều kết quả)
    return $stmt->fetch();
}

public function update($id, $name) {
   include('Connect.php');

   // Câu lệnh SQL chính xác
   $sql = "UPDATE categories SET name = :name WHERE id = :id";

   // Chuẩn bị câu lệnh
   $stmt = $this->conn->prepare($sql);

   // Thực hiện câu lệnh với các tham số
   $stmt->execute([
       ':name' => $name,
       ':id' => $id
   ]);
   
   if ($stmt->rowCount()) {
       return "Cập nhật danh mục thành công";
   } else {
       return "Cập nhật danh mục thất bại";
   }
}

public function delete($id)
{
    include('Connect.php');
    
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    try {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
 }