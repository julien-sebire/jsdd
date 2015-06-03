[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; Bind DNS server

# Bind9 configuration
[Source](http://howto.biapy.com/fr/debian-gnu-linux/serveurs/autres/configurer-un-serveur-dns-bind-sur-debian)

## Logging

Create logging dir :
```
mkdir -p /var/log/named/
chown -R bind:bind /var/log/named/
```

Enable logging :

```
vi /etc/bind/named.conf.logging
```

With content :

```content
logging {
    // Logging security events for fail2ban
    channel security_file {
        file "/var/log/named/security.log" versions 3 size 30m;
        severity dynamic;
        print-time yes;
    };
    category security {
        security_file;
    };

    // Logging queries for Munin
    channel b_query {
        file "/var/log/named/query.log" versions 2 size 1m;
        print-time yes;
        severity info;
    };
    category queries {
        b_query;
    };
};
```

And in :

```
vi /etc/bind/named.conf.options
```

Add the following

```content
// Include logging configuration.
include "/etc/bind/named.conf.logging";
```

## Disable Open DNS Recursion and Remove Version Info - BIND DNS Server

```
vi /etc/bind/named.conf.options
```

Add the following

```content
version "Not Disclosed";
```

Enable log rotation:

```
vi /etc/logrotate.d/bind9
```

## Setup DNS forward server

Find your box's ISP DNS server ip in /etc/resolv.conf and provide it in the 'forwarders' option:

```
vi /etc/bind/named.conf.options
```

```content
#example for ovh VPS
forwarders {
    213.186.33.99;
};
```

## Allow DNS use bind local network

Find your server's interface ip's:

```
ifconfig | grep "inet "
```

Provide 127.0.0.0/8 and the other IP's with mask /24:

```
vi /etc/bind/named.conf.options
```

Add this at the end:

```content
// Local networks access control list.
acl local-networks {
    // exemple for lo
    127.0.0.0/8;
    // exemple for venet0
    127.0.0.2/24;
    // exemple for venet0:0
    37.59.115.118/24;
};
```

And this under the "directory" line:
```content
    // Allowing queries for local networks.
    allow-query {
            local-networks;
    };

    // Allowing recursion for local networks.
    allow-recursion {
            local-networks;
    };
```


## Enable fail2ban to secure bind9

```
vi /etc/fail2ban/jail.local
```

Find the [named-refused-tcp] section. Enable it:

```content
[named-refused-tcp]
enabled = true
```

## Finally restart bind and fail2ban:

```
/etc/init.d/fail2ban restart
/etc/init.d/bind9 restart
```
