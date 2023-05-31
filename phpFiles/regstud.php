<?php

$stu_name = $_POST['stu_name'];
$stu_email = $_POST['stu_email'];
$stu_contact = $_POST['stu_contact'];
$stu_gender = $_POST['stu_gender'];
$stu_birthdate = $_POST['stu_birthdate'];
$stu_stream = $_POST['stu_stream'];
$stu_username = $_POST['stu_username'];
$reg_no = $_POST['reg_no'];
$stu_issueddate = $_POST['stu_issueddate'];
$stu_expirydate = $_POST['stu_expirydate'];
$stu_newpass = $_POST['stu_newpass'];
$stu_confirmpass = $_POST['stu_confirmpass'];

// linking database

$conn = new mysqli('localhost', 'root', '', 'campusBridge');

if($conn->connect_error)
{
    echo "$conn->connect_error";
    die("connection failed : " . $conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into student_table(SName,SEmail,SContact,SGender,SBirthDate,SStream,SUserName,SRegNo,SIssuedDate,SExpiryDate,SNewPass,SConfirmPass) values(?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssissssissss", $stu_name, $stu_email, $stu_contact, $stu_gender, $stu_birthdate, $stu_stream, $stu_username, $reg_no, $stu_issueddate, $stu_expirydate, $stu_newpass, $stu_confirmpass);
    $stmt->execute();
    echo "successful";
    $stmt->close();
    $conn->close();

}

?>