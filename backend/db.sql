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

