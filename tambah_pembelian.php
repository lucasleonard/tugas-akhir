<?php 
session_start();
include 'sql.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'resources.php'; ?>
  <title> Gentlemen | Nota Pembelian </title>
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
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children" style="display:block;">
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
        <h2><i class="fa fa-edit"></i> Nota </h2>
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Tambah Nota Pembelian</h4>
              </div>
              <div class="panel-body">
                <div class="col-sm-6 col-md-6">
                  <div id="formAwal">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nomor Nota<span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <?php 
                        $date = date("Ymd");
                        while($rowNomorNota=mysqli_fetch_object($resultCekNomorNota))
                          $nomorNota = $rowNomorNota->jumlah+1;
                        if($nomorNota<100){
                          $nomorBaru = "0".$nomorNota;
                          if($nomorNota<10){
                            $nomorBaru = "00".$nomorNota;
                          }
                        }
                        echo '<input name="nomorNota" class="form-control" value="'.$date.$nomorBaru.'" disabled="true"/>';
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label ">Tanggal <span class="asterisk">*</span></label>
                      <div class="col-sm-9">                      
                        <input type="date" name="tanggalNota" class="form-control" value="<?php echo date("Y-m-d");?>" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Supplier <span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <select name="supplier" class="form-control">
                          <option value="" disabled selected style="display: none;"> [Pilih Supplier]</option>
                          <?php 
                          while($row = mysqli_fetch_object($resultSupplier)){
                            echo "<option value=".$row->idSupplier.">".$row->nama."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group" style="margin: 0; padding: 15px 0; border-top: 1px solid #d3d7db;">
                      <label class="col-sm-3 control-label">Jenis Pembayaran<span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <select id="jenisBayar" name="jenisBayar" class="form-control" onchange="copyjenisBayar();" required>
                          <!--<option value="" disabled selected style="display: none;"> [Pilih Pembayaran]</option>-->
                          <option selected value="T">Tunai</option>
                          <option value="TR">Transfer</option>
                          <option value="K">Kredit</option>
                        </select>
                      </div>
                    </div>
                    <div id="caraBayar"></div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Status Kirim<span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <select id="statusKirim" name="statusKirim" class="form-control" required>
                          <option value=1>Diterima Langsung</option>
                          <option value=0>Dikirim</option>
                        </select>
                      </div>
                    </div>
                    <div id="barangDikirim"></div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6">
                  <div id="formBarang"> 
                    <div class="form-group" id="divBarang">
                      <label class="col-sm-3 control-label">Barang <span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <select name="nama-barang[]" class="form-control">
                          <option value="" disabled selected style="display: none;">[Pilih Barang]</option>
                          <?php 
                          while($rowBarangSaja = mysqli_fetch_object($resultBarangSaja)){
                            echo "<option value=".$rowBarangSaja->kodeBarang.">".$rowBarangSaja->namaBarang."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group" id="divJumlah">
                      <label class="col-sm-3 control-label">Jumlah Barang <span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <input type="number" min="0" id="jumlah-barang[]" name="jumlah-barang[]" class="form-control jumlah-barang" onchange="ubahHargaJumlah(this.value, this)" placeholder="Jumlah Barang" required/>
                      </div>
                    </div>
                    <div class="form-group" id="divHarga">
                      <label class="col-sm-3 control-label">Harga Barang (satuan)<span class="asterisk">*</span></label>
                      <div class="col-sm-9">
                        <input type="number" min="0" id="harga-barang[]" name="harga-barang[]" class="form-control harga-barang" placeholder="Harga per Barang" onchange="ubahHargaHarga(this.value, this)" required/>
                      </div>
                    </div>
                  </div>

                  <div id="divButton">
                    <div class="col-sm-12">
                      <button style="float: right;" id="next" class="btn btn-primary">Tambah Barang</button>
                    </div>
                  </div>
                  
                  <div class="form-group" id="divHargaTotal">
                    <label class="col-sm-3 control-label">Total Harga</label>
                      <div class="col-sm-9">
                        <input type="text" disabled="true" name="total-harga" id="total-harga" class="form-control total-harga" style="background-color: transparent; border: transparent; font-size: 150%; font-weight:bold" value=0 />
                      </div>
                  </div>
                </div>

              </div>
              <!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <button id="submit" class="btn btn-primary" style="float: right; margin-left:10px;">Submit</button>
                    <button id="reset" class="btn btn-default" style="float:right;">Reset</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- panel -->
          </div>
        </div>
      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
  </section>
</body>

<?php include 'resources2.php'; ?>
<script type="text/javascript">
  var htmlNama = $('#divBarang:eq(0)')[0].outerHTML;
  var htmlJumlah = $('#divJumlah:eq(0)')[0].outerHTML;
  var htmlHarga = $('#divHarga:eq(0)')[0].outerHTML;
  $("#next").click(function() {
    $('#formBarang').append(htmlNama);
    $('#formBarang').append(htmlJumlah);
    $('#formBarang').append(htmlHarga);
  });

  $("#submit").click(function() {
    var nama = [];
    var jumlah = [];
    var harga=[];
    var noNota;
    var tanggal;
    var idSupplier;
    var jenisBayar;
    var statusKirim;
    var biayaKirim;
    var bank;
    var nomorRekening;
    var namaPemilikRekening;
    var uangMuka;
    var tanggalJatuhTempo;
    var totalHarga;

    $('input[name="nomorNota"]').each( function(){ noNota = $(this).val(); });
    $('input[name="tanggalNota"]').each( function(){ tanggal = $(this).val(); });
    $('select[name="supplier"]').each( function(){ idSupplier = $(this).val(); });
    $('select[name="statusKirim"]').each( function(){ statusKirim = $(this).val(); });
    $('select[name="jenisBayar"]').each( function(){ jenisBayar = $(this).val(); });
    $('select[name="nama-barang[]"]').each( function(){ nama.push($(this).val()); });
    $('input[name="jumlah-barang[]"]').each( function(){ jumlah.push($(this).val()); });
    $('input[name="harga-barang[]"]').each( function(){ harga.push($(this).val()); });
    $('input[name="uangMuka"]').each( function(){ uangMuka = $(this).val(); });
    $('input[name="nomorRekening"]').each( function(){ nomorRekening = $(this).val(); });
    $('input[name="namaPemilikRekening"]').each( function(){ namaPemilikRekening = $(this).val(); });
    $('input[name="getBankId"]').each( function(){ bank = $(this).val(); });
    $('input[name="tanggalJatuhTempo"]').each( function(){ tanggalJatuhTempo = $(this).val(); });
    $('input[name="total-harga"]').each( function(){ totalHarga = $(this).val(); });

    $.ajax({ 
      type: "GET",
      url: "proses.php",
      data: { cmd:'insertNotaBeli',
      noNota:noNota,
      tanggal:tanggal,
      idSupplier:idSupplier,
      jenisBayar:jenisBayar,
      statusKirim:statusKirim,
      biayaKirim:biayaKirim,
      bank:bank,
      nomorRekening:nomorRekening,
      namaPemilikRekening:namaPemilikRekening,
      uangMuka:uangMuka,
      tanggalJatuhTempo:tanggalJatuhTempo,
      totalHarga:totalHarga
    },                  
    success: function(result){
      for( i = 0 ;i < nama.length ; i++){
        $.ajax({
            type: "GET",
            url: "proses.php",
            data: { cmd:'insertNotaBeliBarang',
            noNota:noNota,
            tanggal:tanggal,
            jenisBayar:jenisBayar,
            kodeBarang:nama[i],
            jumlah:jumlah[i],
            harga:harga[i]
          },
          success: function(result) {
            alert(result);
          },
          error: function(result) {
            alert("Error Ajax 2");
          }
        });
      }
      location.reload();
    },
    error: function(result) {
      alert("Error Ajax 1");
    }});
  });

  function copyjenisBayar() {
    if(document.getElementById('jenisBayar').value=='T'){
      document.getElementById("caraBayar").innerHTML=''
    }
    else if(document.getElementById('jenisBayar').value=='TR'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Nama Pemilik Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="text" name="namaPemilikRekening" class="form-control" placeholder="Nama Pemilik Rekening" required/>'+
      '</div>'+
      '</div>'+
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Data Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-5">'+
      '<input type="text" name="nomorRekening" class="form-control" placeholder="Nomor Rekening" required/>'+
      '</div>'+
      '<div class="col-sm-4">'+
      '<select name="getBankId" class="form-control" data-placeholder="Nama Bank" required>'+
      '<option value="" style="display:none">Pilih Bank</option>'+
      '<option value="1">BCA</option>'+
      '</select>'+
      '</div>'+
      '</div>'
    }
    else if(document.getElementById('jenisBayar').value=='K'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Jatuh Tempo <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="date" name="tanggalJatuhTempo" class="form-control" value="<?php echo date("Y-m-d") ?>" required/>'+
      '</div>'+
      '</div>'+
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Uang Muka</label>'+
      '<div class="col-sm-9">'+
      '<input type="number" name="uangMuka" class="form-control" placeholder="Uang Muka"/>'+
      '</div>'+
      '</div>'
    }
  }

</script>
<script type="text/javascript">
    function ubahHargaHarga(value, value2)
    {
      var indexBarang = $('.harga-barang').index(value2);
      var jumlahArray = $('input[name="harga-barang[]"]').length;
      var tot=0;
      for(var i=0;i<jumlahArray;i++){
        var jumlahBarang = document.getElementsByClassName('jumlah-barang')[i].value;
        var hargaBarang = document.getElementsByClassName('harga-barang')[i].value;
        var total = jumlahBarang * hargaBarang;
        tot += total;
      }
      document.getElementById('total-harga').value = tot.toLocaleString();
    }
    function ubahHargaJumlah(value, value2)
    {
      var indexBarang = $('.jumlah-barang').index(value2);
      var jumlahArray = $('input[name="jumlah-barang[]"]').length;
      var tot=0;
      for(var i=0;i<jumlahArray;i++){
        var jumlahBarang = document.getElementsByClassName('jumlah-barang')[i].value;
        var hargaBarang = document.getElementsByClassName('harga-barang')[i].value;
        var total = jumlahBarang * hargaBarang;
        tot += total;
      }
      document.getElementById('total-harga').value = tot.toLocaleString();
    }
</script>

</html>