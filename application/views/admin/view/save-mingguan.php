 <!-- save untuk print -->
<link href="<?php echo base_url(); ?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
  window.print();
  });
</script>
<!-- end save print -->

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12" >
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 col-xl-2" style="text-align: center;">
                  <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" 
                  style="width: 70%; height: auto;">
                </div>
                <div id="editor"></div>
                <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 col-xl-10" style="text-align: center;">
                  BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA <br>
                  <strong >STASIUN KLIMATOLOGI MLATI YOGYAKARTA</strong><br>
                  Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta<br>
                  Telp : (0274) 2880152 ; Fax: (0247) 2880151 ; email: staklim.yogya@gmail.com
                  <br><br>
                </div>
              </div>
              <div class="row" style="background-color: black; height: 10px; 
              text-align: center ">--------------------------------------------------------------------------------------------------------------------</div>
              <div class="row" style="text-align: center; "></div>
              
              <h2 class="page-header text-center" >CHEKLIST DATA MINGGUAN PERALATAN AGROKLIMAT</h2>
              <h4 class="modal-title">Tanggal : <?php echo $tgl; ?></h4>
              <div class="row">
               <div class="modal-body">
                <div class="" style="">
                 <table class="table table-bordered table-stripped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Nama</th>
                      <th colspan="2">Kondisi</th>
                      <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>K</td>
                    </tr>
                  </thead>
                  <tbody>
                  </div>
                </div>
                <?php  $no=1; foreach ($kategori as $row1) {
                  ?>
                  <tr>
                   <td colspan="8" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                 </tr>
                 <?php foreach ($mingguanalatview as $row2) {
                  if ($row2->id_kategori == $row1->id_kategori) {
                    ?>
                    <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row2->nama_alat; ?></td>
                      <?php
                      if($row2->kondisi == "bersih") {
                        ?>
                        <td>&#10004;</td>
                        <td></td>
                        <?php
                      }
                      else if($row2->kondisi == "kotor") {
                        ?>
                        <td></td>
                        <td>&#10004;</td>
                        <?php
                      }
                      ?>

                      <div class="form-group">
                        <td>
                          <textarea readonly class="form-control" name="keterangan<?php echo $row2->keterangan_kondisi; ?>" style="background-color: white;"><?php echo $row2->keterangan_kondisi;                             
                           ?></textarea>
                        </div>
                      </div>
                    </td>
                  </tr>

                <?php }}} ?>

              </tbody>
            </table> 
          </div>
        </div>
        <div class="col-sm-4" align="center" style="float: right;">
          <br>
          Teknisi On Duty, <br><br><br>
          <u>1. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; 
            2.&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
          3. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;   </u><br>
        </div>

      </div>
    </div>