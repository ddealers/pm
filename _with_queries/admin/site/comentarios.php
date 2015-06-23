<?php
    require_once('header.php');
    $comments = $PM->getComments();
?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.1/css/jquery.dataTables.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.js"></script>
    <div class="col-lg-12">
        <h2>Comentarios </h2>
        <div class="table-responsive">
            <table id="table-comments" class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    <th>Comentario  <i class="fa fa-sort"></i></th>
                    <th>Programa  <i class="fa fa-sort"></i></th>
                    <th>Post <i class="fa fa-sort"></i></th>
                    <th>Fecha <i class="fa fa-sort"></i></th>
                    <th> <i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment) { ?>
                    <tr id="comment-<?php echo $comment['id']; ?>">
                        <td><?php echo $comment['id']; ?></td>
                        <td>
                            <textarea id="text-<?php echo $comment['id']; ?>" cols="50" rows="5"><?php echo $comment['content']; ?></textarea>
                        </td>
                        <td><?php echo $comment['program']; ?></td>
                        <td><a href="<?php echo $comment['link']; ?>" target="_blank" ><?php echo $comment['title']; ?></a></td>
                        <td><?php echo $comment['date']; ?></td>
                        <td class="actions">
                            <button type="button" id="moderar" data-comment="<?php echo $comment['id']; ?>" class="btn btn-primary">Moderar</button>
                            <button type="button" id="eliminar" data-comment="<?php echo $comment['id']; ?>" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">
    $("#comentarios").addClass("active");
    $(document).ready(function(){
        $('#table-comments').dataTable();
    });
</script>
<?php
    require_once('footer.php');
?>