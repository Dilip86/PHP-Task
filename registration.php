<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST">
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="address" placeholder="Address">
            <input type="tel" name="phone" placeholder="Phone Number">
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
