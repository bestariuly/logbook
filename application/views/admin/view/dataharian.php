

<!-- DATA HARIAN UMUM SELAIN JUMAT -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script> 
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
<script type="text/javascript">
  $(document).ready(function(){
    var doc = new jsPDF();
    var specialElementHandlers = {
      '#editor': function (element, renderer) {
        return true;
      }
    };

    $('#cmd').click(function () {   
      doc.fromHTML($('#konten').html(), 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
      });
      doc.save('sample-file.pdf');
    });
  });
</script>


<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">

      <h1 class="page-header text-center" >DATA CHEKLIST HARIAN PERALATAN AGROKLIMAT KHUSUS HARI JUM'AT</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>


  <?php if (isset($harianalat)): ?>


    <!-- Modal content-->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 80%">

        <!--   modal lihat data -->
        <div class="modal-content" id="konten">
          <div class="modal-header">
            <div class="col-lg-12" style="padding-left: 10%; padding-right: 10%">
              <div class="row">
                <div class="col-sm-2" style="text-align: center;">
                  <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" style="width: 60%; height: auto;">
                </div>
                <div id="editor"></div>


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
              <h2 class="page-header text-center" >CHEKLIST HARIAN PERALATAN AGROKLIMAT</h2>
              <h4 class="modal-title">Tanggal : <?php echo $tgl; ?></h4>
              <div class="row">
               <div class="modal-body">
                <div class="" style="">
                 <table class="table table-bordered table-stripped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Nama</th>
                      <th colspan="3">Operasi</th>
                      <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                      <td>N</td>
                      <td>G</td>
                      <td>R</td>
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
                 <?php foreach ($harianalat as $row2) {
                  if ($row2->id_kategori == $row1->id_kategori) {
                    ?>
                    <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row2->nama_alat; ?></td>
                      <?php
                      if($row2->operasi == "normal") {
                        ?>
                        <td>&#10004;</td>
                        <td></td>
                        <td></td>
                        <?php
                      }

                      else if($row2->operasi == "gangguan") {
                        ?>
                        <td></td>
                        <td>&#10004;</td>
                        <td></td>
                        <?php
                      }

                      else if($row2->operasi == "rusak") {
                        ?>
                        <td></td>
                        <td></td>
                        <td>&#10004;</td> 
                        <?php
                      }
                      ?>
                      <div class="form-group">
                        <td>
                          <textarea readonly class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" style="background-color: white;" ><?php 
                          echo  "Operasi :".$row2->keterangan_operasi; 
                          ?>
                        </textarea>
                      </div>
                    </div>
                  </td>
                </tr>

              <?php }}} ?>
            </tbody>
          </table>
          <a href="<?php echo base_url('admin/view/pdf_laporan'); ?>"><button id="cmd">Print PDF</button>
          <button id="cmd">Generate PDF</button>
          
        </div>
      </div>
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
</div>
</div>

<!-- edit harian alat -->

<?php endif ?>
<?php if (isset($editharianalat)): ?>

  <!-- Modal content-->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%">

      <!--   modal edit data  -->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Tanggal : <?php echo $tgl; ?></h4>
        </div> 
        <div class="modal-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Peralatan</th>
                <th>Operasi</th>
                <th>keterangan</th>
              </tr>
            </thead>
            <tbody>
              <form action="../updateharianByTanggal" method="post">
                <?php  $no=1; foreach ($kategori as $row1) {
                  ?>
                  <tr>
                   <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                 </tr>
                 <?php foreach ($editharianalat as $row2) {
                  if ($row2->id_kategori == $row1->id_kategori) {

                    ?>
                    <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row2->nama_alat; ?></td>
                      <td>
                        <div class="form-group">
                          <select class="form-control" id="sel1" name="operasi<?php echo $row2->id_alat; ?>" required >
                            <?php if ($row2->operasi == 'normal'): ?>
                              <option value="normal" >Normal</option>
                              <option value="gangguan" >Gangguan</option>
                              <option value="rusak" >Rusak</option>
                            <?php endif ?>

                            <?php if ($row2->operasi == 'gangguan'): ?>
                              <option value="gangguan" >Gangguan</option>
                              <option value="normal" >Normal</option>
                              <option value="rusak" >Rusak</option>
                            <?php endif ?>

                            <?php if ($row2->operasi == 'rusak'): ?>
                              <option value="rusak" >Rusak</option>
                              <option value="normal" >Normal</option>
                              <option value="gangguan" >Gangguan</option>
                            <?php endif ?>

                            <input type="hidden" name="id_operasi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
                            <input type="hidden" name="tanggal<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
                          </select>

                        </td>
                        <td>
                          <textarea class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" placeholder="Keterangan" style="background-color: white;">
                            <?php echo $row2->keterangan_operasi; ?></textarea>
                          </div>
                        </td>
                      </tr>
                    <?php }}} ?>


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
              <?php $no=1; foreach ($tanggal as $row2) {
                ?>
                <tr>
                  <td><?php echo $no;$no++; ?></td>
                  <td><?php 
                  $tanggal = $row2->tanggal;
                  $day = date('D', strtotime($tanggal));
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
                  <td><a href="?tanggal=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-eye-open"> Lihat</span></a>    
                    <a href="?edit=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-edit"> Edit</span></a></td> 


                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">

          <!-- /.col-lg-12 -->
        </div>
      </div>
      <!-- /#page-wrapper -->
