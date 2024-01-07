<?php 

require('header.php');

?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <h1 class="display-4 header-my-teams">Login <b></b></h1>
<div class="d-flex justify-content-center">
<form class="w-25" action="./action_login.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
  </div>
  <div class="form-group">
    <small>Your session will expire after one hour</small>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<?php require('footer.html'); ?>
