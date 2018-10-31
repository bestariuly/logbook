<div id="page-wrapper">
  <div class="row">
    <div class="col-lg">
      <h1 class="page-header">CEK LIST  RADAR AGROKLIMAT</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row" align="center">
    <div class="col-lg-12">
      <?php 
      echo $this->session->flashdata('message_harian_radar');
      echo $this->session->flashdata('message_harian_sukses');

      ?>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Radar</th>
            <th>Standar</th>
            <th>Pembacaan</th>
          </tr>
        </thead>
        <?php if ($haloradar == 0) {
          ?>
          <form action="../cekharianradar" method="post">
            <tbody>


              <?php  $no=1; foreach ($kategoriradar as $row1) {

                ?>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
               </tr>
               <?php foreach ($radar as $row2) {
                if ($row2->id_kategoriradar== $row1->id_kategori) {

                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php echo $row2->nama_radar; ?></td>
                    <td><?php echo $row2->standar; ?></td>
                    <td>
                      <div class="form-group">
                          <?php if ($row2->standar=='MENYALA') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="menyala">Menyala</option>
                            <option value="mati">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='ENABLE') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option></select>
                            <?php
                          }else if ($row2->standar=='MENYALA HIJAU') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                            <option value="mati">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='BERKEDIP') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="mati">Mati</option>
                            <option value="berkedip">Berkedip</option></select>
                            <?php
                          }else if ($row2->standar=='MATI') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="mati">Mati</option>
                            <option value="menyala">Menyala</option></select>
                            
                            <?php
                          }else if ($row2->standar=='Hijau') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau">Hijau</option>
                            <option value="putih">Putih</option></select>
                            <?php
                          }else if ($row2->standar=='Hijau Menyala') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->standar=='Connect') {
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="connect">Connect</option>
                            <option value="disconnect">Disconnect</option></select>
                            <?php
                          }else if($row2->standar=='Posisi Control'){
                            ?>
                            <select id="pilih<?php echo $row2->id_radar; ?>" class="form-control" onchange="lainnya(<?php echo $row2->id_radar; ?>)" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="number" class="form-control" name="lainnya<?php echo $row2->id_radar; ?>" >
                            <?php
                          }?>
                          
                        
                        
                        
                        </div>
                      </td>
                                        </tr>
                <?php }}} ?>

              </tbody>


            </table>
            <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
          </form>
        <?php } else{ ?>
          <form action="../updateharianradar" method="post">
            <tbody>


              <?php  $no=1; foreach ($kategoriradar as $row1) {

                ?>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
               </tr>
               <?php foreach ($pembacaanjoin as $row2) {
                if ($row2->id_kategoriradar == $row1->id_kategori) {

                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php echo $row2->nama_radar; ?></td>
                    <td><?php echo $row2->standar; ?></td>
                    <td>
                      <div class="form-group">
                        <select class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <?php if ($row2->pembacaan == 'menyala'): ?>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>
                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'menyala_hijau'): ?>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'menyala_merah'): ?>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'berkedip'): ?>
                          <option value="berkedip">Berkedip</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'hijau'): ?>
                          <option value="hijau">Hijau</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'hijau_menyala'): ?>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'hijau_tua'): ?>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'putih'): ?>
                          <option value="putih">Putih</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'enable'): ?>
                          <option value="enable">Enable</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'disable'): ?>
                          <option value="disable">Disable</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'connect'): ?>
                          <option value="connect">Connect</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'disconnect'): ?>
                          <option value="disconnect">Disconnect</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'control'): ?>
                          <option value="control">Control</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'ctrl_yogfrog'): ?>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="mati">Mati</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'mati'): ?>
                          <option value="mati">Mati</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="lainnya">Lainnya</option>

                          <?php endif ?>
                          <?php if ($row2->pembacaan == 'lainnya'): ?>
                          <option value="lainnya">Lainnya</option>
                          <option value="menyala">Menyala</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="berkedip">Berkedip</option>
                          <option value="hijau">Hijau</option>
                          <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option>
                          <option value="putih">Putih</option>
                          <option value="enable">Enable</option>
                          <option value="disable">Disable</option>
                          <option value="connect">Connect</option>
                          <option value="disconnect">Disconnect</option>
                          <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option>
                          <option value="mati">Mati</option>
                          <input type="number" name="lainnya" class="form-control" id="lainnya" name="lainnya" placeholder="Masukkan angka"> 
                          <?php endif ?>
                          <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                        </select>
                      </div>
                      </td>
                  </tr>
                <?php }}} ?>

              </tbody>


            </table>
            <button type="submit" class="btn btn-default" style="float: right;">Update</button>
          </form>   

        <?php }; ?>  

        <!-- /.row -->
        <!-- /#page-wrapper -->