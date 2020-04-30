This page does not discuss an Akeeba Engage feature but rather a feature in the HTML (WYSIWYG) editors in Joomla.

Akeeba Engage uses the HTML editor selected in the user's profile or, if no specific editor is selected, falls back to Joomla's default editor option as set in the Global Configuration. This allows your site's visitors to submit comments using a pleasant visual editor instead of trying to figure out things like Markdown, BBcode or typing raw HTML like it's 1998 all over again.

In an effort to provide your visitors with a sensible experience it is recommended that you create an editor profile which includes only the features that are useful for submitting comments. The idea is that you will be showing a minimal set of formatting options, suitable for comments, to all visitors to your site who are either not logged in or only have a basic user account.

# Joomla's default HTML editor (TinyMCE)

It is recommended that you create a configuration set that is common for Guest and Registered users.

Edit the plugin **Editor - TinyMCE**.

Click on the **Set 1** tab. From the “Assign this Set to” field remove the Registered group.

Click on the **Set 0** tab. In the “Assign this Set to” field add Registered. Right above the sample toolbar click on “Use simple preset”. By default this only adds the following buttons:

* Bold
* Underline
* Strikethrough
* Undo
* Redo
* Unordered list
* Ordered list
* Clear formatting

You might want to also add the link and image buttons by dragging them into the toolbar from the “All available menus and buttons” area at the top of the plugin configuration page.