[JSDD](../README.md) &gt; [LAMP stack](lamp-stack.md) &gt; Php configuration

# Php and phpMyAdmin settings

## Php CLI

```
vi /etc/php5/cli/php.ini
```

Uncomment timezone line and add Paris time zone.

```content
date.timezone = Europe/Paris
```

## Php in web browser

```
vi /etc/php5/apache2/php.ini
```


### Time zone

Uncomment timezone line and add Paris time zone

```content
date.timezone = Europe/Paris
```


### Stop revealing infrastructure details

Error reporting:

```
vi /etc/php5/apache2/php.ini
```

Modify the following lines (not adjacent in the file):

```content
; Default for production server should be set to E_ALL & ~E_DEPRECATED & ~E_STRICT but we want all errors to be logged:
error_reporting = E_ALL

; We don't need errors as html in logs:
html_errors = Off

; Don't expose php engine:
expose_php = Off
```


### Php coding style

```content
; No short open tags allowed:
short_open_tag = Off

; Default charset (just uncomment line):
default_charset = "UTF-8"
```


### Misc. features

```content
; Allows bigger files upload for customer ftp.
upload_max_filesize = 128M
```


## Restart apache to take the changes in account.

```
service apache2 restart
```


### WIP -- Everything below has to be studyed

zlib compression

[mail function]

url_rewriter.tags
