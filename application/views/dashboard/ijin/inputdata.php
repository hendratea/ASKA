<!-- Main Content -->
<section class="content">
  <?php $this->load->view($headerView); ?>
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="body">
            <div class="row clearfix">

              <!-- LOADER -->
              <div class="col-lg-12 col-md-6">
                <div class="loader col-sm-12" id="loader_process"
                  style="padding-bottom:20px;padding-left:0px; display:none">
                  <img src="<?= base_url() ?>assets/template/images/gif/loading.gif">
                </div>
              </div>

              <!-- INPUT -->
              <div class="col-lg-6 col-md-6">
                <label>ID Pegawai</label>
                <div class="input-group masked-input">
                  <div id="boxIconIdPegawai" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                  </div>
                  <input id="idPegawai" name="idPegawai" type="text" class="form-control" readonly="readonly"
                    value="<?= $this->session->userdata('logged_IDPEG') ?>">
                  <div id="msgErrIdPegawai" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Nama Pegawai</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconNamaPegawai" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                  </div>
                  <input id="namaPegawai" name="namaPegawai" type="text" class="form-control" readonly="readonly"
                    value="<?= $this->session->userdata('logged_full_name') ?>">
                  <div id="msgErrNamaPegawai" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Lama Ijin</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconLamaIjin" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <input id="lamaIjin" name="lamaIjin" type="text" class="form-control" value="1 hari">
                  <div id="msgErrlamaIjin" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Tanggal Pengajuan</label>
                <div class="input-group">
                  <div id="boxIconTglDibuat" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <input id="tglDibuat" name="tglDibuat" type="text" class="form-control tanggalPicker"
                    onkeydown="return false" value="<?php echo date('d/m/y'); ?>">
                  <div id="msgErrtglDibuat" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Tanggal Awal Ijin</label>
                <div class="input-group">
                  <div id="boxIconTglAwal" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <input id="tglAwal" name="tglAwal" type="text" class="form-control tanggalPicker"
                    onkeydown="return false" value="<?php echo date('d/m/y'); ?>">
                  <div id="msgErrtglAwal" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Tanggal Akhir Ijin</label>
                <div class="input-group">
                  <div id="boxIconTglAkhir" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <input id="tglAkhir" name="tglAkhir" type="text" class="form-control tanggalPicker"
                    onkeydown="return false" value="<?php echo date('d/m/y'); ?>">
                  <div id="msgErrtglAkhir" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Jenis Ijin</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxJenisIjin" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <select id="jenisIjin" name="jenisIjin" class="form-control show-tick ms select2"
                    data-placeholder="--Pilih--">
                    <!-- <option value="0" selected hidden>--Pilih--</option> -->
                    <option value=""></option>
                    <?php
                    foreach ($listRefIjin as $list) { ?>
                    <option value="<?= $list->ID ?>"><?= $list->status ?></option>
                    <?php } ?>
                  </select>
                  <div id="msgErrjenisIjin" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>Alasan</label>
                <div class="input-group masked-input mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-collection-text"></i></span>
                  </div>
                  <textarea id="alasan" name="alasan" class="form-control" rows="1" autofocus></textarea>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <button id="btnSubmit" type="button" class="btn btn-primary" style="font-size:13px"><i
                    class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</button>
                <button class="btn btn-danger" id="btnReset">Batal</button>
              </div>

              <!-- TABLE -->
              <div class="col-lg-12 col-md-6">
                <div class="table-responsive"
                  style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;width:100%;">
                  <table class="table table-bordered table-striped table-hover nowrap" id="dt_ijin_inputdata"
                    width="100%">
                    <thead>
                      <tr>
                        <th width="05%" style="text-align: left;vertical-align : middle;">IDPEG</th>
                        <th width="05%" style="text-align: left;vertical-align : middle;">Nama</th>
                        <th width="05%" style="text-align: left;vertical-align : middle;">diSetujui</th>
                        <th width="07%" style="text-align: left;vertical-align : middle;">Jenis Ijin</th>
                        <th width="10%" style="text-align: left;vertical-align : middle;">Tgl Pengajuan</th>
                        <th width="10%" style="text-align: left;vertical-align : middle;">Tgl Awal Ijin</th>
                        <th width="10%" style="text-align: left;vertical-align : middle;">Tgl Akhir Ijin</th>
                        <th width="10%" style="text-align: left;vertical-align : middle;">Lama Ijin</th>
                        <th width="25%" style="text-align: left;vertical-align : middle;">Alasan</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- OTHER -->


            </div>
          </div>
        </div>
      </div>
    </div>
</section>