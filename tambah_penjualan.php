<?php 
session_start();
include 'sql.php'; 
if(!isset($_COOKIE['loginU'])) {
    header('location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'resources.php'; ?>
  <title> Gentlemen | Nota Penjualan </title>
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
            <ul class="children"  style="display:block;">
              <li ><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li class="active"><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
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
              <h4 class="panel-title">Tambah Nota Penjualan</h4>
            </div>
            <div class="panel-body">
              <div class="col-sm-6 col-md-6">
                <div id="formAwal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Nota<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <?php 
                      $date = date("Ymd");
                      while($rowNomorNotaJual=mysqli_fetch_object($resultCekNomorNotaJual))
                        $nomorNota = $rowNomorNotaJual->jumlah+1;
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
                    <label class="col-sm-3 control-label">Kapster </label>
                    <div class="col-sm-9">
                      <select name="kapster" class="form-control" required="false">
                        <option value="" disabled selected style="display: none;">[Pilih Kapster]</option>
                        <?php 
                        while($rowKapster = mysqli_fetch_object($resultKapster)){
                          echo "<option value=".$rowKapster->idKaryawan.">".$rowKapster->nama."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Pelanggan </label>
                    <div class="col-sm-9">
                      <input type="tel" name="pelanggan" id="pelanggan" class="form-control" placeholder="123-4567-8901" list="listPelanggan">
                      <datalist id="listPelanggan" name="listPelanggan">
                        <?php 
                        while($rowCustomer = mysqli_fetch_object($resultCustomer)){
                          $sql = "SELECT COUNT(*) as total FROM poin WHERE sudahTerpakai=1 AND Customer_idCustomer=".$rowCustomer->idCustomer;
                          $resultPelangganPoin = mysqli_query($link, $sql);
                          while($rowCustomer2 = mysqli_fetch_object($resultPelangganPoin)){
                            echo "<option value='".$rowCustomer->noTelp."'>".$rowCustomer2->total."</option>";
                          }
                        }
                        ?>
                      </datalist>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Hadiah </label>
                    <div class="col-sm-9">
                      <select name="hadiah" id="hadiah" class="form-control" required="false" onchange="cekPoin();">
                        <option value="1" disabled selected style="display: none;">[Pilih Hadiah]</option>
                        <?php 
                        while($rowHadiah = mysqli_fetch_object($resultHadiah)){
                          echo "<option value=".$rowHadiah->idHadiah.">".$rowHadiah->jumlah." - ".$rowHadiah->nama."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" style="margin: 0; padding: 15px 0; border-top: 1px solid #d3d7db;">
                    <label class="col-sm-3 control-label">Jenis Pembayaran<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <select id="jenisBayar" name="jenisBayar" class="form-control" onchange="copy();" required>
                        <option value="T">Tunai</option>
                        <option value="TR">Transfer</option>
                        <option value="K">Kredit</option>
                      </select>
                    </div>
                  </div>
                  <div id="caraBayar"></div>                    
                  
                  <div class="form-group" style="display: none">
                    <label class="col-sm-3 control-label">Status Kirim<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <select id="statusKirim" name="statusKirim" class="form-control" onchange="copy();" required>
                        <option value="DT">Diterima Langsung</option>
                        <option value="DK">Dikirim</option>
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
                      <select name="nama-barang[]" id="nama-barang[]" class="form-control nama-barang" onchange="ubahHargaBarang(this.value, this)">
                        <option value="" disabled selected style="display: none;">[Pilih Barang]</option>
                        <?php 
                        $sqlBarang = "SELECT * FROM barang";
                        $resultBarang = mysqli_query($link, $sqlBarang);
                        while($rowBarang = mysqli_fetch_object($resultBarang)){
                          echo "<option value=".$rowBarang->kodeBarang.">".$rowBarang->namaBarang."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" id="divJumlah">
                    <label class="col-sm-3 control-label">Jumlah Barang <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <input type="number" value=1 min="1" id="jumlah-barang[]" name="jumlah-barang[]" class="form-control jumlah-barang" placeholder="Jumlah Barang" onchange="ubahHargaJumlah(this.value, this)" required/>
                    </div>
                  </div>
                  <div class="form-group" id="divHarga">
                    <label class="col-sm-3 control-label">Harga Barang <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <input disabled="true" name="harga-barang[]" id="harga-barang[]" class="form-control harga-barang" indexKe="0" placeholder="Harga Barang" required/>
                    </div>
                  </div>
                </div>
                
                <div id="divButton">
                  <div class="col-sm-12">
                    <button style="float: right;" id="next" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Barang</button>
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
<?php include 'resources2.php'; ?>
</body>

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
    var kapster;
    var pelanggan;
    var hadiah;
    var jenisBayar;
    var bank;
    var tanggalJatuhTempo;

    $('input[name="nomorNota"]').each( function(){ noNota = $(this).val(); });
    $('input[name="tanggalNota"]').each( function(){ tanggal = $(this).val(); });
    $('select[name="kapster"]').each( function(){ kapster = $(this).val(); });
    $('input[name="pelanggan"]').each( function(){ pelanggan = $(this).val(); });
    $('select[name="jenisBayar"]').each( function(){ jenisBayar = $(this).val(); });
    $('select[name="getBankId"]').each( function(){ bank = $(this).val(); });
    $('input[name="tanggalJatuhTempo"]').each( function(){ tanggalJatuhTempo = $(this).val(); });
    $('select[name="nama-barang[]"]').each( function(){ nama.push($(this).val()); });
    $('input[name="jumlah-barang[]"]').each( function(){ jumlah.push($(this).val()); });
    $('input[name="harga-barang[]"]').each( function(){ harga.push($(this).val()); });

    $.ajax({ 
      type: "GET",
      url: "proses.php",
      data: { cmd:'insertNotaJual',
      noNota:noNota,
      tanggal:tanggal,
      kapster:kapster,
      pelanggan:pelanggan,
      jenisBayar:jenisBayar,
      hadiah:hadiah,
      bank:bank,
      tanggalJatuhTempo:tanggalJatuhTempo
    },                  
    success: function(result){
      alert(result);
      /*for( i = 0 ;i < nama.length ; i++){
        $.ajax({
          type: "GET",
          url: "proses.php",
          data: { cmd:'insertNotaJualBarang',
          noNota:noNota,
          kodeBarang:nama[i],
          jumlah:jumlah[i],
          harga:harga[i]
        },
        success: function(result) {
          location.reload();
        },
        error: function(result) {
          alert(result);
        }
      });
      }*/
    },
    error: function(result) {
      alert("Error Ajax 101");
    }});
  });

  function copy() {
    //statusKirim
    if(document.getElementById('statusKirim').value=='DT'){
      document.getElementById("barangDikirim").innerHTML=''
    }
    else if(document.getElementById('statusKirim').value=='DK'){
      document.getElementById("barangDikirim").innerHTML=

      '<div class="form-group">'+
      '<label class="col-sm-3 control-label">Detail Pengiriman <span class="asterisk">*</span></label>'+
      '<div class="col-sm-5">'+
      '<div class="input-group">'+
      '<span class="input-group-addon">Rp.</span>'+
      '<input type="number" min="0" name="biayaKirim" class="form-control" required/>'+
      '</div>'+
      '</div>'+
      '<div class="col-sm-4">'+
      '<select name="dibayarOleh" class="form-control" required>'+
      '<option value="" disabled selected style="display: none;">Dibayar Oleh</option>'+
      '<option value="pelanggan">Pelanggan</option>'+
      '<option value="perusahaan">Perusahaan</option>'+
      '</select>'+
      '</div>'+
      '</div>'
    }

    //jenisBayar
    if(document.getElementById('jenisBayar').value=='T'){
      document.getElementById("caraBayar").innerHTML=''
    }
    else if(document.getElementById('jenisBayar').value=='TR'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Data Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<select name="getBankId" class="form-control" data-placeholder="Nama Bank" required>'+

      '<option value="" style="display:none">Pilih Bank</option>'+
      '<?php while($row = mysqli_fetch_object($bank)){ echo "<option value=".$row->idBank.">".$row->nama."</option>";} ?>'+
      '</select>'+
      '</div>'+
      '</div>'
    }
    else if(document.getElementById('jenisBayar').value=='K'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Tanggal Jatuh Tempo <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="date" name="tanggalJatuhTempo" class="form-control" value="<?php echo date("Y-m-d") ?>" required/>'+
      '</div>'+
      '</div>'
    }
  }

  function cekPoin() {
    var text = $("#hadiah option:selected").text();
    var splitText = text.split(" ", 1);
    var hadiahTerpilih = parseInt(splitText);
    var pelanggan = $('#pelanggan').val();
    var poin_pelanggan = $("#listPelanggan option[value='" + pelanggan + "']").html();
    alert(poin_pelanggan);
  }
</script>

<script type="text/javascript">
    function ubahHargaBarang(value, value2)
    {
      var indexBarang = $('.nama-barang').index(value2);
      var jumlahBarang = document.getElementsByClassName('jumlah-barang')[indexBarang].value;
      $.ajax({
        url: 'harga_barang.php',
        type: "POST",
        data: { kodeBarang : value },
        success: function(data)
        {
          var total = jumlahBarang * data;
          total = total.toLocaleString();
          document.getElementsByClassName('harga-barang')[indexBarang].value = total;
        }
      });
    }

    function ubahHargaJumlah(value, value2)
    {
      var indexBarang = $('.jumlah-barang').index(value2)
      var namaBarang = document.getElementsByClassName('nama-barang')[indexBarang].value;
      var jumlahBarang = document.getElementsByClassName('jumlah-barang')[indexBarang].value;
      $.ajax({
        url: 'harga_barang.php',
        type: "POST",
        data: { kodeBarang : namaBarang },
        success: function(data)
        {
          var total = jumlahBarang * data;
          total = total.toLocaleString();
          document.getElementsByClassName('harga-barang')[indexBarang].value = total; 
        }
      });
    }
  </script>
</html>