[JSDD](../README.md) &gt; [LAMP stack](lamp-stack.md) &gt; (Optional) PhpMyAdmin

# Install and configure PhpMyAdmin

```
apt-get install phpmyadmin
```

## PhpMyAdmin settings

Edit apache config to allow .htaccess use in phpmyadmin folder

```
vi /etc/phpmyadmin/apache.conf
```

After this (line 8):

```content
<Directory /usr/share/phpmyadmin>
    Options FollowSymLinks
    DirectoryIndex index.php
```

add this line

```content
    AllowOverride All
```

add phpmyadmin to the apache configuration

```
vi /etc/apache2/apache2.conf
```

add this line

```
Include /etc/phpmyadmin/apache.conf
```

Protect phpmyadmin

```
vi /usr/share/phpmyadmin/.htaccess
```

With .htaccess content:

```content
AuthType Basic
AuthName "Restricted Files"
AuthUserFile /home/dummy/.htpasswd
Require valid-user
```

Create password file

```
htpasswd -c /home/dummy/.htpasswd dummy
```

Finish up by restarting apache:

```
service apache2 restart
```
