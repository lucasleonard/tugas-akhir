<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'resources.php'; ?>
</head>
<?php include 'sql.php'; ?>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
  </div>

  <section>

    <div class="leftpanel">

      <div class="logopanel">
        <h1><span>[</span> ZUPPU <span>]</span></h1>
      </div><!-- logopanel -->
      
      <div class="leftpanelinner">

        <h5 class="sidebartitle">Navigation</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li><a href="index.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
          <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children">
              <li><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
              <li><a href="nota_pembelian.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Pembelian</span></a></li>
              <li><a href="nota_penjualan.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Penjualan</span></a></li>
            </ul>
          </li>
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-file-text-o"></i> <span>Laporan</span></a>
            <ul class="children" style="display: block;">
              <li><a href="jurnal.php"><i class="fa fa-caret-right"></i> <span>Jurnal</span></a></li>
              <li class="active"><a href="buku_besar.php"><i class="fa fa-caret-right"></i> <span>Buku Besar</span></a></li>
              <li><a href="laporan_laba_rugi.php"><i class="fa fa-caret-right"></i> <span>Laporan Laba Rugi</span></a></li>
              <li><a href="laporan_perubahan_ekuitas.php"><i class="fa fa-caret-right"></i> <span>Laporan Perubahan Ekuitas</span></a></li>
              <li><a href="laporan_neraca.php"><i class="fa fa-caret-right"></i> <span>Laporan Neraca</span></a></li>
            </ul>
          </li>
        </ul>

      </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->
    
    <div class="mainpanel">

      <div class="headerbar">

        <a class="menutoggle"><i class="fa fa-bars"></i></a>
        
        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <img src="images/photos/loggeduser.png" alt="" />
                  Admin
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li><a href="signin.html"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
        
      </div><!-- headerbar -->
      
      <div class="pageheader">
        <h2><i class="fa fa-file-text-o"></i> Laporan Buku Besar </h2>
      </div>

      <div class="contentpanel">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Laporan Buku Besar</h4>
            </div>
            <div class="panel-body">
              <div class="row p-t-50">
                <div class="col-sm-12">
                  <div class="m-b-20 table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>No Akun</th>
                          <th>Nama Akun</th>                          
                          <th>Tanggal</th>
                          <th>Keterangan Transaksi</th>
                          <th>Debit</th>
                          <th>Kredit</th>
                          <th>No Bukti</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $hitung = 1;
                        $index = 0;
                        while ($row = mysqli_fetch_object($laporanBukuBesar)) {
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>" . $row->Akun_NoAkun . "</td>";
                          echo "<td>" . $row->NamaAkun . "</td>";
                          echo "<td>" . $row->Tanggal . "</td>";
                          echo "<td>" . $row->KeteranganTransaksi . "</td>";
                          if($row->NominalDebet > 0)
                            echo "<td>" . number_format($row->NominalDebet) . "</td>";
                          else
                            echo "<td>" . $row->NominalDebet . "</td>";
                          if($row->NominalKredit > 0)
                            echo "<td>" . number_format($row->NominalKredit) . "</td>";
                          else
                            echo "<td>" . $row->NominalKredit . "</td>";
                          echo "<td>" . $row->NoBukti . "</td>";
                          echo "</tr>";
                          $hitung = $hitung +1;
                          $index = $index+1;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- panel-body -->
          </div><!-- panel -->
        </div><!-- row -->
      </div>

    </section>

    <?php include 'resources2.php'; ?>
  </body>
  </html>
