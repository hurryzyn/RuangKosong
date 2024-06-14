<?php
session_start();
include 'connection.php';
include 'User.php';


$userId = $_SESSION['userid'];

$user = new User();
$user->getOneUser($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $user->__get('nama'); ?></h2>
    <p>Anda login sebagai, <strong><?php echo $user->__get('role'); ?></strong></p>
    
    <form action="update_profile.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $user->__get('email'); ?>" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $user->__get('nama'); ?>" required><br>

        <button type="submit" name="update">Update Profile</button>
        <button type="button" onclick="window.location.href='profile.php';">Cancel</button>
    </form>
</body>
</html>
