# About CSS overrides

Both the HTML and CSS are fully overridable using standard core Joomla! features.

The CSS output can be overridden by means of _Media Files Overrides_. We recommend consulting the [official Joomla! documentation on Media File Overrides](https://docs.joomla.org/Understanding_Output_Overrides#Media_Files_Override) to get an overview of the process.

The following guide assumes that you are familiar with that basic Joomla concept.

CSS files are provided in two forms: human readable source in the [SCSS](https://sass-lang.com) format (`.scss` extension) and the compiled and minified result (`.css` extension). You are NOT supposed to modify the `.css` file directly. You are supposed to customise the SCSS source and compile it.

Please DO NOT modify the files in `media/com_engage/css` directly. They will be overwritten on update or re-installation of Akeeba Engage. Instead, here is what you should do.

Create a new folder `/templates/YOUR_TEMPLATE/css/com_engage` where YOUR_TEMPLATE is the name of your site's template. 

Copy all `.scss` files and the `sources` directory from `/media/com_engage/css` into `/templates/YOUR_TEMPLATE/css/com_engage`.

Modify / customise the SCSS files. The files in the `sources` directory are includes, the `.scss` files in the main directory are the ones that needs to be compiled. Make sure your generated files have a `.css` extension (NOT `.min.css`). Joomla will be using them _instead of_ the files shipped with Akeeba Engage.

The main SCSS files are as follows:

* `amp.scss` Used for the AMP (Accelerated Mobile Pages) version of your site when using the third party wbAMP extension.
* `backend.scss` Always loaded in the backend of your site. Implements both visual layout and the Light Mode colors.
* `backend_dark.scss` Used in the backend of your site for Dark Mode. Only overrides colors for Dark Mode.
* `comments.scss` Always loaded in the frontend of your site. Implements both visual layout and the Light Mode colors.
* `comments_dark.scss` Used in the frontend of your site for Dark Mode. Only overrides colors for Dark Mode.