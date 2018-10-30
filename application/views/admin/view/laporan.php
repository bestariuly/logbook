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
                  <div class="modal-dialog" style="width: 80%">
 <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
 <!-- lihat laporan --> 
                      </div> 
                      <div class="modal-body"> 
                        <div class="row">
                        <div class="col-lg-12" style="padding-left: 10%; padding-right: 10%">
                          <div class="row">
                            <div class="col-sm-2" style="text-align: center;">
                              <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" style="width: 80%; height: auto;">
                            </div>
                            <div class="col-sm-10" style="text-align: center;">
                              BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA <br>
                              <strong style="font-size: 150%">STASIUN KLIMATOLOGI MLATI YOGYAKARTA</strong><br>
                              Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta<br>
                              Telp : (0274) 2880152 ; Fax: (0247) 2880151 ; email: staklim.yogya@gmail.com
                              <br><br>
                            </div>
                          </div>
                          <div class="row" style="background-color: black; height: 4px;"></div>
                          <div class="row" style="text-align: center;">
                            <br><strong>LAPORAN <?php echo strtoupper($laporan->jenis_laporan); ?> PERALATAN </strong>
                            <br>
                          </div>
                          <div class="row">
                            <br>
                            JENIS ALAT : <?php echo $laporan->jenis_alat; ?><br>
                            NAMA ALAT : <?php echo $laporan->nama_alat; ?><br>
                            LOKASI : <?php echo $laporan->lokasi; ?><br>
                            TANGGAL : <?php echo $laporan->tanggal; ?><br><br>
                            PERMASALAHAN : <br>
                            <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->permasalahan; ?></textarea> <br>
                            TINDAKAN : <br>
                             <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->tindakan; ?></textarea> <br>
                             HASIL : <br>
                              <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->hasil; ?></textarea> <br>
                              <br>
                            <div class="row">
                              <div class="col-sm-6" align="center">
                                Mengetahui, <br>
                                <?php echo $laporan->mengetahui; ?><br> <br><br>
                                <u><?php echo $laporan->nama_lengkap; ?></u><br>
                                Nip. <?php echo $laporan->nip; ?><br>
                              </div>
                              <div class="col-sm-6" align="center">
                                <br>
                                Teknisi On Duty, <br><br><br>
                                <u><?php  echo $laporan->nama_teknisi; ?></u><br>
                              </div>
                                

                            </div>
                          </div>
                        </div>
                      </div>
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
                            <label for="nama">Jenis Alat</label>
                            <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->jenis_alat; ?>">
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
                            <label for="nama_alat">Mengetahui</label>
                             <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->mengetahui; ?>">
                            <label for="nama_alat">Nama Lengkap</label>
                            <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->nama_lengkap; ?>">
                            <label for="nama_alat">Nip</label>
                             <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->nip; ?>">
                            <label for="nama_alat">Teknisi On Duty</label>
                             <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $laporan->nama_teknisi; ?>">
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
              </h4>
            </div>
            <div id="collapse<?php echo $laporan->id; ?>" class="panel-collapse collapse">
              <div class="panel-body">
<!-- button hapus laporan -->
                               
                  <script>
                    function confirmDialog() {
                     return confirm('Apakah anda yakin akan menghapus laporan ini?')
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
            <label for="nama_alat">Jenis Alat</label>
            <input type="text" class="form-control" id="jenis_alat" name="jenis_alat">
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
            <label for="nama_alat">Mengetahui</label>
            <input type="text" class="form-control" id="mengetahui" name="mengetahui">
            <label for="nama_alat">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
            <label for="nama_alat">Nip</label>
            <input type="text" class="form-control" id="nip" name="nip">
            <label for="nama_alat">Teknisi On Duty</label>
            <input type="text" class="form-control" id="nama_teknisi" name="nama_teknisi">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

