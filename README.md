# testsuplos

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

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
