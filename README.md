CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements & Configuration
 * Installation
 * How To Use
 * Time Taken to Create the module
 * Resources Used

INTRODUCTION
------------

This module helps access the content of the node in JSON representation on the basis of site API key authentication.


REQUIREMENTS & CONFIGURATION
------------

No special requirements and configuration needed.


INSTALLATION
------------

Install as you would normally install any Drupal module.


HOW TO USE
------------

 * Go to the Site Information form.
 * Update your Site API Key and save the configuration. (The button text will change as soon as you update the API key.)
 * Go to the page_json/{your_site_api_key}/{node_id_of_type_page} URL on your website and you will get the JSON representation of the node_id you entered.(You will be given an access denied error if the node ID is not of the type 'page' or if it doesn't exist or if the Site API Key does not match with the one updated in the site configurations.)


TIME TAKEN TO CREATE THE MODULE
------------

08 Hours


RESOURCES USED
------------

 * https://www.zyxware.com/articles/5482/drupal-8-article-about-how-to-configure-variables-in-drupal-8
 * https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes
 * http://www.drupal8.ovh/en/tutoriels/32/return-json-array-as-resut-provide-json-interface
