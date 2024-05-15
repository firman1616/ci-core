    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Data Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="" id="menuForm" name="menuForm" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nama">Sub Menu</label>
                                    <input type="text" class="form-control" id="nama_sub_menu" name="nama_sub_menu" required>
                                </div>
                                <div class="form-group">
                                    <label for="modul">Modul</label>
                                    <select class="form-control select2" name="modul" id="modul">
                                        <option selected="selected">Choose One</option>
                                        <?php foreach ($modul->result() as $row) { ?>
                                            <option value="<?= $row->id_modul ?>"><?= $row->nama_modul ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="modul">Menu</label>
                                    <select class="form-control select2" name="menu" id="menu">
                                        <option selected="selected">Choose One</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="urlModul">Url Sub Menu</label>
                                    <input type="text" class="form-control" id="url_sub_menu" name="url_sub_menu" required>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <input type="checkbox" name="status" id="status" value="1" checked data-bootstrap-switch>
                                </div> -->
                                <button type="submit" id="save-data" class="btn btn-primary">Save Data</button>
                            </form>
                        </div>
                    </div>


                </div>

                <div class="col-lg-8">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Data</h5>
                        </div>
                        <div class="card-body">
                            <div id="div-table-submenu"></div>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->