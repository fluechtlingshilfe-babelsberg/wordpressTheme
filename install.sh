#!/bin/bash

# deploy.sh dbname dbuser url admin_password admin_email

title='Flüchtlingshilfe Babelsberg' 

git clone git@github.com:fluechtlingshilfe-babelsberg/wordpressTheme.git flueba-site
cd flueba-site
wp core download
wp core config --dbname=$1 --dbuser=$2
mysql -u $2 -e "CREATE DATABASE $1;"
wp core install --url="$3" --title="$title" --admin_user=admin --admin_password="$4" --admin_email="$5"
wp language core install --activate de
wp plugin install --activate advanced-custom-fields
wp theme activate flueba

p1=$(wp post create --post_type=page --post_title='Über uns' --porcelain)
p2=$(wp post create --post_type=page --post_title='Mitmachen' --porcelain)
p3=$(wp post create --post_type=page --post_title='Unsere Arbeit' --porcelain)
p4=$(wp post create --post_type=page --post_title='Hilfreiches' --porcelain)
p5=$(wp post create --post_type=page --post_title='Kontakt' --porcelain)
p6=$(wp post create --post_type=page --post_title='Mitglied werden' --porcelain)
p7=$(wp post create --post_type=page --post_title='Newsletter abbonieren' --porcelain)
p8=$(wp post create --post_type=page --post_title='Spenden' --porcelain)

wp menu create "Primary"
wp menu location assign "Primary" "primary"
wp menu item delete $(wp menu item list "Primary" --format=ids)
wp menu item add-post "Primary" $p1
wp menu item add-post "Primary" $p2
wp menu item add-post "Primary" $p3
wp menu item add-post "Primary" $p4
wp menu item add-post "Primary" $p5
wp menu create "Secondary"
wp menu item delete $(wp menu item list "Secondary" --format=ids)
wp menu location assign "Secondary" "secondary"
wp menu item add-post "Secondary" $p6
wp menu item add-post "Secondary" $p7

