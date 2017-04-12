<?=my_msj_alert($this->session->flashdata('msg_tipo'), $this->session->flashdata('msg_titulo'), $this->session->flashdata('msg_texto'));?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <?=$title_ppal;?> <small> <?=$title_subt;?></small> </h3>
              </div>
              <div class="title_right hidden-xs">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clientes <small>Clientes registrados</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!--<table class="table">-->
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Rut</th>                          
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Email</th>
                          <th>Opción</th>
                        </tr>
                      </thead>
                      <tbody>
      			            <?php
      			              foreach ( $user as $query ) { 
      			            ?>
                        <tr>
                          <td><?php echo $query->id;  ?></td>
                          <td><?php echo $query->rut;  ?></td>
                          <td><?php echo $query->name;  ?></td>
                          <td><?php echo $query->ap_paterno;  ?></td>                          
                          <td><?php echo $query->email;  ?></td>
                          <td>
                       		<?=anchor('admin/customers/edit/'.$query->id,'<i class="glyphicon glyphicon-edit"></i> Editar',array('class' => 'btn btn-success btn-xs','title' => 'Editar información cliente'));?>
                       		<?=anchor('admin/customers/delete/'.$query->id,'<i class="glyphicon glyphicon-trash"></i> Quitar',array('class' => 'btn btn-danger btn-xs','title' => 'Quitar cliente'));?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                    <div class="form-group">
                      <?=anchor('admin/user/create','<i class="glyphicon glyphicon-edit"></i> '.$title_btn_submit,array('class' => 'btn btn-success','title' => $title_btn_submit));?> 
                    </div>                  
                </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>