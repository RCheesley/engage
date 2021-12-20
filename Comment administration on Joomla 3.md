The public frontend of Akeeba Engage lists comments only for the article being displayed. While that makes sense in the context of engaging your visitors in a conversation, it is actually a pretty bad way to manage comments. You'd have to visit each and every article to manage comments. That's impractical.

# Listing the comments

The main page of Akeeba Engage lists the comments filed by your users in reverse chronological order (newest comment first). Unlike the public frontend the comment display here is flat, not hierarchical. It includes all comments filed by all users in all categories. You can view that page by going to Components, Akeeba Engage.

## Toolbar buttons

The toolbar at the top of the page offers the following administrative functions. Each function applies to _all_ comments selected in the list below.

**Edit**. This will only apply to the first item you selected. Shows the edit page for the comment.

**Publish**. Publishes the comment. The comment will be visible to everyone. Note that if you want to only display comments to specific users you can change the view level of the _content plugin_ which displays comments.

**Unpublish**. Unpublishes the comment. The comment will be hidden for everyone except comment managers.

**Possible spam**. Marks the comment as spam. The comment is effectively hidden for everyone except comment managers.

**Not Spam and Publish**. Only applies for comments already marked as possible spam. It publishes the comment. Moreover, it informs the Akeeba Engage anti-spam plugins that this comment is definitely not spam. Depending on the plugin, this information might be relayed to a third party service.

Practical use case: If you are using the Akeeba Engage — Akismet plugin clicking this button will publish the comment and inform the Akismet service that this comment is definitely not spam. On the other hand, if you clicked on the Publish button instead you'd only publish the comment BUT Akismet would not be informed that the comment is not spam. Using the Not Spam and Publish button helps train Akismet so that fewer comments like this will be falsely marked as possible spam in the future.

**Spam and Delete**. Only applies for comments already marked as possible spam. It deletes the comment. Moreover, it informs the Akeeba Engage anti-spam plugins that this comment is definitely spam. Depending on the plugin, this information might be relayed to a third party service.

Practical use case: If you are using the Akeeba Engage — Akismet plugin clicking this button will delete the comment and inform the Akismet service that this comment is definitely spam. On the other hand, if you clicked on the Delete button instead you'd only delete the comment BUT Akismet would not be informed that the comment is not spam. Using the Spam and Delete button helps train Akismet so that fewer comments like this make it through to your site.

**Delete**. Deletes the comment.

> **WARNING!** Deleting a comment, either directly or with the Spam and Delete button, will delete the selected comment and all of its replies and their replies etc. Basically, it deletes the entire comment thread under the comment you are deleting. Akeeba Engage will warn you before doing so. Once a comment thread is deleted it cannot be restored!

## Filters

Right above the list you can find a set of filters. These allow you to limit the comments displayed. Use the filters to narrow down a search for specific comments.

**Comment text** matches any part of a comment. Please note that this is sensitive to HTML tags. Entering “foo bar” here will NOT match something like “foo <em>bar</em>”. That's how MySQL, the database engine Joomla uses, works.

**Content title** matches any part of the title of the article the comment is submitted for.

**Email address** matches any part of the email address of the user who submitted the user. This will match both guest comments and comments submitted as a logged in user.

**IP address** matches any part of the IP address used to submit a comment.

**— Enabled —** is a drop down. You can limit the display by the status of the comment: published, unpublished or (possible) spam.

## List elements

Each row of the list represents a comment.

The **checkmark** at the leftmost column allows you to select comments. Pro tip: click on a comment's checkbox. Then hold down the SHIFT key and click on a comment further down the list. All comments between them are also selected.

The **Author** column shows information about the user who submitted the comment.

You can see their avatar (if you have enabled an avatar plugin).

Next to the avatar there might be an icon. An icon of two people represents a guest comment. An icon of a single person represents a comment submitted by a logged in user. A start represents a comment submitted by a comments administrator.

Next to the icon you can see the full name of the person who submitted the comment.

Below that you will see their email address.

The last line on that column has three elements. On the left you can see if they filed the comment from a mobile or desktop device. This detection is based on their User Agent string and the analysis is performed by Joomla. Inaccurate results there need to be fixed in Joomla itself.

Next to that is the IP address form which the comment was filed. If you see something that looks like junk characters select the comment and click on Spam and Delete; it's an attempt to attack your site with a vulnerability that was patched in Joomla back in December 2015.

Finally there is a magnifying glass button. Clicking on it will filter the comments by that IP address.

The **Comment** column shows you an approximation of the submitted comment. If the comment is a reply to another comment the top line will show which comment it is in reply to. If you click the name of the person the comment is in reply to a new tab will open in your browser showing the comment in its full context in the public frontend of your site.

Below this you can find the comment text. Please note that for security reasons the comment shown here is heavily filtered for allowed HTML using the HTML Purifier library and a very conservative set of allowed tags. What you see here may not be in the same format as what you see in the public frontend of your site.

THe final line is an Edit link which shows you the Edit page for that comment.

The **Content** column shows you information about the article the comment was submitted for.

The first line, in bold type, is the title of the article.

The second line has a View content link. Click on it to display the article in the frontend of your site.

The third line shows you how many comments have been submitted for that article. Click on the number to filter the list on the title of the content item. In most cases this will only display comments for that article. Do remember that the article title search is partial, meaning that clicking this button for an article called "Cats" will also display comments from a different article called "Cats and Dogs". This is not a bug. It's intentional.

The **SUbmitted on** column shows you the date and time the comment was submitted. This is shown in your local timezone, as set in your user profile. The formatting is determined by Joomla's active language and may differ from one language to another.

Finally, the **Enabled** column shows you the publish status of the comment (published, unpublished or spam). Clicking on that icon will change the publish status. Published comments will become unpublished. Unpublished or spam comments will be published.

# Editing a comment

Editing a comment allows you to change the following fields:

* **Name**. The name of the person submitting the comment. Only applies for guest comments.
* **Email address**. The email address of the person submitting the comment. Only applies for guest comments.
* **IP address**. The IP address of the person submitting the comment.
* **User Agent string**. The User Agent string of the browser used to submit the comment.
* **Comment**. The comment itself, using your preferred HTML editor.

Please note that the IP address and User Agent string are saved with the comment for spam prevention reasons.