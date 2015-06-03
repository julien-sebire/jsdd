[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; fail2ban

# Install and configure fail2ban

```
apt-get install fail2ban
```

Startup the service.

```
fail2ban-client -x start
```

Create a custom fail2ban config file and edit it.
```
cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
vi /etc/fail2ban/jail.local
```

Modify the [DEFAULT] section:
Add your static ip's to avoid connection problems on the day you're not quite awaken.

```content
ignoreip = 127.0.0.1 my.sta.tic.ip my.oth.er.ip
```

Change these values to scan for failures over 1 hour (not too long to avoid performance issues) and ban for 1 day.

```content
findtime = 3600
bantime = 86400
```

Set the recipient e-mail address.

```content
destemail = your@e.mail
```

Enable e-mail sending with whois and relevant log lines.

```content
action = %(action_mwl)s
```

Restart the service. This should send you a first e-mail, provided you have at least [installed and configured a MTA](mta.md).

```
service fail2ban restart
```
