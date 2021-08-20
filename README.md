Hfnuthemes module
==================

This is a module for Jelix, to select a theme for the application.

This module is for Jelix 1.7.2 and higher.

It was originally developped into the [Havefnubb project](https://github.com/havefnubb/havefnubb/).

Setting up the module
=====================

The best method is to use Composer.

In a commande line inside your project, execute:

```
composer require "havefnubb/hfnuthemes-module"
```

Launch the configurator for your application to enable the module

```bash
php dev.php module:configure hfnuthemes
```

After configuring the module, you should launch the installer of your application
to activate the module:

```bash
php install/installer.php
```

You should attach url of hfnuthemes to the admin entrypoint of your
application. Exemple, in your `app/system/urls.xml`:

```xml
<classicentrypoint name="admin" default="false" noentrypoint="false">
    ...
    <url pathinfo="/admin/themes" module="hfnuthemes" include="urls_admin.xml"/>
    ...
</classicentrypoint>

```

Providing a theme
=================

Themes should be installed into `app/themes/` (themes bundled with the application) 
or into `var/themes` (themes installed by the user).

These directories should contain a directory for each theme, containing templates,
as described into the [Jelix documentation](https://docs.jelix.org/en/manual/application/themes).
Css and images of templates should be installed into `www/themes/`.

For hfnuthemes, a PHP file `theme.php` should be saved into each theme directory.

It should contain a `$themeInfos` variable like this:

```php
$themeInfos = array (
	'name'=>'Default',
	'createddate'=>'2009-09-01',
	'label'=>array('en_US'=>'Default Theme',
				   'fr_FR'=>'Thème Principal'
				   ),
	'description'=>array('en_US'=>'Default theme  of HaveFnuBB!',
						 'fr_FR'=>'Thème Principal de HaveFnuBB! ',
						),
	'licence'=>array('url'=>'http://www.gnu.org/licenses/gpl.html',
					 'description'=>'GNU General Public Licence'
					 ),
	'copyright'=>'2008-2011 FoxMaSk',
	'creator'=>array('name'=>'FoxMaSk','email'=>'foxmask@foxmask.net','active'=>true),
	'homepageURL'=>'http://www.havefnubb.jelix.org/',
	'updateURL'=>'',
	'version'=>'1.0.1'
);
```

In the web directory of the theme (for example `www/themes/theme_name/`), you 
should save a `theme.png` file, displaying a screenshot or the logo of the theme.
