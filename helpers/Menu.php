
<?php

/**
 * Constructor de menús para Bootstrap
 * @version 1.0.0
 * @author  Fernando Merlo <ctrbts.dev@gmail.com>
 */
class Menu
{
	// Menu lateral
	public static $navbarsideleft_alt = array(
		array(
			'path' => 'users',
			'label' => 'Administración',
			'icon' => '',
			'submenu' => array(
				array(
					'path' => 'users',
					'label' => 'Usuarios',
					'icon' => '',
					'submenu' => array(
						array(
							'path' => 'users',
							'label' => 'Lista de usuarios',
							'icon' => ''
						),

						array(
							'path' => 'roles',
							'label' => 'Roles de usuario',
							'icon' => ''
						),

						array(
							'path' => 'role_permissions',
							'label' => 'Permisos de usuario',
							'icon' => ''
						),

						array(
							'path' => 'role_permissions_actions',
							'label' => 'Acciones permitidas',
							'icon' => ''
						),

						array(
							'path' => 'role_permissions_page',
							'label' => 'Módulos permitidos',
							'icon' => ''
						)
					)
				),

				)
			),

		array(
			'path' => 'app_logs',
			'label' => 'Registro de eventos',
			'icon' => ''
		),

		array(
			'path' => 'blog',
			'label' => 'Blog',
			'icon' => ''
		)
	);

	
			public static $navbarsideleft = array(
		array(
			'path' => 'home',
			'label' => 'Dashboard',
			'icon' => '<i class="material-icons ">dashboard</i>'
		),
		
		array(
			'path' => 'menu1',
			'label' => 'Administración',
			'icon' => '<i class="material-icons ">settings</i>','submenu' => array(
		array(
			'path' => 'usuarios',
			'label' => 'Usuarios',
			'icon' => ''
		),
		
		array(
			'path' => 'asignaturas',
			'label' => 'Asignaturas',
			'icon' => ''
		),
		
		array(
			'path' => 'centrooperativo',
			'label' => 'Centro Operativo',
			'icon' => ''
		),
		
		array(
			'path' => 'comisiones',
			'label' => 'Comisiones',
			'icon' => ''
		),
		
		array(
			'path' => 'diagnosticos',
			'label' => 'Diagnosticos',
			'icon' => ''
		),
		
		array(
			'path' => 'tratamientos',
			'label' => 'Tratamientos',
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu96',
			'label' => 'Planillas',
			'icon' => '<i class="material-icons ">assignment</i>','submenu' => array(
		array(
			'path' => 'planillasencabezado',
			'label' => 'Consultar planillas',
			'icon' => '<i class="material-icons ">search</i>'
		),
		
		array(
			'path' => 'planillasencabezado/add',
			'label' => 'Nueva planilla',
			'icon' => '<i class="material-icons ">add</i>'
		)
	)
		),
		
		array(
			'path' => 'pacientes',
			'label' => 'Pacientes',
			'icon' => ''
		),
		
		array(
			'path' => 'rpt_grupo',
			'label' => 'Rpt Grupo',
			'icon' => ''
		),
		
		array(
			'path' => 'rpt_grupotratam',
			'label' => 'Rpt Grupotratam',
			'icon' => ''
		),
		
		array(
			'path' => 't_piezasector',
			'label' => 'T Piezasector',
			'icon' => ''
		),
		
		array(
			'path' => 'tciclolectivo',
			'label' => 'Tciclolectivo',
			'icon' => ''
		),
		
		array(
			'path' => 'tipopaciente',
			'label' => 'Tipopaciente',
			'icon' => ''
		)
	);
		
	
			public static $Sexo = array(
		array(
			"value" => "Male",
			"label" => "Male",
		),
		array(
			"value" => "Female",
			"label" => "Female",
		),);
		
}