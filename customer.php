<?php
session_start();
include 'sql.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include 'resources.php'; 
  ?>
  <title> Gentlemen | Membership </title>
</head>

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
          <li class="active"><a href="index.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
          <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children">
              <li><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
              <li><a href="nota_pembelian.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Pembelian</span></a></li>
              <li><a href="nota_penjualan.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Penjualan</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-file-text-o"></i> <span>Laporan</span></a>
            <ul class="children">
              <li><a href="jurnal.php"><i class="fa fa-caret-right"></i> <span>Jurnal</span></a></li>
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
        <h2><i class="fa fa-list-ul"></i> Daftar Akun </h2>
      </div>

      <div class="contentpanel">

        <div class="row">

          <div class="col-sm-6 col-md-6">
            <div class="panel panel-dark panel-stat">
              <div class="panel-heading">

                <div class="stat2">
                  <div class="row">
                    <div class="col-xs-2">
                      <img src="images/is-money.png" alt="">
                    </div>
                    <div class="col-xs-10">
                      <small class="stat-label">BALANCE SALDO</small>
                      <h1>Rp </h1>
                    </div>
                  </div><!-- row -->

                  <div class="mb15"></div>

                  <div class="row">
                    <div class="col-xs-6">
                      <small class="stat-label">AWAL ASET</small>
                      <h4>Rp <?php while ($row = mysqli_fetch_object($saldoAwalAset)) { echo number_format($row->TotalAset); } ?></h4>
                    </div>

                    <div class="col-xs-6">
                      <small class="stat-label">AWAL KEWAJIBAN + EKUITAS</small>
                      <h4>Rp <?php while ($row = mysqli_fetch_object($saldoAwalKewajibanEkuitas)) { echo number_format($row->TotalKewajibanEkuitas); } ?></h4>
                    </div>
                  </div><!-- row -->

                </div><!-- stat -->

              </div><!-- panel-heading -->
            </div><!-- panel -->
          </div><!-- col-sm-6 -->

          <div class="col-sm-6 col-md-6">
            <div class="panel panel-success panel-stat">
              <div class="panel-heading">

                <div class="stat2">
                  <div class="row">
                    <div class="col-xs-2">
                      <img src="images/is-money.png" alt="">
                    </div>
                    <div class="col-xs-10">
                      <small class="stat-label">Laporan</small>
                      <h1>All in One</h1>
                    </div>
                  </div><!-- row -->

                  <div class="mb15"></div>

                  <div class="row">
                    <div class="col-xs-4">
                      <small class="stat-label">Laba Rugi</small>
                      <h4>Rp <?php $pendapatan = 0; $biaya = 0; if($row = mysqli_fetch_object($totalPendapatanLabaRugi)){ $pendapatan = $row->TotalPendapatan;} if($row = mysqli_fetch_object($totalBiayaLabaRugi)){ $biaya = $row->TotalBiaya; } echo number_format($pendapatan-$biaya); ?></h4>
                    </div>
                    <div class="col-xs-4">
                      <small class="stat-label">Neraca</small>
                      <h4>Rp <?php $aktiva = 0; $passiva = 0; if($row = mysqli_fetch_object($totalAktiva)) { $aktiva = $row->TotalAktiva; } if(isset($totalPassiva)){ $passiva = $totalPassiva; } $hasilNeraca = $aktiva-$passiva; if($hasilNeraca == 0) { $hasilNeraca = $aktiva; } else { $hasilNeraca = -1; } echo number_format($hasilNeraca); ?></h4>
                    </div>
                    <div class="col-xs-4">
                      <small class="stat-label">Perubahan Ekuitas</small>
                      <h4>Rp <?php $modalAkhir = 0; if($row = mysqli_fetch_object($modalAkhirEkuitas)) { $modalAkhir = $row->ModalAkhirPemilik; } echo number_format($modalAkhir); ?></h4>
                    </div>
                  </div><!-- row -->
                </div><!-- stat -->

              </div><!-- panel-heading -->
            </div><!-- panel -->
          </div><!-- col-sm-6 -->

        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Daftar Akun</h4>
              </div>
              <form id="formTambahNotaBeli" class="form-horizontal">
                <div class="panel-body" id="formAwal">
                  <div class="form-group">

                    <div class="col-sm-6 col-md-6">
                      <label class="col-sm-2 control-label">Periode: <span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <select class="form-control" onchange="periode(this.value)">
                          <option value="" disabled selected style="display: none;">Pilih Periode</option>
                          <?php
                          while($row = mysqli_fetch_object($periode)) {
                            echo '<option id="opti-periode" value="'.$row->idPeriode.'">' . date('d F Y', strtotime($row->tanggalAwal)) . " - " . date('d F Y', strtotime($row->tanggalAkhir)) . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6"> <!-- Split Form Tinggal Masuk-->
                    </div>

                  </div>
                </div>
              </form>
              <div class="panel-body">
                <div class="row p-t-50">
                  <div class="col-sm-12">
                    <div class="m-b-20 table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="width:6%;">No.</th>
                            <th style="width:17%;">Nomor Akun</th>
                            <th style="width:30%;">Nama</th>
                            <th style="width:30%;">Saldo Awal</th>
                            <th style="width:17%;">Saldo Normal</th>
                          </tr>
                        </thead>
                        <tbody id="listingTable">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div><!-- panel-body -->
            </div><!-- panel -->
          </div>
        </div>
      </div>
    </section>
  </body>


  <?php 
  include 'resources2.php'; 
  ?>
  </html>
