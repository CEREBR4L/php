

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">User Login</h3>
  </div>
  <div class="panel-body">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
            <label for="body">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="link">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Login">

    </form>
  </div>
</div>

