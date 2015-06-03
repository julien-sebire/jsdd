[JSDD](../README.md) &gt; [LAMP stack](lamp-stack.md) &gt; Apache evasive

# Apache module evasive

_[source](http://www.thefanclub.co.za/how-to/how-install-apache2-modsecurity-and-modevasive-ubuntu-1204-lts-server)_

Mod_evasive provides protection against DoS, DDoS or brute force attacks.

```
apt-get install libapache2-mod-evasive
```

Create log directory for mod_evasive and give it to www-data user.

```
mkdir /var/log/mod_evasive
chown www-data:www-data /var/log/mod_evasive
```

Configure mod_evasive:

```
vi /etc/apache2/mods-available/mod-evasive.conf
```

with this content:

```content
<ifmodule mod_evasive20.c>
   DOSHashTableSize 3097
   DOSPageCount  2
   DOSSiteCount  50
   DOSPageInterval 1
   DOSSiteInterval  1
   DOSBlockingPeriod  10
   DOSLogDir   /var/log/mod_evasive
   DOSEmailNotify  [your@e.mail]
   DOSWhitelist   127.0.0.1
</ifmodule>
```

Enable mod_evasive.

```
a2enmod mod-evasive
```

Restart apache

```
service apache2 restart
```
