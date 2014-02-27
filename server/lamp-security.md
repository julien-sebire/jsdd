[Neurone6 devdoc](../README.md) &gt; LAMP stack for deployment

# Install and secure a LAMP stack for deployment

## Contents

1. [Installation](#a_installation)
1. [Apache security](#a_apache_security)
1. [Apache evasive](#a_apache_evasive)
1. [Php configuration](#a_php_config)



<a name="a_installation"></a>
## LAMP installation


### Install lamp stack + phpmyadmin

```
sudo apt-get install apache2
sudo apt-get install mysql-server mysql-client
sudo apt-get install php5 php5-cli php5-mysql php5-curl php5-gd php5-intl php5-mcrypt php5-memcache php5-sqlite
sudo apt-get install phpmyadmin
```

### Install git for deployment

```
sudo apt-get install git
```


<a name="a_apache_security"></a>
## Apache modsecurity

_[Source 1](http://doc.ubuntu-fr.org/modsecurity) (french)_

_[Source 2](http://www.thefanclub.co.za/how-to/how-install-apache2-modsecurity-and-modevasive-ubuntu-1204-lts-server)_

**WARNING !**

Both these tutorials contain inaccuracies:

1. We will install libapache2-modsecurity instead of libapache-mod-security
2. the resulting conf/load files in /etc/apache2/mod-available will be:
   - security2.conf instead of mod-security.conf
   - security2.load instead of mod-security.load


### Install Apache modsecurity

```
sudo apt-get install libxml2 libxml2-dev libxml2-utils libaprutil1 libaprutil1-dev
```

Fix broken x64 library model

```
sudo ln -s /usr/lib/x86_64-linux-gnu/libxml2.so.2 /usr/lib/libxml2.so.2
```

Install ModSecurity and restart Apache server

```
sudo apt-get install libapache2-modsecurity
```

This will create:

- /etc/modsecurity
- /etc/apache2/mod-available/security2.conf
- /etc/apache2/mod-available/security2.load

Configure default rules

_[source](https://github.com/SpiderLabs/ModSecurity/wiki/Reference-Manual)_

```
sudo mv /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf
sudo vi /etc/modsecurity/modsecurity.conf
```

Turn on the engine

```
SecRuleEngine On
```

Set up the upload size limit (4Mb here)

```
SecRequestBodyLimit 4194304
SecRequestBodyInMemoryLimit 4194304
```


### Owasp CRS (Core Rule Set)

[source](https://www.owasp.org/index.php/Category:OWASP_ModSecurity_Core_Rule_Set_Project)

Download and untar default CRS

```
cd /tmp
sudo wget -O SpiderLabs-owasp-modsecurity-crs.tar.gz https://github.com/SpiderLabs/owasp-modsecurity-crs/tarball/master
sudo tar -zxvf SpiderLabs-owasp-modsecurity-crs.tar.gz
sudo cp -R SpiderLabs-owasp-modsecurity-crs-*/* /etc/modsecurity/
sudo rm SpiderLabs-owasp-modsecurity-crs.tar.gz
sudo rm -R SpiderLabs-owasp-modsecurity-crs-*
sudo mv /etc/modsecurity/modsecurity_crs_10_setup.conf.example /etc/modsecurity/modsecurity_crs_10_setup.conf
```

Create symbolic links to all activated base rules

```
cd /etc/modsecurity/base_rules
for f in * ; do sudo ln -s /etc/modsecurity/base_rules/$f /etc/modsecurity/activated_rules/$f ; done
cd /etc/modsecurity/optional_rules
for f in * ; do sudo ln -s /etc/modsecurity/optional_rules/$f /etc/modsecurity/activated_rules/$f ; done
```

Add rules to Apache2

```
sudo vi /etc/apache2/mods-available/security2.conf
```

Add this line at the end of IfModule section

```
Include /etc/modsecurity/activated_rules/*.conf
```

Check if the modules are correctly added

```
sudo a2enmod headers
sudo a2enmod security2
```

Setup log file and restart apache

```
sudo chown root:adm /var/log/apache2/modsec_audit.log
sudo service apache2 restart
```

This should give you this single line :

```
 * Restarting web server apache2 [ OK ]
```

If more, there has been a problem!


<a name="a_apache_evasive"></a>
## Apache module evasive

_[source](http://www.thefanclub.co.za/how-to/how-install-apache2-modsecurity-and-modevasive-ubuntu-1204-lts-server)_

```
sudo apt-get install libapache2-mod-evasive
```

**TODO**


<a name="a_php_config"></a>
## Php and phpMyAdmin settings

### Php time zone

```
sudo vi /etc/php5/apache2/php.ini
```

Uncomment timezone line and add Paris time zone

```
date.timezone = Europe/Paris
```

Same for cli php ini

```
sudo vi /etc/php5/cli/php.ini
```

Uncomment timezone line and add paris time zone

```
date.timezone = Europe/Paris
```


### Stop revealing infrastructure details

Don't display but log errors, ...

**TODO**


```
sudo vi /etc/php5/apache2/php.ini
```

**TODO**



### Install php5-suhosin

**TODO**



## PhpMyAdmin settings

Edit apache config to allow .htaccess use in phpmyadmin folder

```
sudo vi /etc/phpmyadmin/apache.conf
```

After this (line 8):

```
<Directory /usr/share/phpmyadmin>
    Options FollowSymLinks
    DirectoryIndex index.php
```

add this line

```
    AllowOverride All
```

Protect phpmyadmin

```
sudo vi /usr/share/phpmyadmin/.htaccess
```

With .htaccess content:

```
AuthType Basic
AuthName "Restricted Files"
AuthUserFile /home/dummy/.htpasswd
Require valid-user
```

Create password file

```
sudo htpasswd -c /home/dummy/.htpasswd dummy
```
