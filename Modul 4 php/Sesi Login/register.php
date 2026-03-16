<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f5f5f5;
}

.register-box{
width:400px;
margin:120px auto;
background:white;
padding:40px;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<div class="register-box">

<h2 class="text-center mb-4">Register</h2>

<form action="proses_register.php" method="POST">

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-success">Send</button>

</form>

<br>

<?php
if(isset($_GET['success'])){
echo "<div class='text-success'>user is added</div>";
echo "<a href='login.php'>Login</a>";
}
?>

</div>

</body>
</html>