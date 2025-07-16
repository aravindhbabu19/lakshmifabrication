<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");



$conn=new mysqli("localhost","u114356176_lakshmifab","Lakshmifab@2025","u114356176_lakshmi");
// $conn=new mysqli("localhost","root","","lakshmi");
if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
}
else{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql="INSERT INTO fabrication(name,phone,email,message) VALUES('$name',$phone,'$email','$message');";
    $res=mysqli_query($conn,$sql);
 
    if($res){
        echo "success";
    }
    else{
        echo "error";
    }
      $to = "lakshmifabricator3@gmail.com";  // 👈 Replace with your email
    $subject = "New Contact Form Submission";

    $body = "You have received a new message from your website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
    $conn->close();
}

?>