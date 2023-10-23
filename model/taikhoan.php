<?php

function insert_taikhoan($email, $user, $pass, $address, $hinh) {
    $sql = "INSERT INTO taikhoan (email, user, pass, address, img) VALUES ('$email', '$user', '$pass', '$address', '$hinh')";
    pdo_execute($sql);
}
function add_taikhoan($email, $user, $pass, $address, $hinh, $vaitro){
    $sql = "INSERT INTO taikhoan (email, user, pass, address, img, vaitro) VALUES ('$email', '$user', '$pass', '$address', '$hinh', '$vaitro')";
    pdo_execute($sql);
}
function update_taikhoan($id,$email,$address,$hinh,$vaitro){
    if($hinh != ""){
        $sql = "UPDATE taikhoan set email = '$email', address = '$address', img = '$hinh' where id = '$id'";
    } else {
        $sql = "UPDATE taikhoan set email = '$email', address = '$address' where id = '$id'";
    }
    pdo_execute($sql);
}
function list_taikhoan_kh(){
    $sql = "SELECT * from taikhoan where vaitro=0 or vaitro=1";
    $result = pdo_query($sql);
    return $result;
}
function phanquyen($id){
    $sql = "UPDATE taikhoan set vaitro = 1 where id = '$id'";
    pdo_execute($sql);
  }
  function goquyen($id){
    $sql = "UPDATE taikhoan set vaitro = 0 where id = '$id'";
    pdo_execute($sql);
  }
function dangnhap($user, $pass) {
    $sql = "SELECT * from taikhoan where user='$user' and pass='$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function dangxuat() {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
}
function doimatkhau($user,$pass,$newpass){
    $sql = "UPDATE taikhoan set pass = '$newpass' where user = '$user' and pass = '$pass'";
    pdo_execute($sql);
}
function sendMail($email) {
    $sql = "SELECT * from taikhoan where email = '$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
        return "Gủi thành công";
    } else {
        return "Email bạn nhập không có trong hệ thống !";
    }
}
function sendMailPass($email, $username, $pass){
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '4f3b5e3b6f3efd';                     //SMTP username
        $mail->Password   = '036d96615d7a1c';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'Duanmau');
        $mail->addAddress($email, $username);   

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mat khau cua ban la '.$pass;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function delete_taikhoan($id){
    $sql = "DELETE from taikhoan where id = $id";
    pdo_execute($sql);
}

?>
