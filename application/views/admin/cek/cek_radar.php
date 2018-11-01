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
                            <option value="menyala">Menyala</option>
                            <option value="mati">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='ENABLE') {
                            ?>
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option></select>
                            <?php
                          }else if ($row2->standar=='MENYALA HIJAU') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                            <option value="mati">Mati</option></select>
                            <?php
                          }else if ($row2->standar=='BERKEDIP') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="berkedip">Berkedip</option><option value="mati">Mati</option>
                            </select>
                            <?php
                          }else if ($row2->standar=='MATI') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="mati">Mati</option>
                            <option value="menyala">Menyala</option></select>
                            
                            <?php
                          }else if ($row2->standar=='Hijau') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau">Hijau</option>
                            <option value="putih">Putih</option></select>
                            <?php
                          }else if ($row2->standar=='Hijau Menyala') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->standar=='Connect') {
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="connect">Connect</option>
                            <option value="disconnect">Disconnect</option></select>
                            <?php
                          }else if($row2->standar=='Posisi Control'){
                            ?>
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="number" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" >
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
                          <?php if ($row2->pembacaan=='menyala') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                              if
                            <option value="menyala">Menyala</option>
                            <option value="mati">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='enable') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='disable') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="disable">Disable</option>
                            <option value="enable">Enable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='menyala_hijau') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="menyala_hijau">Menyala Hijau</option>
                          <option value="menyala_merah">Menyala Merah</option>
                            <option value="Mati">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='menyala_merah') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="menyala_merah">Menyala Merah</option>
                          <option value="menyala_hijau">Menyala Hijau</option>
                            <option value="Mati">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='mati') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="mati">Mati</option>
                            <option value="berkedip">Berkedip</option></select>
                            <?php
                          }else if ($row2->pembacaan=='Mati') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="Mati">Mati</option>
                            <option value="menyala_hijau">Menyala Hijau</option>
                            <option value="menyala_merah">Menyala Merah</option></select>
                            
                            <?php
                          }else if ($row2->pembacaan=='hijau') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau">Hijau</option>
                            <option value="putih">Putih</option></select>
                            <?php
                          }else if ($row2->pembacaan=='putih') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="putih">Putih</option>
                            <option value="hijau">Hijau</option></select>
                            <?php
                          }else if ($row2->pembacaan=='hijau_menyala') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau_menyala">Hijau Menyala</option>
                          <option value="hijau_tua">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->pembacaan=='hijau_tua') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="hijau_tua">Hijau Tua</option>
                            <option value="hijau_menyala">Hijau Menyala</option></select>
                            <?php
                          }else if ($row2->pembacaan=='connect') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="connect">Connect</option>
                            <option value="disconnect">Disconnect</option></select>
                            <?php
                          }else if ($row2->pembacaan=='disconnect') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="disconnect">Disconnect</option>
                            <option value="connect">Connect</option></select>
                            <?php
                          }else if($row2->pembacaan=='control'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="control">Control</option>
                          <option value="ctrl_yogfrog">CTRL YogFrog</option></select>
                            <?php
                          }else if($row2->pembacaan=='ctrl_yogfrog'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ctrl_yogfrog">CTRL YogFrog</option>
                            <option value="control">Control</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <input type="number" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_radar ?>" >
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