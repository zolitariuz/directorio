<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| Constantes del usuario
|--------------------------------------------------------------------------
*/

// Datos de conexión a los web services
define('USUARIO_WS', 'admin_ts');
define('PASSWORD_WS', 'Adm1n_TS_123');
define('URL_WS', 'localhost:8888/tramites_cdmx_ws/index.php/api/');


// Tipo de duración de vigencia
define('SERVICIO', -1);
define('OTRA_DURACION', 0); 
define('DE_DURACION', 1); 
define('RANGO_DURACION', 2);
 
// Duración de vigencia
define('AÑO_FISCAL', 3); 
define('PERIODO_RESTANTE', 4); 
define('PERMANENTE', 5); 
define('MAYORIA_EDAD', 6); 
define('NO_APLICA', 7); 
define('INDETERMINADA', 8); 
define('HORAS', 9); 
define('DIAS_NATURALES', 10); 
define('DIAS_HABILES', 11); 
define('SEMANAS', 12); 
define('MESES', 13); 
define('AÑOS', 14); 

// Actores de procedimiento
define('CIUDADANO', 1); 
define('SERVIDOR_PUBLICO', 2); 
define('SISTEMA', 3); 


/* End of file constants.php */
/* Location: ./application/config/constants.php */