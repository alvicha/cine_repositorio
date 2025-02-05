FROM mariadb:latest

ENV MYSQL_ROOT_PASSWORD=contraseñaRoot
ENV MYSQL_DATABASE=cine
ENV MYSQL_USER=usuario1
ENV MYSQL_PASSWORD=contrasenyaUsuario1

COPY cine_mejor.sql /docker-entrypoint-initdb.d/

EXPOSE 3306