
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Share Something</h3>
  </div>
  <div class="panel-body">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
            <label for="title">Share Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Share Description</label>
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        <a href="<?php echo ROOT_PATH; ?>shares" class="btn btn-danger">Cancel</a>

    </form>
  </div>
</div>
