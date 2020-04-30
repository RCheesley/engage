Akeeba Engage uses the standard Joomla! language string system. Therefore you can override any text on the page using standard Joomla! language overrides.

# Comments header

There needs to be a special mention about the header language string above your comments. While the nominal language key is `COM_ENGAGE_COMMENTS_ARTICLE_HEADER_N_COMMENTS` you will see that the English language file that ships with Akeeba Engage defines three different language keys:

* `COM_ENGAGE_COMMENTS_ARTICLE_HEADER_N_COMMENTS_0` which is used when there are no comments (comment count is 0).
* `COM_ENGAGE_COMMENTS_ARTICLE_HEADER_N_COMMENTS_1` which is used when there is one comment (comment count is 1).
* `COM_ENGAGE_COMMENTS_ARTICLE_HEADER_N_COMMENTS` which is used in all other cases.

The correct language key is selected automatically by Joomla based on the number of comments in the article.

Depending on your language you may have to define more language strings. For example, Russian has a different grammar form for nouns when there are exactly two of them, therefore a Russian translation would also need to define the language key `COM_ENGAGE_COMMENTS_ARTICLE_HEADER_N_COMMENTS_2`.