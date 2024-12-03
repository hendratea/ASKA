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
              <div class="col-lg-4 col-md-6">
                <label>ID</label>
                <div class="input-group masked-input">
                  <div id="boxIconID" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                  </div>
                  <input id="ID" name="ID" type="text" class="form-control" readonly="readonly">
                  <div id="msgErrID" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Status</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconStatus" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <input id="status" name="status" type="text" class="form-control">
                  <div id="msgErrStatus" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <label>Aptln</label>
                <div class="input-group masked-input mb-3">
                  <div id="boxIconAptln" class="input-group-prepend">
                    <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                  </div>
                  <input id="aptln" name="aptln" type="text" class="form-control">
                  <div id="msgErrAptln" class="col-sm-12"
                    style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                </div>
              </div>

              <!-- BUTTON -->
              <div class="col-lg-12 col-md-6">
                <button id="btnUpdate" type="button" class="btn btn-warning" style="font-size:13px;display:none"><i
                    class="fa fa-paper-plane" aria-hidden="true"></i> Rubah</button>
                <button id="btnCancel" type="button" class="btn btn-danger" style="font-size:13px;display:none"><i
                    class="fa fa-undo" aria-hidden="true"></i> Batal</button>
                <button id="btnSubmit" type="button" class="btn btn-primary" style="font-size:13px"><i
                    class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                <button id="btnReset" type="button" class="btn btn-danger" style="font-size:13px"><i
                    class="fa fa-rotate-left" aria-hidden="true"></i> Kosongkan</button>
              </div>

              <!-- TABLE -->
              <div class="col-lg-12 col-md-6">
                <div class="table-responsive"
                  style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;width:100%;">
                  <table class="table table-bordered table-striped table-hover nowrap" id="dt_referensi_golongan"
                    width="100%">
                    <thead>
                      <tr>
                        <th width="05%" style="text-align: left;vertical-align : middle;">ID</th>
                        <th width="20%" style="text-align: left;vertical-align : middle;">Status</th>
                        <th width="25%" style="text-align: left;vertical-align : middle;">Aptln</th>
                        <th width="25%" style="text-align: left;vertical-align : middle;">Tindakan</th>
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
  </div>
</section>