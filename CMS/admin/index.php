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
                                $published_post_count = GetRecordCount("posts", "post_status = 'published'");
                                $draft_post_count = GetRecordCount("posts", "post_status = 'draft'");
                                $approved_comments_count = GetRecordCount("comments", " comment_status = 'approved'");
                                $unapproved_comments_count = GetRecordCount("comments", " comment_status = 'unapproved'");
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
