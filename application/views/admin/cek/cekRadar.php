<div id="page-wrapper">
  <div class="row">
    <div class="col-lg">
      <h1 class="page-header">CEK LIST HARIAN RADAR</h1>
    </div>
  </div>
  <div class="row" align="center">
    <div class="col-lg-12">
      <?php 
      echo $this->session->flashdata('message_harian');
      echo $this->session->flashdata('message_harian_sukses');
      ?>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Peralatan</th>
            <th>Standar</th>
            <th>Pembacaan</th>
          </tr>
        </thead>
        <?php if ($halo == 0) {
          ?>
          <form action="../cekharianRadar" method="post">
            <tbody>

              <?php  $no=1; foreach ($kategoriradar as $row1) {

                ?>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
               </tr>
               <?php foreach ($joinradar as $row2) {
                if ($row2->id_kategoriradar == $row1->id_kategori) {

                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php echo $row2->nama_radar; ?></td>
                    <td>

                    </td>
                    <td>
                      
                    </td>
                  </tr>
                <?php }}} ?>
              </tbody>
            </table>
            <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
          </form>
        </table>            
      </form>   

    <?php }; ?>  
    <!-- /.row -->

        <!-- /#page-wrapper -->