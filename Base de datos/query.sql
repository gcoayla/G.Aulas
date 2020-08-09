CREATE DATABASE horarios;
USE horarios;

DROP TABLE IF EXISTS Usuario;
    
CREATE TABLE Usuario (
  codigo varchar(40) NOT NULL,
  contrasenia varchar(20) NOT NULL,
  tipo int NOT NULL ,
  nombre varchar(50)  NOT NULL,
  apellidos varchar(50)  NOT NULL,
  correo varchar(50)  NOT NULL,

  PRIMARY KEY (codigo)
);


DROP TABLE IF EXISTS Aula;
    
CREATE TABLE Aula (
  codigo varchar(20) NOT NULL,
  aforo int  NOT NULL,
  tipo_uso varchar(5)  NOT NULL,
  PRIMARY KEY (codigo)
);

DROP TABLE IF EXISTS Curso;
    
CREATE TABLE Curso (
  codigo varchar(20) NOT NULL ,
  nombre varchar (50)  NOT NULL,
  semestre int   NULL,
  anio int   NULL,
  grupo varchar (1)  NOT NULL,
  tipo varchar(5)  NOT NULL,
  acronimo varchar(20)  NOT NULL,
  PRIMARY KEY (codigo)
);


DROP TABLE IF EXISTS Reserva;
    
CREATE TABLE Reserva (
  codigo int AUTO_INCREMENT,
  hora_inicio time  NOT NULL,
  hora_fin time  NOT NULL,
  semana_inicio int  NOT NULL,
  semana_fin int  NOT NULL,
  dia int  NOT NULL,
  descripcion varchar(50)  NOT NULL,
  codigo_usuario varchar(40)  NOT NULL,
  codigo_aula varchar(20) NOT NULL,
  codigo_curso varchar(20) NOT NULL,
PRIMARY KEY (codigo, codigo_usuario, codigo_aula,codigo_curso)

);


ALTER TABLE Reserva ADD FOREIGN KEY (codigo_curso) REFERENCES Curso (codigo)
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE Reserva ADD FOREIGN KEY (codigo_usuario) REFERENCES Usuario (codigo)
ON DELETE RESTRICT 
ON UPDATE CASCADE;

ALTER TABLE Reserva ADD FOREIGN KEY (codigo_aula) REFERENCES Aula (codigo)
ON DELETE RESTRICT 
ON UPDATE CASCADE;

INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('f_suni_lopez' ,'123' , 2 , 'Franci','Suni Lopez', 'fsunilo@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('a_mamani_champi' ,'123' , 2 , 'Anita',' Mamani Champi', 'amamanicham@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_flores_quispe' ,'123' , 2 , 'Roxana ','Flores Quispe', 'rfloresqu@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_arredondo' ,'123' , 2 , 'Raquel ','Arredondo', 'rarredondoc@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('e_adriazola_herrera' ,'123' , 2 , 'Eliana ','Adriazola Herrera', 'eadriazola@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('p_mango_quispe' ,'123' , 2 , 'Pedro ','Mango Quispe', 'pmangoq@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('p_rodriguez_gonzalez' ,'123' , 2 , 'Pedro ','Rodriguez Gonzales ', 'prodriguez@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('m_rodriguez_choque' ,'123' , 2 , 'Milagros',' Rodriguez Choque', 'mrodriguezch@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('my_castello_salinas' ,'123' , 2 , 'Marina Yanet ','Castello Salinas', 'mcastello@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_manchego_carnero' ,'123' , 2 , 'Rocio ','Manchego Carnero', 'rmanchegoc@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('y_yari_ramos' ,'123' , 2 , 'Yessenia ','Yari Ramos', 'yyarira@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('e_sarmiento_calisaya' ,'123' , 2 , 'Edgar ','Sarmiento Calisaya', 'esarmientoca@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('mr_salazar_arata' ,'123' , 2 , 'Maria del Rosario ','Salazar Arata', 'msalazar2@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('ah_mamani_aliaga' ,'123' , 2 , 'Alvaro Henry ','Mamani Aliaga', 'amamaniali@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('ig_ramirez_lazaro' ,'123' , 2 , 'Ivan Gregorio ','Ramirez Lazaro ', 'iramirezl@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_mestas_chavez' ,'123' , 2 , 'Roger ','Mestas Chavez', 'rmestasc@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('m_higueras' ,'123' , 2 , 'Manuel ','Higueras', 'mhigueras@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('e_chaina_cahui' ,'123' , 2 , 'Edwin ','Chaina Cahui', 'echaina@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('er_escobedo_del_carpio' ,'123' , 2 , 'Elmer Raul','Escobedo Del Carpio', 'eescobedod@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('c_pilco_andia' ,'123' , 2 , 'Carlota Cristina ','Pilco Andia', 'cpilcoa@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_hancco_ancori' ,'123' , 2 , 'Ricardo ','Hancco Ancori', 'rhanccoan@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('y_velazco_paredes' ,'123' , 2 , 'Yuber Elmer ','Velazco Paredes', 'yvelazco@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('s_aquise_escobedo' ,'123' , 2 , 'Sergio','Aquise Escobedo', 'saquisee@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('b_calapuja_sambrano' ,'123' , 2 , 'Bidder ','Calapuja Sambrano', 'bcalapuja@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('c_atencio_torres' ,'123' , 2 , 'Carlos Eduardo','Atencio Torres', 'catencio@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('f_gonzales_saji' ,'123' , 2 , 'Freddy ','Gonzales Saji', 'fgonzaless@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('l_delgado_barra' ,'123' , 2 , 'Lucy Angela ','Delgado Barra', 'ldelgado@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('y_perez_vera' ,'123' , 2 , 'Yasiel ','Perez Vera', 'yperezv@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('v_machaca_arceda' ,'123' , 2 , 'Vicente Enrique ','Machaca Arceda', 'vmachacaa@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('w_ramos_lovon' ,'123' , 2 , 'Wilber Roberto ','Ramos Lovon', 'wramos@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('r_cardenas_talavera' ,'123' , 2 , 'Rolando Jesus ','Cardenas Talavera', 'rcardenastal@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('c_lopez_del_alamo' ,'123' , 2 , 'Cristian ','Lopez del Alamo', 'clopezt@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('a_cuadros_valdivia' ,'123' , 2 , 'Ana Maria ','Cuadros Valdivia', 'acuadrosv@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('e_hinojosa_cardenas' ,'123' , 2 , 'Edward ','Hinojosa Cardenas', 'ehinojosa@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('h_zuniga_cueva' ,'123' , 2 , 'Jesus Heraclio ','Zuniga Cueva', 'jzuniga@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('c_gutierrez_caceres' ,'123' , 2 , 'Juan Carlos ','Gutierrez Caceres', 'jgutierrezca@unsa.edu.pe' );
INSERT INTO Usuario (codigo, contrasenia , tipo , nombre , apellidos , correo  ) VALUES ('20150974' ,'123' , 1 , 'Gonzalo','Coayla Zuniga', '20150974' );

INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('301',30,'teo');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('302',30,'teo');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('303',30,'teo');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('304',20,'lab');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('305',20,'lab');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('205',40,'teo');
INSERT INTO Aula(codigo, aforo, tipo_uso) VALUES ('104',30,'teo');


