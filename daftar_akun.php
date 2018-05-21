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
  <title>Gentlemen | Daftar Akun</title>
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
          <li class="nav-parent nav-active active"><a href="daftar_akun.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
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
              <li><a href="data_poin.php"><i class="fa fa-caret-right"></i> <span>Data Poin Pelanggan</span></a></li>
              <li><a href="data_reservasi.php"><i class="fa fa-caret-right"></i> <span>Data Reservasi</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children">
              <li><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
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
                  <?php
                    $sql = "SELECT * FROM karyawan WHERE username = '".$_COOKIE['idU']."'";
                    $resultAd = mysqli_query($link, $sql);
                    $rowAd = mysqli_fetch_array($resultAd);
                    echo $rowAd['nama'];
                  ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li><a href="proses.php?cmd=logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
      </div><!-- headerbar -->
      <div class="pageheader">
        <h2><i class="fa fa-list-ul"></i> Akun </h2>
      </div>
      <div class="contentpanel">
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
      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
  </section>
</body>

  <?php
  include 'resources2.php';
  ?>
    
  <script type="text/javascript">
    $("#success-alert").fadeTo(3000, 500).slideUp(500);
    $("#error-alert").fadeTo(3000, 500).slideUp(500);
  </script>
  
  <script type="text/javascript">
    function periode(value)
    {
      $.ajax({
        url: 'listingTable.php',
        type: "POST",
        data: { periodeId : value },
        success: function(data)
        {
          var table = $('#datatable-buttons').DataTable();
          table.clear().draw();
          var dataArr = data.split('=');
          for($i = 0; $i < dataArr.length-1; $i++)
          {
            var dataArr2 = dataArr[$i].split(";");
            table.row.add([dataArr2[0], dataArr2[1], dataArr2[2], dataArr2[3], dataArr2[4]]).draw();
          }
        }
      });
    }
  </script>

</html>