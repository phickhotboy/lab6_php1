<?php
class Product
{
    public function getListAllProduct()
    {
        include('Connect.php');
        $sql = 'SELECT * FROM products';
        $stmt = $conn->prepare($sql); //Nạp câu lệnh
        $stmt->execute(); //Thực hiện câu lệnh
        $result = $stmt->fetchAll(); //Lấy ra kết quả dạng mảng
        return $result;
    }
    public function store($name = "", $price = "", $description = "", $content = "", $image = "", $brand = "")
{
    include('Connect.php');
    $message = "";

    if ($name != "") {
        // Câu truy vấn chuẩn bị sẵn
        $sql = "INSERT INTO products (name, price, description, content, image, brand) 
                VALUES (?, ?, ?, ?, ?, ?)";

        // Nạp câu truy vấn với các giá trị placeholder
        $stmt = $conn->prepare($sql);

        // Thực thi câu truy vấn với các tham số
        $stmt->execute([$name, $price, $description, $content, $image, $brand]);

        // Không cần fetchAll() vì INSERT không trả về kết quả dạng bảng
        $message = 'Thêm thành công';
    } else {
        $message = 'Không được để rỗng';
    }

    return $message;
}
public function getProductID($id)
{
    include('Connect.php');

    // Sử dụng câu truy vấn chuẩn bị sẵn
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    // Lấy ra một kết quả (thay vì mảng nhiều kết quả)
    return $stmt->fetch();
}

public function update($id, $name, $price, $description, $content, $image, $brand)
{
    include('Connect.php');

    // Câu lệnh SQL với các tham số
    $sql = "UPDATE products SET
        name = :name,
        price = :price,
        brand = :brand,
        content = :content,
        description = :description,
        image = :image
    WHERE id = :id";

    // Chuẩn bị câu lệnh
    $stmt = $conn->prepare($sql);
    
    // Thực hiện câu lệnh với các tham số
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':brand' => $brand,
        ':content' => $content,
        ':description' => $description,
        ':image' => $image,
        ':id' => $id
    ]);
}



    
}