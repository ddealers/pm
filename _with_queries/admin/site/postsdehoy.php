<?php
    require_once('header.php');
    $posts = $PM->getPostsToday();
?>
<div class="col-lg-12">
    <h2>Posts de hoy </h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <th>ID <i class="fa fa-sort"></i></th>
                <th>Titulo  <i class="fa fa-sort"></i></th>
                <th>Fecha <i class="fa fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td><a href="<?php echo $post['link']; ?>" target="_blank" ><?php echo $post['title']; ?></a></td>
                    <td><?php echo $post['date']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div><!-- /.row -->
<script type="text/javascript">
    $("#today").addClass("active");
</script>
<?php
    require_once('footer.php');
?>