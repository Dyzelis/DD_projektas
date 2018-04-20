# DD_projektas
Saugykla skirta DataDog projektui
----------------------------------------------------------------
Before you download, make sure you have symfony 4 installed.
After downloading files you should run these commands:
----------------------------------------------------------------
#to clone the project to your local repository use these:

 $   cd projects/
 $   git clone ...

#if you already have project, install composer:

 $   cd my-project/
 $   composer install
 ---------------------------------------------------------------
 For more information about setting up symfony use this: https://symfony.com/doc/current/setup.html
 ---------------------------------------------------------------
After that, you should create your .env file in root directory.
----------------------------------------------------------------
# This file is a "template" of which env vars need to be defined for your application
# Copy this file to .env file for development, create environment variables when deploying to production
# https://symfony.com/doc/current/best_practices/configuration.html#infrastructure-related-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=df6944f604a27077112d3b50bdaa4537
#TRUSTED_PROXIES=127.0.0.1,127.0.0.2
#TRUSTED_HOSTS=localhost,example.com
###< symfony/framework-bundle ###

###> symfony/swiftmailer-bundle ###
# For Gmail as a transport, use: "gmail://karcersp2018:mintmint22@localhost"
# For a generic SMTP server, use: "smtp://localhost:25?encryption=&auth_mode="
# Delivery is disabled by default via "null://localhost"
MAILER_URL=gmail://projectgaraz2018@gmail.com:adminadmin123@localhost
###< symfony/swiftmailer-bundle ###

###> doctrine/doctrine-bundle ###
# Format described at http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# For an SQLite database, use: "sqlite:///%kernel.project_dir%/var/data.db"
# Configure your db driver and server_version in config/packages/doctrine.yaml
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
###< doctrine/doctrine-bundle ###
------------------------------------------------------------------
After that build/update database:
------------------------------------------------------------------
 $   php bin/console doctrine:schema:update --force
------------------------------------------------------------------
Next, run the server:
------------------------------------------------------------------
 $   php bin/console server:run
------------------------------------------------------------------
