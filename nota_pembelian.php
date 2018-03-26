<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'resources.php'; 
  ?>
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
            <ul class="children" style="display: block";>
              <li><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
              <li><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
              <li class="active"><a href="nota_pembelian.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Pembelian</span></a></li>
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
        <h2><i class="fa fa-edit"></i> Nota Pelunasan Pembelian </h2>
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <form action="proses.php?cmd=insertNotaPelunasanPembelian" method="POST" id="pelunasanPembelian" class="form-horizontal">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Nota Pelunasan Pembelian</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Nota Pelunasan<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <?php 
                      $date = date("Ymd");
                      while($rowNomorNotaLunasBeli=mysqli_fetch_object($resultCekNomorNotaLunasBeli))
                        $nomorNota = $rowNomorNotaLunasBeli->jumlah+1;
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
                    <label class="col-sm-3 control-label ">Tanggal<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <input type="date" id="tanggalInputNota" name="tanggalInputNota" class="form-control" value="<?php echo date("Y-m-d") ?>" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Nota Pembelian (Kredit)<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <select class="select2" name="nomorNotaPembelian" id="nomorNotaPembelian">
                        <option class="hidden">[Pilih Nota]</option>
                        <?php 
                        while($row = mysqli_fetch_object($notabeli_kredit)) {
                          echo '<option value="'.$row->noNota.'">' . $row->noNota . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Harga Normal<span class="asterisk">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="number" name="getHargaNormal" id="getHargaNormal" class="form-control" required/>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="input-group">
                        <input type="number" name="getDiskon" id="getDiskon" class="form-control" placeholder="Diskon"/>
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Harga Total</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="number" name="getTotalHarga" id="getTotalHarga" value="" class="form-control" disabled/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Jenis Pembayaran <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <select id="jenisBayar" name="jenisBayar" class="form-control" onchange="copy();" required>
                        <option value="T">Tunai</option>
                        <option value="TR">Transfer</option>
                        <!--<option value="K">Kredit</option>-->
                        <option value="C">Cek</option>
                      </select>
                    </div>
                  </div>
                  <div id="caraBayar"></div>                  
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-sm-9">
                        <button id="submit" class="btn btn-primary" style="float: right; margin-left: 10px">Submit</button>
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
                          <th>Harga Awal</th>
                          <th>Diskon</th>
                          <th>Total Harga</th>
                          <th>Cara Bayar</th>
                          <th>Nota Beli</th>
                          <th>Bank ID</th>
                          <th>No Rekening</th>
                          <th>Pemilik Rekening</th>
                          <th>No. Cek</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $hitung = 1;
                        $index = 0;
                        while ($row = mysqli_fetch_object($notabayarbeli)) {
                          echo "<tr data-index='".$index."'>";
                          echo "<td>" . $row->noNota . "</td>";
                          echo "<td>" . $row->tanggal . "</td>";
                          echo "<td>" . $row->nominalSeharusnya . "</td>";
                          echo "<td>" . $row->DiskonPelunasan . "</td>";
                          echo "<td>" . $row->nominalBayar . "</td>";
                          echo "<td>" . $row->caraBayar . "</td>";
                          echo "<td>" . $row->NotaBeli_noNota . "</td>";
                          echo "<td>" . $row->Bank_idBank . "</td>";
                          echo "<td>" . $row->noRekening . "</td>";
                          echo "<td>" . $row->namaPemilikRekening . "</td>";
                          echo "<td>" . $row->nomorCek . "</td>";
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

  <script type="text/javascript">
/*$('#submit').on('click', function (e) {
$.ajax({
type: 'POST',
url: 'proses.php?cmd=insertNotaPelunasanPembelian',
data: $('form').serialize(),
datatype:"json",
success: function (data) 
{
alert('sukses');
}
});
});
/*
$().ready(function(){
$('#pelunasanPembelian').validate();
$('submit').on('click', function (e) {
var isvalidate=$("#pelunasanPembelian").valid();

if(isvalidate)
{
e.preventDefault();
$.ajax({
type: 'POST',
url: 'proses.php?cmd=insertNotaPelunasanPembelian',
data: $('form').serialize(),
success: function (data) 
{
$.notify({ message: 'Data cabang berhasil untuk disimpan.'});
}
});
}
});
});*/
</script>

<script>
// Select2
jQuery(".select2").select2({
  width: '100%'
});

$('#getHargaNormal' && '#getDiskon').keyup(function(){
  var res = $('#getHargaNormal').val()-($('#getHargaNormal').val()*($('#getDiskon').val()/100));
  if (res == Number.POSITIVE_INFINITY || res == Number.NEGATIVE_INFINITY || isNaN(res)) {
res = "N/A"; // OR 0
}
$('#getTotalHarga').val(res);
});
$('#nomorNotaPembelian').change(function(){
  var noNota = $(this).val();
  $.ajax({
    url: 'ambilNotaJual.php',
    type: "POST",
    data: { noNota : noNota },
    success: function(data)
    {
      document.getElementById("getHargaNormal").value = data.split(";")[1];
      document.getElementById("getDiskon").value = data.split(";")[0];
      var res = $('#getHargaNormal').val()-($('#getHargaNormal').val()*($('#getDiskon').val()/100));
      $('#getTotalHarga').val(res);
    }
  });  
});

function copy() {
  if(document.getElementById('jenisBayar').value=='T'){
    document.getElementById("caraBayar").innerHTML=''
  }
  else if(document.getElementById('jenisBayar').value=='TR'){
    document.getElementById("caraBayar").innerHTML=
    '<div class="form-group">'+
    '<label class="col-sm-3 control-label">Nama Pemilik Rekening <span class="asterisk">*</span></label>'+
    '<div class="col-sm-6">'+
    '<input type="text" name="namaPemilikRekening" class="form-control" placeholder="Nama Pemilik Rekening" required/>'+
    '</div>'+
    '</div>'+

    '<div class="form-group" style="margin-bottom:15px;">'+
    '<label class="col-sm-3 control-label">Data Rekening  <span class="asterisk">*</span></label>'+
    '<div class="col-sm-3">'+
    '<input type="number" min="0" name="nomorRekening" class="form-control" placeholder="Nomor Rekening" required/>'+
    '</div>'+
    '<div class="col-sm-3">'+
    '<select name="getBankId" class="form-control" data-placeholder="Nama Bank" required>'+
    '<option value="" style="display:none">Pilih Bank</option>'+
    '<option value="1">Bank Suka Sendiri</option>'+
    '<option value="2">Bank Baca Baca</option>'+
    '</select>'+
    '</div>'+
    '</div>'
  }
  else if(document.getElementById('jenisBayar').value=='K'){
    document.getElementById("caraBayar").innerHTML=
    '<div class="form-group" style="margin-bottom:15px;">'+
    '<label class="col-sm-3 control-label">Tanggal Jatuh Tempo <span class="asterisk">*</span></label>'+
    '<div class="col-sm-6">'+
    '<input type="date" name="tanggalJatuhTempo" class="form-control" value="<?php echo date("Y-m-d") ?>" required/>'+
    '</div>'+
    '</div>'
  }
  else if(document.getElementById('jenisBayar').value=='C'){
    document.getElementById("caraBayar").innerHTML=
    '<div class="form-group" style="margin-bottom:15px;">'+
    '<label class="col-sm-3 control-label">Nomor Cek <span class="asterisk">*</span></label>'+
    '<div class="col-sm-6">'+
    '<input type="number" name="nomorCek" class="form-control" placeholder="Nomor Cek" required/>'+
    '</div>'+
    '</div>'
  }
}
</script>
</body>
</html>