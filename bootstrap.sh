###################################################
# VAGRANT LAPP STACK v1.0.0
# MASTER-APPS BOOTSTRAP DEV-SERVER
###################################################

# UPDATE SYSTEM
apt-get update

# UPDATE PACKAGES
apt-get upgrade

# INSTALL GIT
apt-get install -y git

# INSTALL APACHE
apt-get install -y apache2

# ENABLE MOD REWRITE
a2enmode rewrite

# INSTALL PHP REPO WITH ONDREJ
apt-add-repository ppa:ondrej/php
apt-get update

# INSTALL PHP 7.2
apt-get install -y php7.2

# CONFIG APACHE TO PHP 7.2
apt-get install -y libapache2-mod-php7.2

# RESTART APACHE
service apache2 restart

# INSTALL PHP MODULES
apt-get install -y php7.2-common
apt-get install -y php7.2-mcrypt
apt-get install -y php7.2-zip

# INSTALL POSTGRES
#apt-get install curl ca-certificates
#curl https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -
#sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt/ $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list'
#sudo apt-get install postgresql-11 pgadmin3

# UNCOMMENT SETUP MYSQL PASSWORD
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

# INSTALL THE MYSQL SERVER
apt-get install -u mysql_server

# INSTALL PHP-MYSQL LIBS
apt-get install -y php7.2-mysql

# RESTART APACHE SERVER
sudo service apache2 restart