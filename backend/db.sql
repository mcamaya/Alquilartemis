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
    categoria_producto VARCHAR(50),

    FOREIGN KEY (categoria_producto) REFERENCES categorias(id_categoria)
);


CREATE TABLE detalle_cotizacion(
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    fecha_cotizacion DATE NOT NULL,
    hora_cotizacion VARCHAR(20) NOT NULL,
    dia_alquiler VARCHAR(55) NOT NULL
);

CREATE TABLE productos_x_cotizaciones(
    id_registro INT PRIMARY KEY AUTO_INCREMENT,
    fk_id_producto INT NOT NULL,
    fk_id_detalle INT NOT NULL,

    FOREIGN KEY (fk_id_producto) REFERENCES productos(id_producto),
    FOREIGN KEY (fk_id_detalle) REFERENCES detalle_cotizacion(id_detalle)
);

CREATE TABLE cotizaciones(
    id_cotizacion INT PRIMARY KEY AUTO_INCREMENT,
    fk_id_empleado INT NOT NULL,
    fk_id_constructora INT NOT NULL,
    fk_id_detalle INT NOT NULL,

    FOREIGN KEY (fk_id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY (fk_id_constructora) REFERENCES constructoras(id_constructora),
    FOREIGN KEY (fk_id_detalle) REFERENCES detalle_cotizacion(id_detalle)
);