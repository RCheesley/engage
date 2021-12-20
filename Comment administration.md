**Joomla 3 users:** This page is for Joomla 4 only. Please refer to [[Comment administration on Joomla 3]].

The public frontend of Akeeba Engage lists comments only for the article being displayed. While that makes sense in the context of engaging your visitors in a conversation, it is actually a pretty bad way to manage comments. You'd have to visit each and every article to manage comments. That's impractical.

# Listing the comments

The main page of Akeeba Engage lists the comments filed by your users in reverse chronological order (newest comment first). Unlike the public frontend the comment display here is flat, not hierarchical. It includes all comments filed by all users in all categories. You can view that page by going to Components, Akeeba Engage.

## Toolbar buttons

The toolbar at the top of the page offers the following administrative functions. Each function applies to _all_ comments selected in the list below.

**Actions**. The actions drop–down menu offers the following 5 options:

* **Publish**. Publishes the comment. The comment will be visible to everyone. Note that if you want to only display comments to specific users you can change the view level of the _content plugin_ which displays comments.

* **Unpublish**. Unpublishes the comment. The comment will be hidden for everyone except comment managers.

* **Possible spam**. Marks the comment as spam. The comment is effectively hidden for everyone except comment managers.

* **Not Spam and Publish**. Only applies for comments already marked as possible spam. It publishes the comment. Moreover, it informs the Akeeba Engage anti-spam plugins that this comment is definitely not spam. Depending on the plugin, this information might be relayed to a third party service.

  Practical use case: If you are using the Akeeba Engage — Akismet plugin clicking this button will publish the comment and inform the Akismet service that this comment is definitely not spam. On the other hand, if you clicked on the Publish button instead you'd only publish the comment BUT Akismet would not be informed that the comment is not spam. Using the Not Spam and Publish button helps train Akismet so that fewer comments like this will be falsely marked as possible spam in the future.

* **Spam and Delete**. Only applies for comments already marked as possible spam. It deletes the comment. Moreover, it informs the Akeeba Engage anti-spam plugins that this comment is definitely spam. Depending on the plugin, this information might be relayed to a third party service.

  Practical use case: If you are using the Akeeba Engage — Akismet plugin clicking this button will delete the comment and inform the Akismet service that this comment is definitely spam. On the other hand, if you clicked on the Delete button instead you'd only delete the comment BUT Akismet would not be informed that the comment is not spam. Using the Spam and Delete button helps train Akismet so that fewer comments like this make it through to your site.

There's another three standalone toolbar buttons

**Delete**. Deletes the comment.

> **WARNING!** Deleting a comment, either directly or with the Spam and Delete button, will delete the selected comment and all of its replies and their replies etc. Basically, it deletes the entire comment thread under the comment you are deleting. Akeeba Engage will warn you before doing so. Once a comment thread is deleted it cannot be restored!

**Email templates**. Displays information about the [[Email templates]] used by Akeeba Engage when sending email messages to comment administrators and people who have submitted comments.

**Options**. Redirects you to the component's [Options](Component-options.md) page.

## Filters

Right above the list there's the standard Joomla! filters area. The controls in this area allows you to limit the comments displayed. Use the filters to narrow down a search for specific comments.

**Search** will match the comment text or the name or email address of the person submitting a comment. When it comes to the comment text please note that this is sensitive to HTML tags. Entering “foo bar” here will NOT match something like “foo <em>bar</em>”. That's how MySQL, the database engine Joomla uses, works. 

You can prefix your search string to look for specific information instead:
* `id:` Only display the one comment whose ID is exactly the number entered after the prefix.
* `ip:` Display the comments whose IP address partially matches the text entered after the prefix.
* `user:` Display the comments submitted by someone whose name or email address partially matches the text entered after the prefix.
* `title:` Display the comments submitted for a content item whose title partially matches the text entered after the prefix.
* `comment:` Display comments whose body text partially matches the text entered after the prefix. Please note that this is sensitive to HTML tags. Entering “foo bar” here will NOT match something like “foo <em>bar</em>”. That's how MySQL, the database engine Joomla uses, works.

**— Select Status —** is a drop down. You can limit the display by the status of the comment: published, unpublished or (possible) spam.

The two date fields, **Since** and **To** allow you to narrow down your search using specific limits for the Posted On date and time (when a comment was submitted):
* If both Since and To are set: display all matching comments submitted between Since and To, inclusive.
* If only Since is set: display all matching comments submitted on or after the Since date and time.
* If only To is set: display all matching comments submitted on or before the To date and time.

## List elements

Each row of the list represents a comment.

The **checkmark** at the leftmost column allows you to select comments.

The **Author** column shows information about the user who submitted the comment.

You can see their avatar, if available.

Next to the avatar there might be an icon. An icon of two people represents a guest comment. An icon of a single person represents a comment submitted by a logged in user. A start represents a comment submitted by a comments administrator.

Next to the icon you can see the full name of the person who submitted the comment.

Below that you will see their email address.

Below that you can see if they filed the comment from a mobile or desktop device. This detection is based on their User Agent string and the analysis is performed by Joomla. Inaccurate results there need to be fixed in Joomla itself.

Right Below that is the IP address form which the comment was filed. If you see something that looks like junk characters select the comment and click on Spam and Delete; it's an attempt to attack your site with a vulnerability that was patched in Joomla back in December 2015.

Finally there is a magnifying glass button on that last line. Clicking on it will filter the comments by that IP address.

The **Comment** column shows you an approximation of the submitted comment. If the comment is a reply to another comment the top line will show which comment it is in reply to. If you click the name of the person the comment is in reply to a new tab will open in your browser showing the comment in its full context in the public frontend of your site.

One the same line there's an Edit link which shows you the Edit page for that comment.

Below this you can find the comment text. Please note that for security reasons the comment shown here is heavily filtered for allowed HTML using the HTML Purifier library and a very conservative set of allowed tags. What you see here may not be in the same format as what you see in the public frontend of your site. It may also be abbreviated. In this case, there's a button to display the entire comment in a modal dialog.

Right below you can see the title of the article the comment was submitted on.

The lone below shows you how many comments in total have been submitted on that content item. 

Next to it there's the “Filter by content” button which lets you display only the comments submitted on this article. If filtering is already enabled this changes to “Remove filter by Content”; clicking it removes the article filter and you will see comments from all articles again.

Finally, the View content link will display the article in the frontend of your site.

The **Submitted on** column shows you the date and time the comment was submitted. This is shown in your local timezone, as set in your user profile. The formatting is determined by Joomla's active language and may differ from one language to another.

Finally, the **Enabled** column shows you the publish status of the comment (published, unpublished or spam). Clicking on that icon will change the publish status. Published comments will become unpublished. Unpublished or spam comments will be published.

# Editing a comment

Editing a comment allows you to change the following fields:

* **Enabled**. The publish state of the comment.
* **Name**. The name of the person submitting the comment. Only applies for guest comments.
* **Email address**. The email address of the person submitting the comment. Only applies for guest comments.
* **Posted on**. When was the comment posted.
* **IP address**. The IP address of the person submitting the comment.
* **User Agent string**. The User Agent string of the browser used to submit the comment.
* **Modified Date**. Not editable. The date and time someone edited the comment. It defaults to the Posted On date and time if no modification has yet to take place.
* **Modified By**. Not editable. The user who last edited the comment.
* **Comment**. The comment itself, using your preferred HTML editor.

Please note that the IP address and User Agent string are saved with the comment for spam prevention reasons.