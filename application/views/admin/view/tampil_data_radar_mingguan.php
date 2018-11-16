  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
   <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myData tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">DATA CHEKLIST RADAR MINGGUAN AGROKLIMAT</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#myModal").modal('show');
      });
    </script> 
    <?php if (isset($mingguanradar)): ?>
     

      <!-- Modal content-->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 80%">

          <!--   modal lihat laporan -->

          <div class="modal-content" style="padding-left: 10%; padding-right: 10%">
            <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

              <div class="row">
                <div class="col-sm-2" style="text-align: center;">
                  <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" style="width: 60%; height: auto;">
                </div>
                <div class="col-sm-10" style="text-align: center;">
                  BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA <br>
                  <strong style="font-size: 150%">STASIUN KLIMATOLOGI MLATI YOGYAKARTA</strong><br>
                  Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta<br>
                  Telp : (0274) 2880152 ; Fax: (0247) 2880151 ; email: staklim.yogya@gmail.com
                  <br><br>
                </div>
              </div> 
              <div class="row" style="background-color: black; height: 4px;"></div>
              <div class="row" style="text-align: center; "></div>
              <h2 class="page-header text-center" >CHEKLIST MINGGUAN RADAR AGROKLIMAT</h2>
              <h4 class="modal-title">Tanggal : <?php echo $tgl; ?></h4>
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
                                </div>
                              </div>
                            </div>
                          </div>


                        <?php endif ?>


                        <?php if (isset($editmingguanradar)): ?>
                        

                          <!-- Modal content-->
                          <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%">

                              <!--   modal lihat laporan -->

                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Tanggal : <?php echo $tgl; ?></h4>
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
                                      <form action="../update_checklist_radar_tanggal" method="post">
                                         <?php foreach ($editmingguanradar as $data){ ?>
                                          <<tr>
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
                                    </div>

                                    <div class="modal-footer"> <input type="submit" name="update" class="btn btn-default">
                                    </form>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                          <?php endif ?>

                       

                          <!-- tampil data radar by date -->
                          <!-- /.row -->
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="row2" align="right"> <input class="form-control" style="width: 30%;" id="myInput" type="text" placeholder="Search.."><br></div>
                              <table class="table table-bordered table-stripped">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                    
                                  </tr>
                                </thead>
                                <form action="#" method="post">
                                  <tbody id="myData">
                                    <tr>
                                     
                                    </tr>
                                    <?php $no=1; foreach ($tanggal_radar2 as $row2) {
                                      ?>
                                      <tr>
                                        <td><?php echo $no;$no++; ?></td>
                                        <td><?php 
                                        $tanggal_radar2 = $row2->tanggal;
                                        $day = date('D', strtotime($tanggal_radar2));
                                        $dayList = array(
                                          'Sun' => 'Minggu',
                                          'Mon' => 'Senin',
                                          'Tue' => 'Selasa',
                                          'Wed' => 'Rabu',
                                          'Thu' => 'Kamis',
                                          'Fri' => 'Jumat',
                                          'Sat' => 'Sabtu'
                                        );
                                        echo $dayList[$day];  ?></td>
                                        <td><?php echo $row2->tanggal; ?></td>
                                        <td>
                                         <a href="cetak_data_radar_mingguan?tanggal=<?php  echo $row2->tanggal; ?>" target="_blank"><span class="btn btn-default small glyphicon glyphicon-print"> Print</span></a>
                                          <a href="?tanggal=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-eye-open"> Lihat</span></a>    
                                          <a href="?edit=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-edit"> Edit</span></a></td> 

                                          
                                        </tr>
                                      <?php } ?>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <!-- /.row -->

                            </div>
                            <!-- /#page-wrapper -->
