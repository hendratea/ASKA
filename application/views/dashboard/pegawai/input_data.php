<!-- Main Content -->
<section class="content">
  <?php $this->load->view($headerView); ?>
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="body">
            <div class="row clearfix">

              <div class="col-lg-12 col-md-6">
                <div class="loader col-sm-12" id="loader_process"
                  style="padding-bottom:20px;padding-left:0px; display:none">
                  <img src="<?= base_url() ?>assets/template/images/gif/loading.gif">
                </div>
              </div>

              <div class="col-lg-12 col-md-6" style="border:0px solid red">
                <label>Photo Pegawai</label>
                <div class="form-group">
                  <a href="profile.html">
                    <img id="modify_img" src="<?= base_url() ?>assets/picture_profiles/default_avatar.png"
                      class="rounded-circle shadow " alt="profile-image" height="100" width="100">
                  </a>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <input type="file" name="file_avatar" class="form-control" accept="image/*" id="change_img">
                    <input type="hidden" id="imagePath" value=""/>
                  </div>
                  <div class="col-lg-3">
                    <button class="btn btn-danger" id="btnCancelPhoto">Cancel Photo</button>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-12">
                &nbsp
              </div>

              <div class="col-lg-4 col-md-6">
                <label>ID Pegawai</label>
                <div class="input-group masked-input">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                  </div>
                  <input 
                    value="<?= (isset($valIdPegawai) ? $valIdPegawai : ''); ?>" 
                    id="idPegawai" 
                    name="idPegawai" 
                    type="text" 
                    class="form-control" 
                    disabled>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Nama Pegawai</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconNamaPegawai" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                  </div>
                  <input id="namaPegawai" name="namaPegawai" type="text" class="form-control">
                  <div id="msgErrNamaPegawai" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Jenis Kelamin</label>
                <div class="form-group-append">
                  <div class="radio inlineblock">
                    <input type="radio" name="jenisKelamin" id="laki-laki" class="with-gap" value="Laki-laki"
                      tabindex="2">
                    <label for="laki-laki">Laki-Laki</label>
                  </div>
                  <div class="radio inlineblock m-r-20">
                    <input type="radio" name="jenisKelamin" id="perempuan" class="with-gap" value="Perempuan"
                      tabindex="3">
                    <label for="perempuan">Perempuan</label>
                  </div>
                </div>
                <div id="msgErrJenisKelamin" class="col-sm-12"
                  style="font-size: 11px;font-style: italic;padding:0px;text-align:left;color:red">
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Tempat Lahir</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconTempatLahir" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                  </div>
                  <input id="tempatLahir" name="tempatLahir" type="text" class="form-control">
                  <div id="msgErrTempatLahir" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Tanggal Lahir <small>(dd/mm/yyyy)</small></label>
                <div class="input-group masked-input">
                  <div id="boxIconTanggalLahir" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                    onkeydown="return false"> -->
                  <input type="text" class="form-control date" id="tanggalLahir" name="tanggaLahir">
                  <div id="msgErrTanggalLahir" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Telepon</label>
                <div class="input-group">
                  <div id="boxIconTelepon" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-smartphone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="telepon" id="telepon">
                  <div id="msgErrTelepon" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Aktif Kerja</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconAktifKerja" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <select id="aktifKerja" class="form-control show-tick ms select2" data-placeholder="Select"
                    name="aktifKerja">
                    <option value="-"></option>
                    <!-- <option value="-"></option> -->
                    <?php
                    foreach ($listAktifKerja as $aktifKerja) { ?>
                      <option value="<?= $aktifKerja->ID ?>"><?= $aktifKerja->status ?></option>
                    <?php } ?>
                  </select>
                  <div id="msgErrAktifKerja" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Pendidikan</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconPendidikan" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <select id="pendidikan" class="form-control show-tick ms select2" data-placeholder="Select"
                    name="pendidikan">
                    <option value="-"></option>
                    <!-- <option value="-"></option> -->
                    <?php
                    foreach ($listPendidikan as $pendidikan) { ?>
                      <option value="<?= $pendidikan->ID ?>"><?= $pendidikan->status ?></option>
                    <?php } ?>
                  </select>
                  <div id="msgErrPendidikan" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Alamat</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconAlamat" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-google-maps"></i></span>
                  </div>
                  <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                  <div id="msgErrAlamat" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>WNI</label>
                <div class="form-group-append">
                  <div id="yaWni" class="radio inlineblock m-r-20" >
                    <input type="radio" name="statusWni" id="ya" class="with-gap" value="Y" tabindex="2">
                    <label for="ya">YA</label>
                  </div>
                  <div id="tidakWni" class="radio inlineblock" >
                    <input type="radio" name="statusWni" id="tidak" class="with-gap" value="N" tabindex="3">
                    <label for="tidak">TIDAK</label>
                  </div>
                  <div id="msgErrStatusWni" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:left;color:red">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>No Paspor</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconTelepon" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-assignment-account"></i></span>
                  </div>
                  <input type="text" class="form-control" name="noPasspor" id="noPasspor">
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Jenis Paspor</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconTelepon" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <select id="jnsPaspor" class="form-control show-tick ms select2" data-placeholder="Select"
                    name="jnsPaspor">
                    <option value="-"></option>
                    <option value="biasa">Biasa</option>
                    <option value="dinas">Dinas</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Tanggal Laku Paspor <small>(dd/mm/yyyy)</small></label>
                <div class="input-group  masked-input">
                  <div id="boxIconTanggalLahir" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                    onkeydown="return false"> -->
                  <input type="text" class="form-control date" id="tglLakuPaspor" name="tglLakuPaspor">
                  <div id="msgErrTanggalLahir" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Tanggal Izin Paspor <small>(dd/mm/yyyy)</small></label>
                <div class="input-group  masked-input">
                  <div id="boxIconTanggalLahir" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                  </div>
                  <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                    onkeydown="return false"> -->
                  <input type="text" class="form-control date" id="tglIzinPaspor" name="tglIzinPaspor">
                  <div id="msgErrTanggalLahir" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
 
              <div class="col-lg-12 col-md-12">
                &nbsp
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Status Karyawan</label>
                <div class="form-group-append">
                  <div id="showDetailPns" class="radio inlineblock m-r-20" data-toggle="collapse"
                    data-target="#collapsePns">
                    <input type="radio" name="statusKaryawan" id="pns" class="with-gap" value="Y" tabindex="2">
                    <label for="pns">PNS</label>
                  </div>
                  <div id="showDetailNonPns" class="radio inlineblock" data-toggle="collapse"
                    data-target="#collapseNonPns">
                    <input type="radio" name="statusKaryawan" id="nonPns" class="with-gap" value="N" tabindex="3">
                    <label for="nonPns">Non PNS</label>
                  </div>
                  <div id="msgStatusPns" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:left;color:red">
                  </div>
                </div>
                
              </div>
              <div class="col-lg-4 col-md-12">
                <button id="btnSubmit" type="button" class="btn btn-primary" style="font-size:13px"><i
                      class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                  <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalConfSaveDataPegawai">Submit</button> -->
                <button class="btn btn-danger" id="btnReset">Reset</button>  
              </div>
          

              <div class="col-lg-12 col-md-6">
                <div class="collapse" id="collapsePns">
                  <div class="card">
                    <label for="category_det_to_excel">
                      PNS
                    </label>
                    <hr style="border: 1px solid grey;margin-top:0px">
                    <div class="row clearfix">
                      <div class="col-lg-4 col-md-12">
                        <label>Golongan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-accounts-alt"></i></span>
                          </div>
                          <select id="rGolongan" class="form-control show-tick ms select2" data-placeholder="Select"
                            name="rGolongan">
                            <option value="-"></option>
                            <?php
                            foreach ($listGolongan as $golongan) { ?>
                              <option value="<?= $golongan->ID ?>"><?= $golongan->status ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label>NIP</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                          </div>
                          <input name="nip" id="nip" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label>Tgl Terima Jabatan</label>
                        <div class="input-group  masked-input">
                          <div id="boxIconTanggalLahir" class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                          </div>
                          <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                            onkeydown="return false"> -->
                          <input type="text" class="form-control date" name="tglTerimaJabatan" id="tglTerimaJabatan">
                          <div id="msgErrTanggalLahir" class="col-sm-12"
                            style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        &nbsp
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Tgl Gelar Diplomatik</label>
                        <div class="input-group  masked-input">
                          <div id="boxIconTanggalLahir" class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                          </div>
                          <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                            onkeydown="return false"> -->
                          <input type="text" class="form-control date" name="tglGelarDiplomatik" id="tglGelarDiplomatik">
                          <div id="msgErrTanggalLahir" class="col-sm-12"
                            style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="collapse" id="collapseNonPns">
                  <div class="card">
                    <label for="category_det_to_excel">
                      Non PNS
                    </label>
                    <hr style="border: 1px solid grey;margin-top:0px">
                    <div class="row clearfix">
                      <div class="col-lg-3 col-md-6">
                        <label>Status Kerja</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-assignment-check"></i></span>
                          </div>
                          <select id="rStatusKerja" class="form-control show-tick ms select2" data-placeholder="Select"
                            name="rStatusKerja">
                            <option value="-"></option>
                            <?php
                            foreach ($listStatusKerja as $statusKerja) { ?>
                              <option value="<?= $statusKerja->ID ?>"><?= $statusKerja->status ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Tugas Kerja</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-badge-check"></i></span>
                          </div>
                          <select id="rTugasKerja" class="form-control show-tick ms select2" data-placeholder="Select"
                            name="rTugasKerja">
                            <option value="-"></option>
                            <?php
                            foreach ($listTugasKerja as $tugasKerja) { ?>
                              <option value="<?= $tugasKerja->ID ?>"><?= $tugasKerja->status ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Fungsi Kerja</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-badge-check"></i></span>
                          </div>
                          <select id="rFungsiKerja" class="form-control show-tick ms select2" data-placeholder="Select"
                            name="rFungsiKerja">
                            <option value="-"></option>
                            <?php
                            foreach ($listFungsiKerja as $fungsiKerja) { ?>
                              <option value="<?= $fungsiKerja->ID ?>"><?= $fungsiKerja->status ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Tgl Masuk Kerja</label>
                        <div class="input-group  masked-input">
                          <div id="boxIconTanggalLahir" class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                          </div>
                          <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                            onkeydown="return false"> -->
                          <input type="text" class="form-control date" id="tglMasukKerja" name="tglMasukKerja">
                          <div id="msgErrTanggalLahir" class="col-sm-12"
                            style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        &nbsp
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Awal Kontrak</label>
                        <div class="input-group  masked-input">
                          <div id="boxIconTanggalLahir" class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                          </div>
                          <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                            onkeydown="return false"> -->
                          <input type="text" class="form-control date" id="tglAwalKontrak" name="tglAwalKontrak">
                          <div id="msgErrTanggalLahir" class="col-sm-12"
                            style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>Akhir Kontrak</label>
                        <div class="input-group  masked-input">
                          <div id="boxIconTanggalLahir" class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                          </div>
                          <!-- <input type="text" class="form-control tanggalPicker" name="tanggalLahir" id="tanggalLahir"
                            onkeydown="return false"> -->
                          <input type="text" class="form-control date" id="tglAkhirKontrak" name="tglAkhirKontrak">
                          <div id="msgErrTanggalLahir" class="col-sm-12"
                            style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>No Kontrak</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-pin-assistant"></i></span>
                          </div>
                          <input name="noKontrak" id="noKontrak" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>No Rekening</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-money"></i></span>
                          </div>
                          <input name="noRekening" id="noRekening" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        &nbsp
                      </div>
                      <div class="col-lg-3 col-md-6">
                        <label>No EPF</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-ticket-star"></i></span>
                          </div>
                          <input name="noEpf" id="noEpf" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->
                </div>
                <!-- <div class="col-lg-12 col-md-6"> -->
                <!-- <button type="button" class="btn btn-primary" style="font-size:13px" data-toggle="modal" data-target="#modalConfSaveDataPegawai"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button> -->
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalConfSaveDataPegawai">Submit</button> -->
                <!-- <button class="btn btn-danger" id="btnReset">Reset</button> -->
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


<!-- Modal Confirmation Export Data -->
<div class="modal fade" id="modalConfSaveDataPegawai" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h7 class="modal-title">Simpan Data Pegawai</h7>
      </div>
      <div class="modal-body" style="padding-top:0px">
        <hr style="border-bottom:0px solid grey;padding-top:0px">
        <span>Anda yakin ingin menyimpan data pegwai ini ?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"
            aria-hidden="true"></i> NO</button>
        <button onclick="save_data_pegawai()" id="btnSubmitDataPegawai" type="button" class="btn btn-primary"
          data-dismiss="modal"><i class="fa fa-check" aria-hidden="true"></i> YES</button>
      </div>
    </div>
  </div>
</div>


