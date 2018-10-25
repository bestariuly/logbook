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
            <th>Tanggal</th>
            <th>Nama Peralatan</th>
            <th>Operasi</th>
            <th>keterangan</th>
          </tr>
        </thead>
        
          <form action="#" method="post">
            <tbody>

               <?php $no=1; foreach ($data as $row2) {

                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php echo $row2->tanggal; ?></td>
                    <td><?php echo $row2->nama_alat; ?></td>
                    <td>
                      <?php echo $row2->operasi; ?>
                    </td>
                    <td>
                        <textarea class="form-control" name="keterangan<?php echo $row2->keterangan; ?>" placeholder="Keterangan"><?php echo $row2->keterangan; ?></textarea>
                      </div>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
               </table>
                </form>

        <?php ; ?>  
