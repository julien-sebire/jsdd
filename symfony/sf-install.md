[JSDD](../README.md) &gt; [Symfony dev](symfony.md) &gt; Install Symfony

# Install Symfony

## Install composer if not yet installed.

Update composer if older than 30 days (recommended).

```bash
composer self-update
```

## Get Symfony standard edition

### Install Symfony

Make your project a directory.
Install symfony standard edition in it.

```bash
composer create-project symfony/framework-standard-edition . '~2.6'
```

Fill in the gaps.

### Symfony 2.6 requirements page fix

Edit app/SymfonyRequirements.php. At the bottom (lines 750-754), in the getComposerVendorDir method, replace:

```content
        if (isset($composerJson->config)) {
```

with

```content
        if (isset($composerJson->config->{'vendor-dir'})) {
```

And

```content
        return __DIR__.'/../vendor';
```

with

```content
        return __DIR__.'/../vendor/composer';
```

### Create the corresponding database.

```bash
php app/console doctrine:database:create
```

### Check that all the requirements are met

Visit %root_dir%/web/config.php in your browser.

## Complements

### Yui Compressor for javascript and css
download yui compressor jar file 2.4.7 into app/Resources/java/

```bash
mkdir app/Resources/java
cd app/Resources/java
wget http://repo1.maven.org/maven2/com/yahoo/platform/yui/yuicompressor/2.4.7/yuicompressor-2.4.7.jar
```
