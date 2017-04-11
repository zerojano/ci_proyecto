<?php
  $rut = array('maxlength' => '20', 'name' => 'rut', 'id' => 'rut', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar rut', 'autofocus' => 'autofocus', 'value' => set_value('rut') );
  $username = array('maxlength' => '20', 'name' => 'username', 'id' => 'username', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar nombre de usuario', 'value' => set_value('username') );   
  $nombre = array('maxlength' => '100', 'name' => 'name', 'id' => 'name', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar nombre', 'value' => set_value('nombre') ); 
  $apellidos = array('maxlength' => '100', 'name' => 'apellidos', 'id' => 'apellidos', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar apellidos', 'value' => set_value('apellidos') ); 
  //$telefono = array('maxlength' => '9', 'name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Ingresar teléfono', 'value' => set_value('telefono') ); 
  //$direccion = array('maxlength' => '50', 'name'  => 'direccion', 'id' => 'direccion', 'class' => 'form-control', 'placeholder' => 'Ingresar dirección', 'value' => set_value('direccion') ); 
  $email = array('maxlength' => '100', 'type' => 'email', 'name'  => 'email', 'id' => 'email', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar e-mail usuario', 'value' => set_value('email') ); 
  //$cargo = array('maxlength' => '100', 'name' => 'cargo', 'id' => 'cargo', 'class' => 'form-control', 'placeholder' => 'Ingresar cargo', 'value' => set_value('cargo') );
  //$clave = array('maxlength' => '6', 'type'  => 'password', 'name'  => 'clave', 'id' => 'clave', 'placeholder' => 'Ingresar clave', 'class' => 'form-control', 'value' => ''); 
  //$claveconf = array('maxlength' => '6', 'type'  => 'password', 'name'  => 'claveconf', 'id' => 'claveconf', 'placeholder' => 'Ingresar verificación de contraseña', 'class' => 'form-control', ); 
  $options = array('0' => 'Seleccionar tipo', '1' => 'Administrador', '2' => 'Operador', ); 
  $imagen = array('type'=>'file', 'name'=>'imagen', 'id'=>'imagen','class'=>'form-control', 'data-show-upload'=>'false', 'data-preview-file-type'=>'any');
  $submit = array('type' => 'submit', 'content' => '<i class="fa fa-plus" aria-hidden="true"></i> Agregar usuario', 'name' => 'registro', 'id' => 'registro', 'class' => 'btn btn-success', ); 
?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title;?></h3>
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
                    <h2>Nuevo usuario<small>registro de nuevo usuario</small></h2>
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
                    <br />
                    <?= form_open_multipart('admin/user/insert', array("class"=>"form-horizontal form-label-left","id"=>"demo-form2","data-parsley-validate")); ?>
                      <div class="form-group">
                        <?= form_label('Rut <span class="required">*</span>', 'rut',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_input($rut) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Usuario <span class="required">*</span>', 'username',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_input($username) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Nombre <span class="required">*</span>', 'nombre',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_input($nombre) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Apellidos <span class="required">*</span>', 'apellidos',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_input($apellidos) ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <?= form_label('Email <span class="required">*</span>', 'email',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_input($email) ?>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?= anchor('admin/user/view','<i class="glyphicon glyphicon-arrow-left"></i> Volver',array('class'=>'btn btn-info')); ?>
                          <?= form_button( $submit ); ?>
                        </div>
                      </div>

                    <?=form_close();?>
                  </div>
                </div>
              </div>
            </div>

          </div>