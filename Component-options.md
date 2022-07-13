**Joomla 3 users:** This page is for Joomla 4 only. Please refer to [[Component options on Joomla 3]].

The options in the Akeeba Engage component itself allow you to modify how comments work but also where and who can comment by default.

You can change these options by going to Components, Akeeba Engage and clicking on the Options button in the toolbar.

## Basic

**Maximum comment nesting**. Akeeba Engage comments can be _nested_ which is a fancy way of saying that they display hierarchically, showing which comment is in reply to another. A comment that's not in reply to another comment is the first nesting level. A comment that's in reply to a first level comment is a second level comments and so on. This option determines what is the maximum nesting level for comments. 

Having nested comments is a good way to let discussions evolve organically, where multiple people may be simultaneously commenting on different points of the same article. However, the more nesting levels you allow the more difficult it becomes to follow a conversation. Not to mention the display becomes visually cluttered.

The default value, 3, is a reasonable default to keep the conversation engaging but not dilute it to the point that it's hard to follow. Set this to 1 to prevent comment replies from appearing underneath existing comments.

Note that replies to comments which are already at the maximum nesting level appear at the same (maximum) nesting level themselves.

**New comments**. Should new comments be published by default or not? If you choose them to be unpublished a comments moderator will have to publish them manually. 

Please note that even if the option here is set so that new comments are immediately published a newly submitted comment may still end up unpublished if it's considered spam.

**Number of comments per page**. By default, Akeeba Engage uses Joomla's pagination limits, as set in the Global Configuration, for comments. This option allows you to change that limit.

If an article has more comments than this limit then the comments will be _paginated_. A pagination navigation element is shown at the bottom of the comments.

It is generally recommended that you set this limit between 20 and 50 comments per page. Do remember that all comments appearing on the page need to be loaded from the database first. If you select a very high number (100 or more) or “All” you may run out of PHP memory which will result in your site showing an error or a blank page.

**CAPTCHA for comments**. Having comments on your site is a wonderful way to engage your audience but it also opens your site to abuse by comment spammers. Left unchecked, a comment section can rapidly descend into chaos and possibly hurt your search engine rankings. The first line of defence is a CAPTCHA. Akeeba Engage supports all CAPTCHA plugins which are compatible with Joomla as long as they are enabled and set up correctly. This option allows you to select which CAPTCHA plugin Akeeba Engage should use. 

**Use CAPTCHA for these users**. While a CAPTCHA is a powerful way to prevent comment spam it can also hinder legitimate users from submitting a comment. Akeeba Engage lets you determine which users should be shown a CAPTCHA when filing a new comment. Your options are:

