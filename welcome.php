<?php 
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
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
        <h2 class="text-2xl font-bold mb-6">Welcome , <?php echo htmlspecialchars($_SESSION["email"]) ?> !</h2>
        <a href="logout.php" class="bg-red-500 text-white p-2 rounded-lg"> Logout </a>
        
    </div>
</body>
</html>