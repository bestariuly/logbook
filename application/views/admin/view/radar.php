<div id="page-wrapper">
 <div class="row">
  <div class="col-lg-12">

    <h1 class="page-header">Kategori Radar</h1>
    <!--  button tambah kategoriradar -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahkategoriRadar">Tambah Kategori Radar</button>
    <hr>
    <?php 
    echo $this->session->flashdata('message');

    ?>
    <!-- Tambah kategoriradar -->
    <div id="tambahkategoriRadar" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah kategori Radar</h4>
          </div>
          <div class="modal-body">
            <form action="../tambah_kategori_radar" method="post">
              <div class="form-group">
                <label for="namakategoriradar">Nama kategori Radar</label>
                <input required type="text" class="form-control" id="namakategoriradar" name="namakategoriradar">
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
    <!-- End TAmbah kategoriradar -->

  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-8">
    <div class="panel-group" id="accordion">
      <?php $nomer=1;
      foreach ($kategoriradar as $row1) {
        ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1->id_kategori; ?>">
                <?php echo $nomer.". ".$nama_kategori=$row1->nama_kategori; $nomer++; ?>  </a>
                <!-- button hapus kategoriradar -->
                <?php echo anchor('admin/hapuskategoriRadar/'.$row1->id_kategori, '<button style="float: right" class="btn btn-default small glyphicon glyphicon-trash" title="Hapus"></button>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>
                <!-- button hapus kategoriradar -->

                <script>
                  function confirmDialog() {
                   return confirm('Apakah anda yakin akan menghapus kategoriradar radar ini?')
                 }
                 function confirmDialog1() {
                   return confirm('Apakah anda yakin akan menghapus radar ini?')
                 }
               </script>
               <!-- button edit kategoriradar -->
               <button style="float: right" class="btn btn-default small glyphicon glyphicon-edit" title="Edit" data-toggle="modal" data-target="#editkategoriRadar<?php echo $row1->id_kategori; ?>"></button>
               <!-- button edit kategoriradar -->

               <!-- Edit kategoriradar -->
               <div id="editkategoriRadar<?php echo $row1->id_kategori; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit kategori <b><?php echo $row1->nama_kategori; ?></b></h4>
                    </div> 
                    <div class="modal-body">
                      <form action="../updatekategoriradar" method="post">
                        <div class="form-group">
                          <input required type="hidden" class="form-control" id="idkategoriradar" name="idkategoriradar" value="<?php echo $row1->id_kategori; ?>">
                          <label for="namakategoriradar">Nama kategori Radar</label>
                          <input required type="text" class="form-control" id="namakategoriradar" name="namakategoriradar" value="<?php echo $row1->nama_kategori; ?>">
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
              <!-- End Edit kategoriradar -->
              
              
            </h4>
          </div>
          <div id="collapse<?php echo $row1->id_kategori; ?>" class="panel-collapse collapse">
            <div class="panel-body">
              <!-- tambah peralatan -->
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambahradar<?php echo $row1->id_kategori; ?>">Tambah Radar <?php echo $row1->nama_kategori; ?></button>
              <!-- End tambah peralatan -->
              <!-- modal tambah peralatan -->

              <div id="tambahradar<?php echo $row1->id_kategori; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Tambah Radar <?php echo $row1->nama_kategori; ?></h4>
                    </div>
                    <div class="modal-body">
                      <form action="../tambahradar" method="post">
                        <div class="form-group">
                          <input required type="hidden" class="form-control" name="id_kategori_radar" value="<?php echo $row1->id_kategori; ?>">
                          <label for="radar<?php echo $row1->nama_kategori; ?>">Nama Radar</label>
                          <input required type="text" class="form-control" name="nama_radar" id="radar<?php echo $row1->nama_kategori; ?>">
                          <label for="radar<?php echo $row1->nama_kategori; ?>">Standar Radar</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" name="standar" id="radar<?php echo $row1->nama_kategori; ?>">
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
              <!-- End modal tambah peralatan -->

              <?php $no=1; foreach ($radar as $row2) {
                if ($row2->id_kategoriradar == $row1->id_kategori) {
                  ?>
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <?php echo $no.'. '.$nama=$row2->nama_radar; $no++; ?>
                      <div style="text-align: right;">
                        <!-- button hapus + edit alat -->
                        <button class="btn btn-default glyphicon glyphicon-edit" data-toggle="modal" data-target="#editradar<?php echo $row2->id_radar; ?>"></button>
                        <?php echo anchor('admin/hapusRadar/'.$row2->id_radar, '<button class="btn btn-default glyphicon glyphicon-trash" ></button>', array('class'=>'delete', 'onclick'=>"return confirmDialog1();")); ?> 
                        <!-- End button hapus + edit alat -->

                        
                      </div>
                      
                    </div>
                  </div>
                  <!-- modal edit mulai -->
                  <div id="editradar<?php echo $row2->id_radar; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Peralatan <?php echo $row1->nama_kategori; ?></h4>
                        </div> 
                        <div class="modal-body">
                          <form action="../updateradar" method="post">
                            <div class="form-group">
                              <input required class="form-control" name="id_kategori_radar" value="<?php echo $row1->id_kategori; ?>" readonly type="hidden">
                              <input required class="form-control" name="id_radar" value="<?php echo $row2->id_radar; ?>" readonly type="hidden">
                              <label for="xradar<?php echo $row1->nama_kategori; ?>">Nama Radar</label>
                              <input required type="text" class="form-control" name="nama_radar" id="xradar<?php echo $row1->nama_kategori; ?>" value="<?php echo $row2->nama_radar; ?>">
                              <label for="xradar<?php echo $row1->nama_kategori; ?>">Standar Radar</label>
                              <input style="text-transform:uppercase" required type="text" class="form-control" name="standar" id="xradar<?php echo $row1->nama_kategori; ?>" value="<?php echo $row2->standar; ?>">
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