* _Guests_. This is the most lax setting. Only users who are not already logged in will be shown a CAPTCHA. Use this option if you have already set up an anti-spam plugin (e.g. Akismet), your site is an invitation-only community or your users are fully verified (e.g. because their accounts can only be created by linking their social media profile using [Akeeba SocialLogin](https://github.com/akeeba/sociallogin/)).

* _Anyone but comment administrators_. This is a balanced setting. Everyone except comment managers (users with the Edit State privilege for Akeeba Engage) will be asked to solve a CAPTCHA when submitting a comment. This is the recommended setting for general purpose sites. 

* _All_. This is the paranoid setting. Nobody is above suspicion! Even Super Users will have to solve a CAPTCHA to submit a comment. We can't think of a _practical_ use case.

You may have noticed that there is no "None" option. If you don't want a CAPTCHA to be displayed at all set the “CAPTCHA for comments” option above to “— None Selected —”.

**Guests must accept terms**. When enabled, guest users will be asked to check a box to accept your site's terms of service and / or privacy policy. If they do not check the box they are not allowed to post a comment.

This may be required for compliance with the EU GDPR or similar legislation.

You can customize the text of the checkbox in the Terms Checkbox Text option below.

You can customize the error message the Guest users see when the do not check the box by making a frontend language override for the `COM_ENGAGE_COMMENTS_ERR_TOSACCEPT` language string.

**Terms checkbox tex**. Enter the text which will be displayed in the checkbox the users will be required to check to post a comment. You can use full HTML and plugin codes.

If left blank a generic, default text (see the `COM_ENGAGE_COMMENTS_FORM_LBL_ACCEPT` language key) will be used.

**Comment area hidden by default**. Should the comment / reply area be hidden by default? If so, there will be a Leave Your Comment button in place of a comment / reply area. When the user clicks on that button (or on any comment's Reply button) the Leave Your Comment button disappears and the comment area is displayed. **This is bad User Experience which will confuse most people trying to leave a comment**. We do not recommend using this option.

### Default comment parameters

These configuration options can be overriden in each content category and each content article. Before explaining what they do we should explain how they work.

Akeeba Engage first looks at the parameters in the article being displayed. If any parameter is set to anything other than “Use Global” (that's the default setting for all options in categories and articles) this is the setting that will be used.

If there are any parameters left with the “Use Global” setting, Akeeba Engage will look into the article's category. The same thing happens there; if there's a value other than “Use Global” it's used.

If there are still any parameters left with the “Use Global” setting, Akeeba Engage will look into the parent category. This will keep going until there is no parameter left in the “Use Global” setting OR we reach the topmost category.

If at this point there are _still_ any parameters set to “Use Global” we will use the values specified here, in the component's configuration.

This configuration concept mirrors how Joomla works with article, category and the Articles component's parameters. As you already know, this is a very powerful way to configure your site. Moreover, the way it makes you think about your site is that the component parameters should allow the absolute minimum number of things that should be permitted throughout the entire site; if unsure, disable everything. Each category should define the defaults for its articles that are appropriate for the category. Each article can override the category preferences if there's a specific use case that cannot be handled otherwise.  

**Comments interface**. Should comments be shown at all? For most sites it's recommended to set this to Hide in the component and Show only on specific categories where comments are relevant, e.g a blog section. The only obvious use case where a default Show setting makes sense is news sites.

Please note that merely hiding the comments interface does not make it impossible for comments to be filed. An advanced user who bothers to read our code can in many cases guess the correct URL to submit a comment. Remember to set Allow new comments to No as well to make it impossible for any comments to be filed.

**Summary on Featured display**. Should I display the number of comments posted for each article on Joomla's Featured Articles display?

**Summary on Blog display**. Should I display the number of comments posted for each article on Joomla's Blog display?

**Summary on Newsflash module**. Should I display the number of comments posted for each article rendered in Joomla's Newsflash module?

**Comments ordering**. Comments are ordered by date and nesting level, in this order. This option determines how the comments should be ordered _by date_. Ascending means that the oldest comment is first. Descending means that the newest comment is first. It's strongly recommended that you use Ascending. Otherwise it becomes really confusing for a casual reader to figure out the conversation. Please note that only the _first (top)_ level of comments can be sorted by date descending. All other levels (second, third etc) are always sorted by date ascending. This is not a bug and won't change. If you _absolutely_ need replies to appear before what they are in reply to you can of course tell Akeeba Engage to limit itself to one comment level and set the order to descending. However, this is strongly discouraged because it's unintuitive for users and leads to misunderstandings.

**Allow new comments**. Should new comments be allowed? Set it to No to close comments (prevent new comments being submitted) but still display old comments.

**Close comments after this many days**. If this is 0 comments are never close automatically. Any non-zero setting means that comments will be automatically closed this many days after an article was first published. A setting of 365 means that comments are allowed only during the first year since the comment was published. 

**Notify author**. Should the article's author be notified by email about new comments? This is generally a good idea considering that most comments tend to be questions or remarks to the author. However, in some use cases — e.g. news sites — it makes more sense to not bother the author of the content with the random ramblings of strangers. Hence this option.

This option requires that the “Akeeba Engage — Emails” plugin is published.

**Notify users**. Should the people filing comments be notified by email if someone replies directly to their comment? For most sites it makes sense to enable this option.

This option requires that the “Akeeba Engage — Emails” plugin is published.
    
## Text filtering

Akeeba Engage uses Joomla's WYSIWYG (HTML) editor to allow users to submit comments with formatting without having to type in raw HTML like some other CMS — WordPress, I am looking at you.

However, this has a downside. Raw HTML can be very powerful and very dangerous. A malicious user can inject executable code which can be used to compromise visitors to your site, or yourself. Akeeba Engage addresses this problem by using text filtering.

There are two options for text filtering.

One, is using Joomla's built-in text filters. However, Joomla's approach to text filtering is geared towards article creation, not security. In fact, Joomla is aware of that and it's set the default HTML filtering for guest and registered users to No HTML, stripping all formatting from their content.

Which brings us to the second option offered by Akeeba Engage: a much safer, widely used and _audited_ third party HTML filtering called HTML Purifier. This overcomes Joomla's problems on secure handling of arbitrary, user-submitted HTML without stripping all formatting.

> **ATTENTION!** Read this before complaining that Akeeba Engage is broken because it strips out formatting in comments. The problem is that Joomla's default HTML filters, as defined in the site's Global Configuration, are set to COMPLETELY REMOVE any and all HTML formatting. **We very strongly recommend that you set the Filter Mode to HTML Purifier instead**. This is both more secure than Joomla's text filters AND allows minimal HTML formatting to go through.

**Filter mode**. You can choose how Akeeba Engage will filter the HTML in the submitted comments. Your options are:

* _Joomla! Text Filters_. This is the built-in Joomla text filtering which can be configured in the Global Configuration page. We DO NOT recommend this option for security reasons. This option is here because some misguided people think they know better and demanded it. If you use it and you get hacked that's on you.

* _HTML Purifier_. This uses the safer, widely used and _audited_ third party library called HTML Purifier with your choice of configuration per the next two options.

* _HTML Purifier (allow minimal HTML)_. Strongly recommended. This uses the safer, widely used and _audited_ third party library called HTML Purifier with a preset, very conservative configuration. Only the following tags and attributes are permitted: `p`, `b`, `a` (with the `href` attribute), `i`, `u`, `strong`, `em`, `small`, `big`, `span` (with the `style` attribute), `font` (with the `size` and/or `color` attributes), `ul`, `ol`, `li`, `br`, `img` (with a combination of the `src`, `width` and `height` attributes), `code`, `pre`, `blockquote`. No other tags or attributes are permitted.

**HTML Purifier uses Joomla Text Filters configuration**. Only applicable if you have selected the first “HTML Purifier” option above. Should HTML Purifier use Joomla's Text Filter options set in Global Configuration as its configuration? Strongly discouraged on security grounds. Joomla uses the WRONG approach to HTML filtering, only disallowing what it things should not be allowed. This is a valid approach ONLY in the context of semi-trusted people submitting articles. This option is here because some misguided people think they know better and demanded it. If you use it and you get hacked that's on you.

**HTML Purifier allow list**. Only applicable if you have selected the first “HTML Purifier” option and have set “HTML Purifier uses Joomla Text Filters configuration” to No. This is an exhaustive list of HTML tags and their attributes to be explicitly allowed. This is a comma-separated list. Using this option is discouraged unless you absolutely understand the security implications of changing the default tag list and / or have a specific use case which is not covered by the default setup.

List each tag as `tag`. This means that `<tag>` and `</tag>` are allowed WITHOUT any attributes. List each tag and attribute as `tag[attr]`. This means that `<tag>`, `<tag attr="something">` and `</tag>` will be allowed. If you need to allow several attributes on a single tag list them separately. For example `img[src],img[width],img[height]` allows the `<img>` tag and any combination of its `src`, `width` or `height` attributes.

The default setting for this field is `p,b,a[href],i,u,strong,em,small,big,span[style],font[size],font[color],ul,ol,li,br,img[src],img[width],img[height],code,pre,blockquote`. Incidentally, this is the configuration used when you use the “HTML Purifier (allow minimal HTML)” setting for the Filter Mode option.

## Advanced

These options allow you to further customize Akeeba Engage. These are useful for site integrators and expert users.

**Login module**. If you do not enable guest comments, by giving the Guest group the Comment privilege in the Permissions tab, your users will need to log in to submit a comment. Without an obvious way to do so they might just assume that submitting comments is impossible. By default, Akeeba Engage will display Joomla's Login module instead of the comment area to prompt users to log in. You can select a different module here.

The downside is that you can not configure the module you include here. This might not be a good fit for your site. In this case please set this to “( Do not display )” and publish a custom login module in the `engage-login` position, as explained in [[Module positions]].

To clarify: If you select “( Do not display )“ but _at the same time_ you have also not published any custom module in the `engage-login` position then the default Joomla! login module will be displayed instead. You cannot simply not display any module at all. This is intentional and prevents a common mistake which would frustrate most of our users. If you want something to that visual effect you can publish a Custom module with the HTML content `<span style="display: none">&nbps;</span>` in the `engage-login` position OR do a template override. However, this not recommended. It's bad user experience. Your site's visitors will not have a clue that they need to login before they can file a comment or how to do so. We strongly recommend that you at least publish a Custom module with text to the effect of “Submitting a comment requires logging in to our site first.” where the “logging in” part would be a link to your site's login page. Don't ask your user to read your mind or do work.

**IP Lookup Service**. Comment managers can see the IP address where a comment was filed from. The IP address appears as a link to the IP lookup service defined here, allowing the comment manager to understand where the user comes from. By default we are using the third party What Is My IP Address service. If you want to use a different service enter its URL here. The special variable `%s` in this URL will be substituted with the comment's IP address.

**Maximum spam age**. Comments marked as spam filed this many days ago will be automatically deleted. This is a convenience option so you don't have to delete spam manually. The default is 15 days.

**Load custom CSS**. By default, Akeeba Engage uses Bootstrap 5 CSS classes to style the comments in the frontend of your site. If you are using a template which does not use Bootstrap 5 classes enable this option. This will load the custom CSS file `media/com_engage/css/comments.css` (or its template override). You can take a look at our CSS and its SCSS source file to see how you can easily format comments yourself.

**HTML Purifier inclusion**. Do not change unless we tell you to do otherwise. The default setting is Composer. On a normal site every setting for this option should work equally.

## Permissions

Akeeba Engage uses Joomla's permissions to determine who can do what with comments. The following permissions are provided for each user group:

* **Configure ACL & Options**. Gives access to the Permissions tab of the Options page of Akeeba Engage.
* **Configure Options Only**. GIves access to the Options page of Akeeba Engage.
* **Access Administration Interface**. Gives access to the backend administrator interface of Akeeba Engage.
* **Comment**. User can submit new comments or replies to existing comments.
* **Delete**. User can delete comments filed by anyone.
* **Edit**. User can edit comments submitted by anyone, including guest comments.
* **Edit Own**. User can edit their own comment (as long as they submitted it under their username, not as a guest).
* **Edit State**. User can publish, unpublish, mark as spam, or mark as non spam and publish any comment. Users with this privilege are comment managers and enjoy a special status in Akeeba Engage.