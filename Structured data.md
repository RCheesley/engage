Akeeba Engage marks up comments to your articles with structured data using the Schema.org structured data schema and microdata to implement it.

We decided to not use JSON-LD, despite Google saying it's recommended, due to the verbosity of that format. Essentially, we'd have to put the same information twice on the page: once as HTML and once as a JSON-LD document. This increases the page length especially when you have lots of comments. Tagging with microdata is much more space efficient and works properly with all search engines.

The structured data tagging is part of the core output defined in our view templates. When overriding the view templates you are strongly advised to keep the structured data tagging.

Also note that we have made sure that the structured data tagging as shipped with Akeeba Engage validates and provides meaningful results to search engines. We cannot guarantee that this will be the case if you do a template override. Before complaining that the structured data is wrong please double check your template overrides. Thank you!