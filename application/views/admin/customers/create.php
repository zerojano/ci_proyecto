        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>  
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>  
        <script type="text/javascript">  
          $(document).ready(function() {  
                     $("#region").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url('admin/customers/ajax_ciudad');?>",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#ciudad").html(data);  
                     }  
                  });  
               });  
            });  
        </script>
        <script type="text/javascript">  
          $(document).ready(function() {  
                     $("#ciudad").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url('admin/customers/ajax_comunas');?>",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#comuna").html(data);  
                     }  
                  });  
               });  
            });  
        </script>
<?php
  $rut = array('maxlength' => '20', 'name' => 'rut', 'id' => 'rut', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Ingresar rut', 'autofocus' => 'autofocus', 'value' => set_value('rut') ); 
  $name = array('maxlength' => '100', 'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Ingresar nombre', 'value' => set_value('name') ); 
  $ap_pat = array('maxlength' => '100', 'name' => 'ap_paterno', 'id' => 'ap_paterno', 'class' => 'form-control', 'placeholder' => 'Ingresar apellido', 'value' => set_value('ap_paterno') ); 
  $ap_mat = array('maxlength' => '100', 'name' => 'ap_materno', 'id' => 'ap_materno', 'class' => 'form-control', 'placeholder' => 'Ingresar apellido', 'value' => set_value('ap_materno') ); 
  $direccion = array('maxlength' => '50', 'name'  => 'direccion', 'id' => 'direccion', 'class' => 'form-control', 'placeholder' => 'Ingresar dirección', 'value' => set_value('direccion') ); 
  $phone_f = array('maxlength' => '9', 'name' => 'phone_f', 'id' => 'phone_f', 'class' => 'form-control', 'placeholder' => '632202155', 'value' => set_value('phone_f') ); 
  $phone_m = array('maxlength' => '9', 'name' => 'phone_m', 'id' => 'phone_m', 'class' => 'form-control', 'placeholder' => '915309157', 'value' => set_value('phone_m') ); 
  $email = array('maxlength' => '100', 'type' => 'email', 'name'  => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingresar e-mail cliente', 'value' => set_value('email') ); 
  $options = array('0' => 'Seleccionar ciudad'); 
  $options1 = array('0' => 'Seleccionar comuna'); 
  $submit = array('type' => 'submit', 'content' => '<i class="fa fa-plus" aria-hidden="true"></i> '.$btn_submit, 'name' =>'registro', 'id' =>'registro', 'class'=>'btn btn-success', 'title'=>$btn_submit); 
?>
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
                    <h2><?=$title_form?><small><?=$title_form_subt?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <!--<ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>-->
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?= my_msj_alert($this->session->flashdata('msg_tipo'), $this->session->flashdata('msg_titulo'), $this->session->flashdata('msg_texto'));
                    ?>         
                    <?= my_validation_errors(validation_errors()); ?>     
                    <br />
                    <?= form_open_multipart('admin/customers/insert', array("class"=>"form-horizontal form-label-left","id"=>"demo-form2","data-parsley-validate")); ?>
                      <div class="form-group">
                        <?= form_label('Rut <span class="required">*</span>', 'rut',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($rut) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Nombre <span class="required">*</span>', 'Nombre',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($name) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Apellido paterno <span class="required">*</span>', 'ap_pat',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($ap_pat) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Apellido materno <span class="required">*</span>', 'ap_mat',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($ap_mat) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Dirección <span class="required">*</span>', 'direccion',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($direccion) ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Región <span class="required">*</span>', 'region',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_dropdown('region' ,$dropdown_list_region, '0','class="form-control col-md-7 col-xs-12" id="region"');?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?= form_label('Ciudad <span class="required">*</span>', 'ciudad',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_dropdown('ciudad' ,$options, '0','class="form-control col-md-7 col-xs-12" id="ciudad"');?>
                        </div>
                      </div> 
                      <div class="form-group">
                        <?= form_label('Comuna <span class="required">*</span>', 'comuna',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= form_dropdown('comuna' ,$options1, '0','class="form-control col-md-7 col-xs-12" id="comuna"');?>
                        </div>
                      </div>                       
                      <div class="form-group">
                        <?= form_label('Actividad comercial <span class="required">*</span>', 'actividad',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_dropdown('actividad' ,$dropdown_list_activity, '0','class="form-control col-md-7 col-xs-12" id="actividad"');?>
                        </div>
                      </div> 
                      <div class="form-group">
                        <?= form_label('Teléfono fijo <span class="required">*</span>', 'phone_f',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($phone_f) ?>
                        </div>
                      </div>    
                      <div class="form-group">
                        <?= form_label('Teléfono movil <span class="required">*</span>', 'phone_m',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= form_input($phone_m) ?>
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
                          <?= anchor('admin/customers/view','<i class="glyphicon glyphicon-arrow-left"></i> Volver',array('class'=>'btn btn-info')); ?>
                          <?= form_button( $submit ); ?>
                        </div>
                      </div>
                    <?=form_close();?>
                  </div>
                </div>
              </div>
            </div>

          </div>