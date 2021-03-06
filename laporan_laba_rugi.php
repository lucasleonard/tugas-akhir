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
        <h1><span>[</span> GENTLEMEN <span>]</span></h1>
      </div><!-- logopanel -->
      <div class="leftpanelinner">
        <h5 class="sidebartitle">Navigation</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li><a href="daftar_akun.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
          <li class="nav-parent"><a href=""><i class="fa fa-cube"></i> <span>Produk</span></a>
            <ul class="children">
              <li><a href="tambah_produk.php"><i class="fa fa-caret-right"></i> <span>Tambah Produk Baru</span></a></li>
              <li><a href="data_produk.php"><i class="fa fa-caret-right"></i> <span>Data Produk</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-truck"></i> <span>Supplier</span></a>
            <ul class="children">
              <li><a href="tambah_supplier.php"><i class="fa fa-caret-right"></i> <span>Tambah Supplier</span></a></li>
              <li><a href="data_supplier.php"><i class="fa fa-caret-right"></i> <span>Data Supplier</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-users"></i> <span>Karyawan</span></a>
            <ul class="children">
              <li><a href="tambah_karyawan.php"><i class="fa fa-caret-right"></i> <span>Tambah Karyawan</span></a></li>
              <li><a href="data_karyawan.php"><i class="fa fa-caret-right"></i> <span>Data Karyawan</span></a></li>
              <li><a href="data_komisi.php"><i class="fa fa-caret-right"></i> <span>Data Komisi</span></a></li>
              <li><a href="data_gaji.php"><i class="fa fa-caret-right"></i> <span>View Gaji Karyawan</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-gift"></i> <span>Poin & Reservasi</span></a>
            <ul class="children">
              <li><a href="tambah_hadiah.php"><i class="fa fa-caret-right"></i> <span>Tambah Hadiah</span></a></li>
              <li><a href="data_hadiah.php"><i class="fa fa-caret-right"></i> <span>Data Hadiah</span></a></li>
              <li ><a href="data_poin.php"><i class="fa fa-caret-right"></i> <span>Data Poin Pelanggan</span></a></li>
              <li><a href="data_reservasi.php"><i class="fa fa-caret-right"></i> <span>Data Reservasi</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children" >
              <li class="active"><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
              <li><a href="nota_pembelian.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Pembelian</span></a></li>
              </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-cogs"></i> <span>Aset</span></a>
            <ul class="children">
              <li><a href="tambah_aset.php"><i class="fa fa-caret-right"></i> <span>Tambah Aset</span></a></li>
              <li><a href="data_aset.php"><i class="fa fa-caret-right"></i> <span>Data Aset</span></a></li>
            </ul>
          </li>
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-file-text-o"></i> <span>Laporan</span></a>
            <ul class="children" style="display:block;">
              <li class="active"><a href="jurnal.php"><i class="fa fa-caret-right"></i> <span>Jurnal</span></a></li>
              <li><a href="buku_besar.php"><i class="fa fa-caret-right"></i> <span>Buku Besar</span></a></li>
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
        <h2><i class="fa fa-file-text-o"></i> Laporan Laba Rugi </h2>
      </div>

      <div class="contentpanel">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Laporan Laba Rugi</h4>
            </div>
            <form id="formLabaRugi" class="form-horizontal">
              <div class="panel-body" id="formAwal">
                <div class="form-group">
                  <div class="col-sm-6 col-md-6">
                    <label class="col-sm-2 control-label" style="font-size: 18px; text-align: left;">Pendapatan</label>
                  </div>
                </div>
              </div>
            </form>
            <div class="panel-body" style="margin-top: -35px;">
              <div class="row p-t-50">
                <div class="col-sm-12">
                  <div class="m-b-20 table-responsive">
                    <table id="tablePendapatan" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>No Akun</th>
                          <th>Nama Akun</th>                          
                          <th>Debit</th>
                          <th>Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $hitung = 1;
                        $index = 0;
                        while ($row = mysqli_fetch_object($pendapatanLabaRugi)) {
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>" . $row->NoAkun . "</td>";
                          echo "<td>" . $row->NamaAkun . "</td>";
                          $saldoAkhir = $row->SaldoAkhir;
                          if($saldoAkhir > 0)
                          {
                            echo "<td>" . number_format($saldoAkhir) . "</td>";
                            echo "<td>0</td>";
                          }
                          else
                          {
                            echo "<td>0</td>";
                            echo "<td>". number_format($saldoAkhir*-1) ."</td>"; 
                          }
                          echo "</tr>";
                          $hitung = $hitung +1;
                          $index = $index+1;
                        }
                        if(!($row = mysqli_fetch_object($pendapatanLabaRugi))) {
                          echo "<tr data-index='0'>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>"; 
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- panel-body -->
            <form id="formLabaRugi" class="form-horizontal">
              <div class="panel-body" id="formAwal">
                <div class="form-group">
                  <div class="col-sm-6 col-md-6">
                    <label class="col-sm-2 control-label" style="font-size: 18px; text-align: left;">Biaya</label>
                  </div>
                </div>
              </div>
            </form>
            <div class="panel-body" style="margin-top: -35px;">
              <div class="row p-t-50">
                <div class="col-sm-12">
                  <div class="m-b-20 table-responsive">
                    <table id="tableBiaya" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>No Akun</th>
                          <th>Nama Akun</th>                          
                          <th>Debit</th>
                          <th>Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $hitung = 1;
                        $index = 0;
                        while ($row = mysqli_fetch_object($biayaLabaRugi)) {
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>" . $row->NoAkun . "</td>";
                          echo "<td>" . $row->NamaAkun . "</td>";
                          $saldoAkhir = $row->SaldoAkhir;
                          if($saldoAkhir > 0)
                          {
                            echo "<td>" . number_format($saldoAkhir) . "</td>";
                            echo "<td>0</td>";
                          }
                          else
                          {
                            echo "<td>0</td>";
                            echo "<td>". number_format($saldoAkhir*-1) ."</td>"; 
                          }
                          echo "</tr>";
                          $hitung = $hitung +1;
                          $index = $index+1;
                        }
                        if(!($row = mysqli_fetch_object($biayaLabaRugi))) {
                          echo "<tr data-index='0'>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>"; 
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- panel-body -->
            <form id="formLabaRugi" class="form-horizontal">
              <div class="panel-body" id="formAwal">
                <div class="form-group">
                  <div class="col-sm-6 col-md-6">
                    <label class="col-sm-2 control-label" style="font-size: 18px; text-align: left;">Laba/Rugi</label>
                  </div>
                </div>
              </div>
            </form>
            <div class="panel-body" style="margin-top: -35px;">
              <div class="row p-t-50">
                <div class="col-sm-12">
                  <div class="m-b-20 table-responsive">
                    <table id="tableLabaRugi" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Keterangan</th>
                          <th>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $hitung = 1;
                        $index = 0;
                        $pendapatanPhp = 0;
                        $biayaPhp = 0;
                        if($row = mysqli_fetch_object($totalPendapatanLabaRugi)) {
                          if(isset($row->TotalPendapatan))
                            $pendapatanPhp = $row->TotalPendapatan;
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>Total Pendapatan</td>";
                          echo "<td>" . number_format($pendapatanPhp) . "</td>";
                          echo "</tr>";
                          $hitung = $hitung +1;
                          $index = $index+1;
                        }
                        else {
                          echo "<tr data-index='0'>";
                          echo "<td>1</td>";
                          echo "<td>Total Pendapatan</td>";
                          echo "<td>". $pendapatanPhp ."</td>";
                          echo "</tr>";
                        }
                        if($row = mysqli_fetch_object($totalBiayaLabaRugi)) {
                          if(isset($row->TotalBiaya))
                            $biayaPhp = $row->TotalBiaya;
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>Total Biaya</td>";
                          echo "<td>" . number_format($biayaPhp) . "</td>";
                          echo "</tr>";
                          $hitung = $hitung +1;
                          $index = $index+1;
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $hitung. "</td>";
                          echo "<td>Laba/Rugi</td>";
                          $hasilLabaRugi = $pendapatanPhp-$biayaPhp;
                          if($hasilLabaRugi > 0)
                            echo "<td>" . number_format($hasilLabaRugi) . " (Laba)</td>";
                          elseif($hasilLabaRugi < 0)
                            echo "<td>" . number_format($hasilLabaRugi) . " (Rugi)</td>";
                          else
                            echo "<td>" . $hasilLabaRugi . "</td>";
                          echo "</tr>";
                        }
                        else {
                          echo "<tr data-index='1'>";
                          echo "<td>2</td>";
                          echo "<td>Total Biaya</td>";
                          echo "<td>". $biayaPhp ."</td>";
                          echo "</tr>";
                          echo "<tr data-index='2'>";
                          echo "<td>3</td>";
                          echo "<td>Laba/Rugi</td>";
                          $hasilLabaRugi = $pendapatanPhp-$biayaPhp;
                          if($hasilLabaRugi > 0)
                            echo "<td>" . number_format($hasilLabaRugi) . " (Laba)</td>";
                          elseif($hasilLabaRugi < 0)
                            echo "<td>" . number_format($hasilLabaRugi) . " (Rugi)</td>";
                          else
                            echo "<td>" . $hasilLabaRugi . "</td>";
                          echo "</tr>";
                        }
                        ?>
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
