[JSDD](../README.md) &gt; [Site deployment](deployment.md) &gt; Configure vhost

# Prepare your virtual host and disk space for deployment

## Virtual host setup

Edit hosts file

```
vi /etc/hosts
```

Add example.com to hosts list

```
[your VPS IP] [your_hostname]
```

Create a virtual host

```
vi /etc/apache2/sites-available/example.com
```

With content:

```content
<VirtualHost *:80>
    ServerName example.com
    ServerAlias www.example.com

    DocumentRoot /home/dummy/www/example.com/web

    # For symfony development host
    # DirectoryIndex app_dev.php

    <Directory />
        Options FollowSymLinks
        AllowOverride None
    </Directory>

    <Directory /home/dummy/www/example.com/web>
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        allow from all
        # New directive needed in Apache 2.4.3:
        # Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/example_error.log
    CustomLog ${APACHE_LOG_DIR}/example_access.log combined
</VirtualHost>
```

Enable virtual host

```
a2ensite example.com
```

Reload apache configuration

```
service apache2 reload
```
