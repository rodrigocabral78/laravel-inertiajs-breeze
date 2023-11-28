#!/usr/bin/env bash

echo -e "Hello World\r";

docker run --name some-mysql \
-e MYSQL_ROOT_PASSWORD=my-Secret#123-pw \
-d \
mysql:8.0.31-debian

docker volume rm --force mysql_data ; \
docker run --rm \
--name mysql8 \
--hostname mysql8 \
--shm-size=1g \
--publish 3306:3306 \
--publish 33060:33060 \
--env MYSQL_ROOT_PASSWORD='Secret#123' \
--env MYSQL_ROOT_HOST=% \
--env MYSQL_DATABASE=homestead \
--env MYSQL_USER=homestead \
--env MYSQL_PASSWORD='Secret#123' \
--volume ./.docker/mysql/custom.cnf:/etc/mysql/conf.d/custom.cnf \
--volume ./.docker/mysql/initial_data:/docker-entrypoint-initdb.d \
--volume mysql_data:/var/lib/mysql \
mysql:8.0.34-oracle
# --volume ./.docker/mysql/my.cnf:/etc/mysql/my.cnf \
# mysql:8.0.34-oracle --character-set-server=utf8mb4 --collation-server=utf8mb4_0900_ai_ci --explicit_defaults_for_timestamp=false --default_time_zone=-04:00
# mysql:8.0.34-debian --character-set-server=utf8mb4 --collation-server=utf8mb4_0900_ai_ci --explicit_defaults_for_timestamp=false --default_time_zone=-04:00

docker run --rm --tty --interactive \
exoplatform/mysqltuner --host docker \
--user root \
--pass='Secret#123' \
--forcemem 1000

docker container exec --tty --interactive mysql8 mysql --verbose --force --user=root --password='Secret#123'

docker container exec --tty --interactive mysql8 bash

mysql --ssl-mode=disabled --verbose --force --host=mysql --port=3306 --user=root --password='Secret#123'

mysql --ssl-mode=disabled --verbose --force --host=`hostname -as` --port=3306 --user=root --password='Secret#123'

mysql --ssl-mode=disabled --verbose --force --host=mysql --database=homestead --user=homestead --password='Secret#123'

mysql --ssl-mode=disabled --verbose --force --host=`hostname -as` --database=homestead --user=homestead --password='Secret#123'

docker volume rm --force postgres_data
docker run --rm \
--name postgres15 \
--hostname postgres15 \
--publish 5432:5432 \
--env POSTGRES_DB=homestead \
--env POSTGRES_USER=homestead \
--env POSTGRES_PASSWORD='Secret#123' \
--env POSTGRES_INITDB_ARGS='--locale-provider=icu --icu-locale=pt-BR' \
--env LANG=pt_BR.utf8 \
--env PGDATA=/var/lib/postgresql/data \
--volume ./.docker/pgsql/initial_data:/docker-entrypoint-initdb.d \
--volume postgres_data:/var/lib/postgresql/data \
postgres:15.4-alpine
# postgres:15.4-bullseye
# postgres:15.4-bookworm

docker container exec --tty --interactive postgres15 cat /usr/share/postgresql/postgresql.conf.sample > my-postgres.conf

docker container exec --tty --interactive postgres15 psql -h postgres15 -U postgres
docker container exec --tty --interactive postgres15 psql -h postgres15 -U default


ORACLE_BASE=/u01/app/oracle \
ORACLE_HOME=/u01/app/oracle/product/11.2.0/xe

docker volume rm --force oracle_data ; \
docker run --rm \
--name oracle11gR2-xe \
--hostname oracle11gR2-xe \
--shm-size=1g \
--publish 1521:1521 \
--publish 8080:8080 \
--env ORACLE_PWD='Secret#123' \
--env ORACLE_CHARACTERSET='AL32UTF8' \
--volume ./.docker/oracle/login.sql:/u01/app/oracle/product/11.2.0/xe/sqlplus/admin/login.sql \
--volume ./.docker/oracle/initial_data:/docker-entrypoint-initdb.d/startup \
--volume oracle_data:/u01/app/oracle/oradata \
oracle-xe:11.2.0.2
# rodrigocabral78/oracle-xe:11.2.0.2
# oracle/database:11.2.0.2-xe

-v /u01/app/oracle/scripts/startup | /docker-entrypoint-initdb.d/startup
-v /u01/app/oracle/scripts/setup | /docker-entrypoint-initdb.d/setup

