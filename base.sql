create database doctora;
use doctora;

create table paciente(
id_paciente int not null auto_increment primary key,
nombre_completo varchar(200) not null,
foto MEDIUMBLOB NULL,
dui varchar(10) null,
nit varchar(17) null,
dir varchar(150) null,
numero varchar(9) null,
depto char(30) null,
ciudad char(30) null,
estado_civil char(20) null,
edad int not null,
fecha date not null,
fecha_nacimiento date null,
email varchar(40) null,
ocupacion varchar(50) not null,
lugar_trabajo varchar(50) null,
dir_trabajo varchar (100) null,
tel_trabajo varchar(9) null,
departamento varchar(50) null,
tipo_sangre varchar(20) null,
peso int not null,
presion varchar(20) null,
sexo char(10) not null,
talla float(8,2) not null,
antecedentes varchar(200) null,
remitido varchar(30) null,
responsable varchar(150) null,
numero_contacto varchar(9) null);

create table expedientes(
id_expediente int not null auto_increment primary key,
id_paciente int not null,
peso int not null,
presion varchar(20) not null,
talla float(8,2) not null,
diagnostico varchar(500) not null,
hora time not null,
fecha date not null,
intervenciones varchar(200) null,
estudios varchar(200) null,
observaciones varchar(200) not null,
sintomas varchar(200) not null,
Receta varchar(200) null,
proxima_Cita date null,
FOREIGN KEY(id_paciente) REFERENCES paciente(id_paciente));

create table citas(
id_citas int not null auto_increment primary key,
id_paciente int not null,
hora time not null,
fecha date not null,
motivo_cita varchar(100) null,
FOREIGN KEY(id_paciente) REFERENCES paciente(id_paciente));

create table usuarios(
id int not null auto_increment primary key,
usuario varchar(20) not null unique,
contrasena varchar(100) not null,
nombre varchar(100) not null,
tipo varchar(20) not null);

create table configuracion(
color_fondo varchar(30) not null,
color_letra varchar(30) not null,
tipo_letra varchar(30) not null);

insert into configuracion values('white','black','Times New Roman');

insert into usuarios(usuario,contrasena,nombre, tipo) values('admin',md5('admin'),'Usuario de Prueba','Administrador');