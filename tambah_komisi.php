<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
  include 'resources.php'; 
  include 'sql.php';
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <title> Gentlemen | Tambah Komisi Karyawan </title>
</head>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
  </div>
  <section>
    <div class="leftpanel">
      <div class="logopanel">
        <h1><span>[</span>GENTLEMEN<span>]</span></h1>
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
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-users"></i> <span>Karyawan</span></a>
            <ul class="children" style="display: block";>
              <li><a href="tambah_karyawan.php"><i class="fa fa-caret-right"></i> <span>Tambah Karyawan</span></a></li>
              <li><a href="data_karyawan.php"><i class="fa fa-caret-right"></i> <span>Data Karyawan</span></a></li>
              <li class="active"><a href="tambah_komisi.php"><i class="fa fa-caret-right"></i> <span>Tambah Komisi</span></a></li>
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
        <h2><i class="fa fa-users"></i> Karyawan </h2>
      </div>
      <div class="contentpanel">
      <?php
        if(!isset($_SESSION['notif'])) {
            echo "";
        }
        else { 
          if($_SESSION['notif'] == "error") { ?>
            <div id="error-alert" class="alert alert-danger alert-solid" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-times"></i>
                <span><strong>Gagal!</strong> Data komisi karyawan gagal dimasukkan.</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
            <?php
            unset($_SESSION['notif']);
          }
          else if ($_SESSION['notif'] == "sukses") { ?>
            <div id="success-alert" class="alert alert-success alert-solid" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-check-circle"></i>
                <span><strong>Sukses!</strong> Data komisi karyawan berhasil dimasukkan.</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
          <?php 
          unset($_SESSION['notif']);
          }
        } ?>
        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <form action="proses.php?cmd=insertKomisi" method="POST" id="karyawanBaru" class="form-horizontal">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Tambah Komisi Karyawan</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Karyawan<span class="asterisk">*</span></label>
                    <div class="col-sm-4">
                      <select name="idKaryawan" id="idKaryawan" class="form-control select2" required="true">
                        <option value="" disabled selected style="display: none;">[Pilih Karyawan]</option>
                        <?php
                          while($row=mysqli_fetch_object($resultKapster)){
                            echo "<option value=".$row->idKaryawan.">".$row->nama."</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-12">
                          <div class="m-b-20 table-responsive">
                            <table id="datatable-colvid" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Jasa / Layanan</th>
                                  <th>Komisi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $hitung = 1;
                                $index = 0;
                                while ($row = mysqli_fetch_object($resultJasaSaja)) {
                                  echo "<tr><td>" . $row->namaBarang. "</td>";
                                  //$sql = "SELECT * FROM barang_has_karyawan WHERE Barang_kodeBarang = ".$row->kodeBarang." AND Karyawan_idKaryawan = "..;
                                  echo "<td>" . $row->jabatan. "</td>";
                                  echo "<td>
                                    <a href='#' class='edit' data-toggle='modal' id='tekan' ide=" . $row->idKaryawan . " data-target='#exampleModal'><center><i class='fa fa-eye'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a href='#'><i class='fa fa-edit'></i> </a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a href='proses.php?cmd=hapusSupplier&i=".$row->idKaryawan."'><i class='fa fa-ban'></i>
                                  </td></tr>";
                                } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-4 control-label">Jasa / Layanan<span class="asterisk">*</span></label>
                    <div class="col-sm-4">
                      <select name="jasaKaryawan" id="jasaKaryawan" class="form-control select2" required="true">
                        <option value="" disabled selected style="display: none;">[Pilih Jasa]</option>
                        <?php
                          while($row=mysqli_fetch_object($resultJasaSaja)){
                            echo "<option value=".$row->kodeBarang.">".$row->namaBarang."</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Komisi <span class="asterisk">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="number" id="komisi" name="komisi" class="form-control" placeholder="Komisi" required />
                      </div>
                    </div>
                  </div> -->
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-sm-8">
                        <button id="submit" class="btn btn-primary" style="float: right; margin-left: 1%">Submit</button>
                        <button type="reset" class="btn btn-default" style="float: right;">Reset</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- panel-body -->
            </div>
            <!-- panel -->
          </form>
        </div>
      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
  </section>

  <?php
  include 'resources2.php';
  ?>

  <script type="text/javascript">
    $("#success-alert").fadeTo(3000, 500).slideUp(500);
    $("#error-alert").fadeTo(3000, 500).slideUp(500);
  </script>
  
<!-- <script>
  $('#idKaryawan').on('change', function() {
    var selected = $(this).val();
    $("#jasaKaryawan option").each(function(item){
      console.log(selected) ;  
      var element =  $(this) ; 
      console.log(element.data("tag")) ; 
      if (element.data("tag") != selected){
        element.hide() ; 
      }else{
        element.show();
      }
    }) ; 
    
    $("#jasaKaryawan").val($("#jasaKaryawan option:visible:first").val());
    
});
</script> -->

</body>
</html>