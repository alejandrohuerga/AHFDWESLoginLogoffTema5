/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alejandro.huefer
 * Created: 20 nov. 2025
 */

USE DBAHFDWESLoginLogoffTema5;

INSERT INTO T_01Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario,T01_ImagenUsuario)
                VALUES
            ('vero',SHA2('paso',256),'Véro Grué',null),
            ('heraclio',SHA2('paso',256),'Heraclio Borbujo',null),
            ('alvaroA',SHA2('paso',256),'Alvaro Allen',null),
            ('alejandro',SHA2('paso',256),'Alejandro De La Huerga',null),
            ('alvaroG',SHA2('paso',256),'Alvaro García',null),
            ('gonzalo',SHA2('paso',256),'Gonzalo Junquera',null),
            ('cristian',SHA2('paso',256),'Cristian Mateos',null),
            ('alberto',SHA2('paso',256),'Alberto Méndez',null),
            ('enrique',SHA2('paso',256),'Enrique Nieto',null),
            ('james',SHA2('paso',256),'James Edward Nuñez',null),
            ('oscar',SHA2('paso',256),'Oscar Pozuelo',null),
            ('jesus',SHA2('paso',256),'Enrique Nieto',null),
            ('amor',SHA2('paso',256),'Amor Rodriguez',null),
            ('albertoB',SHA2('paso',256),'Alberto Bahillo',null),
            ('antonio',SHA2('paso',256),'Antonio Jañez',null),
            ('jorge',SHA2('paso',256),'Jorge Corral',null),
            ('claudio',SHA2('paso',256),'Claudio Lozano',null),
            ('gisela',SHA2('paso',256),'Gisela Folgueral',null)
;
            

INSERT INTO T_02Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) VALUES 
    ('AUT','Automoción',now(),1285.50,NULL),
    ('AER','Aeronautica',now(),2285.50,NULL),
    ('DEF','Defensa',now(),3285.50,'2025-05-25');