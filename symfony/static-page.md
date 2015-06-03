[JSDD](../README.md) &gt; [Symfony dev](symfony.md) &gt; First static page in AppBundle

# First static page in AppBundle

Symfony >= 2.6 comes with an AppBundle already setup. Let's use it.

## Application routing

My thinking is that routing should be kept globally for the application.
All the more, I think that annotations are a bad practice in controllers.
So I keep all the routing in app/config/routing.yml.

- Remove routing annotations from src/AppBundle/Controller/DefaultController.
- Remove routing from src/*Bundle/Resources/config/routing.yml

## Application's default pages

Let's use the AppBundle to host all this:

```bash
mkdir -p src/AppBundle/Resources/views/Pages
mkdir src/AppBundle/Resources/views/Layout
mkdir src/AppBundle/Resources/views/Blocks
mv app/Resources/views/base.html.twig src/AppBundle/Resources/views/Layout
mv app/Resources/views/default/index.html.twig src/AppBundle/Resources/views/Pages
```

Don't remove app/Resources/views though, even if it's empty, Symfony wants it...


In src/AppBundle/Controller/DefaultController.php, replace:

```content
    return $this->render('default/index.html.twig');
```

with:

```content
    return $this->render('AppBundle:Pages:index.html.twig');
```

In src/AppBundle/Resources/views/Pages/index.html.twig, replace:

```content
{% extends 'base.html.twig' %}
```

with:

```content
{% extends 'AppBundle:Layout:base.html.twig' %}
```
