CREATE DATABASE alquilartemis

CREATE TABLE constructoras(
    id_constructora INT PRIMARY KEY AUTO_INCREMENT,
    nombre_constructora VARCHAR(100) NOT NULL,
    nit_constructora INT NOT NULL,
    nombre_representante VARCHAR(100) NOT NULL,
    email_contacto VARCHAR(120),
    telefono_contacto INT NOT NULL
);

CREATE TABLE empleados(
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    nombre_empleado VARCHAR(100) NOT NULL,
    email_empleado VARCHAR(120) NOT NULL,
    celular_empleado INT NOT NULL,
    password_empleado VARCHAR(50) NOT NULL
);

CREATE TABLE categorias(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria VARCHAR(100) NOT NULL,
    descripcion_categoria VARCHAR(255) NOT NULL,
    img_categoria VARCHAR(100) NOT NULL
);

CREATE TABLE productos(
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(120) NOT NULL,
    precio_x_dia INT NOT NULL,
    categoria_producto INT NOT NULL,

    FOREIGN KEY (categoria_producto) REFERENCES categorias(id_categoria)
);


CREATE TABLE cotizaciones(
    id_cotizacion INT PRIMARY KEY AUTO_INCREMENT,
    fk_id_empleado INT NOT NULL,
    fk_id_constructora INT NOT NULL,
    fecha_cotizacion DATE NOT NULL,
    hora_cotizacion VARCHAR(20) NOT NULL,
    dia_alquiler VARCHAR(55) NOT NULL,
    duracion_alquiler INT NOT NULL,

    FOREIGN KEY (fk_id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY (fk_id_constructora) REFERENCES constructoras(id_constructora)
);

CREATE TABLE productos_x_cotizaciones(
    id_registro INT PRIMARY KEY AUTO_INCREMENT,
    fk_id_producto INT NOT NULL,
    fk_id_detalle INT NOT NULL,

    FOREIGN KEY (fk_id_producto) REFERENCES productos(id_producto),
    FOREIGN KEY (fk_id_detalle) REFERENCES cotizaciones(id_cotizacion)
);


INNER JOIN productos ON productos_x_cotizaciones.fk_id_producto = productos.id_producto;
SELECT * FROM productos_x_cotizaciones WHERE fk_id_detalle = cotizaciones(id_detalle); 

SELECT productos_x_cotizaciones.fk_id_producto, productos_x_cotizaciones.fk_id_detalle, productos.nombre_producto FROM productos_x_cotizaciones
INNER JOIN productos ON productos_x_cotizaciones.fk_id_producto = productos.id_producto;

SELECT * FROM `productos_x_cotizaciones` WHERE 1


SELECT * FROM (SELECT productos_x_cotizaciones.fk_id_producto, productos_x_cotizaciones.fk_id_detalle, productos.nombre_producto FROM productos_x_cotizaciones
INNER JOIN productos ON productos_x_cotizaciones.fk_id_producto = productos.id_producto) AS resultado WHERE fk_id_detalle = 1;

/* INSERTAR ELEMENTOS DEFAULT */
INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `email_empleado`, `celular_empleado`, `password_empleado`) VALUES ('1', 'Esteban Quito', 'estebanquito@mail.com', '311254698', '123'), ('2', 'Verónica Vargas', 'verovargas@mail.com', '317452010', '123'), ('3', 'Mariano Pedraza', 'marianopedraza@mail.com', '316229941', '123');

INSERT INTO `constructoras` (`id_constructora`, `nombre_constructora`, `nit_constructora`, `nombre_representante`, `email_contacto`, `telefono_contacto`) VALUES ('1', 'Omega CORP S.A.S', '564856156', 'Fransisco Pérez', 'omega@corp.com', '01456156'), ('2', 'Tríade Constructura S.A.S', '564874578', 'Lucía Bejarano', 'triade@construct.com', '05615665'), ('3', 'Jet Constructora S.A.S', '484156564', 'Pedro Solano', 'jet@constructoras.com', '584653186');

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `img_categoria`) VALUES ('1', 'Herramientas', 'Herramientas inalámbricas y para talleres. Diseño pionero, tecnología y alta durabilidad.', ''), ('2', 'Materia Prima', 'Compra en línea Materiales de Construcción, la Tienda con los mejores precios con envío gratis o retiro en tienda. ', ''), ('3', 'Acero', 'Encuentra los materiales que necesitas para tu proyecto de construcción. Contamos con una amplia variedad de productos de gran calidad.', '');

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_x_dia`, `categoria_producto`) VALUES ('1', 'Serruchos', '50000', '1'), ('2', 'Bulto Cemento', '350000', '2'), ('3', 'Varillas', '120000', '3');
