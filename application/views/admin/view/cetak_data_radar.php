 <link href="<?php echo base_url(); ?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
  window.print();
  });
</script>

 <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 col-xl-2" style="text-align: center;">
                  <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" style="width: 60%; height: auto;">
                </div>


                <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 col-xl-10" style="text-align: center;">
                  BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA <br>
                  <strong style="font-size: 150%">STASIUN KLIMATOLOGI MLATI YOGYAKARTA</strong><br>
                  Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta<br>
                  Telp : (0274) 2880152 ; Fax: (0247) 2880151 ; email: staklim.yogya@gmail.com
                  <br><br>
                </div>

                <div>
                  <hr width="100%" noshade style="border-top: 2px solid #000;">
                </div>
              </div> 
              <div class="row" style="background-color: black; height: 4px;"></div>
              <div class="row" style="text-align: center; "></div>
              <h2 class="page-header text-center" >CHEKLIST HARIAN RADAR AGROKLIMAT</h2>
              <h4 class="modal-title"> &nbsp;  &nbsp;Tanggal : <?php echo $tgl; ?></h4>
              </div>
                          
             
            <div class="modal-body">

              <table class="table table-bordered table-stripped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Radar</th>
                    <th>Standar</th>
                    <th>Pembacaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  $no=1; foreach ($kategoriradar as $row1) {
                    ?>
                    <tr>
                     <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                   </tr>
                   <?php foreach ($harianradar as $row2) {
                    if ($row2->id_kategoriradar == $row1->id_kategori) {
                      ?>
                      <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><?php echo $row2->nama_radar; ?></td>
                        <td><?php echo $row2->standar; ?></td>
                        <td><?php echo $row2->pembacaan; ?></td>
                        
                                        </tr>
                                      <?php }}} ?>
                                    </tbody>

                                  </table>
                                  <div class="modal-footer">
                                  <div class="col-sm-4" align="center" style="float: right;">
                                    <br>
                                    Teknisi On Duty, <br><br><br>
                                    <u>1. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
                                      2.&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    3. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;  &nbsp;  </u><br>
                                  </div>  