<?php
    require_once('header.php');
    $users = $PM->getUsers();
?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.1/css/jquery.dataTables.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.js"></script>
    <div class="col-lg-12">
        <h2>Usuarios </h2>
        <h5>Total: <?php echo $users[0]['total']; ?> </h5>
        <div class="table-responsive">
            <table id="table-users" class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>Id <i class="fa fa-sort"></i></th>
                    <th>Nombre  <i class="fa fa-sort"></i></th>
                    <th>Edad  <i class="fa fa-sort"></i></th>
                    <th>Genero  <i class="fa fa-sort"></i></th>
                    <th>Tipo <i class="fa fa-sort"></i></th>
                    <th>Registrado <i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td><?php echo $user['gender']; ?></td>
                        <td><?php echo $user['type']; ?></td>
                        <td><?php echo $user['date']; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">
    $("#usuarios").addClass("active");
    $(document).ready(function(){
        $('#table-users').dataTable();
    });
</script>
<?php
    require_once('footer.php');
?>