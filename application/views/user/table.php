<table id="userTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($user as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->username ?></td>
                <td><?= $row->role_id ?></td>
                <td>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_user ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_user ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>