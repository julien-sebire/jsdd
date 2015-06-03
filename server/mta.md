[JSDD](../README.md) &gt; [Setup and secure a VPS](server-security.md) &gt; Basic MTA

# Install and configure a Mail Transfer Agent (MTA)

Services need to send admin e-mails. We need a MTA to send e-mails externally. Exim is Debian's default.

```
apt-get install exim4
```

Choose either of the following two solutions:

## A-solution: send admin e-mails externally only (safest)

Configure exim to only send e-mails through external provider SMTP and reject any external incoming connection.
I use [Mailjet](mailjet.com) services. Edit /etc/exim4/update-exim4.conf.conf based on their default configuration file:

[Mailjet template configuration file](https://fr.mailjet.com/docs/code/exim)

```
vi /etc/exim4/update-exim4.conf.conf
```

The file should read:

```content
dc_eximconfig_configtype='smarthost'
dc_other_hostnames=''
dc_local_interfaces='127.0.0.1'
dc_readhost='doma.in'
dc_relay_domains=''
dc_minimaldns='false'
dc_relay_nets=''
dc_smarthost='in.mailjet.com:587'
CFILEMODE='644'
dc_use_split_config='false'
dc_hide_mailname='true'
dc_mailname_in_oh='true'
dc_localdelivery='mail_spool'
```

Add mailjet smtp credentials found on https://fr.mailjet.com/account/setup

```
vi /etc/exim4/passwd.client
```

Add:

```content
*:mailjet_api_key:mailjet_secret_key
```

## B-solution: relay e-mails from any source

This server is working as a e-mail access provider for my customers. They connect to it to send and read their e-mails.

```
vi /etc/exim4/update-exim4.conf.conf
```

The file should read:

```content
dc_eximconfig_configtype='internet'
dc_other_hostnames='vpsXXXXXX.ovh.net'
dc_local_interfaces=''
dc_readhost=''
dc_relay_domains=''
dc_minimaldns='false'
dc_relay_nets=''
dc_smarthost=''
CFILEMODE='644'
dc_use_split_config='false'
dc_hide_mailname='true'
dc_mailname_in_oh='true'
dc_localdelivery='mail_spool'
```

The 'dc_relay_domains' line will be filled when adding domains.

## Common configuration

Enable TLS on smtp connection

```
echo MAIN_TLS_ENABLE=1 > /etc/exim4/exim4.conf.localmacros
```

Regenerate config file and restart exim.

```
update-exim4.conf
service exim4 restart
```

Test by sending an e-mail to yourself.

```
echo "text" | mail -s subject your@e.mail
```

## For A-solution:
**On Mailjet admin panel**:
Authorize the incoming sender with the value of dc_readhost set in /etc/exim4/update-exim4.conf.conf above.
