<table id="menuTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>URL Menu</th>
            <th>Icon Modul</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($menu as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->nama_menu ?></td>
                <td><?= $row->url_menu ?></td>
                <td><?= $row->nama_modul ?></td>
                <td>
                    <?php if($row->status == 1){ ?>
                        <span class="badge badge-pill badge-primary">Active</span>
                    <?php }else { ?>
                        <span class="badge badge-pill badge-danger">Nonactive</span>
                    <?php } ?>
                </td>
                <td>
                    <button type="button" class="btn btn-primary update" data-id="<?= $row->id_menu ?>"><i class="fa fa-retweet"></i></button>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_menu ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_menu ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>