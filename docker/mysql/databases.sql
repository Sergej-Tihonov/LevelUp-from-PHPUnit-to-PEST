# create additional databases
CREATE DATABASE IF NOT EXISTS `laravel-test` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# grant docker user all privileges. is super user same as root now
# GRANT ALL PRIVILEGES ON *.* TO `docker`@`%`;

# grant privileges to the docker user for the new databases
GRANT ALL PRIVILEGES ON `laravel-test`.* TO `docker`@`%`;
