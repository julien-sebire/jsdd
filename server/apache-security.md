[JSDD](../README.md) &gt; [LAMP stack](lamp-stack.md) &gt; Apache modsecurity

# Apache modsecurity

_[Source 1](http://doc.ubuntu-fr.org/modsecurity) (french)_

_[Source 2](http://www.thefanclub.co.za/how-to/how-install-apache2-modsecurity-and-modevasive-ubuntu-1204-lts-server)_

**WARNING !**

Both these tutorials contain inaccuracies:

1. We will install libapache2-modsecurity instead of libapache-mod-security
2. Depending on version downloaded, the resulting conf/load files in /etc/apache2/mod-available can be:
   - security2.conf instead of mod-security.conf
   - security2.load instead of mod-security.load


## Install Apache modsecurity

```
apt-get install libxml2 libxml2-dev libxml2-utils libaprutil1 libaprutil1-dev
```

Fix broken x64 library model

```
ln -s /usr/lib/x86_64-linux-gnu/libxml2.so.2 /usr/lib/libxml2.so.2
```

Install ModSecurity and restart Apache server

```
apt-get install libapache2-modsecurity
```

This will create:

- /etc/modsecurity
- /etc/apache2/mod-available/security2.conf (or mod-security.conf)
- /etc/apache2/mod-available/security2.load (or mod-security.load)

Configure default rules

_[source](https://github.com/SpiderLabs/ModSecurity/wiki/Reference-Manual)_

```
mv /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf
vi /etc/modsecurity/modsecurity.conf
```

Turn on the engine

```content
SecRuleEngine On
```

Set up the upload size limit (4Mb here)

```content
SecRequestBodyLimit 4194304
SecRequestBodyInMemoryLimit 4194304
```


## Owasp CRS (Core Rule Set)

[source](https://www.owasp.org/index.php/Category:OWASP_ModSecurity_Core_Rule_Set_Project)

Download and untar default CRS

```
cd /tmp
wget -O SpiderLabs-owasp-modsecurity-crs.tar.gz https://github.com/SpiderLabs/owasp-modsecurity-crs/tarball/master
tar -zxvf SpiderLabs-owasp-modsecurity-crs.tar.gz
cp -R SpiderLabs-owasp-modsecurity-crs-*/* /etc/modsecurity/
rm -f SpiderLabs-owasp-modsecurity-crs.tar.gz
rm -Rf SpiderLabs-owasp-modsecurity-crs-*
mv /etc/modsecurity/modsecurity_crs_10_setup.conf.example /etc/modsecurity/modsecurity_crs_10_setup.conf
```

Create symbolic links to all activated base rules

```
cd /etc/modsecurity/base_rules
for f in * ; do ln -s /etc/modsecurity/base_rules/$f /etc/modsecurity/activated_rules/$f ; done
cd /etc/modsecurity/optional_rules
for f in * ; do ln -s /etc/modsecurity/optional_rules/$f /etc/modsecurity/activated_rules/$f ; done
```

Add rules to Apache2

```
vi /etc/apache2/mods-available/security2.conf (or mod-security.conf)
```

Add this line at the end of IfModule section

```content
Include /etc/modsecurity/activated_rules/*.conf
```

Check if the modules are correctly added

```
a2enmod headers
a2enmod security2
```

Setup log file and restart apache.

```
chown root:adm /var/log/apache2/modsec_audit.log
service apache2 restart
```

This should give you this single line :

```
 * Restarting web server apache2 [ OK ]
```

If any rule parsing error happens, the syntax of the rules need to be downgraded to version 2.6 with the following commands:

```
cd /etc/modsecurity/base_rules
perl ../util/rule-management/remove-2.7-actions.pl -t 2.6 -f .
```

apache2 should now restart.
