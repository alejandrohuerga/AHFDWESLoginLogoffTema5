/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alejandro.huefer
 * Created: 20 nov. 2025
 */

CREATE DATABASE IF NOT EXISTS DBAHFDWESLoginLogoffTema5;

USE DBAHFDWESLoginLogoffTema5;

CREATE TABLE IF NOT EXISTS T_01Usuario (
    T01_CodUsuario VARCHAR(25) PRIMARY KEY,
    -- CodUsuario:8 letras maximo y 4 ninimo PK
    T01_Password VARCHAR(255) NOT NULL ,
    -- Password:8 letras maximo y 4 ninimo. Obligatorio
    T01_DescUsuario VARCHAR(255),
    --Alfanuemrico hasta 255 caracteres.Nombre y Apeliido del usuario. Obligatorio
    T01_FechaHoraUltimaConexion DATETIME,
    -- Fecha y hora de la ultima conexion del usuario. Valor automatico al conectarse. Obligatorio
    T01_NumConexiones INT NOT NULL DEFAULT 0,
    T01_Perfil VARCHAR(25) default 'usuario',
    -- Valor usuario por defecto (podría ser usuario o adminsitrador). default (LOWER('usuario')
    T01_ImagenUsuario VARCHAR(255))engine=innodb;
    /*
      En este caso voy a guradar el nombre del archivo pero 
      las fotos se puede guardar en la base de datos como tal, en este caso :
      T01_ImagenUsuario BLOB, ( que serían fotos hastas 64KB)
      T01_ImagenUsuario MEDIUMBLOB, ( que serían fotos hastas 16MB)
      T01_ImagenUsuario LONGBLOB, ( que serían fotos hastas 4GB).
    */


CREATE TABLE IF NOT EXISTS T_02Departamento (
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY, 
    T02_DescDepartamento VARCHAR(255),
    T02_FechaCreacionDepartamento datetime not null default now() ,
    T02_VolumenDeNegocio FLOAT,
    T02_FechaBajaDepartamento datetime default null)engine=innodb;


/* Creación del usuario y permisos */
CREATE USER IF NOT EXISTS "userAHFDWESLoginLogoffTema5"@"%" IDENTIFIED by "paso";
GRANT ALL PRIVILEGES on *.* TO "userAHFDWESLoginLogoffTema5"@"%" WITH GRANT OPTION;
FLUSH PRIVILEGES;
