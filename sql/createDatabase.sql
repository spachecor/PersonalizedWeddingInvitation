create database bodavm;

use bodavm;

create table mesas(
    id int unsigned,
    nombre varchar(250) not null,
    capacidad int unsigned not null,
    constraint mesas_id_pk primary key(id),
    constraint mesas_capacidad_ck check(capacidad > 0)
);

create table roles(
    id int unsigned,
    nombre enum("NORMAL", "ADMIN") default "NORMAL" not null,
    constraint roles_id_pk primary key(id)
);

-- El correo en el usuario hará de usuario a la hora de login para aquellos usuarios que puedan loguearse
create table usuarios(
    id int unsigned,
    nombre varchar(250) not null,
    apellido_uno varchar(250) not null,
    apellido_dos varchar(250),
    correo varchar(250),
    clave varchar(250),
    codigo char(20),
    id_rol int unsigned not null,
    id_mesa_asignada int unsigned,
    id_usuario_creador int unsigned,
    tipo_creacion enum("NORMAL", "ACOMPANANTE", "NINO") default "NORMAL" not null,
    permiso_crear_acompanante tinyint(1) unsigned default 0 not null,
    permiso_crear_nino tinyint(1) unsigned default 0 not null,
    cantidad_ninos_creables int unsigned default 0 not null,
    cantidad_ninos_creados int unsigned default 0 not null,
    constraint usuarios_id_pk primary key(id),
    constraint usuarios_id_rol_fk foreign key(id_rol) references roles(id),
    constraint usuarios_id_mesa_asignada_fk foreign key(id_mesa_asignada) references mesas(id),
    constraint usuarios_id_usuario_creador_fk foreign key(id_usuario_creador) references usuarios(id),
    constraint usuarios_usuario_uq unique(correo),
    constraint usuario_cantidad_ninos_creables_permiso_crear_nino_ck check((permiso_crear_nino=0 and cantidad_ninos_creables=0) or (permiso_crear_nino=1 and cantidad_ninos_creables>0)),
    constraint usuarios_cantidad_ninos_ck check (cantidad_ninos_creables >= cantidad_ninos_creados)
);

create table fotos(
    id int unsigned,
    ruta varchar(250) not null,
    descripcion text,
    id_usuario int unsigned not null,
    constraint fotos_id_pk primary key(id),
    constraint fotos_id_usuario_fk foreign key(id_usuario) references usuarios(id),
    constraint fotos_ruta_uq unique(ruta)
);

create table cuestionarios(
    id int unsigned,
    nombre varchar(250) not null,
    descripcion text,
    fecha_caducidad date,
    tipo enum("CONFIRMACION", "PREF_ALIMENTICIA", "ACOMPANANTE_NINOS", "OTROS") default "OTROS" not null,
    id_usuario_creador int unsigned not null,
    constraint cuestionarios_id_pk primary key(id),
    constraint cuestionarios_nombre_uq unique(nombre),
    constraint cuestionarios_id_usuario_creador_fk foreign key(id_usuario_creador) references usuarios(id)
);

create table preguntas(
    id int unsigned,
    enunciado text not null,
    descripcion text,
    id_cuestionario int unsigned not null,
    constraint preguntas_id_pk primary key(id),
    constraint preguntas_id_cuestionario_fk foreign key(id_cuestionario) references cuestionarios(id)
);

create table respuestas(
    id int unsigned,
    contenido text not null,
    id_pregunta int unsigned not null,
    constraint preguntas_id_pk primary key(id),
    constraint preguntas_id_pregunta_fk foreign key(id_pregunta) references preguntas(id)
);

create table usuario_completar_cuestionario(
    id_usuario int unsigned,
    id_cuestionario int unsigned,
    fecha_completado date,
    constraint usuario_completar_cuestionario_id_usuario_is_cuestionario_pk primary key(id_usuario, id_cuestionario),
    constraint usuario_id_usuario_fk foreign key(id_usuario) references usuarios(id),
    constraint usuario_id_cuestionario_fk foreign key(id_cuestionario) references cuestionarios(id)
);

