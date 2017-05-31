<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include "includes/admin_nav.php";  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <?php include "includes/admin_widgets.php" ?>

                        <div class="row">
                            <?php
                                $qry = "SELECT * FROM posts WHERE post_status = 'published'";
                                $select_published_posts = mysqli_query($connect, $qry);
                                $published_post_count = mysqli_num_rows($select_published_posts);

                                $qry = "SELECT * FROM posts WHERE post_status = 'draft'";
                                $select_draft_posts = mysqli_query($connect, $qry);
                                $draft_post_count = mysqli_num_rows($select_draft_posts);

                                $qry = "SELECT * FROM comments WHERE comment_status = 'approved'";
                                $select_approved_comments = mysqli_query($connect, $qry);
                                $approved_comments_count = mysqli_num_rows($select_approved_comments);

                                $qry = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                                $select_unapproved_comments = mysqli_query($connect, $qry);
                                $unapproved_comments_count = mysqli_num_rows($select_unapproved_comments);
                            ?>

                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['bar']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                    ['Data', 'Count'],
                                    <?php 
                                        $element_text = ["Published Posts", "Draft Posts", "Approved Comments", "Unapproved Comments", "Users", "Categories"];
                                        $element_values = [$published_post_count, $draft_post_count, $approved_comments_count, $unapproved_comments_count, $user_count, $categories_count];

                                        for($i = 0; $i < 5; $i++){
                                            echo "['{$element_text[$i]}', {$element_values[$i]}],";
                                        }
                                    ?>
                                    ]);

                                    var options = {
                                    chart: {
                                        title: '',
                                        subtitle: '',
                                    }
                                    };

                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                }
                            </script>
                            <div id="columnchart_material" style="height: 600px;"></div>
                        </div>
        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>
