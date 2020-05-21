 
##**Security Laravel Permission**

### Repositorio: Servicio en Línea

### Configuración:
| Requisitos   			| Versión    			        |
| :------------- 		| :--------- 			        |
| PHP  					| `PHP >= 7.1.3`				|
| Base de datos         | `Mysql | Postgresql`		    | 
| Composer              |                               |
| laravel permission    | `v.3`                         |
| Laravel               | `Laravel = 5.8`               |

.

### Archivos de configuración / conexión:

1. `.env.example` - Ejemplos de configuración de Laravel
2. `.env` - Para desarrollo


Instalación
-----------
__Esta guia de instalación presupone que usted tiene istaladas y configuradas las herramientas para el entorno de desarrollo__.

* __Asegurese de tener instalados los requisitos de configuración.__

* Clonar repositorio.

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
git clone https://lex1102@bitbucket.org/comfamiliarhuila/servicioenlinea.git
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* cuando se descargue ubicarse en la carpeta del proyecto ejecutar el comando

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
composer install
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* crear la base de datos y conectarla en el .env

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
ejemplo: DB_DATABASE=rolesPermisosPermission
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* ejecutar migraciones

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
php artisan migrate
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

__JALV__