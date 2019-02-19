create database if not exists reserva_aula character set = 'utf8mb4';

use reserva_aula;

drop table if exists reserva;
drop table if exists aula;
drop table if exists usuario;

create table usuario(

	nick varchar(200),
	contrasenia varchar(200) not null,
	nombre varchar(200) not null,
	fnac date not null,
	email varchar(200),

	primary key(nick, email)
);

create table aula(

	nombreCorto varchar(100),
	nombreDescripcion varchar(200) not null,
	ubicacion varchar(200) not null,
	tic tinyint(1) not null, -- si o no es un aula relacionada con las tic
	nOrdenadores tinyint(255), -- si no es un aula tic estara a null

	primary key(nombreCorto)
);

create table reserva(
	nickUsuario varchar(200),
	nombreCortoAula varchar(200),
	fReserva date,
	horaIniresr varchar(5),
	horaFinreser varchar(5),
	primary key(nickUsuario, nombreCortoAula, fReserva, horaIniresr,horaFinreser),
	foreign key (nickUsuario) references usuario(nick) on update cascade on delete restrict,
	foreign key (nombreCortoAula) references aula(nombreCorto) on update cascade on delete restrict
);

insert into usuario (nick, contrasenia, nombre, fnac, email) values ('usuario', '123', 'usuario', '1997-01-06', 'usuario@gmail.com');
insert into usuario (nick, contrasenia, nombre, fnac, email) values ('pepe', '123', 'pepe', '1999-02-14', 'pepe@gmail.com');
insert into usuario (nick, contrasenia, nombre, fnac, email) values ('pablo', '123', 'Pablo López', '1991-12-19', 'pablolopez@gmail.com');
insert into usuario (nick, contrasenia, nombre, fnac, email) values ('lourdes', '123', 'Lourdes Rodriguez', '1984-05-12', 'moronlu18@gmail.com');

insert into aula (nombreCorto, nombreDescripcion, ubicacion, tic, nOrdenadores) values ('aula-01', 'Aula de informatica', 'Departamento de IT', 1, 20);
insert into aula (nombreCorto, nombreDescripcion, ubicacion, tic, nOrdenadores) values ('aula-02', 'Aula de musica', 'Segunda planta, 3-C',0,null);
insert into aula (nombreCorto, nombreDescripcion, ubicacion, tic, nOrdenadores) values ('aula-03', 'Aula de tecnologia', 'Primera planta, 2-B',0,null);
insert into aula (nombreCorto, nombreDescripcion, ubicacion, tic, nOrdenadores) values ('aula-04', 'Biblioteca', 'Primera planta, 1-A',0,null);
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('pablo','aula-01','20190220','9:15','10:15');	
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('pablo','aula-02','20190222','9:15','11:15');
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('usuario','aula-02','20190219','8:15','9:15');
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('usuario','aula-02','20190215','11:45','13:45');
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('lourdes','aula-04','20190110','11:45','13:45');
insert into reserva (nickUsuario,nombreCortoAula,fReserva,horaIniresr,horaFinreser) values('pepe','aula-03','20190227','11:45','13:45');
