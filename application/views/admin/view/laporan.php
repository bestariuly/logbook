<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <button type="button" class="btn btn-primary btn-md" data-toggle = 'modal' data-target = "#laporan" >Buat Laporan</button>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jenis Laporan</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($laporan as $laporan) {
                  
                    ?>
                    <tr>
                      <td><?php echo $no; $no++; ?></td>
                      <td><?php echo $laporan->tanggal; ?></td>
                      <td><?php echo $laporan->jenis_laporan; ?></td>
                      <td>
<!-- button  -->
                      <?php echo anchor('admin/hapuslaporan/'.$laporan->id, '<button style="float: right" class="btn btn-default small glyphicon glyphicon-trash" title="Hapus"></button>', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>  
                      <button style="float: right" class="btn btn-default small glyphicon glyphicon-edit" title="Edit" data-toggle="modal" data-target="#editlaporan<?php echo $laporan->id; ?>"></button>
                       <button style="float: right" class="btn btn-default small glyphicon glyphicon-eye-open" title="view" data-toggle="modal" data-target="#lihatlaporan<?php echo $laporan->id; ?>"></button>
<!-- modal lihat laporan -->
                  <div id="lihatlaporan<?php echo $laporan->id; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
 <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lihat laporan <b><?php echo $laporan->jenis_laporan; ?></b></h4>
                      </div> 
                      <div class="modal-body">
                        <form action="../updatelaporan" method="post">
                          <div class="form-group">
                            <input required type="hidden" class="form-control" id="id" name="id" value="<?php echo $laporan->id; ?>">
                            <label for="jenis_laporan">jenis laporan</label>
                            <input required type="text" class="form-control" id="jenis_laporan" name="jenis_laporan" value="<?php echo $laporan->jenis_laporan; ?>" input readonly>
                            <label for="nama">Nama Alat</label>
                            <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->nama_alat; ?>" input readonl>
                            <label for="lokasi">Lokasi</label>
                            <input required type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $laporan->lokasi; ?>" input readonly>
                            <label for="permasalahan">Permasalahan</label>
                            <textarea class="form-control" name="permasalahan" id="permasalahan" input readonly><?php echo $laporan->permasalahan; ?></textarea>
                            <label for="tindakan">Tindakan</label> 
                            <textarea name="tindakan" class="form-control" id="tindakan" input readonly><?php echo $laporan->tindakan; ?></textarea>
                            <label for="hasil">Hasil</label>
                            <textarea name="hasil" class="form-control" id="hasil" input readonly> <?php echo $laporan->hasil; ?></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
<!-- modal edit laporan -->                    
                  <div id="editlaporan<?php echo $laporan->id; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
<!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit laporan <b><?php echo $laporan->jenis_laporan; ?></b></h4>
                      </div> 
                      <div class="modal-body">
                        <form action="../updatelaporan" method="post">
                          <div class="form-group">
                            <input required type="hidden" class="form-control" id="id" name="id" value="<?php echo $laporan->id; ?>">
                            <label for="jenis_laporan">jenis laporan</label>
                            <input required type="text" class="form-control" id="jenis_laporan" name="jenis_laporan" value="<?php echo $laporan->jenis_laporan; ?>">
                            <label for="nama">Nama Alat</label>
                            <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->nama_alat; ?>">
                            <label for="lokasi">Lokasi</label>
                            <input required type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $laporan->lokasi; ?>">
                            <label for="permasalahan">Permasalahan</label>
                            <textarea class="form-control" name="permasalahan" id="permasalahan"><?php echo $laporan->permasalahan; ?></textarea>
                            <label for="tindakan">Tindakan</label>
                            <textarea name="tindakan" class="form-control" id="tindakan"><?php echo $laporan->tindakan; ?></textarea>
                            <label for="hasil">Hasil</label>
                            <textarea name="hasil" class="form-control" id="hasil"> <?php echo $laporan->hasil; ?></textarea>
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
            <div id="collapse<?php echo $laporan->id; ?>" class="panel-collapse collapse">
              <div class="panel-body">
<!-- button hapus laporan -->
                               
                  <script>
                    function confirmDialog() {
                     return confirm('Apakah anda yakin akan menghapus laporan radar ini?')
                   }
                 </script>

                    </td>
                    </tr>
                  <?php } ?>
                </tbody>
                </table>
            </div>
            
          </div>
<!-- modal buat laporan -->
        <div id="laporan" class="modal fade" role="dialog">
        <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buat Laporan</h4>
      </div>
      <div class="modal-body">
        <form action="../buat_laporan" method="post">
          <div class="form-group">
            <label for="jenis">Jenis Laporan</label>
            
            <div class="form-group">
              <label for="jenis_laporan"></label>
              
              <select class="form-control" id="jenis_laporan" name="jenis_laporan">
                <option value="kerusakan">Kerusakan</option>
                <option value="perbaikan">Perbaikan</option>
                <option value="instalasi">Instalasi</option>
                <option value="backup">Backup</option>
              </select>
            </div>

            <label for="nama_alat">Nama Alat</label>
            <input type="text" class="form-control" id="nama_alat" name="nama">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi">
            <label for="permasalahan">Permasalahan</label>
            <textarea id = "permasalahan" name="permasalahan" class="form-control"></textarea>
            <label for="Tindakan">Tindakan</label>
            <textarea id = "tindakan" class="form-control" name="tindakan"></textarea>
            <label for="hasil">Hasil</label>
            <textarea id = "hasil" class="form-control" name="hasil"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

