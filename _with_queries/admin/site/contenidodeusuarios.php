<?php
    require_once('header.php');
    $content = $PM->getUserContent();
?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.1/css/jquery.dataTables.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.js"></script>
    <div class="col-lg-12">
        <h2>Contenido subido por los usaurios </h2>
        <div class="table-responsive">
            <table id="table-content" class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>Usuario  <i class="fa fa-sort"></i></th>
                    <th>Correo <i class="fa fa-sort"></i></th>
                    <th>Contenido <i class="fa fa-sort"></i></th>
                    <th>Descripción <i class="fa fa-sort"></i></th>
                    <th>Programa <i class="fa fa-sort"></i></th>
                    <th>Fecha <i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($content as $c) { ?>
                    <tr>
                        <td><?php echo $c['name']; ?></td>
                        <td><?php echo $c['mail']; ?></td>
                        <td><?php if ($c['type'] == 'img') {
                                echo "<img src='".$c['content']."' width='100%' height='auto' />";
                            } else {
                                echo $c['content'];
                            } ?></td>
                        <td><?php echo $c['desc']; ?></td>
                        <td><?php echo $c['program']; ?></td>
                        <td><?php echo $c['date']; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">
    $("#content").addClass("active");
    $(document).ready(function(){
        $('#table-content').dataTable();
    });
</script>
<?php
    require_once('footer.php');
?>