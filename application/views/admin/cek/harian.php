<link href="<?php echo base_url(); ?>asset/dist/css/harian.css" rel="stylesheet">

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg">
      <h1 class="page-header">CEK LIST HARIAN PERALATAN AGROKLIMAT</h1>
    </div>
  </div>
  <div class="row" align="center">
    <div class="col-lg-12">
      <?php 
      echo $this->session->flashdata('message_harian');
      echo $this->session->flashdata('message_harian_sukses');
      ?>

      <table class="table table-bordered table-hover" id="harian">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Peralatan</th>
            <th>Operasi</th>
            <th>keterangan</th>
          </tr>
        </thead>
        <?php if ($halo == 0) {
          ?>
          <form action="../cekharian" method="post">
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
                        <select class="form-control" id="sel1" name="operasi<?php echo $row2->id_alat; ?>" required>
                          <option value="normal">Normal</option>
                          <option value="gangguan">Gangguan</option>
                          <option value="rusak">Rusak</option>
                        </select>

                      </td>
                      <td>
                        <textarea class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" placeholder="Keterangan"></textarea>
                      </div>
                    </td>
                  </tr>
                <?php }}} ?>

              </tbody>


            </table>
            <button type="submit" class="btn btn-default" style="float: right;">Submit</button>
          </form>
        <?php } else{ ?>
          <form action="../updateharian" method="post">
            <tbody>


              <?php  $no=1; foreach ($kategori as $row1) {

                ?>
                <tr>
                 <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
               </tr>
               <?php foreach ($operasijoin as $row2) {
                if ($row2->id_kategori == $row1->id_kategori) {

                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php echo $row2->nama_alat; ?></td>
                    <td>
                      <div class="form-group">
                        <select class="form-control" id="sel1" name="operasi<?php echo $row2->id_alat; ?>" required>
                          <?php if ($row2->operasi == 'normal'): ?>
                            <option value="normal">Normal</option>
                            <option value="gangguan">Gangguan</option>
                            <option value="rusak">Rusak</option>
                          <?php endif ?>
                          <?php if ($row2->operasi == 'gangguan'): ?>
                            <option value="gangguan">Gangguan</option>
                            <option value="normal">Normal</option>
                            <option value="rusak">Rusak</option>
                          <?php endif ?>
                          <?php if ($row2->operasi == 'rusak'): ?>
                            <option value="gangguan">Gangguan</option>
                            <option value="normal">Normal</option>
                            <option value="rusak">Rusak</option>
                          <?php endif ?>
                          <input type="hidden" name="id_operasi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
                        </select>

                      </td>
                      <td>
                        <textarea class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" placeholder="Keterangan" ><?php echo $row2->keterangan; ?></textarea>
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