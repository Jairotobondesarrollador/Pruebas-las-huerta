FROM mysql:5.5
# Copy over our config file into our mysql server
COPY ./my.cnf /etc/mysql/conf.d/
# Create our custom folder to use for our backups and imports.
RUN mkdir /huerta /huerta/backups /huerta/imports