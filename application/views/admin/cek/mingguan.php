<div id="page-wrapper">
  <div class="row">
    <div class="col-lg">
      <h1 class="page-header">CEK LIST MINGGUAN PERALATAN AGROKLIMAT</h1>
    </div>
  </div>
  <div class="row" align="center">
    <div class="col-lg-12">
      <?php 
      echo $this->session->flashdata('message_mingguan_sukses');
      $hari = date ("D");
      //$hari = hari_ini();
      if ($hari == "Fri") {
        echo $this->session->flashdata('message_mingguan');
        ?>
        

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Peralatan</th>
              <th>kondisi</th>
              <th>keterangan</th>
            </tr>
          </thead>

  <!--  halo untuk mingguan -->
          <?php if ($halo1 == 0) {
            ?>
            <form action="../cekmingguan" method="post">
              <tbody>

                <?php  $no=1; foreach ($kategori as $row1) {

                  ?>
                  <tr>
                   <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                 </tr>
                 <?php foreach ($alat as $row2) {
                  if ($row2->id_kategori == $row1->id_kategori) {

                    ?>
                    <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row2->nama_alat; ?></td>
                      <td>
                        <div class="form-group">
                          <select class="form-control" id="sel1" name="kondisi<?php echo $row2->id_alat; ?>" required>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                          </select>

                        </td>
                        <td>
                        <textarea class="form-control"  placeholder="Keterangan" name="keterangan<?php echo $row2->id_alat; ?>" ></textarea>
                        </div>
                      </td>
                    </tr>
                  <?php }}} ?>
                </tbody>
                
              </table>
              <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
              
            </form>
           
          <?php } else{ ?>
            <form action="../updatemingguan" method="post">
              <tbody>


                <?php  $no=1; foreach ($kategori as $row1) {

                  ?>
                  <tr>
                   <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                 </tr>
                 <?php foreach ($operasijoin3 as $row2) {
                  if ($row2->id_kategori == $row1->id_kategori) {

                    ?>
                    <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row2->nama_alat; ?></td>
                      <td>
                        <div class="form-group">
                          <select class="form-control" id="sel1" name="kondisi<?php echo $row2->id_alat; ?>" required>
                            <?php if ($row2->kondisi == 'bersih'): ?>
                              <option value="bersih">Bersih</option>
                              <option value="kotor">Kotor</option>
                            <?php endif ?>
                            <?php if ($row2->kondisi == 'kotor'): ?>
                              <option value="kotor">Kotor</option>
                              <option value="bersih">Bersih</option>
                            <?php endif ?>
                            <input type="hidden" name="id_kondisi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_kondisi; ?>">
                          </select>
                        </td>
                        
                        <td>
                          <textarea class="form-control"  name="keterangan<?php echo $row2->id_alat; ?>" ><?php echo $row2->keterangan_kondisi; ?></textarea>
                        </div>
                      </td>
                    </tr>
                  <?php }}} ?>

                </tbody>


              </table>
              <button type="submit" class="btn btn-default" style="float: right;">Update</button>
            </form>   

          <?php };
        }else{
         
          echo '
          <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Peringatan!</strong> Data Hanya Bisa Diisi Pada Hari Jumat!
          </div>
          ';
        } ?>  
        <!-- /.row -->

        <!-- /#page-wrapper -->