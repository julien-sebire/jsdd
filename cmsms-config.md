[Back to Neurone6 development documentation root](README.md)

# Configure a [CMSMS](http://www.cmsmadesimple.org/) website with url rewriting support

Ok, my requirements are a bit special on this case:

- I need to have a vhost with the following pattern: www.my-client-domain.com

- My development is at: http://dev.my-agency.com/my-client-domain/ and I don't want to move it in order to keep my workflow with git.

- There are existing pages at Google with the form http://www.my-client-domain.com/content.html and I want to keep the seo, that is the urls, or at least send a status R=301 for Google to update its links when the new website's urls aren't exactly the same.

- Visible Url in the browser's address bar has to be in the form http://www.my-client-domain.com/content.html

Current configuration:

- Webserver is Apache with mod_rewrite on.

- CMSMS urls are in the form: http://www.my-client-domain.com/index.php?page=my-content

## Setting up the proxy redirection and seo urls

In my vhost root, .htaccess goes:

```
<IfModule mod_rewrite.c>
  Options +FollowSymlinks
  RewriteEngine on
  
  # old urls
  RewriteRule ^index.html$   /                 [L,R=301]
  RewriteRule ^content.html$ /new-content.html [L,R=301]
  # ...

  # proxy
  RewriteRule ^(.*)$ http://dev.my-agency.com/my-client-domain/$1 [P,L,QSA]
</IfModule>
```

## Seting up the visible url in browser's address bar

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
```
#Options +FollowSymLinks
```
becomes:
```
Options +FollowSymLinks
```

Set the RewriteBase to the subdirectory on the dev subdomain :
```
RewriteBase /
```
becomes:
```
RewriteBase /my-client-domain
```

Find the following lines, uncomment them if needed and add your page extension (.html in here) in the RewriteRule regex:
```
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteRule ^(.+)$ index.php?page=$1 [QSA]
```
becomes:
```
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)\.html$ index.php?page=$1 [QSA]
```

## Access the admin

Well everything front is working fine but you can't access the admin anymore. No wrong login/password warning but you stay on he login page...

My dirty fix for the moment: set back the admin url to the dev address. After all, it's all for the client to see, then he can keep on remembering who made his website. Add the following line in CMSMS config.php:

```php
$config['admin_url'] = 'http://dev.my-agency.com/my-client-domain/admin';
```

## CMSMS-side

Finally, don't forget to give your pages the right alias/url. Get to the admin, in the Content/Pages list, setup the *page alias* and *url* fields to the right name. They both will be matched to route to your content, you can event use content.html in url with no harm.

This is it.
