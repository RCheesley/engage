**Joomla 3 users:** This page is for Joomla 4 only. Please refer to [[Email templates on Joomla 3]].

Akeeba Engage has a built-in, optional mail feature. You need to publish the “Akeeba Engage – Emails” first.

Options about when emails are sent can be defined both in the [[Component options]] and the respective option overrides in each category and article.

Emails are sent in HTML and plaintext, using Joomla's built–in [Mail Templates feature](https://magazine.joomla.org/all-issues/february-2021/joomla-4-html-email-templating). Email templates can be defined not just per type of email being sent but also _per language_, something which is important in multilingual sites. By default, Akeeba Engage ships with email templates in the English language only.

To manage the email templates you need to go to System, Templates, Mail Templates from the sidebar menu of your site. Click on Filter Options on that page. In the Select Extension drop–down menu select “Akeeba Engage”.

Please note that since email sending is handled by Joomla itself we cannot provide any support for it.

## Email templates maintenance

Normally, email templates are installed or updated when you install or update the Akeeba Engage package.

It is possible, however, that this doesn't work (e.g. because of a Joomla bug) or that you are afraid something is terribly messed up and want to start afresh. To this end we have provided a utility Email Templates page. Go to Components, Akeeba Engage and click on the Email Templates button in the toolbar.

There are three buttons on that page.

**Mail Templates** takes you directly to Joomla's Mail Templates page without having to remember all the drill–down options and filter settings you normally need to apply.

**Install or Update** installs new email templates for Akeeba Engage and updates existing ones if they've changed. The user-modified email templates for Akeeba Engage are left intact. If you are missing an email template this is the first thing you should try.

**Reset** will reset the email templates to factory defaults. This is the nuclear option. It removes all of the email templates for Akeeba Engage, including any user-modified email templates. Then it installs all of the Akeeba Engage email templates afresh. Only use this button if you think you've damaged something in your database. Otherwise use Joomla's Mail Templates page to reset each email's subject and body to the default using the buttons provided in Joomla's interface.