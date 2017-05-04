<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include "includes/admin_nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>Manage your categories</small>
                        </h1>

                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                
                                <div class="form-group">
                                    
                                    <label for="cat_title">Category Title</label>
                                    <input class="form-control" type="text" name="cat_title">

                                </div>

                                <div class="form-group">
                                    
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">

                                </div>
                                

                            </form>

                            <?php
                                if(isset($_GET['edit'])){

                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories.php";

                                }
                            ?>

                        </div>

                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            //find all categories
                                            find_all_categories();
                                            //delete categories on request
                                            delete_category();
                                        ?>
                                </tbody>

                            </table>

                        </div>
        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>
