# Development Intro

This document provides a quick overview of the project and its best practices.
All filepath are relative to our custom WordPress theme, that can be found in the folder `wp-content/themes/flueba`.

### Styles

Custom CSS styles are placed in the `css/custom.css` file, [Bootstrap](http://getbootstrap.com/docs/4.0/layout/overview/)
is loaded as well and should be used whenever possible instead of custom CSS (e.g., instead of specifying
a `margin-right` on an element, add the `mr-2` class). Not all existing code adheres to this best practice,
everyone is encouraged to adapt it accordingly.

### Page Templates

Different template files are loaded depending on the type of page. [This diagram](https://developer.wordpress.org/files/2014/10/wp-hierarchy.png)
is of great help when trying to figure out which file to change. Currently, all pages will use our index.php and some pages
have for example a `page-arbeitsgruppen.php` file, which specifies the custom template to use for the page with the permalink/slug
`arbeitsgruppen`.

### Custom Data

Static content that needs to be structured in a very specific way (e.g. in multiple columns/sections) is currently hardcoded. All simpler
content (e.g. just a wall of text, maybe with an image or two) will use the page's `the_content()` text field, for easier editing.
The plugin [AdvancedCustomFields](https://www.advancedcustomfields.com/resources/) is installed and should be used for all data that needs
to be more flexible. Custom post types (dates, etc.) are declared in the `include/post-types.php` file.

Images needed for the theme are placed in the `images` folder.
