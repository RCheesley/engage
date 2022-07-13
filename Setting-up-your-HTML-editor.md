This page does not discuss an Akeeba Engage feature but rather a feature in the HTML (WYSIWYG) editors in Joomla.

Akeeba Engage uses the HTML editor selected in the user's profile or, if no specific editor is selected, falls back to Joomla's default editor option as set in the Global Configuration. This allows your site's visitors to submit comments using a pleasant visual editor instead of trying to figure out things like Markdown, BBcode or typing raw HTML like it's 1998 all over again.

In an effort to provide your visitors with a sensible experience it is recommended that you create an editor profile which includes only the features that are useful for submitting comments. The idea is that you will be showing a minimal set of formatting options, suitable for comments, to all visitors to your site who are either not logged in or only have a basic user account.

## Joomla's default HTML editor (TinyMCE)

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

## JCE

JCE has user profiles just like Joomla's TinyMCE editor — in fact, it was the first Joomla editor to provide profiles.

> **IMPORTANT**. By default, JCE comes **without** any profile for Guest and Registered users. This means that your site's visitors will see **an empty box** instead of an editor, making it impossible to submit a new comment or reply to one.

You MUST create a profile for Guest and Registered users.

Assuming that you are using the default JCE configuration, go to Components, JCE Editor, Profiles. 

Click on New.

Enter a Title of your choice, e.g. “Public users”

Set Status to Published.

In the User Group multi–select make sure only Guest and Registered are selected.

In the Features and Layouts tab set up the layout you want. We recommend providing a minimum set of features.

Click on Save & Close.

## Other editors

If you do not see an editor in the comment area please consult the documentation and/or support of the editor you are using.