docker container exec --tty --interactive oracle11gR2-xe bash
docker container exec --tty --interactive oracle11gR2-xe /u01/app/oracle/setPassword.sh 'Secret#123'
docker container exec --tty --interactive oracle11gR2-xe sqlplus sys/'Secret#123'@//localhost:1521/XE as sysdba @/u01/app/oracle/product/11.2.0/xe/sqlplus/admin/login.sql
docker container exec --tty --interactive oracle11gR2-xe sqlplus system/'Secret#123'@//localhost:1521/XE @/u01/app/oracle/product/11.2.0/xe/sqlplus/admin/login.sql
docker container exec --tty --interactive oracle11gR2-xe sqlplus homestead/'Secret#123'@//localhost:1521/XE @/u01/app/oracle/product/11.2.0/xe/sqlplus/admin/login.sql
docker container exec --tty --interactive oracle11gR2-xe sqlplus hr/'Secret#123'@//localhost:1521/XE @/u01/app/oracle/product/11.2.0/xe/sqlplus/admin/login.sql

docker volume rm --force oracle_data
docker run --rm \
--name oracle19c-se2 \
--hostname oracle19c-se2 \
--publish 1521:1521 \
--publish 2484:2484 \
--publish 5500:5500 \
--env ORACLE_SID=SE2 \
--env ORACLE_NAME=SE2 \
--env ORACLE_PWD='Secret#123' \
--env ORACLE_CHARACTERSET='AL32UTF8' \
--env ORACLE_EDITION=STANDARD \
--env ENABLE_ARCHIVELOG=true \
--env ENABLE_TCPS=true \
--workdir /home/oracle \
--volume ./.docker/oracle/initial_data:/docker-entrypoint-initdb.d/setup \
--volume oracle_data:/opt/oracle/oradata \
oracle:19.3.0-se2
# oracle/database:19.3.0-se2

sqlplus sys/'Secret#123'@//localhost:1521/SE2 as sysdba
sqlplus system/'Secret#123'@//localhost:1521/SE2

Global Database Name:ORCLCDB
System Identifier(SID):ORCLCDB

docker container exec --tty --interactive oracle ./setPassword.sh 'Secret#123'

docker pull container-registry.oracle.com/database/free:latest

docker volume rm --force oracle_data
docker run --rm \
--name oracle-xe21c \
--publish 1521:1521 \
--publish 8080:8080 \
--publish 5500:5500 \
--env ORACLE_PWD='Secret#123' \
--env ORACLE_CHARACTERSET='AL32UTF8' \
--volume ./.docker/oracle/initial_data:/docker-entrypoint-initdb.d/setup \
--volume oracle_data:/opt/oracle/oradata \
oracle-xe:21.3.0
# rodrigocabral78/oracle-xe:21.3.0
# oracle/database:21.3.0-xe

docker container exec --tty --interactive oracle21c-xe ./setPassword.sh 'Secret#123'
docker container exec --tty --interactive oracle21c-xe sqlplus sys/'Secret#123'@//localhost:1521/XE as sysdba

sqlplus system/'Secret#123'@//localhost:1521/XE
sqlplus pdbadmin/'Secret#123'@//localhost:1521/XEPDB1



docker run --rm \
--name lumen-jwt-api \
--env-file api/.env \
--env TZ="America/Manaus" \
--env LC_ALL="C.UTF-8" \
--env LANG="pt_BR.UTF-8" \
--env LANGUAGE="pt_BR:pt:pt_PT:en" \
--workdir /app/ \
--volume ./api:/app/ \
--publish 8001:8001 \
--pull always \
php:8.2-cli-bookworm \
php -c $PHP_INI_DIR/php.ini-development -welsS 0.0.0.0:8001 -t public public/index.php

docker container exec --tty --interactive lumen-jwt-api bash

docker build --pull --no-cache \
--tag rodrigocabral78/lumen-jwt-api_php-8.2-cli:v1.0.0 \
--tag rodrigocabral78/lumen-jwt-api_php-8.2-cli:latest \
--tag lumen-jwt-api_php-8.2-cli:v1.0.0 \
--tag lumen-jwt-api_php-8.2-cli:latest .

docker run --rm \
--name lumen-jwt-api \
--env-file api/.env \
--env TZ="America/Manaus" \
--env LC_ALL="C.UTF-8" \
--env LANG="pt_BR.UTF-8" \
--env LANGUAGE="pt_BR:pt:pt_PT:en" \
--workdir /app/ \
--volume ./api:/app/ \
--publish 8001:8001 \
lumen-jwt-api_php-8.2-cli \
php -c $PHP_INI_DIR/php.ini-development -welsS 0.0.0.0:8001 -t public public/index.php
