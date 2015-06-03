[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; SSH Users and access

# SSH Users and access

## Change root password

_[source](https://en.wikipedia.org/wiki/Passwd)_

```
passwd
```


## Create an ssh access user

All ssh access to the server will be done by a dummy user. Name it the way you want. The less obvious the better.

```
useradd dummy
mkdir /home/dummy
mkdir /home/dummy/.ssh
chmod 700 /home/dummy/.ssh
```

Add your public ssh key to the user's home directory:

```
vi /home/dummy/.ssh/authorized_keys
chmod 400 /home/dummy/.ssh/authorized_keys
chown dummy:dummy /home/dummy -R
```

Set the password for dummy:

```
passwd dummy
```

Test login as dummy user using ssh.


## Configure ssh port and prevent password & root logins + some security setup

```
vi /etc/ssh/sshd_config
```

Change port number to something between 49152 and 65535 and remember it for firewall configuration below.

```content
Port xxxxx
```

Also change these lines.

```content
PermitRootLogin no
PasswordAuthentication no
AllowUsers dummy
ClientAliveInterval 300
ClientAliveCountMax 0
HostbasedAuthentication no
```

Restart ssh

```
service ssh restart
```
