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
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MENYALA">Menyala</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='MATI') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MATI">Mati</option>
                            <option value="MENYALA">Menyala</option>
                            <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="BERKEDIP">Berkedip</option></select>
                            
                            <?php
                          }else if ($row2->standar=='ENABLE') {
                            ?>
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ENABLE">Enable</option>
                            <option value="DISABLE">Disable</option></select>
                            <?php
                          }else if ($row2->standar=='DISABLE') {
                            ?>
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ENABLE">Enable</option>
                            <option value="DISABLE">Disable</option></select>
                            <?php
                          }else if ($row2->standar=='MENYALA HIJAU') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='MENYALA MERAH') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='BERKEDIP') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="BERKEDIP">Berkedip</option>
                            <option value="MATI">Mati</option>
                            </select>
                            <?php
                          }else if ($row2->standar=='HIJAU') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU">Hijau</option>
                            <option value="PUTIH">Putih</option></select>
                            <?php
                          }else if ($row2->standar=='PUTIH') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="PUTIH">Putih</option>
                            <option value="HIJAU">Hijau</option></select>
                            <?php
                          }else if ($row2->standar=='HIJAU MENYALA') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU MENYALA">Hijau Menyala</option>
                          <option value="HIJAU TUA">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->standar=='HIJAU TUA') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU TUA">Hijau Tua</option>
                            <option value="HIJAU MENYALA">Hijau Menyala</option></select>
                            <?php
                          }else if ($row2->standar=='CONNECT') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONNECT">Connect</option>
                            <option value="DISCONNECT">Disconnect</option></select>
                            <?php
                          }else if ($row2->standar=='DISCONNECT') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISCONNECT">Disconnect</option>
                            <option value="CONNECT">Connect</option></select>
                            <?php
                          }else if($row2->standar=='CONTROL'){
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONTROL">Control</option>
                          <option value="CTRL YOGFROG">CTRL YogFrog</option></select>
                            <?php
                          }else if($row2->standar=='CTRL YOGFROG'){
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CTRL YOGFROG">CTRL YogFrog</option>
                            <option value="CONTROL">Control</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="number" step="any" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" >
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
                          <?php if ($row2->pembacaan=='MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MENYALA">Menyala</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MATI') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MATI">Mati</option>
                            <option value="MENYALA">Menyala</option>
                            <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="BERKEDIP">Berkedip</option></select>
                            <?php
                          }else if ($row2->pembacaan=='ENABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ENABLE">Enable</option>
                            <option value="DISABLE">Disable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISABLE">Disable</option>
                            <option value="ENABLE">Enable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA MERAH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='BERKEDIP') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="BERKEDIP">Berkedip</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU">Hijau</option>
                            <option value="PUTIH">Putih</option></select>
                            <?php
                          }else if ($row2->pembacaan=='PUTIH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="PUTIH">Putih</option>
                            <option value="HIJAU">Hijau</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU MENYALA">Hijau Menyala</option>
                          <option value="HIJAU TUA">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU TUA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU TUA">Hijau Tua</option>
                            <option value="HIJAU MENYALA">Hijau Menyala</option></select>
                            <?php
                          }else if ($row2->pembacaan=='CONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONNECT">Connect</option>
                            <option value="DISCONNECT">Disconnect</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISCONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISCONNECT">Disconnect</option>
                            <option value="CONNECT">Connect</option></select>
                            <?php
                          }else if($row2->pembacaan=='CONTROL'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONTROL">Control</option>
                          <option value="CTRL YOGFROG">CTRL YogFrog</option></select>
                            <?php
                          }else if($row2->pembacaan=='CTRL YOGFROG'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CTRL YOGFROG">CTRL YogFrog</option>
                            <option value="CONTROL">Control</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <input type="number" step="any" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->pembacaan ?>" >
                            <?php
                          }?>
                          
                        
                        
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