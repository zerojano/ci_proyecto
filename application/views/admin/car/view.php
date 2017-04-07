          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title_ppal?></h3>
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
                    <h2>Stock Vehiculos <small>registro</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <!--<li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>-->
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Patente</th>
                          <th>Modelo</th>
                          <th>Año</th>
                          <th>Valor</th>
                          <th>Opción</th>
                        </tr>
                      </thead>
                      <tbody>
			            <?php
			              foreach ( $cars as $query ) { 
			            ?>
                        <tr>
                          <td><?php echo $query->patente;  ?></td>
                          <td><?php echo $query->model;  ?></td>
                          <td><?php echo $query->year;  ?></td>
                          <td align="right"><?php echo '$ '.number_format($query->value, 0,'.',' ');  ?></td>
                          <td>
                       		<?=anchor('admin/user/edit/'.$query->id,'<i class="glyphicon glyphicon-edit"></i> Editar',array('class' => 'btn btn-success btn-xs','title' => 'Editar información usuario'));?>
                       		<?=anchor('admin/user/delete/'.$query->id,'<i class="glyphicon glyphicon-trash"></i> Quitar',array('class' => 'btn btn-danger btn-xs','title' => 'Quitar usuario'));?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>

                    <div class="form-group">
						          <?=anchor('admin/user/create','<i class="glyphicon glyphicon-edit"></i> '.$title_btn,array('class' => 'btn btn-success','title' => $title_btn));?> 
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>