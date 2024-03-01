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
                            <form action="" id="modulForm" name="modulForm" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nama">Nama Modul</label>
                                    <input type="text" class="form-control" id="nama_modul" name="nama_modul">
                                </div>
                                <div class="form-group">
                                    <label for="urlModul">Url Modul</label>
                                    <input type="text" class="form-control" id="url_modul" name="url_modul">
                                </div>
                                <div class="form-group">
                                    <label for="iconModul">Icon Moduk</label>
                                    <input type="text" class="form-control" id="icon_modul" name="icon_modul">
                                </div>
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
                            <div id="div-table-modul"></div>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->