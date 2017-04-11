      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= form_open('login/valid'); ?>
              <h1><?=$title_form;?></h1>
              <div>
				        <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login','class'=>'form-control', 'placeholder' => 'Usuario', 'value'=>set_value('login')));?>
              </div>
              <div>
				        <?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password','class'=>'form-control',  'placeholder' => 'Clave', 'value'=>set_value('password')));?>
              </div>
              <div>
              <?= form_button(array('type'=>'submit', 'content'=>'Ingresar', 'class'=>'btn btn-default submit')); ?>

                <a class="reset_pass" href="#signup">Olvista tu contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#" class="to_register"> Crear cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> <?=$factory->name_corto;?></h1>
                  <p>©2017 <a href="http://www.Infoplan.cl">www.Infoplan.cl</a> - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a></p>
                </div>
              </div>
            <?= form_close(); ?>
          </section>
          <?= my_msj_alert($this->session->flashdata('msg_tipo'), $this->session->flashdata('msg_titulo'), $this->session->flashdata('msg_texto'));?>
          <?= my_validation_errors(validation_errors()); ?>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1><?=$title_form_reset;?></h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Solicitar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Siempre recordar ?
                  <a href="#signin" class="to_register"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> <?=$factory->name_corto;?></h1>
                  <p>©2017 <a href="http://www.Infoplan.cl">www.Infoplan.cl</a> - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>