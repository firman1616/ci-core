<table id="modulTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Modul</th>
            <th>URL Modul</th>
            <th>Icon Modul</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($modul as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->nama_modul ?></td>
                <td><?= $row->url_modul ?></td>
                <td><?= $row->icon_modul ?></td>
                <td>
                    <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_modul ?>"><i class="fa fa-edit"></i></button>
                    <!-- <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_modul ?>"><i class="fa fa-trash"></i></button> -->
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>