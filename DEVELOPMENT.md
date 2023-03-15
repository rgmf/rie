# Import SQL
For example, if you want to import a file called `database.sql` execute the command:

`cat database.sql | docker compose exec -T rie-mariadb mysql -u<user> -p<password> <database name>`
