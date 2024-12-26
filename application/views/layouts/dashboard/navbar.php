<!---------------------------- area Left NavBar ---------------------------->
<aside id="leftsidebar" class="sidebar">
  <div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href="<?= base_url() ?>copyright">
      <img src="<?= base_url() ?>assets/template/images/KJRI.png" height="30" width="30" alt="ASKA">
      <span class="m-l-10">
        <p1
          style="text-shadow: 2px 1px #214a80;font-size: large;font-weight: bold;color: rgb(131,139,209); vertical-align : middle; text-decoration: underline;">
          <span class="text-primary pulse animated infinite">
            <strong>ASKA</strong>
          </span>
        </p1>
      </span>
    </a>
  </div>
  <div class="menu">
    <ul class="list">
      <li>
        <div class="user-info">
          <a class="image" href="#"><img
              src="<?= base_url() . 'assets/picture_profiles/' . $this->session->userdata('logged_picture_profile'); ?>"
              class="rounded-circle" alt="User"></a>
          <div class="detail">
            <small><strong><ins><?= $this->session->userdata('logged_full_name'); ?></ins></strong></small><br>
            <small><?= $this->session->userdata('logged_role_name'); ?></small>
          </div>
        </div>
      </li>

      <?php
      $beforeIdMenu = 1;
      $beforeCategory = '';
      foreach ($this->session->userdata('listAccessMenu') as $accessMenu) {

        // // $arrMenu = explode(" - ",$accessMenu);
        // switch (true) {
        //     case $accessMenu[2] == 1:
        //         echo '<li title="'.$accessMenu[1].'" class="active open"><a href="' . base_url() . $accessMenu[5] . '"><i class="'.$accessMenu[4].'"></i><span>'.$accessMenu[1].'</span></a></li>';
        //         break;
        //     case $accessMenu[2] > 1:
        //         if($beforeCategory != $accessMenu[0] && $accessMenu[3] != $beforeIdMenu){
        //             echo '</ul></li>';
        //         }
        //         if($accessMenu[3] == 1 && $accessMenu[6] == 1){
        //             echo '<li><a href="javascript:void(0);" class="menu-toggle"><i class="'.$accessMenu[4].'"></i><span>'.$accessMenu[0].'</span></a><ul class="ml-menu">
        //                   <li title="'.$accessMenu[1].'"><a href="' . base_url() . $accessMenu[5] . '">'.$accessMenu[1].'</a></li></ul>';
        //         }else if($accessMenu[3] == 1 && $accessMenu[6] != 1){
        //             echo '<li><a href="javascript:void(0);" class="menu-toggle"><i class="'.$accessMenu[4].'"></i><span>'.$accessMenu[0].'</span></a><ul class="ml-menu">
        //                   <li title="'.$accessMenu[1].'"><a href="' . base_url() . $accessMenu[5] . '">'.$accessMenu[1].'</a></li>';
        //         }
        //         else{
        //             // echo '<li><a href="' . base_url() . 'admin_card/generatepin">' . $get_menu_home[1] . '</a></li>';
        //             echo '<li title="'.$accessMenu[1].'"><a href="' . base_url() . $accessMenu[5] . '">'.$accessMenu[1].'</a></li>';
        //             if($accessMenu[3] == 3 and $accessMenu[2] > 3 and $accessMenu[6] > 3){
        //                 echo '<hr>';
        //             }
        //         }
        //         $beforeIdMenu = $accessMenu[3];
        //         $beforeCategory = $accessMenu[0];
        //         break;
        // }
        if ($accessMenu[7] == 1) {

          switch (true) {
            case $accessMenu[2] == 1:
              echo '<li title="' . $accessMenu[1] . '" class=""><a href="' . base_url() . $accessMenu[5] . '"><i class="' . $accessMenu[4] . '"></i><span>' . $accessMenu[1] . '</span></a></li>';
              break;
            case $accessMenu[2] > 1:
              if ($accessMenu[0] != $beforeCategory && $beforeCategory != "") {
                echo '</ul></li>';
              }
              if ($accessMenu[3] == 1) {
                echo '<li active open><a href="javascript:void(0);" class="menu-toggle"><i class="' . $accessMenu[4] . '"></i><span>' . $accessMenu[0] . '</span></a><ul class="ml-menu">
                          <li title="' . $accessMenu[1] . '"><a href="' . base_url() . $accessMenu[5] . '">' . $accessMenu[1] . '</a></li>';
              } else {
                // echo '<li><a href="' . base_url() . 'admin_card/generatepin">' . $get_menu_home[1] . '</a></li>';
                echo '<li title="' . $accessMenu[1] . '"><a href="' . base_url() . $accessMenu[5] . '">' . $accessMenu[1] . '</a></li>';
                // if($accessMenu[3] == 3 and $accessMenu[2] > 3 and $accessMenu[6] > 3){
                //     echo '<hr>';
                // }
              }
              $beforeIdMenu = $accessMenu[3];
              $beforeCategory = $accessMenu[0];
              break;
          }
        }

      }
      echo '</ul></li>';
      ?>
      <li title="Sign Out"><a href="<?= base_url(); ?>signout"><i class="zmdi zmdi-power"></i><span>Sign Out</span></a>
      </li>
    </ul>
  </div>
</aside>