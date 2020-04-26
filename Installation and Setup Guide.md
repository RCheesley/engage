## Before you begin

Before you begin implementing comments on your site you need to have a _plan_. Who is going to be able to comment? What are they going to be able to comment on? Who is going to moderate the comments? Do you want guest comments? Do you want a CAPTCHA for comments by people who are not verified? Do you want anti-spam protection? If you don't have a plan you will have to backtrack which will cost you a lot of time, you will probably make a lot of mistakes and get frustrated.

This guide makes the following assumptions which are suitable for a blog site or the blog section of a business site:

* You only want comments in one category and all its subcategories called Blog.
* Anyone can submit a comment, even guest (not logged in) users.
* Published and above can moderate comments, just like the can moderate content.
* You want to use a CAPTCHA for all comments except those filed by the comment moderators.
* You want to display user avatars using Gravatar.
* You want to protect against spam using Akismet.
* You are going to be using Joomla's built-in Privacy component for GDPR compliance of your comments feature.
* You want to use Joomla's User Action Log to keep an audit log of all administrative actions taken on comments.

## Installation

[Download](https://github.com/akeeba/engage/releases) the latest version of Akeeba Engage. 

It's a single ZIP file. If you are using Safari on macOS you might end up donwloading several files. If that happens _stop_ and configure Safari to NOT open downloaded files automatically.

Log into the backend of your Joomla site as a Super User and go to Extensions, Manage, Install. Click on the Upload Package File tab. Drag and drop the downloaded ZIP file into the "Drag and drop file here to upload" area.

> **Did that fail to install?** Remember that extension installation is part of Joomla and takes place before the extension being installed or updated can run. Please take a look at [our troubleshooting instructions](https://www.akeebabackup.com/documentation/troubleshooter/akeeba-backup-and-co.html#abinstallation) to figure out what happened and how to fix it.

## No comments unless otherwise specified.

The default configuration of Akeeba Engage is to allow comments on everything. This is not what we want.

Go to Components, Akeeba Engage and click on the Options button on the toolbar. In the Basic tab, under Default comment parameters set the following:

* **Comments interface**: Hide.
* **Allow new comments**: No.

This tells Akeeba Engage to not show the comments and not allow filing any new comments unless we explicitly say otherwise for a Category or an individual Article. 

Why set both options? Because hiding the comments interface does not prevent an advanced user to peruse a special URL to send a comment despite the comments interface not being shown. The first option hides the door behind a false wall. The second option locks the door and throws the key away.

## Tell Akeeba Engage where comments are enabled

Go to Content, Categories. Find the category you want to enable comments on (let's say it's called Blog) and click on it.

You will see there's a new tab there called Comments. Click on it.

> **Is the Comments tab missing?** You need to publish the “Content – Akeeba Engage” plugin. This plugin is automatically enabled when you install Akeeba Engage. It is not re-enabled if you update Akeeba Engage.

You can see that we have the same options as in the previous step. Therefore we can reverse our choices for this category. Set:

* **Comments interface**: Show.
* **Allow new comments**: Yes.

Click on Save & Close to apply your changes.

## Tell Akeeba Engage who can submit and manage comments

Joomla has a very thorough permissions system since version 1.6. Akeeba Engage uses it to determine who can do what with comments. In fact, Akeeba Engage uses the same internal permissions names as Joomla. This means that unless you explicitly tell Joomla otherwise, Akeeba Engage's permissions track the default permissions for Joomla as set in the Global Configuration page. Therefore the default state on most sites is that only Manager and above can file comments, just like Manager and above can submit new articles. We need to change that.

Go to Components, Akeeba Engage and click on the Options button on the toolbar. Click on the Permissions tab.

Click on the Guest group and set the Comment privilege to Allowed. Then click on the Registered group (or whichever group your regular, non-administrative users belong to per the Options of the Joomla Users manager) and set the Comment privilege to Allowed.

We didn't specify who can _manage_ comments. We don't have to. Comment management is granted to users who are allowed the Edit State privilege. By default, this is Publisher, Manager, Administrator and of course Super Users. If you do NOT want Published and Manager to administer comments click on the respective group and set the Edit State privilege to Denied. Be careful, though! Any user belonging to that group will be denied comments administration _even if_ they belong to another group that explicitly grants the Edit State privilege. That's how Joomla's permissions system works.

Click on Save & Close.

## Set up CAPTCHA

Allowing guest comments is a great way to engage your audience — see where the component name came from — but they open your site to a tsunami of spam. The first line of defence against that is a CAPTCHA.

If you haven't done already set up a CAPTCHA plugin. If you are unsure how to do it [the Joomla documentation has a step-by-step guide for Google reCAPTCHA](https://docs.joomla.org/J3.x:Google_ReCaptcha).

Go to Components, Akeeba Engage and click on the Options button on the toolbar. Click on the Basic tab.

Under “CAPTCHA for comments” select the CAPTCHA plugin you have set up. Under “Use CAPTCHA for these users” select “Anyone but comment administrators”. This requires everyone to solve a CAPTCHA to submit a comment, unless they are a comments administrator. The idea is that the most determined spammers use bots to register user accounts and even follow the email validation link. Putting a CAPTCHA in front of them increases their cost and they are more likely to leave you alone.

## Avatars

By default, Akeeba Engage comes with the “Akeeba Engage – Gravatar integration” plugin enabled. This plugin shows user avatars for people filing comments on your site with the Gravatar service. This is a very popular service.

You can edit this plugin to configure it. The default settings are very conservative and geared towards a business site. One setting you might want to disable is the “Show profile link” which links the commenter's name to their Gravatar profile page.

## Spam protection with Akismet

This step is optional. It may incur fees on a third pary service which is unaffiliated with Akeeba Ltd.

While CAPTCHAs are a great first line of defence against comment spam it's not necessarily effective against the more sophisticated spammers. They will hire actual people to solve CAPTCHAs for as little as a cent for ten CAPTCHAs. Therefore spam can still find its way into your comments.

Automattic offers a service called Akismet which filters out spam in the same way an email spam filter does. It is free for personal sites without any of monetization - no ads, no business or product promotion - and a reasonable cost for commercial use. 

You can create an account at [Akismet](https://akismet.com/). After doing that you will get a key. Edit the “Akeeba Engage – Akismet spam protection” plugin and paste your key there. 

Remember to set the Status of the plugin to Enabled.

Click on Save & Close.

If you enable the Akismet plugin two buttons in Akeeba Engage gain more meaning. When you mark a comment as not spam you are not just publishing the comment, you are also telling the Akismet service that it's positively not spam thereby making it less likely that comments like this will be considered spam in the future. Marking a comment as definitely spam not only deletes the comment but also tells Akismet that this is a spam comment, meaning that similar comments are more likely to be marked as spam in the future.

## GDPR and CCPA compliance

Privacy legislation around the world requires you to allow your users to download a copy of the information you have on file for them, as well as request the permanent deletion of that information. This includes comments. Comments are either linked to a user or have a name and email address. In either case they are personally identifiable and covered under GDPR and similar legislation.

Akeeba Engage supports Joomla's built-in Privacy component. Just enable the “Privacy – Akeeba Engage” plugin.

Please note that Joomla's Privacy component only works with comments which are assigned to a Joomla user. It does not apply to comments filed as a guest even if the email address used is the same as the one used with a Joomla user. This is a limitation of Joomla. You can always use our free of charge [Akeeba DataCompliance](https://github.com/akeeba/com_datacompliance) component and the “Data Compliance – Akeeba Engage” plugin which addresses this problem. The user will still need to register a user account under the same email address but all comments previously filed as guest with that email address are going to be included in data export and account deletion.

## Comments manager audit log with User Actions Log

If you have a site with multiple comment manager users it may be important or even mandatory to keep an audit log of who did what and when. Akeeba Engage fully supports Joomla's User Actions Log. You just need to publish the “Action Log – Akeeba Engage” plugin.

By default, Akeeba Engage only logs administrative functions. You can edit the plugin to tell Akeeba Engage to also log comment submission and / or users unsubscribing from a comment thread.

## Email notifications

Akeeba Engage is able to send notification emails to comments administrators when their action is required and to users when they receive a reply to their comments. You can control these features by editing the “Akeeba Engage – Emails” plugin.

The emails are sent with rich HTML templates. You can edit the email templates by going to Components, Akeeba Engage and clicking on the Email Templats tab.

## Comment formatting and how not to lose it

Akeeba Engage uses Joomla's Text Filters to process the submitted comment text for security and display reasons. By default, Joomla applies a “No HTML” filter to the Guest and Registered user groups, meaning that their HTML comments will be converted to unformatted plain text. You can change that behavior in Global Configuration, Text Filters tab.

But wait! Don't touch that yet!

Joomla's approach to text filtering is geared towards article creation, not security. That's why untrusted users get the No HTML filtering by default. Changing that option may expose your site to the same security vulnerabilities that led Joomla to apply the No HTML filtering by default.

Akeeba Engage offers a much safer, widely used and _audited_ third party HTML filtering called HTML Purifier. This overcomes Joomla's problems on secure handling of arbitrary, user-submitted HTML.

Go to Components, Akeeba Engage and click on Options. Click on the Text Filtering tab. Set the following:

* **Filter Mode**: HTML Purifier (allow minimal HTML)
* **HTML Purifier uses Joomla Text Filters configuration**: No

This configuration allows basic HTML formatting, lists, images, code, preformatted (monospace) text and blockquotes in comments regardless of Joomla text filter options. It is simultaneously very secure and practical.

## Further steps

Akeeba Engage fully supports Accelerated Mobile Pages (AMP) through the third party [wbAMP](https://weeblr.com/joomla-accelerated-mobile-pages/wbamp) extension. Mobile visitors can see the comments in an article but submitting a comment or replying to an existing one requires them to visit the full site. AMP support can benefit the visibility of your site in search engines and is highly recommended.

If you decide to disallow guest comments, Akeeba Engage can show a prompt to guest users to log in to file a comment. By default it will show a module published in the Login position. You can select a different module position or module to customise that experience.

Akeeba Engage uses Joomla's WYSIWYG (HTML) editor to allow people to submit comments in rich text. Most sites use either the built-in TinyMCE editor or the excellent, third party JCE editor. The default configuration of both editors is geared towards article creation. You can, however, create custom profiles which only apply to specific user groups with a different set of features. You are strongly encouraged to make use of that to offer a simpler, more inviting interface to people submitting comments on your site.

Beyond that you may want to take a look at the other options offered by Akeeba Engage in its component options, the category and article options as well as its plugins. Akeeba Engage is designed to be elegant: simple, yet powerful.
