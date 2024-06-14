<?php
require_once('./class/class.user.php');

$userid = $_GET["id"];
$user = new User();
$user->getUserById($userid);
$password = $user->password;
if(isset($_POST['password-edit']) && $_POST['password-edit'] != "******") {
  $password = password_hash($_POST['password-edit'], PASSWORD_DEFAULT);
}

if(isset($_POST["update-data"])){
  $name = $_POST['name-edit'];
  $email = $_POST['email-edit'];
  $role = $_POST['role-edit'];
  $user->editUser($name, $email, $password, $role, $userid);
  echo '<script>window.location="dashboardadmin.php?row=home";</script>';
}

?>

<form action="" method="post">
  <div class="mb-3">
    <label for="name-edit" class="form-label">Name</label>
    <input type="text" class="form-control" id="name-edit" name="name-edit" value="<?php echo $user->nama; ?>">
  </div>
  <div class="mb-3">
    <label for="email-edit" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email-edit" name="email-edit" value="<?php echo $user->email; ?>">
  </div>
  <div class="mb-3">
    <label for="password-edit" class="form-label">Password</label>
    <input type="password" class="form-control" id="password-edit" name="password-edit" value="******">
  </div>
  <div class="mb-3">
    <label for="role-edit" class="form-label">Role</label>
    <select class="form-select" id="role-edit" name="role-edit">
      <option value="user" <?php if($user->role == "user") echo 'selected'; ?> >user</option>
      <option value="admin" <?php if($user->role == "admin") echo 'selected'; ?> >admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="update-data">Update</button>
  <a href="dashboardadmin.php" class="btn btn-secondary" >Cancel</a>
</form>