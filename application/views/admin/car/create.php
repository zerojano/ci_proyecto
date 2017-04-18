<?php
  $patente = array('maxlength' => '6', 'name' => 'patente', 'id' => 'patente', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar patente', 'autofocus' => 'autofocus', 'value' => set_value('patente') );
  $model = array('maxlength' => '100', 'name' => 'model', 'id' => 'model', 'class' => 'form-control', 'placeholder' => 'Ingresar modelo', 'value' => set_value('model') );
  $value = array('maxlength' => '100', 'name' => 'value', 'id' => 'value', 'class' => 'form-control', 'placeholder' => 'Ingresar valor', 'value' => set_value('value') );
  $gastos = array('maxlength' => '100', 'name' => 'gastos', 'id' => 'gastos', 'class' => 'form-control', 'placeholder' => 'Ingresar gastos', 'value' => set_value('gastos') );
  $total = array('maxlength' => '100', 'name' => 'total', 'id' => 'total', 'class' => 'form-control', 'placeholder' => 'Ingresar total', 'value' => set_value('total') );
  $options = array('0' => 'Seleccionar tipo', '1' => 'Administrador', '2' => 'Operador', );
  //$imagen = array('type'=>'file', 'name'=>'imagen', 'id'=>'imagen','class'=>'form-control', 'data-show-upload'=>'false', 'data-preview-file-type'=>'any');
  $submit = array('type' => 'submit', 'content' => '<i class="fa fa-plus" aria-hidden="true"></i> '.$title_btn_submit, 'name' => 'registro', 'id' => 'registro', 'class' => 'btn btn-success', );
?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <h3> <?=$title_ppal;?> <small> <?=$title_subt;?></small></h3>
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
                    <h2>Nuevo automovil<small>registro de nuevo automovil</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                         <!-- <li><a href="#">Settings 1</a>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <?= form_label('Tipo <span class="required">*</span>', 'tipo',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_dropdown('tipo' ,$dropdown_list_type, '0','class="form-control col-md-7 col-xs-12" id="tipo"');?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Patente <span class="required">*</span>', 'patente',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($patente) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Marca <span class="required">*</span>', 'marca',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_dropdown('marca' ,$dropdown_list_brand, '0','class="form-control col-md-7 col-xs-12" id="marca"');?>
                        </div>
                      </div>                      

                      <div class="form-group">
                        <?= form_label('Modelo <span class="required">*</span>', 'modelo',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($model) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Año <span class="required">*</span>', 'year',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_dropdown('year' ,$dropdown_list_year, '0','class="form-control col-md-7 col-xs-12" id="year"');?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Valor <span class="required">*</span>', 'valor',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($value) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Gastos <span class="required">*</span>', 'gastos',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($gastos) ?>
                        </div>

                      <div class="form-group">
                        <?= form_label('Total <span class="required">*</span>', 'total',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($total) ?>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?= anchor('admin/car/view','<i class="glyphicon glyphicon-arrow-left"></i> Volver',array('class'=>'btn btn-info')); ?>
                          <?= form_button( $submit ); ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>