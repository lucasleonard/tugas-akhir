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
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children" style="display: block;">
              <li><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li class="active"><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
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
      <h2><i class="fa fa-edit"></i> Tambah Nota Penjualan </h2>
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
                    <label class="col-sm-3 control-label">Pelanggan <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <select name="pelanggan" class="form-control">
                        <option value="" disabled selected style="display: none;">[Pilih Pelanggan]</option>
                        <?php 
                        $sqlPelanggan = "SELECT * FROM costumer";
                        $resultPelanggan = mysqli_query($link, $sqlPelanggan);
                        while($rowPelanggan = mysqli_fetch_object($resultPelanggan)){
                          echo "<option value=".$rowPelanggan->idCostumer.">".$rowPelanggan->nama."</option>";
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
                        <option value="C">Cek</option>
                      </select>
                    </div>
                  </div>
                  <div id="caraBayar"></div>                    
                  <div class="form-group" style="margin: 0; padding: 15px 0; border-top: 1px solid #d3d7db;">
                    <label class="col-sm-3 control-label">Diskon Pelunasan</label>
                    <div class="col-sm-9">                      
                      <input type="text" name="diskonLangsung" class="form-control" placeholder="Masukan Diskon Pelunasan" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label ">Tanggal Batas Diskon</label>
                    <?php  $date = date("Y-m-d");
                    $date = strtotime($date);
                    $date2 = strtotime("+7 day", $date);?>
                    <div class="col-sm-9">                      
                      <input type="date" name="tanggalBatasNota" class="form-control" value="<?php echo date("Y-m-d", $date2);?>"/>
                    </div>
                  </div>
                  <div class="form-group">
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
                      <select name="nama-barang[]" class="form-control">
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
                      <input type="number" min="0" name="jumlah-barang[]" class="form-control" placeholder="Jumlah Barang" required/>
                    </div>
                  </div>
                  <div class="form-group" id="divHarga">
                    <label class="col-sm-3 control-label">Harga Barang <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                      <input type="number" min="0" name="harga-barang[]" class="form-control" placeholder="Harga Barang" required/>
                    </div>
                  </div>
                </div>

                <div id="divButton">
                  <div class="col-sm-12">
                    <button style="float: right;" id="next" class="btn btn-primary">Tambah Barang</button>
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

      <!-- row -->
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row p-t-50">
              <div class="col-sm-12">
                <div class="m-b-20 table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No. Nota</th>
                        <th>Tanggal</th>                          
                        <th>Cara Bayar</th>
                        <th>Status Kirim</th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Diskon Langsung</th>
                        <th>Diskon Pelunasan</th>
                        <th>Batas Diskon</th>
                        <th>Biaya Kirim</th>
                        <th>Dibayar Oleh</th>
                        <th>Costumer ID</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $hitung = 1;
                      $index = 0;
                      while ($row = mysqli_fetch_object($notajual)) {
                        echo "<tr data-index='".$index."'>";
                        echo "<td>" . $row->noNota . "</td>";
                        echo "<td>" . $row->tanggal . "</td>";
                        echo "<td>" . $row->caraBayar . "</td>";
                        echo "<td>" . $row->StatusKirim . "</td>";
                        echo "<td>" . $row->tanggalJatuhTempo . "</td>";
                        echo "<td>" . $row->diskonLangsung . "</td>";
                        echo "<td>" . $row->DiskonPelunasan . "</td>";
                        echo "<td>" . $row->tanggalBatasDiskon . "</td>";
                        echo "<td>" . $row->biayaKirim . "</td>";
                        echo "<td>" . $row->dibayarOleh . "</td>";
                        echo "<td>" . $row->Costumer_idCostumer . "</td>";
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
    var pelanggan;
    var tanggal;
    var diskonPelunasan;
    var tanggalBatasDiskon;
    var biayaKirim;
    var dibayarOleh;

    $('input[name="nomorNota"]').each( function(){ noNota = $(this).val(); });
    $('select[name="pelanggan"]').each( function(){ pelanggan = $(this).val(); });
    $('input[name="tanggalNota"]').each( function(){ tanggal = $(this).val(); });
    $('input[name="diskonLangsung"]').each( function(){ diskonPelunasan = $(this).val(); });
    $('input[name="tanggalBatasNota"]').each( function(){ tanggalBatasDiskon = $(this).val(); });
    $('input[name="biayaKirim"]').each( function(){ biayaKirim = $(this).val(); });
    $('select[name="dibayarOleh"]').each( function(){ dibayarOleh = $(this).val(); });
    $('select[name="nama-barang[]"]').each( function(){ nama.push($(this).val()); });
    $('input[name="jumlah-barang[]"]').each( function(){ jumlah.push($(this).val()); });
    $('input[name="harga-barang[]"]').each( function(){ harga.push($(this).val()); });

    $.ajax({ 
      type: "GET",
      url: "proses.php",
      data: { cmd:'insertNotaJual',
      noNota:noNota,
      pelanggan:pelanggan,
      tanggal:tanggal,
      diskonPelunasan:diskonPelunasan,
      tanggalBatasDiskon:tanggalBatasDiskon,
      biayaKirim:biayaKirim,
      dibayarOleh:dibayarOleh
    },                  
    success: function(result){
      for( i = 0 ;i < nama.length ; i++){
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
          alert("ROBBY");
        }
      });
      }
    },
    error: function(result) {
      alert("ROBBY");
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
      '<label class="col-sm-3 control-label ">Nama Pemilik Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="text" name="namaPemilikRekening" class="form-control" placeholder="Nama Pemilik Rekening" required/>'+
      '</div>'+
      '</div>'+
      '<div class="form-group">'+
      '<label class="col-sm-3 control-label ">Data Rekening <span class="asterisk">*</span></label>'+
      '<div class="col-sm-5">'+
      '<input type="number" min="0" name="nomorRekening" class="form-control" placeholder="Nomor Rekening" required/>'+
      '</div>'+
      '<div class="col-sm-4">'+
      '<select name="getBankId" class="form-control" data-placeholder="Nama Bank" required>'+
      '<option value="" style="display:none">Pilih Bank</option>'+
      '<option value="1">Bank Baca Baca</option>'+
      '<option value="2">Bank Suka Sendiri</option>'+
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
    else if(document.getElementById('jenisBayar').value=='C'){
      document.getElementById("caraBayar").innerHTML=
      '<div class="form-group" style="margin-bottom:15px;">'+
      '<label class="col-sm-3 control-label">Nomor Cek <span class="asterisk">*</span></label>'+
      '<div class="col-sm-9">'+
      '<input type="number" min="0" name="nomorCek" class="form-control" placeholder="Nomor Cek" required/>'+
      '</div>'+
      '</div>'
    }
  }
</script>
</html>