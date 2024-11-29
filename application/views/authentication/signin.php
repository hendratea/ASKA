<?php
    $attributes = array(
        'name'          => 'login_form', 
        'id'            => 'myform', 
        'autocomplete'  => 'off', 
        'class'         => 'card auth_form',
        'style'         => 'border:0px solid red; margin-top: 30px; background-color: #1e2833'
    );
    echo form_open('/', $attributes);
    ?>
    <div class="header">
        <img class="logo" src="<?= base_url() ?>assets/template/images/logo.svg" alt="">
        <!-- <h5><?= $h5_title; ?></h5> -->
        <h6 class="text-center text-primary pulse animated infinite" style="text-shadow: 6px 3px #434a52;text-align: center;font-size: 64px;font-weight: bold;text-decoration: underline;">ASKA</h6>
        <h6 class="text-center" data-bss-hover-animate="swing" style="text-shadow: 2px 1px #214a80;font-size: large;font-weight: bold;color: rgb(131,139,209);">Administrasi Kepegawaian</h6>
    </div>
    <div class="body">
        <?php
        $flashMessage = $this->session->flashdata('msgValidation');
        if (isset($flashMessage)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Failed </strong> <?= !empty($flashMessage) ? $flashMessage : ''; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                </button>
            </div>
        <?php } ?>

        <div class="input-group mb-3">
            <div class="input-group-append">
                <span Usernama class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="User ID" name="username" id="txtusername" tabindex="1" 
            autofocus value="<?= set_value('v_username', isset($default['v_username']) ? $default['v_username'] : ''); ?>">
            <?= form_error('username', '<div class="input-group" style="height:20px"><label id="name-error" class="error" for="name" 
            style="color: red;">', '</label></div>'); ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password">
                <i class="zmdi zmdi-lock"></i></a></span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password" id="v_pass" tabindex="2" 
            value="<?= set_value('v_password', isset($default['v_password']) ? $default['v_password'] : ''); ?>">
            <!-- <span toggle="#v_pass" class="fa fa-fw fa-eye field-icon-log toggle-password"></span> -->
            <div class="input-group message" style="color: red;"></div>
            <?= form_error('password', '<div class="input-group" style="height:20px"><label id="name-error" class="error" for="name" style="color: red;">', '</label></div>'); ?>
        </div>

        <input type="hidden" name="v_submit_login" id="submit_login_temp" />
        <input type="submit" name="submit_login" id="submit_login" style="display: none;" />

        <a href="javascript: $('#submit_login_temp').val('posting'); $('#myform').submit();" 
        class="btn btn-primary btn-block waves-effect waves-light" data-bss-hover-animate="rubberBand"
        style="text-shadow: 2px 1px #214a80;font-size: large;font-weight: bold;"
        >MASUK</a>

        <div class="row px-3 mb-4">
            <a href="<?= base_url(); ?>forgot_password" class="ml-auto mb-0 text-sm" data-bss-hover-animate="shake">Lupa Password?</a>
        </div>
    </div>
    </form>