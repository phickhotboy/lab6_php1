<?php
class LoginController {
    public function index() {
        require_once('Model/User.php');
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if($username != '' && $password != '') {
                $user = new User();
                $check = $user->checkUser($username, $password);
                if($check != NULL) {
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: index.php?router=admin/product/listing");
                    exit();
                } else {
                    echo "Tên đăng nhập hoặc mật khẩu không đúng";
                }
            } else {
                echo "Vui lòng điền đầy đủ thông tin";
            }
        }
        include('Views/login.php');
    }

    public function logout() {
        unset($_SESSION['logged']);
        unset($_SESSION['username']);
        header("Location: index.php?router=admin/product/listing");
    }

    public function register() {
        require_once('Model/User.php');
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($username != '' && $password != '' && $confirmPassword != '') {
                if ($password === $confirmPassword) {
                    $user = new User();
                    $result = $user->registerUser($username, $password);
                    if ($result) {
                        echo "Đăng ký thành công. Bạn có thể đăng nhập.";
                    } else {
                        echo "Tên đăng nhập đã tồn tại.";
                    }
                } else {
                    echo "Mật khẩu xác nhận không khớp.";
                }
            } else {
                echo "Vui lòng điền đầy đủ thông tin.";
            }
        }
        include('Views/register.php');
    }
}
?>
