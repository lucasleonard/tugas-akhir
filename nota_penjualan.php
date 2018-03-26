<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'resources.php'; ?>
  <?php include 'sql.php'; ?>
</head>

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
              <li><a href="tambah_penjualan.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Penjualan</span></a></li>
              <li><a href="nota_pembelian.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Pembelian</span></a></li>
              <li class="active"><a href="nota_penjualan.php"><i class="fa fa-caret-right"></i> <span>Nota Pelunasan Penjualan</span></a></li>
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
        <h2><i class="fa fa-edit"></i> Nota Pelunasan Penjualan </h2>
      </div>
      
      <div class="contentpanel">

        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <form action="proses.php?cmd=insertNotaPelunasanPenjualan" method="POST" id="pelunasanPenjualan" class="form-horizontal">  <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Nota Pelunasan Penjualan</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Nota Pelunasan<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                    <?php 
                      $date = date("Ymd");
                      while($row=mysqli_fetch_object($resultCekNomorNotaLunasJual))
                        $nomorNota = $row->jumlah+1;
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
                    <label class="col-sm-3 control-label">Nomor Nota Penjualan<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <select class="select2" name="nomorNotaPembelian" id="nomorNotaPembelian">
                        <option class="hidden">[Pilih Nota]</option>
                        <?php 
                        while($row = mysqli_fetch_object($notajual_has_barang)) {
                          echo '<option value="'.$row->NotaJual_noNota.'">' . $row->NotaJual_noNota . "</option>";
                        }
                        ?>
                      </select>
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
                <!-- panel-body -->
              </div>
              <!-- panel -->
            </form>
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
                          <th>Nama Pelanggan</th>
                          <th>Nomor Nota</th>
                          <th>Tanggal</th>
                          <th>Nama Barang</th>
                          <th>Total Harga</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>Samsul Abidin</td>
                          <td>H512S</td>
                          <td>20/01/2016</td>
                          <td>Sepatu</td>
                          <td>Rp 700.000</td>
                        </tr>
                        <tr>
                          <td>Naufal Firmansah</td>
                          <td>YSU12</td>
                          <td>29/12/2016</td>
                          <td>Sepatu</td>
                          <td>Rp 1.700.000</td>
                        </tr>
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

</html>