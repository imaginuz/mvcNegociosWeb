-- Insertar registros en la tabla usuario
INSERT INTO usuario (useremail, username, userpswd, userfching, userpswdest, userpswdexp, userest, useractcod, userpswdchg, usertipo)
VALUES 
('usuario1@example.com', 'Usuario 1', 'passwordhash1', NOW(), 'ACT', NOW() + INTERVAL 90 DAY, 'ACT', NULL, NULL, 'NOR'),
('usuario2@example.com', 'Usuario 2', 'passwordhash2', NOW(), 'ACT', NOW() + INTERVAL 90 DAY, 'INA', NULL, NULL, 'CON'),
('usuario3@example.com', 'Usuario 3', 'passwordhash3', NOW(), 'ACT', NOW() + INTERVAL 90 DAY, 'ACT', NULL, NULL, 'CLI');

-- Insertar registros en la tabla roles
INSERT INTO roles (rolescod, rolesdsc, rolesest)
VALUES 
('ADM', 'Administrador', 'ACT'),
('USR', 'Usuario Regular', 'ACT'),
('GUEST', 'Invitado', 'INA');

-- Insertar registros en la tabla funciones
INSERT INTO funciones (fncod, fndsc, fnest, fntyp)
VALUES 
('FUNC1', 'Función 1 de prueba', 'ACT', 'GEN'),
('FUNC2', 'Función 2 de prueba', 'ACT', 'ESP'),
('FUNC3', 'Función 3 de prueba', 'INA', 'GEN');
