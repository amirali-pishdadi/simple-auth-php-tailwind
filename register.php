<?php 
require "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"] , PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email , password ) VALUES (? , ?)");
    $stmt->bind_param("ss" , $email , $password);

    if ($stmt->execute()) {
        echo "Registeration successful!";
    } else {
        echo "Error" . $stmt->error;
    }
    

    $stmt->close();

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
    <div class="w-full max-w-md bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-6">Register</h2>

        <form action="register.php" method="post">
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
        <a href="/login.php">have an account ?</a>

    </div>
</body>
</html>