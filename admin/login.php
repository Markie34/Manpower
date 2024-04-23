<?php
session_start();

if(isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
if (isset($_GET['0'])) {
        echo '<script>alert("Invalid username. Please try again.");</script>';
}
if (isset($_GET['1'])) {
    echo '<script>alert("Invalid password. Please try again.");</script>';
}
?>

<html>
<head>
    <title>Admin Login</title>
    <link rel="icon" href="images/po.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="Lstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<body>
    <div class="form1">
        <div class="formbox">
            <div class="formdetails">
                <img src="images/p3.png" width="340px" height="140px">
                <p style="color: #fff; font-size: 1.20rem;">"CONNECTING TALENT, BRIDGING SUCCESS"</p>
            </div>
            <div class="formcontent">
                <i style="margin: 220px; font-size:50px;" class="bi bi-person-workspace"></i>
                <h2>ADMIN LOGIN</h2>
                <form action="function.php" method="POST">
                    <div class="inputfield">
                        <input type="text" name="email" required>
                        <label><i style="margin: 8px;" class="bi bi-person-circle" name="usernames"></i> Username</label>
                    </div>

                    <div class="inputfield">
                        <input type="password" name="password" required>
                        <label><i style="margin: 10px;" class="bi bi-lock-fill" ></i>Password</label>
                    </div>
                    <button type="submit" name="login">LOG IN</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
