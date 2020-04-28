Listed as “Akeeba Engage – Akismet spam protection“.

Note: This is an optional plugin. It may incur fees on a third party service which is unaffiliated with Akeeba Ltd.

While CAPTCHAs are a great first line of defence against comment spam it's not necessarily effective against the more sophisticated spammers. They will hire actual people to solve CAPTCHAs for as little as a cent for ten CAPTCHAs. Therefore spam can still find its way into your comments.

Automattic (a third party company not affiliated with Akeeba Ltd) offers a service called Akismet which filters out spam in the same way an email spam filter does. It is free for personal sites without any of monetization - no ads, no business or product promotion - and a reasonable cost for commercial use. Commercial use of the service is possible for a fee. 

If you enable the Akismet plugin two buttons in Akeeba Engage gain more meaning. When you mark a comment as not spam you are not just publishing the comment, you are also telling the Akismet service that it's positively not spam thereby making it less likely that comments like this will be considered spam in the future. Marking a comment as definitely spam not only deletes the comment but also tells Akismet that this is a spam comment, meaning that similar comments are more likely to be marked as spam in the future.

## Options

**Akismet key**. Using the Akismet service requires a key for your site. You can create an account at [Akismet](https://akismet.com/). After doing that you will get a key. Paste your key here.

**Comments to check for spam**. Which comments should go through Akismet to check for spam? “All” will spam-check all comments, even those filed by comment managers. “Non-manager” will spam-check all comments which are not filed by comment managers. “Guest” will only spam-check comments filed by users who are not logged in.

**Discard blatant spam**. The Akismet service can report whether a comment is non-spam, possible spam or definitively spam. When this option is enabled the comments marked as definitively spam will be discarded immediately. When disabled the comments marked as definitively spam will be saved unpublished and marked as possible spam. Regardless of that option all comments reported as possible spam by Akismet will be stored unpublished and published as possible spam. Furthermore, comments reported as non-spam will be saved normally; their published status depends on your [[Component options]] and the options you've set in your category and articles.. 