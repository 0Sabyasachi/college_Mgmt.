<?php

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$employeeid = $_POST['employeeid'];
$issueddate = $_POST['issueddate'];
$expirydate = $_POST['expirydate'];
$newpass = $_POST['newpass'];
$confirmpass = $_POST['confirmpass'];

// linking database

$conn = new mysqli('localhost', 'root', '', 'campusBridge');

if($conn->connect_error)
{
    echo "$conn->connect_error";
    die("connection failed : " . $conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into teacher_table(TName,TEmail,TContact,TGender,TBirthDate,TUserName,TEmployeeId,TIssuedDate,TExpiryDate,TNewPass,TConfirmPass) values(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssisssissss", $name, $email, $contact, $gender, $birthdate, $username, $employeeid, $issueddate, $expirydate, $newpass, $confirmpass);
    $stmt->execute();
    echo "Successful";
    $stmt->close();
    $conn->close();
}

?>