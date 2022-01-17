## Gesior-AAC

#### Caso esteja utilizando uniform server, siga o passo descrito no final do readme para habilitar a compatibilidade com o site.

#### If you are using uniform server, follow the step described at the end of the readme for enable compatibility with the sitte.

## Instalação

### Requesitos

* [Apache](http://www.apache.org/) with [mod_rewrite](http://httpd.apache.org/docs/current/mod/mod_rewrite.html) enabled + [PHP](http://php.net) Version 5.6 or newer

### Para instalar

* Clone o Gesior-AAC do Github.
* altere a permissão de escrita em /cache.

```bash
sudo chmod -R 777 /cache
```

### Dicas e truques

* Este site possui alguns implementos de segurança, aqui você pode usar o apache2 para aplicá-los.
* execute esses comandos para maximizar sua segurança.
````bash
sudo a2enmod headers
sudo a2enmod rewrite 
````

### PHP PRECISA DO SEGUINTE
```bash
sudo apt-get install php5-gd
sudo apt-get install php5-curl
```

Certifique-se de que o curl esteja habilitado no arquivo php.ini. Para mim está em /etc/php5/apache2/php.ini, se você não encontrar, esta linha pode estar em /etc/php5/conf.d/curl.ini. Certifique-se de que a linha:
extension=curl.so

now restart apache.:
```bash
sudo systemctl restart apache2
```

## Install composer https://getcomposer.org/download/

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
```

After that in the terminal enter the site folder and run the command
```bash
cd /var/www/html && composer install
```

### FOR UBUNTU ACCOUNTING PROBLEMS
If you have trouble registering using ubuntu or any other version of php where the site claims to have registered but was not done, simply run the following command on your database:
```bash
SET GLOBAL sql_mode = '';
```

### UniformServer
If you are using UniformServer, you will need to enable the module that allows SSL
Go to: PHP/Edit Basic and Modules
PHP Modules Enable/Disable
Enable the "php_openssl.dll" file

## Main Dev
@riicksouzaa

## credits
@gesior <br>
@Felipe Monteiro <br>
And more developers

## License
* Open Source
