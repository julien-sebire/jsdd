[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; Automated tasks

# Automated tasks

## Automatic updates

[source](http://plusbryan.com/my-first-5-minutes-on-a-server-or-essential-security-for-linux-servers)

Install auto-upgrader

```
apt-get install unattended-upgrades
```

Configure the updates you want

```
vi /etc/apt/apt.conf.d/10periodic
```

With content :

```content
APT::Periodic::Update-Package-Lists "1";
APT::Periodic::Download-Upgradeable-Packages "1";
APT::Periodic::AutocleanInterval "7";
APT::Periodic::Unattended-Upgrade "1";
```

And this file

```
vi /etc/apt/apt.conf.d/50unattended-upgrades
```

Keep updates disabled and stick with security updates only

```content
Unattended-Upgrade::Allowed-Origins {
        "${distro_id}:${distro_codename}-security";
//      "${distro_id}:${distro_codename}-updates";
//      "${distro_id}:${distro_codename}-proposed";
//      "${distro_id}:${distro_codename}-backports";
};
```

Send an e-mail alert when applying an update to ensure that everything worked properly.

Uncomment this line and provide your admin e-mail

```content
Unattended-Upgrade::Mail "your@e.mail";
```


## log management

Install and configure logwatch

```
apt-get install logwatch
vi /etc/cron.daily/00logwatch
```

Replace this line

```content
/usr/sbin/logwatch --output mail
```

with this one (provide your admin e-mail)

```content
/usr/sbin/logwatch --output mail --mailto your@e.mail --detail high
```

Finally, adjust the log rotation in /etc/logrotate.d/* according to log files' volume on production server.
