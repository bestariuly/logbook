 <!-- save untuk print -->
 <link href="<?php echo base_url(); ?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
  window.print();
  });
</script>
<!-- end save print -->


<?php 
foreach($laporan2 as $laporan){
?>

  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12" >
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 col-xl-2" style="text-align: center;">
                  <img src="http://4.bp.blogspot.com/-LqUyMLMG05w/Ty0S-w100jI/AAAAAAAABC0/2AmjPy4Br1s/s1600/logo_BMKG.png" 
                  style="width: 70%; height: auto;">
                </div>
                <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 col-xl-10" style="text-align: center;">
                  BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA <br>
                  <strong >STASIUN KLIMATOLOGI MLATI YOGYAKARTA</strong><br>
                  Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta<br>
                  Telp : (0274) 2880152 ; Fax: (0247) 2880151 ; email: staklim.yogya@gmail.com
                  <br><br>
                </div>
                <div class="row" style="background-color: black; height: 10px;"> 
                <div>
                  <hr width="100%" noshade style="border-top: 2px solid #000;">
                </div>
              </div>
              <div class="row" style="text-align: center; "></div>
              <div class="row" style="text-align: center; ">
                <br><strong>LAPORAN <?php echo strtoupper($laporan->jenis_laporan); ?> PERALATAN </strong><br>
              </div>
            <div class="row" >
                <br>
                JENIS ALAT &emsp; : <?php echo $laporan->jenis_alat; ?><br>
                NAMA ALAT &emsp; : <?php echo $laporan->nama_alat; ?><br>
                LOKASI &emsp;&emsp;&emsp;: <?php echo $laporan->lokasi; ?><br>
                TANGGAL &emsp;&emsp;: <?php echo $laporan->tanggal; ?><br><br>
                PERMASALAHAN :<br><span class="margin-left: 10 px;"> </span>
                <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->permasalahan; ?></textarea> <br>
                TINDAKAN : <br>
                <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->tindakan; ?></textarea> <br>
                HASIL : <br>
                <textarea style="background-color: white" readonly class="form-control" rows = "5"><?php echo $laporan->hasil; ?></textarea> <br>
                <br>
                </div>
                <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 col-xl-6" align="center" style="float: left;">
                    Mengetahui, <br>
                    <?php echo $laporan->mengetahui; ?><br> <br><br>
                    <u><?php echo $laporan->nama_lengkap; ?></u><br>
                    Nip. <?php echo $laporan->nip; ?><br>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 col-xl-6" align="center" style="float: right;">
                    <br>
                    Teknisi On Duty, <br><br><br>
                    <u><?php  echo $laporan->nama_teknisi; ?></u><br>
                </div>     
                </div></div>
<?php } ?>
                     