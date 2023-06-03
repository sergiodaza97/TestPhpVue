# testsuplos
Prueba de validación de conocimiento Bienvenido. Esta es la prueba técnica para validar mis conocimientos y fortalezas en el mundo de Backend y frontend utilizando php, vue.js, y con base de datos MySql, demostrando así mi capacidad de arquitectura de codigo, patrones de diseño, clean code y demás para el mundo de Suplos.

### HERRAMIENTAS DE DESARROLLO UTILIZADAS
PHP 7.3.0
visual studio code
xampp
Git
GitHub
vue3
node 9.5.0

### Como descargar y ponerlo a correr en local
Descargar Xampp con version de php 7.3
Descargar node con version 9.5.0
Abrimos xampp, entramos a htdocs y creamos una carpeta en la cual ira nuestro repositorio
abrimos cualquier editor de codigo "Recomiendo Visual Studio Code"
habra la terminal y agregue el comando git clone https://github.com/sergiodaza97/TestPhpVue.git y precione enter
Corra comando npm i
corra comando npm run serve
copiar la direccio http y pegarla en su navegador y dar enter.

### db
CREATE TABLE `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(450) DEFAULT NULL,
  `description` varchar(450) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1	

CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Código_Segmento` int(11) DEFAULT NULL,
  `Nombre_Segmento` varchar(450) DEFAULT NULL,
  `Código_Familia` int(11) DEFAULT NULL,
  `Nombre Familia` varchar(450) DEFAULT NULL,
  `Código_Clase` int(11) DEFAULT NULL,
  `Nombre_Clase` varchar(450) DEFAULT NULL,
  `Código_Producto` int(11) DEFAULT NULL,
  `Nombre_Producto` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49023 DEFAULT CHARSET=latin1	
