<?php
header("Expires: Thu, 12 Dic 1981 08:34:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP CI NO | Example</title>
    <!-- Bootstrap -->
    <link href="<?=base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('public/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('public/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url('public/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
	    <!-- bootstrap-progressbar -->
    <link href="<?=base_url('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url('public/vendors/jqvmap/dist/jqvmap.min.css');?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url('public/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=base_url('public/css/custom.min.css');?>" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?=base_url('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">
    
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
<?php if ($this->input->ip_address() <> '146.83.222.25') { ?>      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Nomade</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?=$this->session->userdata('name').' '.$this->session->userdata('apellidos')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <?php 
            //if($this->session->userdata('firstname')){
              if ($this->input->ip_address() <> '146.83.222.25') {
                echo menu_ppal(); 
              }
                       
            //}
            ?>  
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('login/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt=""><?=$this->session->userdata('name').' '.$this->session->userdata('apellidos')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('perfil/index');?>"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuración</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="<?=base_url('login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt="Profile Image" /></span>
                        <span>
                          <span>Alejandro Aguayo</span>
                          <span class="time">3 min ago</span>
                        </span>
                        <span class="message">
                          Nuevo mensaje...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt="Profile Image" /></span>
                        <span>
                          <span>Alejandro Aguayo</span>
                          <span class="time">3 min ago</span>
                        </span>
                        <span class="message">
                          Nuevo mensaje...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt="Profile Image" /></span>
                        <span>
                          <span>Alejandro Aguayo</span>
                          <span class="time">3 min ago</span>
                        </span>
                        <span class="message">
                          Nuevo mensaje...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url($this->session->userdata('img_avatar'))?>" alt="Profile Image" /></span>
                        <span>
                          <span>Alejandro Aguayo</span>
                          <span class="time">3 min ago</span>
                        </span>
                        <span class="message">
                          Nuevo mensaje...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todas las alertas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
<?php } ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <?php
            $this->load->view($contenido);
          ?>
        </div>
        <!-- /page content -->
<?php if ($this->input->ip_address() <> '146.83.222.25') { ?>  
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2017 <a href="http://www.Infoplan.cl">www.Infoplan.cl</a> - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
<?php } ?>
      </div>
      
    </div>

    <!-- jQuery -->
    <script src="<?=base_url('public/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('public/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('public/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('public/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js -->
    <script src="<?=base_url('public/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- gauge.js -->
    <script src="<?=base_url('public/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?=base_url('public/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?=base_url('public/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?=base_url('public/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?=base_url('public/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?=base_url('public/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?=base_url('public/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?=base_url('public/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?=base_url('public/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <!-- DateJS -->
    <script src="<?=base_url('public/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?=base_url('public/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?=base_url('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?=base_url('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('public/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('public/js/custom.min.js');?>"></script>



    <!-- Datatables -->
    <script src="<?=base_url('public/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?=base_url('public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>


    <script src="<?=base_url('public/vendors/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?=base_url('public/vendors/pdfmake/build/vfs_fonts.js');?>"></script>


  </body>
</html>
