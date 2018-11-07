<div id="page-wrapper">
 <div class="row">
  <div class="col-lg-12">

    <h1 class="page-header">CEK LIST MINGGUAN RADAR AGROKLIMAT</h1>
    <!--  button tambah kategoriradar -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahchecklistRadar">Tambah Checklist</button>
    <hr>
    <?php 
    echo $this->session->flashdata('message');

    ?>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Aktivitas</th>
            <th>Status</th>
          </tr>
        </thead>
      
          <form action="../tambah_checklist_radar" method="post">
            <tbody>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">RADAR</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pemeliharaan</td>
                    <td>status</td>
                </tr>
            </tbody>
    </table>
    <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
          </form> 
          <form action="../updateharianradar" method="post">
             <tbody>
                <tr>
                  <td colspan="4" style="background-color:#eceaea;">RADAR</td>
                </tr>                           
                <tr>
                  <td><?php echo $no;$no++; ?></td>
                  <td><?php echo $row2->nama_radar; ?></td>
                  <td><?php echo $row2->standar; ?></td>
                  <td>
                   <div class="form-group">
                    <?php if ($row2->pembacaan=='MENYALA') { ?>
                      <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                        <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                        <option value="MENYALA">Menyala</option>
                        <option value="MATI">Mati</option></select>
                    <?php }else if ($row2->pembacaan=='MATI') {?>
        
                      <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                        <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                        <option value="MENYALA">Menyala</option>
                        <option value="MATI">Mati</option></select>
                    <?php } ?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          <button type="submit" class="btn btn-default" style="float: right;">Update</button>
             </form>   
       <?php }; ?>  
    <!-- Tambah kategoriradar -->
    <div id="tambahchecklistRadar" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">CEK LIST MINGGUAN RADAR</h4>
          </div>
          <div class="modal-body">
            

            <!-- <form action="../tambah_checklist_radar" method="post">
              <div class="form-group">
                <label>RADAR</label><br/>
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="col"><label for="radarpemeliharaan">Pemeliharaan  </label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="radarpemeliharaan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="radarkebersihan">Kebersihan  </label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="radarkebersihan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="radarswitch">Switch AC  </label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="radarswitch" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <label for="radar">GENSET RADAR</label><br/>
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="col"><label for="gensetpemanasan">Running test / pemanasan genset (min 10 menit) </label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="gensetpemanasan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="gensetair">Pengecekan Air Aki</label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="gensetair" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="gensetsolar">Pengecekan Solar</label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="gensetsolar" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="gensetpemeliharaan">Pemeliharaan</label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="gensetpemeliharaan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="gensetkebersihan">Kebersihan</label></td>
                      <td class="col">
                        <select  class="form-control" id="sel1" name="gensetkebersihan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td class="col"><label for="catatan">Catatan  </label></td>
                      <td class="col">
                        <textarea rows="5" id = "catatan" class="form-control" name="catatan"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" >Submit</button>
            </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> -->
        </div>

      </div>
    </div>
    <!-- End TAmbah kategoriradar -->

  </div>