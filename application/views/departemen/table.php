<table id="deptTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Dept</th>
            <th>Departemen</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($master_depts as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->kode_dept ?></td>
            <td><?= $row->nama_dept ?></td>
            <td> 
                <button type="button" class="btn btn-warning edit" data-id="<?= $row->id_dept ?>"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger delete" data-id="<?= $row->id_dept ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>