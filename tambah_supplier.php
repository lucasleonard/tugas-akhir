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
  <title> Gentlemen | Tambah Supplier </title>
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
          <li><a href="daftar_akun.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
          <li class="nav-parent"><a href=""><i class="fa fa-cube"></i> <span>Produk</span></a>
            <ul class="children">
              <li><a href="tambah_Produk.php"><i class="fa fa-caret-right"></i> <span>Tambah Produk Baru</span></a></li>
              <li><a href="data_produk.php"><i class="fa fa-caret-right"></i> <span>Data Produk</span></a></li>
            </ul>
          </li>
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-truck"></i> <span>Supplier</span></a>
            <ul class="children" style="display: block";>
              <li class="active"><a href="tambah_supplier.php"><i class="fa fa-caret-right"></i> <span>Tambah Supplier</span></a></li>
              <li><a href="data_supplier.php"><i class="fa fa-caret-right"></i> <span>Data Supplier</span></a></li>
            </ul>
          </li>
          <li class="nav-parent"><a href=""><i class="fa fa-users"></i> <span>Karyawan</span></a>
            <ul class="children">
              <li><a href="tambah_karyawan.php"><i class="fa fa-caret-right"></i> <span>Tambah Karyawan</span></a></li>
              <li><a href="data_karyawan.php"><i class="fa fa-caret-right"></i> <span>Data Karyawan</span></a></li>
              <li><a href="data_komisi.php"><i class="fa fa-caret-right"></i> <span>Data Komisi</span></a></li>
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
        <h2><i class="fa fa-truck"></i> Supplier </h2>
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
                  <span><strong>Gagal!</strong> Data supplier gagal dimasukkan.</span>
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
                  <span><strong>Sukses!</strong> Data supplier berhasil dimasukkan.</span>
                </div><!-- d-flex -->
              </div><!-- alert -->
            <?php 
            unset($_SESSION['notif']);
            }
          } ?>
        
        <div class="row">
          <div class="panel-body panel-body-nopadding form-horizontal">
            <!--<form action="" method="POST" id="supplierBaru" class="form-horizontal">-->
              <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">Daftar Supplier Baru</h4>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Supplier<span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input name="namaSupplier" class="form-control"/>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat<span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input name="alamatSupplier" class="form-control"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nomor Telepon<span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input name="nomorTelepon" class="form-control"/>
                  </div>
                </div>
                <div id="formBarang">
                  <div class="form-group" id="divBarang">
                    <label class="col-sm-3 control-label">Barang Supplier<span class="asterisk">*</span></label>
                    <div class="col-sm-6" id="namaBarang">
                      <select name="barangSupplier[]" class="form-control">
                        <option value="" disabled selected style="display: none;">[Pilih Barang]</option>
                        <?php 
                        while($rowBarang = mysqli_fetch_object($resultBarangSaja)){
                          echo "<option value=".$rowBarang->kodeBarang.">".$rowBarang->namaBarang."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>  
                </div>
              <!--</form>-->
                <div class="form-group">
                  <div id="divButton">
                    <div class="col-sm-9">
                      <button style="float: right; margin-left: 1%" id="next" class="btn btn-info">Tambah Barang</button>
                    </div>
                  </div>
                </div>

                <div class="panel-footer">
                  <div class="row">
                    <div class="col-sm-9">
                      <button id="submit" class="btn btn-primary" style="float: right; margin-left: 1%">Submit</button>
                      <button type="reset" class="btn btn-default" style="float: right;">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- panel-body -->
            </div>
            <!-- panel-default-->
          </div>
          <!-- panel -->
        </div>
      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
  </section>
</body>
  
<?php 
  include 'resources2.php';
?>

<script type="text/javascript">
    var htmlNama = $('#divBarang:eq(0)')[0].outerHTML;
    $("#next").click(function() {
      $('#formBarang').append(htmlNama);
    });

    $("#submit").click(function() {
    var namaSupplier;
    var alamatSupplier;
    var nomorTelepon;
    var namaBarang = [];
    $('input[name="namaSupplier"]').each( function(){ namaSupplier = $(this).val(); });
    $('input[name="alamatSupplier"]').each( function(){ alamatSupplier = $(this).val(); });
    $('input[name="nomorTelepon"]').each( function(){ nomorTelepon = $(this).val(); });
    $('select[name="barangSupplier[]"]').each( function(){ namaBarang.push($(this).val()); });
    $.ajax({ 
      type: "GET",
      url: "proses.php",
      data: { cmd:'insertSupplier',
      namaSupplier:namaSupplier,
      alamatSupplier:alamatSupplier,
      nomorTelepon:nomorTelepon
      },
      success: function(result){
        for( i = 0 ;i < namaBarang.length ; i++){
          $.ajax({
            type: "GET",
            url: "proses.php",
            data: { cmd:'insertSupplierHasBarang',
            namaBarang:namaBarang[i]
          },
          success: function(result) {
            location.reload();
          },
          error: function(result) {
            alert("Error Ajax001");
          }
        });
        }
      },
      error: function(result) {
        alert("Error Ajax002");
      }
    });
  });

  $("#success-alert").fadeTo(3000, 500).slideUp(500);
  $("#error-alert").fadeTo(3000, 500).slideUp(500);
  </script>
</html>