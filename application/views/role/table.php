<table id="roleTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($master_roles as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->role_name ?></td>
                <td>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_role ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_role ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>