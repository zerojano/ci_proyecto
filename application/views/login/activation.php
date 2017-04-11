      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= form_open('activation/valid'); ?>
              <h1><?=$title_form;?></h1>
              <div>
              <?=form_hidden('code',$code);?>
			<?= form_input(array('type'=>'password', 'name'=>'new', 'id'=>'new','class'=>'form-control', 'placeholder' => 'Nueva contraseña', 'value'=>set_value('new')));?>
              </div>
              <div>
			<?= form_input(array('type'=>'password', 'name'=>'new_rep', 'id'=>'new_rep','class'=>'form-control', 'placeholder' => 'Confirmar contraseña', 'value'=>set_value('new_rep')));?>
              </div>
              <div>
              <?= form_button(array('type'=>'submit', 'content'=>'Activar cuenta', 'class'=>'btn btn-default submit')); ?>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>

                  <p>©2017 <a href="http://www.Infoplan.cl">www.infoplan.cl</a> - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a></p>
                </div>
              </div>
            <?= form_close(); ?>
          </section>
          <?= my_msj_alert($this->session->flashdata('msg_tipo'), $this->session->flashdata('msg_titulo'), $this->session->flashdata('msg_texto'));?>
          <?= my_validation_errors(validation_errors()); ?>
        </div>
      </div>