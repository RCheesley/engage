Akeeba Engage can display modules in the public frontend comments display interface using its own module positions. This allows you to customise the comments interface by adding information and features to it without having to do [[Template overrides]].

# Module positions

The module positions are the following:

`engage-before-comments`

Displayed below the comments header, before the list of comments.

`engage-after-comments`

Displayed after the list of comments but before the pagination links (if any).

`engage-login`

Displayed for guest users when guest comments are disabled. If there's a module published here the login module you selected in the Components option will not be displayed.

`engage-before-reply`

Displayed below the reply / comment header, above the reply / comment area.

`engage-after-reply`

Displayed below the reply / comment area, above the button to submit your comment / reply.

# Publishing modules in these positions

New users to Joomla may be confused by the interface of the Modules manager. Sure, there is a drop-down that lists module positions but Akeeba Engage's positions are not listed. That's normal! The drop-down only lists the module positions defined in your template, not those defined in components.

The drop-down, however, is only a suggestion. The Position field is in fact a text box. Just type in the module position, e.g. `engage-before-comments`, to publish the module in that position _even though_ it's not listed in the drop-down. It works!