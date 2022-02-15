Reading and understanding this document is NOT mandatory for using Akeeba Engage. 

At a bare minimum you can blindly follow the instructions in the [[Installation and Setup Guide]]. Doing so will allow you to run comments on your articles in the categories you choose. That's enough for the blog / news section of a small business site or a blog site. 

That said, understanding the concepts below is necessary for using Akeeba Engage to its full potential. If you think something isn't working or unsure if it's possible start by reading this document. Then use the links on the right hand sidebar to dive deeper into Akeeba Engage's optional features and configuration options. 

## Extension organization

Akeeba Engage is a modern Joomla!™ extension. Like most extensions, it includes a component and several plugins.

You need to have the component enabled at all times. If you disable the component through Joomla's Extensions, Manage page you will no longer be able to see, submit or manage comments – even if you have enabled the plugins.

At the very minimum you need to publish the following plugins (they're automatically published when installing Akeeba Engage):

* **Content – Akeeba Engage**. This displays the comments interface in articles and tells Joomla that it should show you the Comments options when editing categories and articles. If you unpublish this plugin you will not be able to use comments in your content. 
* **System – Akeeba Engage cache support**. This tells Joomla to take into consideration Akeeba Engage's pagination when caching pages in the frontend. If you unpublish this plugin and you have caching turned on your site, guest users will only be able to see the first page of comments and think that the comments' pagination broke.
* **User – Akeeba Engage**. This deletes comments when you delete a user account which was used to comment on articles. If you unpublish this plugin you will see a lot of "User <number> not found" errors popping up in your site's frontend. 

Joomla loads these plugins automatically, under different conditions. That's why they need to be separate plugins.

## Joomla permissions

Akeeba Engage uses Joomla's permissions system to determine who can comment on articles, who gets to edit their or other people's comments, change their publish status, manage spam and delete existing comments. You can manage these permissions by going into Akeeba Engage and clicking the Options button. Click on the Permissions tab.

If you don't know how Joomla permissions work please [refer to Joomla's documentation on access control](https://docs.joomla.org/J3.x:Access_Control_List_Tutorial).

The permissions are mostly self explanatory. The only permission that needs explanation is the Edit State. Users with that privilege can mark as spam, mark as not spam, publish and unpublish any comment. Essentially, users with this privilege are _comment managers_. In fact this is how Akeeba Engage knows which people are supposed to be managing comments on your site: by looking for users which are allowed the Edit State privilege for Akeeba Engage. 

**Power user information**. You already know that you can define different permissions per category and / or article. However, that's half the story. Joomla only allows you to do that for category and article permissions regarding com_content, its built-in articles management component. You cannot define per-category or per-article permissions for third party components, such as Akeeba Engage. The reason is very technical and has to do with the way Joomla uses a separate table called `#__assets` to track permissions across the items "owned" by a _specific_ component. This structure does not allow for multiple ownership which would be necessary to have, for example, per-category and per-article comments permissions. In so many words, you can only set up permissions globally. These apply to all categories and articles.  

The corollary to permissions being only global is that you cannot, for example, have an article's author be the comments manager just for their articles or specific categories. It's an all or nothing affair.

## Configuration cascading

There are three levels of configuration options. From least to most specific:

* Component configuration. You can access it by going into Akeeba Engage and clicking the Options button.
* Category configuration. You can access it by editing a Joomla content category.
* Article configuration. You can access it by editing a Joomla article.

Some options are only available at the component level. Akeeba Engages always uses the value you have set up in the component's Options page for these options.

There are other options marked as "Default comment parameters". The options can be overridden in categories and articles, following these rules. Options are read from most to least specific. If Akeeba Engage finds a "Use Global" setting it reads the immediately less specific rule. If, however, it finds any other setting value this will be used and it won;t read the least specific option values at all. If you have nested categories the immediately least specific setting for a category is read from its parent category. The least specific setting for a top-level category is the read from the Component Options. In so many words, this is the same way Joomla works with article and category settings: article take precendence, then categories from the deeper to the top level and finally the component configuration ("global" configuration) itself.

This allows you to create very complex hierarchies of where Akeeba Engage will show comments or allow users to file new comments and comment replies. Try not to overdo it. The more complex configuration you set up the more difficult it will be for you to understand why something doesn't work the way you expect it to.

## Comment nesting

Comments can be _nested_. That is to say, a comment can be a reply to another comment. 

To prevent ridiculous display issues and unreasonable dilution of the conversation there is a maximum nesting level. By default, that's 3 levels. This means that you can have top level comments, replies to top level comments and replies to the replies.

Any comment filed as a reply to a comment that's already at the maximum nesting level also appears at the same nesting level. With the default maximum of 3 levels: if you try to reply to a reply of a reply (3rd level comment) your comment will also be a 3rd level comment. Its parent, i.e. the comment you are seemingly replying to, will be the reply to the top-level comment (the 2nd level comment).

Comment nesting has some corollaries. If you unpublish a comment that has been replied to the conversation will no longer make sense. You will apparently have comments replying to... nothing. For this reason Akeeba Engage hides the replies to an unpublished comment.

Furthermore, deleting a comment that has replies will also delete all of its replies as well. Akeeba Engage does that for the same reason. You can't have replies pointing to nowhere.

## Text filters, editor configuration and security

Comments are small HTML documents. Any user-submitted HTML document can be a security problem. A malicious user may try to embed malicious content (e.g. an SVG crafted in a way to cause JavaScript to be executed on the victim's computer) or manipulate the HTML source to trigger a cross-site request forgery (CSRF) or cross-site scripting (XSS) attack. It, therefore, imperative that you do NOT allow untrusted users to submit potentially malicious content.

Joomla has two mechanisms to do that.

The first is the configuration of the WYSIWYG editor used to edit HTML content. It's recommended that you use a simple editor for untrusted user groups, e.g. the TinyMCE editor that ships with Joomla. Do NOT use None or CodeMirror; this lets user type in raw HTML which doesn't help you any _and_ it will frustrate legitimate users. Try not using a complex editor such as JoomlaContentEditor (JCE) unless you understand how to configure it properly for untrusted users. When using TinyMCE you can configure one of its profiles to be used for untrusted user groups with a minimal set of features: Bold, italic, underline, copy/paste, preview. This doesn't stop users from pasting content such as external images directly into the editor or manipulating the page to send raw HTML but it definitely prevents well meaning users from doing something stupid and the least sophisticated attackers from trying their antics.

The second and most important mechanism in Joomla is Text Filters. You can set these up in your site's Global Configuration page. Text Filters tell Joomla how to psot-process the HTML content submitted by a user depending on which user group(s) they belong to. By default, the setting for Guest users and Registered users is No HTML which strips out all HTML and converts everything to plain text. If you think Akeeba Engage is broken because your comment's HTML content turns into plain text this is what you need to change first. The recommended setting is Default Whitelist. It's a conservative setting which disallows all HTML except a very small selection of tags and attributes. Joomla recommends the Default Blacklist setting but that's grossly misguided! You can never be sure that you have forbidden everything you need to forbid; you're always one small oversight away from disaster. You can be far more certain when you only allow what you know you explicitly need to allow. 

Speaking of which, Joomla is using a homegrown text filter library which hasn't been audited independently and possibly fails to protect you in some edge cases. Akeeba Engage ships with its a third party, well-established, independently audited library called [HTML Purifier](http://htmlpurifier.org). The default configuration of Akeeba Engage uses HTML Purifier by default using the configuration you have set up in Joomla's Text Filters. You can change that in the Component Options.

## Emails

Akeeba Engage comes with a default configuration which will send emails under certain conditions. Namely, the comment managers will receive an email when a user files a comment that is either unpublished by default or detected as spam (see Spam protection below). Moreover, when a user submits a comment in reply to another comment the author of the comment being replied to will receive an email notification.

You can control the sending of emails by editing the "Akeeba Engage – Emails" plugin. If you unpublish this plugin Akeeba Engage will send no emails.

You can change the look and feel of the emails by editing their HTML template. Go to Components, Akeeba Engage and click Email Templates from the top menu.  

## Avatars

Conversations on the Internet can be very impersonal. Having a familiar face or image displayed next to a comment can make it easier to identify the person you are talking to, improving the converation experience. To this end, Akeeba Engage ships with a default configuration that lets it display user avatars using the third party, free of charge [Gravatar](https://gravatar.com) service.

You can configure Gravatar options by editing the plugin "Akeeba Engage – Gravatar integration". If you disable this plugin no avatars will be displayed.

## Spam protection

Having comments open to guest users, or allowing people to self-register for a user account on your site to file comments, opens up your comments to spam. Akeeba Engage gives you two ways to reduce spam comments.

For starters, it supports Joomla's CAPTCHA system. You can select any CAPTCHA plugin which is currently published on your site. You can also select when Akeeba Engage will show a CAPTCHA to users filing comments. By default, it will only do so for guest comments. You can tell it to do it for all comments or even all comments except those filed by comment managers.

Furthermore, Akeeba Engage provides optional integration with the third party [Akismet](https://akismet.com) service. This service is free for personal sites but requires payment for use on commercial sites. You can enable Akismet integration by publishing and editing the "Akeeba Engage – Akismet spam protection" plugin. 

## Microdata

Web pages look like a bunch of text to search engines. While search engine algorithms have progressed in leaps and bounds over the last few decades, plain old text content still leaves a lot of room for misunderstandings. You don't want search engines to conflate user-submitted comments – often with poor grammar and questionable content quality – with your carefully edited articles. Nor do you want search engines to ignore it altogether.

The solution to that problem has the rather grandiose title [Semantic Web](https://en.wikipedia.org/wiki/Semantic_Web).

In very simple terms, we can _tag_ the content in ways that help search engines figure out what type of content it is, who wrote it, when they wrote it and how it relates to other content on the page. This provides context to your content, helping search engines index it, therefore making it easier for people to find it.

Akeeba Engage fully embraces the Semantic Web by including [Schema.org](https://schema.org) annotations using [microdata](https://en.wikipedia.org/wiki/Microdata_%28HTML%29). Each comment is marked up as such, including its author, date and publish time information.

We chose the Schema.org annotations and the microdata format for two reasons. First and foremost, this is what Joomla itself uses to mark up content articles. Second, even though Google recommends using [JSON-LD](https://en.wikipedia.org/wiki/JSON-LD) it's repetitive and verbose, making it problematic for your page loading speed when you have a lot of comments.

## Template and media overrides

Akeeba Engage fully supports Joomla's [output overrides](https://docs.joomla.org/How_to_override_the_output_from_the_Joomla!_core) for view templates, CSS and JavaScript files. We even ship the [SCSS](https://sass-lang.com) source files of our styles so you can customise them to fit your site's color palette and theme.

## GDPR / CCPA compliance

By definition, comments submitted by your users collect personally identifiable information (PII) such as the user's name and email address and IP address as well as any information volunteered by the user in the content of their comments.

There's legislation aorund the world to promote privacy such as EU's GDPR and California's CCPA. In all cases you need to give the user at least two options. One, download the information you have collected on them. Two, allow them to delete all that information, severing any and all ties with you.

Akeeba Engage has plugins for two user privacy solutions for Joomla, Joomla's built-in Privacy component (`com_privacy`) and our free of charge [Akeeba DataCompliance](https://github.com/akeeba/com_datacompliance) component. By default, Akeeba Engage does not enable either of these plugins. You will have to do it yourself.

Please note that compliance with privacy legislation is a legal requirement. You are fully responsible for that compliance. Our support for privacy extensions does not imply an endorsement and does not constitute legal advice. If you are unsure about the necessary steps to achieve compliance with this kind of legislation please contact your lawyer.

## User actions audit log

Sites with more than one administrator tend to find an audit log, a place where a summary of each user's administrative actions is kept, rather useful. In some business sectors it may even be mandatory e.g. for regulatory compliance or as a requirement for your quality assurance assessment (e.g. the ISO 9000 family of certifications). 

Joomla itself provides a very handy tool called User Actions Log. Akeeba Engage fully supports it through an optional plugin. The plugin is installed but not activated when you install Akeeba Engage. You can even configure if you only want administrative functions to be logged or if you want to go to finer levels of detail up to and including logging when a guest user submits a comment.

## How comments are rendered

The comments are rendered by the Content – Akeeba Engage plugin responding to Joomla's `onContentAfterDisplay` event. 

If you are using a third party template, a template override for com_content or a third party page builder this event _may have been disabled_. In this case you will not see the Akeeba Engage comments. You will have to re-enable this event in the template override or your page builder extension. Some examples (we update them as we find out about third party extensions and templates not playing nicely with Akeeba Engage):
* [YooTheme Pro page builder](https://yootheme.com/support/question/137639)