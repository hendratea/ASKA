<section class="content">
  <?php $this->load->view($headerView); ?>
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="body">
            <!-- Area Form Input -->
            <div class="row clearfix">
              <!-- Loader Progress -->
              <div class="col-lg-12 col-md-6">
                <div class="loader col-sm-12" id="loader_process"
                  style="padding-bottom:20px;padding-left:0px; display:none">
                  <img src="<?= base_url() ?>assets/template/images/gif/loading.gif">
                </div>
              </div>

              <!-- Form Input Data -->
              <!-- <div class="col-lg-4 col-md-6">
                                <label>ID</label>
                                <div class="input-group masked-input">
                                    <div id="boxIconIdGolongan" class="input-group-prepend" >
                                        <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                                    </div>
                                    <input id="idGolongan" name="idGolongan" type="text" class="form-control" readonly="readonly">
                                    <div id="msgErrIdGolongan" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                                </div>
                            </div> -->
              <div class="col-lg-6 col-md-6">
                <label>Nama Golongan</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconStatus" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                  </div>
                  <input id="status" name="status" type="text" class="form-control">
                  <div id="msgErrStatus" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <label>APTLN</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconAptln" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                  </div>
                  <input id="aptln" name="aptln" type="text" class="form-control">
                  <div id="msgErrAptln" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>

              <!-- Area Button Save -->
              <div class="col-lg-3 col-md-6">
                <button id="btnSubmit" type="button" class="btn btn-primary" style="font-size:13px"><i
                    class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                <button class="btn btn-danger" id="btnReset">Batal</button>
              </div>
            </div>
            <hr>
            <!-- Area Tabel -->
            <div class="row clearfix">
              <div class="col-lg-12 col-md-6">
                <div class="table-responsive"
                  style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;width:100%">
                  <table class="table table-bordered table-striped table-hover nowrap" id="dt_golongan" width="100%">
                    <thead>
                      <tr>
                        <th width="05%" style="text-align: left;vertical-align : middle;">ID</th>
                        <th width="45%" style="text-align: left;vertical-align : middle;">Nama Golongan</th>
                        <th width="25%" style="text-align: left;vertical-align : middle;">APTLN</th>
                        <th width="25%" style="text-align: left;vertical-align : middle;">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- Modal Confirmation Edit Data -->
<div class="modal fade" id="modal_edit_accounts" role="dialog" style="font-size: 12px;">
  <div class="modal-dialog modal-lg" role="document" style="font-size: 12px;border:0px solid red;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User Account</h5>
      </div>
      <div class="modal-body form" style="border: 0px solid red;padding-top: 0px">
        <form action="#" id="form_accounts" class="form-horizontal">
          <input type="hidden" value="" name="id" />
          <input type="hidden" value="" id="txt_status_lock" name="status_lock" />
          <div class="form-body">
            <div class="loader col-sm-12" id="loader_process" style="padding:0px">
              <img src="<?= base_url() ?>assets/template/images/gif/loading.gif">
            </div>
            <div class="alert alert-danger" role="alert" id="alertFailed" style="display:none">
              <span id="msgFailed"></span>
            </div>
            <hr>
            <div class="row clearfix">
              <div class="col-sm-4">
                <b>ID</b>
                <div class="form-group">
                  <input id="txtId" type="text" class="form-control" value="" disabled />
                </div>
              </div>
              <div class="col-sm-4">
                <b>Status</b>
                <div class="form-group">
                  <input id="txtStatus" type="text" class="form-control" value="" />
                </div>
              </div>
              <div class="col-sm-4">
                <b>APTLN</b>
                <div class="form-group">
                  <input id="txtAptln" type="text" class="form-control" value="" />
                </div>
              </div>
            </div>
            <hr>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <button type="button" id="btnSubmitUserAccount" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confirmation Save Data -->
<div class="modal fade" id="modalConfSaveDataGolongan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h7 class="modal-title">Simpan Data Golongan</h7>
      </div>
      <div class="modal-body" style="padding-top:0px">
        <hr style="border-bottom:0px solid grey;padding-top:0px">
        <span>Anda yakin ingin menyimpan data ini ?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fa fa-times" aria-hidden="true"></i>TIDAK
        </button>
        <button onclick="save_data_golongan()" id="btnSubmitDataGolongan" type="button" class="btn btn-primary"
          data-dismiss="modal">
          <i class="fa fa-check" aria-hidden="true"></i>IYA
        </button>
      </div>
    </div>
  </div>
</div>