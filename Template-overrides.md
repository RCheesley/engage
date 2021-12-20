# About template overrides

Akeeba Engage generates HTML output which is compatible with the CSS framework Bootstrap used by default in Joomla 3. Furthermore, it has some minimal CSS for the page elements that don't have a suitable Bootstrap equivalent.

The HTML output can be overridden by means of _Template Overrides_. We recommend consulting the [official Joomla! documentation on Template Overrides](https://docs.joomla.org/How_to_override_the_output_from_the_Joomla!_core) to get an overview of the process.

The following guide assumes that you are familiar with that basic Joomla concept.

All frontend view templates shipped with Akeeba Engage can be found in `components/com_engage/tmpl/Comments`.
 
Do NOT edit these files directly. They will overwritten when you update or re-install the component.

Instead, create a new folder `templates/YOUR_TEMPLATE/html/com_engage/Comments` where YOUR_TEMPLATE is the name of your site's template. Copy the files you want to customise in that folder and edit the files there.

# Comments display

Used when you are displaying comments in an HTML output page. That's what you most likely need to customize.

* `default.php`  The main file used for comments display. This provides the outer structure of the comments area.
* `default_list.php`  The comments list. This is the inner structure of the discussion.
* `default_form.php`  New comment / reply form.
* `default_login.php`  Login area when the form cannot be displayed due to unsufficient user permissions.

# Edit a comment

Used when a comment manager is editing a comment.

* `form.php`  The entire page displaying the comment editor.

# Comments count summary

Used when displaying the comments count summary before or after an article displayed in the Featured Articles or Category Blog page in Joomla. These are rendered with Joomla layouts. The source files are in `plugins/content/engage/layouts/akeeba/engage/content` and their overrides need to placed in `templates/YOUR_TEMPLATE/html/layouts/akeeba/engage/content` where YOUR_TEMPLATE is the name of your site's template.

There are two files:

* `category.php` is used when Joomla is displaying a category in the Category Blog layout.
* `featured.php` is used when Joomla is displaying a category in the Featured Articles layout.

In both cases the layout file is used for each individual article displayed in Joomla's respective category page in the frontend. Please note that you _can not_ display a comments summary in the List layout for categories. It should be fairly obvious why: it's a table listing article titles, there's no space (or even a provision in Joomla's code) to display additional information there.

# Be aware of the JavaScript

Akeeba Engage uses a small but important amount of JavaScript to implement the Reply button and all comment management buttons such as edit, publish, unpublish etc. Make sure to keep the class names and IDs with an `akengage` or `engage` prefix. They are expected in the component's JavaScript.

As a side note, our JavaScript is plain vanilla; it does not use jQuery or any other JavaScript library. This minimises the dependencies you need to load on the page.
