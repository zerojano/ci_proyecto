<?php
$rut = array('maxlength'=>'15','name' =>'rut','id'=>'rut','required'=>'required','class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Ingresar rut','value'=>$factory->rut);
$name = array('maxlength'=>'100','name'=>'name','id'=>'name','class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Ingresar nombre','value'=>$factory->name );
$name_short = array('maxlength'=>'100','name'=>'name_corto','id'=>'name_corto','class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Ingresar nombre corto','value'=>$factory->name_corto );
$dropdown_atributos = array('class'=>'form-control');
$submit = array('type'=>'submit','content'=>'<i class="glyphicon glyphicon-edit"></i> '.$title_btn_submit, 'name'=>'registro','id'=>'registro','class'=>'btn btn-success');
?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title_ppal;?></h3>
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
                    <h2><?=$title_form;?> <small>Ultima modificación realizada el <?=$mod_date_reg;?></small></h2><br>
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
                    <br />
                    <?= my_msj_alert($this->session->flashdata('msg_tipo'), $this->session->flashdata('msg_titulo'), $this->session->flashdata('msg_texto'));
                    ?>         
                    <?= my_validation_errors(validation_errors()); ?>     
                    <?= form_open_multipart('admin/factory/update', array("class"=>"form-horizontal form-label-left","id"=>"demo-form2","data-parsley-validate")); ?>

                      <input type="hidden" name="id" id="id" value="<?=$factory->id;?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input( $rut ); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre empresa<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input( $name ); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_corto">Nombre corto<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input( $name_short ); ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="giro">Giro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="giro" name="giro" required="required" class="form-control col-md-7 col-xs-12" value="<?=$factory->giro;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" value="<?=$factory->email;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Diección </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="direccion" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?=$factory->direccion;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="region" class="control-label col-md-3 col-sm-3 col-xs-12">Región </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_dropdown('regiones' ,$dropdown_list_regiones, $factory->region_id,'class="form-control col-md-7 col-xs-12" id=regiones');?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_f" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono fijo </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone_f" class="form-control col-md-7 col-xs-12" type="text" name="phone_f" value="<?=$factory->phone_f;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_m" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono movil </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone_m" class="form-control col-md-7 col-xs-12" type="text" name="phone_m" value="<?=$factory->phone_m;?>">
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?= anchor('admin/factory/view','<i class="glyphicon glyphicon-arrow-left"></i> '.$title_btn_previus,array('class'=>'btn btn-info')); ?>
                          <button class="btn btn-primary" type="reset">Limpiar</button>
                          <?= form_button( $submit ); ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>