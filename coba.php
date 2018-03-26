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
        <h1><span>[</span> TEAM - DEVELOPER <span>]</span></h1>
      </div><!-- logopanel -->
      <div class="leftpanelinner">
        <h5 class="sidebartitle">Navigation</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li><a href="index.php"><i class="fa fa-list-ul"></i> <span>Daftar Akun</span></a></li>
          <li class="nav-parent nav-active active"><a href=""><i class="fa fa-edit"></i> <span>Nota</span></a>
            <ul class="children" style="display: block;">
              <li class="active"><a href="tambah_pembelian.php"><i class="fa fa-caret-right"></i> <span>Tambah Nota Pembelian</span></a></li>
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
              <li><a href="laporan_perubahan_ekuisitas.php"><i class="fa fa-caret-right"></i> <span>Laporan Perubahan Ekuisitas</span></a></li>
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
        <h2><i class="fa fa-edit"></i> Tambah Nota Pembelian </h2>
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="panel-body panel-body-nopadding">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Tambah Nota Pembelian</h4>
              </div>
              <div class="panel-body">
                <div id="formAwal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Nota <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <input type="number" name="nomorNota" class="form-control" placeholder="nomor nota" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Supplier <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <select name="supplier" class="form-control">
                        <option value="" disabled selected style="display: none;">[Pilih Supplier]</option>
                        <?php 
                        while($row = mysqli_fetch_object($resultSupplier)){
                          echo "<option value=".$row->idSupplier.">".$row->nama."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label ">Tanggal <span class="asterisk">*</span></label>
                    <div class="col-sm-6">                      
                      <input type="date" name="tanggalNota" class="form-control" value="<?php echo date("Y-m-d");?>" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label ">Diskon Pelunasan</label>
                    <div class="col-sm-6">                      
                      <input type="number" name="diskonLangsung" class="form-control" placeholder="Masukan Diskon Pelunasan" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label ">Tanggal Batas Diskon</label>
                    <?php  $date = date("Y-m-d");
                    $date = strtotime($date);
                    $date2 = strtotime("+7 day", $date);?>
                    <div class="col-sm-6">                      
                      <input type="date" name="tanggalNotaDiskon" class="form-control" value="<?php echo date("Y-m-d", $date2);?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Biaya Kirim<span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="number" name="biayaKirim" class="form-control" required/>
                        <span class="input-group-addon">.00</span>
                        <select name="dibayarOleh" class="form-control" required>
                          <option value="" disabled selected style="display: none;">Dibayar Oleh</option>
                          <option value="pelanggan">Pelanggan</option>
                          <option value="perusahaan">Perusahaan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                     <div class="checkbox block"><label><input type="checkbox">Barang sudah diterima</label></div>
                   </div>
                  </div>
                </div>

                <div id="formBarang"> 
                  <div class="form-group" id="divBarang">
                    <label class="col-sm-3 control-label">Barang <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                      <input type="number" name="jumlah-barang[]" class="form-control" placeholder="Jumlah Barang" required/>
                    </div>
                  </div>
                </div>
                <div id="divButton">
                  <div class="col-sm-6 col-sm-offset-3">
                    <button style="float: right;" id="next" class="btn btn-info">Tambah Barang</button>
                  </div>
                </div>

              </div>
             <!-- panel-body -->
             <div class="panel-footer">
              <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button id="submit" class="btn btn-primary" style="float: right; margin: 1%">Submit</button>
                  <button id="reset" class="btn btn-default" style="float: right; margin: 1%">Reset</button>
                </div>
              </div>
            </div>
          </div>
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
    $("#next").click(function() {
      $('#formBarang').append(htmlNama);
      $('#formBarang').append(htmlJumlah);
    });

    $("#submit").click(function() {
         var noNota = null;
         var idSupplier = null;
         var tanggal = null;
         var diskonPelunasan = null;
         var tanggalBatasDiskon = null;
         var biayaKirim = null;
         var dibayarOleh = null;
         var nama = [];
         var jumlah = [];

         $('number[name="nomorNota"]').function(){
            noNota = $(this).val();
         };
         $('select[name="supplier"]').function(){
            idSupplier = $(this).val();
         };
         $('date[name="tanggalNota"]').function(){
            tanggal = $(this).val();
         };
         $('number[name="diskonLangsung"]').function(){
            diskonPelunasan = $(this).val();
         };
         $('date[name="tanggalNotaDiskon"]').function(){
            tanggalBatasDiskon = $(this).val();
         };
         $('number[name="biayaKirim"]').function(){
            biayaKirim = $(this).val();
         };
         $('select[name="dibayarOleh"]').function(){
            dibayarOleh = $(this).val();
         };
         $('select[name="nama-barang[]"]').each( function(){
              nama.push($(this).val());
         });
         $('input[name="jumlah-barang[]"]').each( function(){
              jumlah.push($(this).val());
         });
         for( i = 0 ;i < nama.length ; i++){
            alert(nama[i]+" "+jumlah[i]);
            $.ajax({
                type: "POST",
                url: "proses.php?cmd=insertNotaBeli",
                data: 'nama=' + nama[i]+ '&kuantitas=' + kuantitas[i]+ '&idKategori=' + kategori[i], //BELUM SAMPE SINI
                success: function(result) {
                  alert("Data Berhasil Dimasukan");
                }
                error: function (jqXHR, exception) {
                  var msg = '';
                  if (jqXHR.status === 0) {
                      msg = 'Not connect.\n Verify Network.';
                  } else if (jqXHR.status == 404) {
                      msg = 'Requested page not found. [404]';
                  } else if (jqXHR.status == 500) {
                      msg = 'Internal Server Error [500].';
                  } else if (exception === 'parsererror') {
                      msg = 'Requested JSON parse failed.';
                  } else if (exception === 'timeout') {
                      msg = 'Time out error.';
                  } else if (exception === 'abort') {
                      msg = 'Ajax request aborted.';
                  } else {
                      msg = 'Uncaught Error.\n' + jqXHR.responseText;
                  }
                  swal(msg);
                },
            });
         };
      });
  </script>

</html>

