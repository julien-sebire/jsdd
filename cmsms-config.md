[Back to Neurone6 development documentation root](README.md)

# Configure a CMSMS website for url rewriting support

Ok, my requirements are a bit special on this case:

- I need to have a vhost with the following pattern: www.my-client-domain.com

- My development is at: dev.my-agency.com/my-client-domain/ and I don't want to move it to keep my workflow with git.

- There are existing pages at google with the form http://www.my-client-domain.com/content.html and I want to keep the seo, hence, the url's or at least send a status R=301 for google to update its links when the news website's urls aren't exactly the same.

- Url in the browser address bar has to be http://www.my-client-domain.com/content.html

Current configuration:

- Webserver is Apache with mod_rewrite on.

- CMSMS urls are in the form: http://www.my-client-domain.com/index.php?page=my-content

## Setting up the proxy redirection and seo urls

In my vhost my-client-domain.com/httpdocs/.htaccess:

```ini
<IfModule mod_rewrite.c>
  Options +FollowSymlinks
  RewriteEngine on
  
  # old urls
  RewriteRule ^index.html$   /                 [L,R=301]
  RewriteRule ^content.html$ /new-content.html [L,R=301]

  # proxy
  RewriteRule ^(.*)$ http://dev.my-agency.com/my-client-domain/$1 [P,L,QSA]
</IfModule>
```

## Seting up the visible url in browser address bar

In the CMSMS directory/config.php, add:

```php
// allow website to stay behind an url rewriting module
$config['root_url'] = 'http://www.my-client-domain.com';

// allow url rewriting to keep the current seo
$config['url_rewriting']  = 'mod_rewrite'; // with apache
$config['page_extension'] = '.html';
$config['query_var']      = 'page';
```

In the CMSMS directory/.htaccess, uncomment this line:

```ini
#Options +FollowSymLinks
```
becomes:
```ini
Options +FollowSymLinks
```

Find the following lines, uncomment them if need and add your page extension (.html in here) in the RewriteRule regex:
```ini
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteRule ^(.+)$ index.php?page=$1 [QSA]
```
becomes:
```ini
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)\.html$ index.php?page=$1 [QSA]
```

## Access the admin

Well everything front is fine but you can't access the admin anymore. No wrong login/password warning but you stay on he login page...

My fix: set back the admin url to the old address. After all, it all for the client to see, so he can keep on remebering who made his website. Add the following line in CMSMS config.php:

```php
$config['admin_url'] = 'http://dev.my-agency.com/my-client-domain/admin';
```

## CMSMS-side

Finally, don't forget to give your pages the right alias/url. Get to the admin, in the Content/Pages list, setup the *page alias* and *url* fields to the right name. They both will be matched to route to your content, you can event use content.html in url with no harm.

This is it.
