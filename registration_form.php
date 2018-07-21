<html>
<head>
    <title>Form</title>
</head>
<body>
<form method="post" action="registration_form.php">
    <label>Firstname:</label><br>
    <input type="text" name="fname"><br>
    <label>Lastname:</label><br>
    <input type="text" name="lname"><br>
    <label>Date_of_Birth:</label><br>
    <input type="date" name="number"><br>
    <label>E-mail:</label><br>
    <input type="email" name="email"><br>
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <input type="submit" name="submit">
</form>
</body>
</html>
<?php
$conn =  mysqli_connect("localhost", "root", "", "assignment");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST ['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO my_table VALUES ('$fname', '$lname','$number','$email','$username','$hash')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

