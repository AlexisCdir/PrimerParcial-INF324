-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS mibd_cundir;
USE mibd_cundir;

-- Cambiar nombre de la tabla y agregar columna de contrasenia
CREATE TABLE usuario
(
    ci varchar(5) PRIMARY KEY,
    nombre varchar(25),
    paterno varchar(25),
    contrasenia varchar(25)
);

CREATE TABLE materia
(
    idmat varchar(10) PRIMARY KEY,
    descripcion varchar(25)
);

CREATE TABLE alumno
(
    ci_alumno varchar(5) PRIMARY KEY,
    idmat varchar(10),
    depto varchar(2),
    promedio decimal(5, 2),
    FOREIGN KEY (ci_alumno) REFERENCES usuario(ci),
    FOREIGN KEY (idmat) REFERENCES materia(idmat)
);

CREATE TABLE docente
(
    ci_docente varchar(5),
    idmat varchar(10),
    salario decimal(10, 2),
    PRIMARY KEY (ci_docente, idmat),
    FOREIGN KEY (ci_docente) REFERENCES usuario(ci),
    FOREIGN KEY (idmat) REFERENCES materia(idmat)
);

-- Datos para tabla usuario con contraseñas y CI en formato deseado
INSERT INTO usuario (ci, nombre, paterno, contrasenia) VALUES
('11111', 'Juan', 'Pérez', 'pswd1'),
('22222', 'María', 'González', 'pswd2'),
('33333', 'Carlos', 'López', 'pswd3'),
('44444', 'Ana', 'Martínez', 'pswd4'),
('55555', 'Laura', 'Ramírez', 'pswd5'),
('66666', 'Pedro', 'Díaz', 'pswd6'),
('77777', 'Luis', 'Torres', 'pswd7'),
('88888', 'Elena', 'Gómez', 'pswd8'),
('99999', 'Sofía', 'Fernández', 'pswd9'),
('10101', 'Miguel', 'Hernández', 'pswd10'),
('11112', 'Isabel', 'Castro', 'pswd11'),
('12121', 'Daniel', 'Sánchez', 'pswd12'),
('13131', 'Valeria', 'Ortiz', 'pswd13'),
('14141', 'Javier', 'Flores', 'pswd14'),
('15151', 'Carmen', 'Ruiz', 'pswd15'),
('16161', 'Adrián', 'Molina', 'pswd16'),
('17171', 'Julia', 'Vargas', 'pswd17'),
('18181', 'Diego', 'Soto', 'pswd18'),
('19191', 'Natalia', 'Luna', 'pswd19'),
('20202', 'Oscar', 'Jiménez', 'pswd20');

-- Datos para tabla materia
INSERT INTO materia (idmat, descripcion) VALUES
('MAT001', 'Matemáticas'),
('FIS001', 'Física'),
('QUI001', 'Química'),
('INF001', 'Informática');

-- Datos para tabla docente
INSERT INTO docente (ci_docente, idmat, salario) VALUES
('22222', 'FIS001', 5500.00), -- María González será docente de Física
('66666', 'QUI001', 5800.00), -- Pedro Díaz será docente de Quimica
('66666', 'INF001', 5800.00), -- Pedro Díaz será docente de Informatica
('15151', 'MAT001', 6000.00); -- Carmen Ruiz será docente de Matemáticas

-- Datos para tabla alumno
INSERT INTO alumno (ci_alumno, idmat, depto, promedio) VALUES
('11111', 'MAT001', '01', 8.5), -- Juan Pérez es alumno de Matemáticas
('33333', 'QUI001', '03', 9.0), -- Carlos López es alumno de Química
('44444', 'INF001', '04', 8.7), -- Ana Martínez es alumna de Informática
('55555', 'MAT001', '01', 9.2), -- Laura Ramírez no está en las materias especificadas
('77777', 'INF001', '03', 8.5), -- Luis Torres no está en las materias especificadas
('88888', 'MAT001', '04', 9.7), -- Elena Gómez no está en las materias especificadas
('99999', 'MAT001', '02', 7.8), -- Sofía Fernández es alumna de Matemáticas
('10101', 'FIS001', '02', 6.5), -- Miguel Hernández es alumno de Física
('11112', 'MAT001', '01', 8.0), -- Isabel Castro es alumna de Matemáticas
('12121', 'INF001', '04', 9.5), -- Daniel Sánchez es alumno de Informática
('13131', 'QUI001', '03', 8.2), -- Valeria Ortiz es alumna de Química
('14141', 'FIS001', '01', 7.0), -- Javier Flores es alumno de Física
('16161', 'INF001', '03', 9.8), -- Adrián Molina es alumno de Informática
('17171', 'MAT001', '01', 8.9), -- Julia Vargas es alumna de Matemáticas
('18181', 'FIS001', '03', 7.7), -- Diego Soto es alumno de Física
('19191', 'QUI001', '02', 9.4), -- Natalia Luna es alumna de Química
('20202', 'INF001', '02', 8.3); -- Oscar Jiménez es alumno de Informática
