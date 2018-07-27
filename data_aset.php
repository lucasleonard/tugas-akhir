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
  <title> Gentlemen | Data Aset </title>
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
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-cube"></i> <span>Produk</span></a>
            <ul class="children" style="display: block";>
              <li><a href="tambah_produk.php"><i class="fa fa-caret-right"></i> <span>Tambah Produk Baru</span></a></li>
              <li><a href="data_produk.php"><i class="fa fa-caret-right"></i> <span>Data Produk</span></a></li>
              <li class="active"><a href="data_produk.php"><i class="fa fa-caret-right"></i> <span>Data Aset</span></a></li>
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
        <h2><i class="fa fa-cube"></i> Produk </h2>
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
                <span><strong>Gagal!</strong> Data aset gagal diubah.</span>
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
                <span><strong>Sukses!</strong> Data aset berhasil diubah.</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
          <?php 
          unset($_SESSION['notif']);
          }
        } ?>
        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <form action="proses.php?cmd=insertNotaPelunasanPembelian" method="POST" id="pelunasanPembelian" class="form-horizontal">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Data Aset</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="row p-t-50">
                          <div class="col-sm-12">
                            <div class="m-b-20 table-responsive">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga Beli(AVG)</th>
                                    <th>Harga Jual</th>
                                    <th>Perkiraan Umur</th>
                                    <th>Value saat ini</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $hitung = 1;
                                  $index = 0;
                                  while ($row = mysqli_fetch_object($resultJasaSaja)) {
                                    echo "<tr data-index='".$index."'>";
                                    echo "<td>" . $row->kodeBarang . "</td>";
                                    echo "<td>" . $row->namaBarang . "</td>";
                                    echo "<td> Rp " . $row->hargaBeliRata2 . "</td>";
                                    echo "<td> Rp " . $row->hargaJual . "</td>";
                                    echo "<td>" . $row->minStok . "</td>";
                                    echo "<td>" . $row->stok . "</td>";
                                    if($row->Jenis_idJenis == 2)
                                      $jenisProduk = "Jasa";
                                    else if($row->Jenis_idJenis == 1)
                                      $jenisProduk = "Barang";
                                    else if($row->Jenis_idJenis == 3)
                                      $jenisProduk = "Peralatan";
                                    else if($row->Jenis_idJenis == 4)
                                      $jenisProduk = "Perlengkapan";
                                    echo "<td>" . $jenisProduk . "</td>";
                                    echo "<td>
                                    <a href='#' class='edit' data-toggle='modal' id='tekan' ide=" . $row->kodeBarang . " data-target='#exampleModal'><center><i class='fa fa-edit'></i> </a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a href='proses.php?cmd=hapusSupplier&i=".$row->kodeBarang."'><i class='fa fa-ban'></i>
                                    </td></tr>";
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

  <!-- .modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel"><strong>Edit Data Produk</strong></h4>
          </div>
          <div class="modal-body">
           <form action="proses.php?cmd=editProduk" method="POST">
              <div class="form-group">
                <input name="kodeBarang" type="text" class="form-control" id="kodeBarang" style="display: none;">
              </div>
              <div class="form-group">
                <label class="control-label">Nama :</label>
                <input name="namaProduk" type="text" class="form-control" id="namaProduk">
              </div>
              <div class="form-group">
                <label class="control-label">Harga Beli(AVG) :</label>
                <input disabled="true" name="harbaBeli" type="text" class="form-control" id="harbaBeli">
              </div>
              <div class="form-group">
                <label class="control-label">Harga Jual :</label>
                <input name="hargaJual" type="text" class="form-control" id="hargaJual">
              </div>
              <div class="form-group">
                <label class="control-label">Min. Stok :</label>
                <input type="number" name="minStok" type="text" class="form-control" id="minStok">
              </div>
              <div class="form-group">
                <label class="control-label">Stok :</label>
                <input type="number" name="stok" type="text" class="form-control" id="stok">
              </div>
              <div class="form-group">
                <label class="control-label">Jenis :</label>
                <select name="jenisProduk" class="form-control" id="jenisProduk">
                  <option value=1>Barang</option>
                  <option value=2>Jasa</option>
                  <option value=3>Peralatan</option>
                  <option value=4>Perlengkapan</option>
                </select>
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" id="kirim" value="SIMPAN"/>
              </div>
            </form>
          </div><!--ModalBody-->
      </div><!--Modal Content-->
    </div><!--Modal Dialog-->
  </div><!-- /.modal -->
</body>

  <?php include 'resources2.php'; ?>

  <script type="text/javascript">
    $("body").delegate('.edit', 'click', function(){
        var idEdit = $(this).attr('ide');
        var jenisTampung;
        $.ajax({
          url     : "data_produk.php",
          type    : "POST",
          data    : {
            "kode": idEdit
          },
          success:function(show)
          {
            $("#kodeBarang").val(show.kodeBarang);
            $("#namaProduk").val(show.namaBarang);
            $("#hargaBeli").val(show.hargaBeliRata2);
            $("#hargaJual").val(show.hargaJual);
            $("#stok").val(show.stok);
            $("#minStok").val(show.minStok);
            $("#jenisProduk").val(show.Jenis_idJenis);
          },
          error: function(result) {
            //alert(JSON.stringify(result));
            //alert(result);
            alert("Ajax Error");
          }
        });
      });
    </script>
    
    <script type="text/javascript">
      $("#success-alert").fadeTo(3000, 500).slideUp(500);
      $("#error-alert").fadeTo(3000, 500).slideUp(500);
    </script>

</html>