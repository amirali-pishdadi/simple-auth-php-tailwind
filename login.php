<?php 
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email = $_POST["email"];
 $password = $_POST["password"];

 $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
 $stmt->bind_param("s" , $email);
 $stmt->execute();
 $stmt->bind_result($hashed_password);
 $stmt->fetch();
 $stmt->close();

    if (password_verify($password , $hashed_password)) {
        $_SESSION["email"] = $email;
        header("Location: welcome.php");
exit();
    } else {
        echo "invalid email or password";
    }
    

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
    <div class="w-full max-w-md bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-6">Login</h2>

        <form action="login.php" method="post">
        <div class="mb-4">
            <label  class="block text-sm font-medium text-gray-700" for="email">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>

        </div>
        <div class="mb-4">
        <label  class="block text-sm font-medium text-gray-700" for="password">Password</label>
        <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>

        </div>
        <button type="submit" class="w-full bg-blue-800 text-white p-2 rounded-md">Submit</button>
        </form>

        <a href="/register.php">Don't have an account ?</a>
    </div>
</body>
</html>