<table id="rolepermissionTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Role Permission</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($master_role_permission as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->name_permission ?></td>
                <td>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_permission ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_permission ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>