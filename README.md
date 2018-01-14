# WP-CLI based Set-Up

1. Install a PHP/MySQL/Apache Server (e.g. XAMPP https://www.apachefriends.org/index.html, start via `sudo /opt/lampp/lampp start`)
2. Make sure PHP is in your $PATH if you didn't install it via package manager. (e.g. add `/opt/lampp/bin` to your `~/.profile`)
3. Install wp-cli (http://wp-cli.org/)
4. Clone this repo (`git clone https://github.com/fluechtlingshilfe-babelsberg/forum`), `cd forum` into it.
5. Run `wp core download`
6. Run `wp core config --dbname=flueba --dbuser=root`
7. Create the database by running `mysql -u root -e "CREATE DATABASE flueba;"`
8. Make sure Apache is configured to serve your wordpress folder (e.g. make sure your `/opt/lampp/etc/httpd.conf`'s `DocumentRoot` and the `Directory` right below it point to the directory).
9. Visit localhost and follow the wizard.
10. Via the wordpress admin interface, install and activate the "Advanced Custom Fields" plugin. **NOTE:** if you get an error, make sure the user can access the repo folder. Or, even easier, run `wp plugin install --activate advanced-custom-fields`.
10. Select flueba theme in the admin interface.

To make sure that the user that runs the server can write plugins, run `sudo chown -R daemon:daemon .` **inside the repository folder**. To make sure that you can still put, also run `sudo usermod -a -G daemon $USER` to add your user to the `daemon` group. Afterwards, you will need to relogin.

