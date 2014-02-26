[Neurone6 devdoc](../README.md) &gt; Prepare deployment

# Prepare your virtual host and disk space for deployment


## Contents

1. [Setup virtual host](#a_virtual_host)
1. [Deploy with git](#a_git_deploy)


<a name="a_virtual_host"></a>
## Virtual host setup

Edit hosts file

```
sudo vi /etc/hosts
```

Add example.com to hosts list

```
[your VPS IP] [your_hostname] ... [another_hostname]
```

Create a virtual host

```
sudo vi /etc/apache2/sites-available/example.com.conf
```

With content:

```
<VirtualHost *:80>
    ServerName example.com

    DocumentRoot /home/dummy/www/example.com/web

    <Directory /home/dummy/www/example.com/web>
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        allow from all
        # New directive needed in Apache 2.4.3:
        Require all granted
    </Directory>
</VirtualHost>
```

Enable virtual host

```
sudo a2ensite example.com.conf
```

Reload apache configuration

```
sudo service apache2 reload
```


<a name="a_git_deploy"></a>
## Deploy with git

__**WIP**__

Create bare repo in ~/git and add remote to local copy:

**On local computer:**

```
git remote add server dummy@your.vps.ip:~/git/
```

Clone git repo to server

```
cd ~/www/example.com
git clone ~/git .
```
