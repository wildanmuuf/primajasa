<?php include "atas.php";
  $id_orders = $_GET['ido'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bank
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=bank"><i class="fa fa-university"></i> Tiket</a></li>
        <li class="active">Metode Pembayaran</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Metode Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=pembayaran&s=simpan" method="post" enctype="multipart/form-data">
         <input type="hidden" id="id_orders" name="id_orders" value="<?php echo $id_orders;?>">

       <div class="form-group">
         &nbsp;&nbsp;&nbsp;&nbsp;Pilih Metode Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;
        <label class="radio-inline"><input type="radio" value="Via Bank" name="metode" data-toggle="collapse" data-target=".collapseOne:not(.in)"> Via Bank</label>
        <label class="radio-inline"><input type="radio" value="Ditempat" name="metode" data-toggle="collapse" data-target=".collapseOne.in" checked> Ditempat</label>
      </div>

          <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="collapseOne panel-collapse collapse">
            <div class="panel-body">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <tr>
        						<td width=150>Kode Bank</td>
        						<td colspan="3"><input type="text" class="form-control" id="kode_bank" name="kode_bank" readonly placeholder="Kode Bank" size="25px" maxlength="100px" /></td>
        					</tr>
					<tr>
						<td width="174px">Nama Bank</td>
						<td colspan="3"><select id="nama_bank" class="form-control" name="nama_bank">
              <option value="">-- Select --</option>
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from bank";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$r['id_bank'].' data-kode='.$r['kode_bank'].' data-penerima='.$r['nama_penerima'].' data-norek='.$r['no_rekening'].'>'.$r['nama_bank'].' </option>';
                }
            ?>
              </select></span></td>
					</tr>
          <tr>
            <td>Nama Penerima</td>
            <td colspan="3"><label id="nama_penerima" style="font-weight: normal !important;"></label></td>
          </tr>
          <tr>
            <td>Nomor Rekening</td>
            <td colspan="3"><label id="no_rekening"></label></td>
          </tr>
          <tr>
						<td>Bukti Pembayaran</td>
						<td><input type="file" name="bukti_pembayaran" accept="image/*" /></td>
					</tr>
					<tr>
						<td colspan=3>

					</tr>
                </tbody>
              </table>

            </div>

          </div>

        </div>
      </div>
      <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
      <a href="?m=tiket" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
			 </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <script type="text/javascript">
    $('input[type=radio]').click(function(){
     const paymentType = this.value;
     
      if (paymentType == 'Via Bank') {
          console.log(paymentType);
        $("#nama_bank").prop('required', true);
      } else {
        $("#nama_bank").prop('required', false);
      }
    });
    
    
    	function onlynumber(e){
    		var numChar = (e.which) ? e.which : event.keyCode
    		if(numChar > 31 && (numChar < 48 || numChar > 57))
    		return false;
    	return true;
    	}
      $(document).ready(function () {

    $("#nama_bank").change(function () {
        var cntrol = $(this);

        var kode = cntrol.find(':selected').data('kode');
        var nama_penerima = cntrol.find(':selected').data("penerima");
        var no_rekening = cntrol.find(':selected').data("norek");
        var id_bank = cntrol.val();
        var defaultValue = "----";
        if(cntrol.val() == ""){
          kode = defaultValue;
          nama_penerima = defaultValue;
          no_rekening = defaultValue;
          id_bank = 0;
        }
        $('#id_bank').val(id_bank);
        $('#kode_bank').val(kode);
        $('#nama_penerima').text(nama_penerima);
        $('#no_rekening').text(no_rekening);
       });

      });
    </script>
<?php include "bawah.php"; ?>
