[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; Server access

# Setup firewall port for ssh with iptables
[Source](https://wiki.debian.org/iptables)

Create a draft script /etc/iptables.test.rules

```
vi /etc/iptables.test.rules
```

with following content:

```content
*filter

# Allows all loopback (lo0) traffic.
-A INPUT -i lo -j ACCEPT

# Drop all traffic to 127/8 that doesn't use lo0.
-A INPUT ! -i lo -d 127.0.0.0/8 -j REJECT

# Accepts all established inbound connections.
-A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT

# Allows all outbound traffic.
# You could modify this to only allow certain traffic.
-A OUTPUT -j ACCEPT

# Allow icmp
-A INPUT -p icmp -j ACCEPT

# Allows SSH connections
# The --dport number is the same as in /etc/ssh/sshd_config.
# You can personalize this to accept only your fixed private ip's as source.
-A INPUT -p tcp -m state --state NEW -s my.pri.vat.eip --dport xxxxx -j ACCEPT
-A INPUT -p tcp -m state --state NEW -s an.oth.er.ip --dport xxxxx -j ACCEPT

# Insert other rules here (http, https, pop, imap, smtp, ...).

# log iptables denied calls (access via 'dmesg' command).
-A INPUT -m limit --limit 5/min -j LOG --log-prefix "iptables denied: " --log-level 7

# Reject all other inbound - default deny unless explicitly allowed policy:
-A INPUT -j REJECT
-A FORWARD -j REJECT

COMMIT

```
**!WARNING!**
**Don't lock yourself out of your own server: xxxxx is the port number for ssh defined in /etc/ssh/sshd_config.**

Activate these new rules:

```
iptables-restore < /etc/iptables.test.rules
```

Once your rules are what you want, save the them to the master iptables file:

```
iptables-save > /etc/iptables.up.rules
```

To make sure the iptables rules are started on a reboot we'll create a new file:

```
vi /etc/network/if-pre-up.d/iptables
```

Add these lines to it:

```content
#!/bin/sh
/sbin/iptables-restore < /etc/iptables.up.rules
```

Make it executable:

```
chmod +x /etc/network/if-pre-up.d/iptables
```

Test the connections.
Add new rules to open http(s), smtp, ... access.
