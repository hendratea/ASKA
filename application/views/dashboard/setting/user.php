<section class="content">
    <?php $this->load->view($headerView); ?>
    <div class="container-fluid">
        <div class="row clearfix">
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">

                            <div class="col-lg-12 col-md-6">
                                <div class="loader col-sm-12" id="loader_process" style="padding-bottom:20px;padding-left:0px; display:none">
                                    <img src="<?= base_url() ?>assets/template/images/gif/loading.gif">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-6">
                                <label>User Id</label>
                                <div class="input-group masked-input">
                                    <div id="boxIconUserId" class="input-group-prepend" >
                                        <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                                    </div>
                                    <input id="userId" name="userId" type="text" class="form-control" >
                                    <div id="msgErrUserId" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>Password</label>
                                <div class="input-group masked-input mb-3">
                                    <div id="boxIconPassword" class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-key"></i></span>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control" >
                                    <div id="msgErrPassword" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                                </div>
                            </div>                          
                            <div class="col-lg-4 col-md-6">
                                <label>Email</label>
                                <div class="input-group masked-input mb-3">
                                    <div id="boxIconEmail" class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" name="email" type="text" class="form-control" >
                                    <div id="msgErrEmail" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>Role User</label>
                                <div class="input-group masked-input mb-3">
                                    <div id="boxRoleUser" class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-card"></i></span>
                                    </div>
                                    <select id="roleUser" class="form-control show-tick ms select2" data-placeholder="Select" name="roleUser">
                                        <!-- <option value="">All Issuer</option> -->
                                        <option value=""></option>
                                        <?php
                                        foreach ($listRoleUser as $listRole) { ?>
                                            <option value="<?= $listRole->id ?>"><?= $listRole->status ?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="msgErrRoleUser" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:right;color:red"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>ID Pegawai</label>
                                <div class="input-group masked-input mb-3">
                                    <div id="boxIconEmail" class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-account-box-mail"></i></span>
                                    </div>
                                    <select id="idPegawai" class="form-control show-tick ms select2" data-placeholder="Select" name="idPegawai">
                                        <option value="-"></option>
                                        <!-- <option value="-"></option> -->
                                        <?php
                                        foreach ($listIdPegawai as $idPegawai) { ?>
                                            <option value="<?= $idPegawai->IDPEG ?>"><?= $idPegawai->IDPEG ?> - <?= $idPegawai->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>Status Aktif</label>
                                <div class="form-group-append">
                                    <div class="radio inlineblock">
                                        <input type="radio" name="statusAktif" id="yes" class="with-gap" value="Y" tabindex="2">
                                        <label for="yes">Yes</label>
                                    </div>
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="statusAktif" id="no" class="with-gap" value="N" tabindex="3">
                                        <label for="no">No</label>
                                    </div>
                                </div>
                                <div id="msgErrStatusAktif" class="col-sm-12" style="font-size: 11px;font-style: italic;padding:0px;text-align:left;color:red"></div>
                            </div> 
                            <div class="col-lg-12 col-md-6">
                                <button id="btnUpdate" type="button" class="btn btn-warning" style="font-size:13px;display:none"><i class="fa fa-paper-plane" aria-hidden="true"></i> Update</button>
                                <button id="btnCancel" type="button" class="btn btn-danger" style="font-size:13px;display:none"><i class="fa fa-undo" aria-hidden="true"></i> Cancel</button>
                                <button id="btnSubmit" type="button" class="btn btn-primary" style="font-size:13px"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                <button class="btn btn-danger" id="btnReset"><i class="fa fa-rotate-left" aria-hidden="true"></i> Reset</button>
                                
                            </div> 
                            
                            <div class="col-lg-12 col-md-6">
                                <div class="table-responsive" style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;width:100%">
                                    <table class="table table-bordered table-striped table-hover nowrap"
                                        id="dt_setting_user" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="3%" style="text-align: center;vertical-align : middle;">User</th>
                                            <th width="20%" style="text-align: center;vertical-align : middle;">Email</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">Status Aktif</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">Role User</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">ID Pegawai</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">Tanggal Buat</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">Tanggal Login</th>
                                            <th width="25%" style="text-align: center;vertical-align : middle;">Actions</th>
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




