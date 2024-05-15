<table id="submenuTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Sub Menu</th>
            <th>URL Menu</th>
            <th>Parent Modul & Menu</th>
            <!-- <th>Status</th> -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($submenu as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->nama_sub_menu ?></td>
                <td><?= $row->url_sub ?></td>
                <td><?= $row->modul_id. "/" .$row->menu_id ?></td>                
                <td>
                    <button type="button" class="btn btn-primary update" data-id="<?= $row->id_sub_menu ?>"><i class="fa fa-retweet"></i></button>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_sub_menu ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_sub_menu ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>