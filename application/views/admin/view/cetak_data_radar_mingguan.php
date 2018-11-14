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
              <div class="row" style="background-color: black; height: 4px;"></div>
              <div class="row" style="text-align: center; "></div>
              <h2 class="page-header text-center" >CHEKLIST MINGGUAN RADAR AGROKLIMAT</h2>
              <h4 class="modal-title"> &nbsp;  &nbsp;Tanggal : <?php echo $tgl; ?></h4>
              </div>
                          
             
            <div class="modal-body">

              <table class="table table-bordered">
                <thead>
                <tr>
                  <th class="col-lg-1">No.</th>
                  <th class="col-lg-6">Nama Aktivitas</th>
                  <th class="col-lg-5">Status</th>
                </tr>
                </thead>

                <tbody>
             <?php foreach ($mingguanradar as $data){ ?>

                <tr>
                 <td colspan="4" style="background-color:#eceaea;">RADAR</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <?php if ($data->pemeliharaan_radar == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
                    
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kebersihan</td>
                    <td>
                      <?php if ($data->kebersihan_radar == 'sudah'){ ?>
                          Sudah
                          
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
                 
                    </td>
                </tr>
                <tr>
                  <td>3</td>
                    <td>Switch AC</td>
                    <td>
                      <?php if ($data->switch_ac == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
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
                      <?php if ($data->pemanasan_genset == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
                   
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Pengecekan Air Aki</td>
                    <td>
                      <?php if ($data->pengecekanair_genset == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
              
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Pengecekan Solar</td>
                    <td>
                      <?php if ($data->pengecekansolar_genset == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
                  
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Pemeliharaan</td>
                    <td>
                      <?php if ($data->pemeliharaan_genset == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
                        <?php } ?>
                 
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Kebersihan</td>
                    <td>
                      <?php if ($data->kebersihan_genset == 'sudah'){ ?>
                          Sudah
                        <?php }else{ ?>
                          Belum
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
                      <?php echo $data->catatan ?>
                      
                    </td>
                </tr>
              <?php }; ?>
            </tbody>

               </table>  
                      
                      </div>

                                
                                <div class="modal-footer">
                                   <div class="col-sm-4" align="center" style="float: right;">
                                    <br>
                                    Teknisi On Duty, <br><br><br>
                                    <u>1. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
                                      2.&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    3. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;  &nbsp;  </u><br>
                                  </div> 