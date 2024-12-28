<section class="content">
  <?php $this->load->view($headerView); ?>
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body">
            <div class="table-responsive" style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;width:100%">
              <table class="table table-bordered table-striped table-hover nowrap" id="dt_rekap_all" width="100%">
                <thead>
                  <tr>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tindakan</th>
                    <th width="03%" style="text-align: center;vertical-align : middle;">Photo</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">ID_Pegawai</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Nama</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tmp_Lahir</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tgl_Lahir</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Status</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Pendidikan</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">PNS</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">WNI</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Jenis_Kelamin</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Alamat</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Telepon</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Jenis_Paspor</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">No_Paspor</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Berlaku_Paspor</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Ijin_Paspor</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Jabatan</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">NIP</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">TMT</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Gelar_Diplomatik</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Status_Kerja</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tugas_Kerja</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Fungsi_Kerja</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tgl_Masuk_Kontrak</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tgl_Awal_Kontrak</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">Tgl_Akhir_Kontrak</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">No_Kontrak</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">No_Rekening</th>
                    <th width="10%" style="text-align: center;vertical-align : middle;">No_EPF</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              
              <!-- <div class="aniimated-thumbnials">
                <a href="assets/template/images/image-gallery/1.jpg"> <img class="img-fluid img-thumbnail avatar w30" src="assets/template/images/image-gallery/1.jpg" alt=""></a>
              </div> -->
              <div class="lightgallery" style="display:none"> <a class="atest" href="http://localhost/aska/assets/template/images/image-gallery/2.jpg"> <img class="img-fluid img-thumbnail avatar w30 imgtest" src="http://localhost/aska/assets/template/images/image-gallery/2.jpg" alt=""></a></div>
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <div id="imageModal">
    <img id="modalImage" src="" alt="Preview">
    <button onclick="document.getElementById('imageModal').style.display='none';">Close</button>
</div> -->

<div class="modal fade" id="detailPegawaiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border:0px solid red;padding-bottom:0px">
                <h4 class="title" id="detailPegawaiModalLabel">
                    Info Detail Pegawai - <span id="labelNamaPegawai"></span>
                    <hr style="border-bottom:0px solid grey">
                </h4>  
            </div>
            
            <div class="modal-body" style="border:0px solid red; padding-top:0px"> 
            
              <div class="row clearfix" style="border:0px solid red">
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">ID Pegawai: </small>
                  <p id="detIdPegawai"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Nama: </small>
                  <p id="detNama"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Tempat Lahir: </small>
                  <p id="detTempatLahir"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Tanggal Lahir: </small>
                  <p id="detTanggalLahir"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Status: </small>
                  <p id="detStatus"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Pendidikan: </small>
                  <p id="detPendidikan"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">PNS: </small>
                  <p id="detPns"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">WNI: </small>
                  <p id="detWni"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Jenis Kelamin: </small>
                  <p id="detJenisKelamin"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Alamat: </small>
                  <p id="detAlamat"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Telepon: </small>
                  <p id="detTelepon"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Jenis Paspor: </small>
                  <p id="detJenisPaspor"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">No Paspor: </small>
                  <p id="detNoPaspor"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Berlaku Paspor: </small>
                  <p id="detBerlakuPaspor"></p>
                </div>
                <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Berlaku Paspor: </small>
                  <p id="detIjinPaspor"></p>
                </div>
              </div>


              <div class="row clearfix" style="border:0px solid red" id="boxPns">

                <div class="col-lg-12 col-md-6">
                  <small class="text-muted">PNS</small>
                  <hr>
                </div>  
              
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Golongan: </small>
                  <p id="detJabatan" style="word-break: break-all"></p>
                </div>

                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">NIP: </small>
                  <p id="detNip"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Tgl Terima Jabatan: </small>
                  <p id="detTmt" style="word-break: break-all"></p>
                </div>

                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Tgl Gelar Diplomatik: </small>
                  <p id="detGelarDiplomatik"></p>
                </div>

              </div>

              <div class="row clearfix" style="border:0px solid red" id="boxNonPns">

                <div class="col-lg-12 col-md-6">
                  <small class="text-muted">Non PNS</small>
                  <hr>
                </div>  
              
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Status Kerja: </small>
                  <p id="detStatusKerja" style="word-break: break-all"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Tugas Kerja: </small>
                  <p id="detTugasKerja"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Fungsi Kerja: </small>
                  <p id="detFungsiKerja" style="word-break: break-all"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Tgl Masuk Kerja: </small>
                  <p id="detTglMasukKontrak"></p>
                </div>

                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Awal Kontrak: </small>
                  <p id="detTglAwalKontrak" style="word-break: break-all"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">Akhir Kontrak: </small>
                  <p id="detAkhirKontrak"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">No Kontrak: </small>
                  <p id="detNoKontrak" style="word-break: break-all"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">No Rekening: </small>
                  <p id="detNoRekening"></p>
                </div>
                <div class="col-lg-3 col-md-6">
                  <small class="text-muted">No EPF: </small>
                  <p id="detNoEpf"></p>
                </div>

              </div>
                <!-- <div class="row clearfix">
                  <small class="text-muted">PNS</small>
                  <hr>

                  <div class="col-lg-2 col-md-6">
                  <small class="text-muted">Golongan: </small>
                  <p id="detJabatan"></p>
                  </div>

                  <div class="col-lg-2 col-md-6">
                    <small class="text-muted">NIP: </small>
                    <p id="detNip"></p>
                  </div>

                </div> -->



                <div class="col-lg-12 col-md-6">
                  <small class="text-muted">Photo: </small>
                  <p>
                    <a href="#">
                      <img id="detPhoto" src=""
                        class="rounded-circle shadow " alt="profile-image" height="100" width="100">
                    </a>
                  </p>
                </div>
              

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button> -->
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>                         

                            
