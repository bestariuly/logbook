<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kategori Alat</h1>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahKategori">Tambah Kategori</button>
                    <hr>
                    <?php 
                    echo $this->session->flashdata('message');
                   ?>

<!-- tambah kategori -->
<div id="tambahKategori" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <form action="../tambah_alat_agroklimat" method="post">
          <div class="form-group">
            <label for="namakategori">Nama Kategori Alat</label>
            <input type="text" name="kategori" class="form-control" id="namakategori" name="nama_kategori">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
         <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->
            <div class="row">
          <div class="col-md-8">
            <div class="panel-group" id="accordion">
                <?php 
                    foreach ($kategori as $row1) {
                        ?>
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1->id_kategori; ?>">
                        <?php echo $row1->id_kategori.". ".$nama_kategori=$row1->nama_kategori; ?></a>

          <!-- hapus kategori -->
            
                        <?php echo anchor('admin/hapusKategoriAlat/'.$row1->id_kategori, '<button style="float: right" class="btn btn-default small glyphicon glyphicon-trash" title="Hapus"></button>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>
<!-- button hapus kategori -->

                        <script>
                          function confirmDialog() {
                           return confirm('Apakah anda yakin akan menghapus kategori alat ini?')
                          }
                          function confirmDialog1() {
                           return confirm('Apakah anda yakin akan menghapus alat ini?')
                          }
                        </script>
<!-- button edit kategori -->
                        <button style="float: right" class="btn btn-default small glyphicon glyphicon-edit" title="Edit" data-toggle="modal" data-target="#editKategori<?php echo $row1->id_kategori; ?>"></button>
<!-- button edit kategori -->

<!-- Edit Kategori -->
                          <div id="editKategori<?php echo $row1->id_kategori; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Kategori <b><?php echo $row1->nama_kategori; ?></b></h4>
                                </div> 
                                <div class="modal-body">
                                  <form action="../updatekategori" method="post">
                                    <div class="form-group">
                                      <input required type="hidden" class="form-control" id="idkategori" name="idkategori" value="<?php echo $row1->id_kategori; ?>">
                                      <label for="namakategori">Nama Kategori Alat</label>
                                      <input required type="text" class="form-control" id="namakategori" name="namakategori" value="<?php echo $row1->nama_kategori; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
<!-- End Edit Kategori -->

                      </h4>
                      <div style="text-align: right;">
                      </div>
                    </div>
                    <div id="collapse<?php echo $row1->id_kategori; ?>" class="panel-collapse collapse">
                      <div class="panel-body">

                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah<?php echo $row1->id_kategori; ?>">Tambah Peralatan <?php echo $row1->nama_kategori; ?></button>

                        <div id="tambah<?php echo $row1->id_kategori; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Peralatan <?php echo $row1->nama_kategori; ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <form action="../tambah_alat" method="post">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="id_kategori_alat" value="<?php echo $row1->id_kategori; ?>" readonly>
                                        <label for="alat<?php echo $row1->nama_kategori; ?>">Nama Alat</label>
                                        <input type="text" class="form-control" name="nama_alat" id="alat<?php echo $row1->nama_kategori; ?>">
                                      </div>
                                      <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                          <?php $no=1; foreach ($alat as $row2) {
                                    if ($row2->id_kategori == $row1->id_kategori) {
                                        ?>
                                <div class="panel panel-success">
                                  <div class="panel-heading">
                                        <?php echo $no.'. '.$row2->nama_alat; $no++; ?>
                                      <div style="text-align: right;">
                                         <button class="btn btn-default glyphicon glyphicon-edit" data-toggle="modal" data-target="#edit<?php echo $row2->id_alat; ?>"></button>
                                          <?php echo anchor('admin/hapusAlat/'.$row2->id_alat, '<button class="btn btn-default glyphicon glyphicon-trash" ></button>', array('class'=>'delete', 'onclick'=>"return confirmDialog1();")); ?> 

                                      </div>
                                      
                                  </div>
                                </div>
<!-- modal edit mulai --> 
  <div id="edit<?php echo $row2->id_alat; ?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                      <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Peralatan <?php echo $row1->nama_kategori; ?></h4>
                                              </div> 
                                              <div class="modal-body">
                                                <form action="../updatealat" method="post">
                                                  <div class="form-group">
                                                    <input required class="form-control" name="id_kategori_alat" value="<?php echo $row1->id_kategori; ?>" readonly type="hidden">
                                                    <input required class="form-control" name="id_alat" value="<?php echo $row2->id_alat; ?>" readonly type="hidden">
                                                    <label for="xalat<?php echo $row1->nama_kategori; ?>">Nama Alat</label>
                                                    <input required type="text" class="form-control" name="nama_alat" id="xalat<?php echo $row1->nama_kategori; ?>" value="<?php echo $row2->nama_alat; ?>">
                                                  </div>
                                                  <button type="submit" class="btn btn-default">Update</button>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
<!-- modal edit selesai -->

                                        <?php
                                        }
                            } ?>
                      </div>
                    </div>
                  </div>
                <?php 
                }; 
                ?>

            
            </div>
            <!-- /.row -->
</div>
        <!-- /#page-wrapper -->
