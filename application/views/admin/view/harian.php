<div id="page-wrapper">
  <div class="row">
    <div class="col-lg">
      <h1 class="page-header">DATA CHEKLIST HARIAN PERALATAN AGROKLIMAT</h1>
    </div>
  </div>
  <div class="row" align="center">
    <div class="col-lg-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Aksi</th>
     
          </tr>
        </thead>
        <form action="#" method="post">
            <tbody>

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
                    <td><input type='button'value='Lihat' onClick='top.location="show_alat.php"'class='button'></td>
                                   
                  </tr>
                <?php } ?>

              </tbody>
         
      </table>
             

        <?php ; ?>  
