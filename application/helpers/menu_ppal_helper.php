<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('my_validation_errors')){
	function my_validation_errors($errors){
		$salida = '';
	if ($errors){
		$salida = '<div class="alert alert-danger alert-dismissable">';
		$salida = $salida.'<button type="button" class="close" data-dismiss="alert"> × </button>';
		$salida = $salida.'<small>'.$errors.'</small>';
		$salida = $salida.'</div>';
	}
	return $salida;
	}
}
if ( ! function_exists('menu_ppal')){
	function menu_ppal(){
		$CI =& get_instance();
		if (get_instance()->session->userdata('id')) {
			$name_nav_ppal = 'General';
			$name_nav_ppal_admin = 'Administración';
      $name_nav_ppal_sys_admin = 'SYS ADMIN';
            /*menu_general*/
			$opciones = '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">';
			$opciones .= '<div class="menu_section"><h3>'.$name_nav_ppal.'</h3>';
			$opciones .= '<ul class="nav side-menu">';
			$opciones .= '<li>'.anchor('home','<i class="fa fa-home"></i> Home ').'</li>
                  		  </li>';
			$opciones .= '<li><a><i class="fa fa-plus-circle"></i> Ingreso <span class="fa fa-chevron-down"></span></a>
                    		<ul class="nav child_menu">
                      			<li><a href="index.html">Clientes</a></li>
                      			<li><a href="admin/users/type/view">Ingresar cotización</a></li>
                    		</ul>                  		
                  		  </li>';
			$opciones .= '<li><a><i class="fa fa-file-text-o"></i> Seguimiento <span class="fa fa-chevron-down"></span></a>
                    		<ul class="nav child_menu">
                      			<li><a href="index.html">Mis cotizaciones</a></li>
                      			<li><a href="index.html">Todas las cotizaciones</a></li>
                      			<li><a href="index.html">Historial cotizaciones</a></li>
                      			<li><a href="index.html">Resumen completo</a></li>
                    		</ul>
                  		  </li>';                    		  
            $opciones .= '</ul></div>';
            /*menu admin*/
            $opciones .= '<div class="menu_section"><h3>'.$name_nav_ppal_admin.'</h3>
                <ul class="nav side-menu">';
            $opciones .= '<li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>'.anchor('admin/user/view','Todos los usuarios').'</li>
                      <li>'.anchor('admin/user/create','Agregar usuario').'</li>
                      <li>'.anchor('admin/users/type/view','Tipo usuario').'</li>
                    </ul>
                  </li>';
           $opciones .= '<li><a><i class="fa fa-industry"></i> Empresa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>'.anchor('admin/factory/view','Empresa').'</li>
                      <li>'.anchor('admin/factory/edit','Modificar empresa').'</li>
                    </ul>
                  </li>';
            $opciones .= '<li><a><i class="fa fa-male"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>'.anchor('admin/customers/view','Todos los clientes').'</li>
                      <li>'.anchor('admin/customers/create','Agregar cliente').'</li>
                    </ul>
                  </li>';
            $opciones .= '<li><a><i class="fa fa-car"></i> Autos Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>'.anchor('admin/cars/view','Todos el stock').'</li>
                      <li>'.anchor('admin/cars/create','Agregar auto').'</li>
                      <li>'.anchor('admin/cars/brand/view','Marca auto').'</li>
                      <li>'.anchor('admin/cars/type/view','Tipo transporte').'</li>
                    </ul>
                  </li>';
            $opciones .= '</ul>
              </div>';

            /*menu SYS ADMIN*/
            if (get_instance()->session->userdata('user_type') == 1) {
              $opciones .= '<div class="menu_section"><h3>'.$name_nav_ppal_sys_admin.'</h3>
                  <ul class="nav side-menu">';
              $opciones .= '<li><a><i class="fa fa-hand-o-down"></i> SESSIONS <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li>'.anchor('admin/config/resetsession','Quitar sesiones').'</li>
                      </ul>
                    </li>';
              $opciones .= '</ul>
                </div>';
            }

            $opciones .= '</div>';

            /*
			$opciones .= '<li>'.anchor('inicio', 'Inicio').'</li>';
			$opciones = $opciones.'<li>'.anchor('home/categorias/view', 'Categorias').'</li>';
			$opciones = $opciones.'<li>'.anchor('home/lugares/view', 'Lugares').'</li>';
			$opciones = $opciones.'<li>'.anchor('home/iconos/view', 'Iconos').'</li>';

			get_instance()->load->model('Model_configuracion');
			
			$id_admin = get_instance()->Model_configuracion->get_password_config('ADMINISTRATOR');

			if ( get_instance()->session->userdata('tipo') == 1 ){

				$opciones = $opciones.'<li>
									    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
									    	<span aria-hidden="true"></span> Usuarios <span class="caret"></span>
									    </a>
										<ul class="dropdown-menu">
											<li>'.anchor('usuarios/view',' Ver usuarios').'</li>
											<li>'.anchor('usuarios/create',' Crear usuario').'</li>';
											if (get_instance()->session->userdata('id') == $id_admin) {
											$opciones = $opciones.'<li>'.anchor('config/view',' Configuración APP').'</li>';
											}
											$opciones = $opciones.'<li>'.anchor('usuarios/log',' Ingresos').'</li>
										</ul>
									</li>';
			}*/
		//}else{
		//	$opciones = $opciones.'<li>'.anchor('login/ingreso', 'Login').'</li>';
		}
		return $opciones;
	}
}
