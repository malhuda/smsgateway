 <aside class="sidebar sidebar-left sidebar-menu">
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li  class="active open">
                        <a href="<?php echo base_url(); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-home"></i></span>
                            <span class="text">DASHBOARD</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("new_message"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-pencil"></i></span>
                            <span class="text">NEW MESSAGE</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url("inbox"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-files"></i></span>
                            <span class="text">INBOX</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("outbox"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-files"></i></span>
                            <span class="text">OUTBOX</span>
                        </a>
                    </li>
                      <li>
                        <a href="<?php echo base_url("sent"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-files"></i></span>
                            <span class="text">SENT ITEMS</span>
                        </a>
                    </li><li>
                        <a href="<?php echo base_url("contact_person_adb"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-group"></i></span>
                            <span class="text">CONTACT PERSON ADB </span>
                        </a>
                    </li><li>
                        <a href="<?php echo base_url("format_broadcast"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-files"></i></span>
                            <span class="text">FORMAT SMS GATEWAY </span>
                        </a>
                    </li><li>
                        <a href="<?php echo base_url("auto_replay"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-refresh"></i></span>
                            <span class="text">AUTO REPLAY </span>
                        </a>
                    </li><li>
                        <a href="<?php echo base_url("login/logout"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');">
                            <span class="figure"><i class="ico-key"></i></span>
                            <span class="text">LOGOUT</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>