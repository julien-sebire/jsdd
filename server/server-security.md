[Neurone6 devdoc](../README.md) &gt; Setup and secure a VPS

# Setup and secure a VPS

**TODO**
create a log e-mail redirection to our addresses, then use mailjet for admin e-mails

## Contents

1. [Ssh Users and access](#a_ssh_users)
1. [Server access](#a_server_access)
1. [Automated tasks](#a_automated_tasks)


<a name="a_ssh_users"></a>
## SSH Users and access

### Change root password

_[source](https://en.wikipedia.org/wiki/Passwd)_

```
passwd
```


### Create an ssh access user

All ssh access to the server will be done by a dummy user. Name it the way you want. The less obvious the better.

```
useradd dummy
mkdir /home/dummy
mkdir /home/dummy/.ssh
chmod 700 /home/dummy/.ssh
```

Add your public ssh key to the user's home directory

```
vi /home/dummy/.ssh/authorized_keys
chmod 400 /home/dummy/.ssh/authorized_keys
chown dummy:dummy /home/dummy -R
```

Set the password for dummy

```
passwd dummy
```

Finally allow sudo for dummy user

```
visudo
```

Add this line

```
dummy  ALL=(ALL) ALL
```

And test login as dummy user using ssh


### Configure ssh to prevent password & root logins + some security setup

```
vi /etc/ssh/sshd_config
```

Change these lines

```
PermitRootLogin no
PasswordAuthentication no
AllowUsers fnmns
ClientAliveInterval 300
ClientAliveCountMax 0
HostbasedAuthentication no
```

Restart ssh

```
sudo service ssh restart
```

Setup ACL

```
sudo apt-get install acl
```

**TODO** ?


<a name="a_server_access"></a>
## Server access

### Disable Open DNS Recursion and Remove Version Info - BIND DNS Server

```
nano /etc/bind/named.conf.options
```

Add the following

```
version "Not Disclosed";
```

Restart bind

```
/etc/init.d/bind9 restart
```

### Setup firewall ports

Setup firewall allowed ports http, https and ssh

```
ufw allow 80
ufw allow 443
ufw allow 22
ufw enable
```


### Install and configure fail2ban

```
apt-get install fail2ban
```

Configure fail2ban to kick off anyone scanning ports for ssh

**TODO**


<a name="a_automated_tasks"></a>
## Automated tasks

### automatic updates

Send an e-mail alert when applying an update to manually ensure that everything works properly

**TODO**


### log management

Install and configure logwatch

Setup log rotation

**TODO**
