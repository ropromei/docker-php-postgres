# PHP and PostgrreSQL conteinerization test app

# About

This is just a test trying to containerize a basic PHP and PostgreSQL application. In this app, Docker Hub images [postgres:alpine](https://hub.docker.com/_/postgres) and [php:apache](https://hub.docker.com/_/php) are being used as a base. As this is a test application, I did not consider using fixed versions here.

# Running application

## Running in Docker container

This way all of the app components are running containerized. Be sure that you have [Docker Engine](https://docs.docker.com/engine/) already [installed](https://docs.docker.com/engine/install/).

While being in the project directory run the following command:

    docker compose up -d

This pulls down the necessary base images, builds and starts the Apache PHP container using `Dockerfile` (which copies the `src/` catalog contents into container and installs PHP PDO extensions), starts up the PostgreSQL container and inserts the initial data from `dbinit/initial.sql` scripts into batabase.

To stop the application, just run command

    docker compose down

while being in the project directory.

## Running with ./server.sh shell script

This way the script running assumes you have got [PHP](https://www.php.net/) and [Docker Engine](https://docs.docker.com/engine/) installed locally. Also make sure you have enabled PHP [PDO_PGSQL](https://www.php.net/manual/en/ref.pdo-pgsql.php) extension (might require some installation of dependencies and `.ini`-file configuration). That way of running application is the best for further development as you are running PHP development server locally with no need to build it over again.

To start both the PostgreSQL Docker container and PHP development server, run the following commands in the project directory:

    # needed when no execute privilege given yet
    chmod +x server.sh

    ./server.sh

This way you will get an active PHP development server prompt where you can trace request, see stuff logged to error console and so on.

To stop running PHP development server, press `Ctrl-C` on your keyboard.

To stop the PostgreSQL container, run the following command in the project directory:

    docker compose -f docker-compose-localdb.yml down

## Tips for running with own PHP and PostgreSQL database engine

PHP Repository class (`src/script/common/Repository.php`) requires system environment variable DBHOST to be set in order to connect to the PostgreSQL running database engine. In case you have got custom port, username, password or something else, you need to manually modify the PDO DSN string and connection details in the repository class.

`dbinit/initial.sql` script creates you the database with sample entries for you. In both previously mentioned app running methods that script is automatically being launched inside the DB container on initialization.

# Notices

- The credentials for PostgreSQL database are being kept in docker-compose*.yml files. **This is not a secure way to keep your credentials around!**
