Akeeba Engage has a built-in, optional mail feature. You need to publish the “Akeeba Engage – Emails” first.

Options about when emails are sent can be defined both in the [[Component options]] and the respective option overrides in each category and article.

Emails are sent in full HTML. You can change the template being used to send each email, both for the graphics theme and its contents, using Akeeba Engage's Email Templates feature. Email templates can be defined not just per type of email being sent but also _per language_, something which is important in multilingual sites. By default, Akeeba Engage ships with email templates in the English language only.

# Listing the email templates

Go to Components, Akeeba Engage. Click on Email Templates tab.

## Toolbar buttons

The toolbar at the top of the page offers the following administrative functions. Each function applies to _all_ email templates selected in the list below.

**New**. This lets you create a new email template. It opens the same page as the template editor.

**Edit**. This will only apply to the first item you selected. Shows the edit page for the email template.

**Publish**. Publishes the selected email templates. Published email templates are considered when Akeeba Engage is sending an email.

**Unpublish**. Unpublishes the selected templates. The email templates are not deleted but they will not be used at all when Akeeba Engage is sending an email.

**Delete**. Permanently deletes all selected templates. This process is irreversible.

## Filters

Right above the list you can find a set of filters. These allow you to limit the email templates displayed. Use the filters to narrow down a search for specific email templates.

**– Email type –**. Choose the email type of the templates you want to see. Email types are explained at the end of this page.

**Subject**. Search for a partial match of the email subject line.

**– Enabled –**. Are you looking for published or unpublished email templates?

**– Language –**. Which language should the email template be used for?

## List elements

Each row of the list represents an email template.

The **checkmark** at the leftmost column allows you to select email templates. Pro tip: click on an email templates's checkbox. Then hold down the SHIFT key and click on a comment further down the list. All email templatess between them are also selected.

**Email type**. The type of the email, i.e. when this email template will be used. Please read the Email types section below to understand what each of these options means.

**Subject**. The subject of the email which will be sent to the user. Uppercase text between square brackets is a _variable_ which will be substituted with pertinent information when the email is being sent. Please refer to the Editing an email template section below to understand what each variable does.

**Enabled**. Is this email template published? Only published email templates will be considered and used when Akeeba Engage is sending emails. Click on the icon to switch between the published and unpublished states.

**Language**. Which language should the email template be used for? This option is created with multilingual sites in mind. Please refer to the How languages work section below to understand how the language selected here is applied when selecting an email template.

# Editing an email template

You can edit an email template by clicking on its subject. Alternatively you can select its checkbox and click on the Edit button in the toolbar.

The edit page has the same fields as the List elements described above. The one thing you will find in addition to these is the **Body** of the email which is the email template itself, i.e. what will be in the body of the email being sent. You can and should use full HTML here.

As you can see in the default email templates, you can use _variables_ in the Subject and Body of the email template. The variables are uppercase text in square brackets. The are replaced with pertinent information when an email is sent. You can use the following variables:

* `[SITENAME]` The name of your site.
* `[SITEURL]` The URL to your site.
* `[RECIPIENT:`NAME] The name of the userreceiving the email.
* `[RECIPIENT:`EMAIL] The email address of the user receiving the email.
* `[NAME]` Name of the user filing thecomment.
* `[EMAIL]` Email of the user filing the comment.
* `[AVATAR_URL]` Image URL for the avatar of the user filing the commen.
* `[IP]` IP address used to file the comment.
* `[USER_AGENT]` Browser User Agent string used to file the commen.
* `[COMMENT]` The comment text, as stored in the database. WARNING! Using this could expose you to security issue.
* `[COMMENT_SANITIZED]` The comment text, with its HTML deeply sanitized but possibly some formatting removed (recommended.
* `[DATE_ISO]` Date and time the comment was filed on, ISO format.
* `[DATE_UTC]` Date and time the comment was filed on, UTC timezone.
* `[DATE_LOCAL]` Date and time the comment was filed on, in the time zone of the email recipient.
* `[CONTENT_TITLE]` The title ofthe content being commented on.
* `[CONTENT_LINK]` Link to the content being commented on.
* `[COMMENT_LINK]` Link to the comment on the content page.
* `[PUBLISH_URL]` URL to publish the comment.
* `[UNPUBLISH_URL]` URL to unpublish the comment.
* `[DELETE_URL]` URL to delete the comment.
* `[POSSIBLESPAM_URL]` URL to mark the comment as possible spam.
* `[SPAM_URL]` URL to report the comment as definitely spam and delete it.
* `[UNSPAM_URL]` URL to report the comment as definitely non-spam and publish it.
* `[UNSUBSCRIBE_URL]` URL to unsubscribe from comment notification emails.

# Email types

Akeeba Engage can send different kinds of emails depending on the circumstances that trigger the email sending. These are called “Email types”.

## Moderate

An email is sent to a comment manager to notify them of an unpublished comment NOT marked as spam that requires their moderation (publish it, spam and delete it or just delete it).

## Spam

An email is sent to a comment manager to notify them of an unpublished comment marked as spam that requires their moderation (not spam and publish it, publish it, spam and delete it or just delete it).

## Notify Users

An email is sent to a user to notify them that a reply has been submitted to their comment.

The user is given the option to unsubscribe from future replies notifications for the article the comment was submitted on. 

## Notify Managers

An email is sent to comment managers to notify them that a comment was submitted and immediately published in a category or article they moderate.

The manager is given the option to unsubscribe from future comments notifications for the article the comment was submitted on.  

## Notify Author

An email is sent to the author of an article to notify them that a comment was submitted and immediately published in an article they authored.

The author is given the option to unsubscribe from future comments notifications for the article the comment was submitted on.  

# How languages work

Akeeba Engage first looks for all available email templates for a specific email type. Then, it considers the languages of each email template.

First, it looks for an exact match of the user's preferred language, as set in their user account.

If there is no preference or this is a guest user, Akeeba Engage tries to find an exact match for the current language of the site, i.e. the language the site is being displayed on to the user.

If that is not available, it looks for an exact match for the site's default language as set in the Languages page of Joomla.

If that's not available either it looks for an email template in the `en-GB` (English, Great Britain) language.

If that is not available, Akeeba Engage tries to look for an email template marked as “All” languages.

If still no email template is found then no email will be sent.

To be clear, the first matching email template in this process is used to send the email.

The default email templates in Akeeba Engage are marked as “All” languages to provide a sane out of the box experience. They are based on the assumption that most sites use English as one of their languages.

The correct way to create multilingual, custom email templates is to start by building templates in each and every language of your site. The email template that's in your site's main language – the language most of your visitors presumably speak – should be marked as “All” languages to provided a sane fallback should you add more languages in the future but you forget to add the corresponding email templates.   