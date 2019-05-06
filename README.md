
# Install
* Setup wordpress as usual, around this repo's theme folder.
* Copy your version of advanced-custom-fields-pro to the `wp-content/plugins` and activate the plugin.
* Switch to the `fhb` theme.
* Choose `Home` as the static front page.
* Import XML from old website setup.

# A Note on Custom Fields
For portability, we have the acf config exported as .php in acf.php. When updating acf fields via the UI, you will always need to re-export and update the acf.php file in the theme, or else they won't show up.
