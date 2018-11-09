<div id="page-wrapper">
 <div class="row">
  <div class="col-lg-12">

    <h1 class="page-header">CEK LIST MINGGUAN RADAR AGROKLIMAT</h1>
    <!--  button tambah kategoriradar -->
    <?php 
      echo $this->session->flashdata('message_mingguan_radar');
      echo $this->session->flashdata('message_mingguan_radar_sukses');
      $hari = date ("D");
      //$hari = hari_ini();
      if ($hari == "Fri") {
        ?>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="col-lg-1">No.</th>
            <th class="col-lg-6">Nama Aktivitas</th>
            <th class="col-lg-5">Status</th>
          </tr>
        </thead>

        <?php if ($halomingguan == 0) {
          ?>
          <form action="../tambah_checklist_radar" method="post">
            <tbody>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">RADAR</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="radarpemeliharaan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kebersihan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="radarkebersihan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                  <td>3</td>
                    <td>Switch AC</td>
                    <td>
                      <select  class="form-control" id="sel1" name="radarswitch" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">GENSET RADAR</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Running test/ Pemanasan Genset (min 10 menit)</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetpemanasan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Pengecekan Air Aki</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetair" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Pengecekan Solar</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetsolar" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetpemeliharaan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Kebersihan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetkebersihan" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option></select>
                    </td>
                </tr>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">CATATAN MINGGUAN</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Catatan</td>
                    <td>
                      <textarea rows="5" class="form-control" name="catatan" placeholder="Masukkan Catatan Mingguan Radar disini"></textarea>
                    </td>
                </tr>

            </tbody>
    </table>
    <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
          </form> 
          <?php
        }else{ ?>
          <form action="../update_checklist_radar" method="post">
            <tbody>
             <?php foreach ($radarmingguan as $data){ ?>

                <tr>
                 <td colspan="4" style="background-color:#eceaea;">RADAR</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                      <select  class="form-control" id="sel1" name="radarpemeliharaan" required>
                        <?php if ($data->pemeliharaan_radar == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kebersihan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="radarkebersihan" required>
                         <?php if ($data->kebersihan_radar == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td>3</td>
                    <td>Switch AC</td>
                    <td>
                      <select  class="form-control" id="sel1" name="radarswitch" required>
                        <?php if ($data->switch_ac == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">GENSET RADAR</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Running test/ Pemanasan Genset (min 10 menit)</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetpemanasan" required>
                      <?php if ($data->pemanasan_genset == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Pengecekan Air Aki</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetair" required>
                      <?php if ($data->pengecekanair_genset == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Pengecekan Solar</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetsolar" required>
                      <?php if ($data->pengecekansolar_genset == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetpemeliharaan" required>
                      <?php if ($data->pemeliharaan_genset == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Kebersihan</td>
                    <td>
                      <select  class="form-control" id="sel1" name="gensetkebersihan" required>
                      <?php if ($data->kebersihan_genset == 'sudah'){ ?>
                          <option value="sudah">Sudah</option>
                          <option value="belum">Belum</option></select>
                        <?php }else{ ?>
                          <option value="belum">Belum</option>
                          <option value="sudah">Sudah</option></select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;">CATATAN MINGGUAN</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Catatan</td>
                    <td>
                      <textarea rows="5" class="form-control" name="catatan" placeholder="Masukkan Catatan Mingguan Radar disini" ><?php echo $data->catatan ?> </textarea>
                    </td>
                </tr>
              <?php }; ?>
            </tbody>

    </table>
    <button type="submit" class="btn btn-default" style="float: right;">Update</button>
  </form>
        <?php } ?>

 <?php 
    }else{
         
          echo '
          <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Peringatan!</strong> Data Hanya Bisa Diisi Pada Hari Jumat!
          </div>
          ';
        } ?>  