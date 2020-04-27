Akeeba Engage is a Joomla extension of the “package” type. This means that it consists of several Joomla extensions grouped together. There is a component, a backend library (Akeeba FOF), a frontend linbrary (Akeeba FEF) and several plugins. Installing the “package“ extension's ZIP file installs all of these extensions automatically. The instructions below describe how to perform this installation.

Please keep two important things in mind.

The installation and updates of extensions are performed _by Joomla itself_ without the participation of the extension's code. If the extension installation or update fails it is something that has to do with Joomla and your server, not the extension being installed / updated. An extremely limited number of issues concerning only the post-installation / post-update process are the purview of the extension developer. This is true for all Joomla extensions, not just those published by Akeeba Ltd.

Akeeba Engage does require you to make some initial configuration as described in our [[Installation and Setup Guide]]. This has to do with the way Joomla permissions work. If you skip the configuration you will get a comment section on _all_ of your articles – even those which are supposed to behave as static page – visible to everyone but only Author users and above will be able to file comments. Before complaining that the extension isn't working please review its configuration. Thank you!

# How to install the extension

Just like with most Joomla! extensions there are two ways to install or manually update Akeeba Engage on your site:

* **Install from URL**. It is the easiest and fastest one, if your server supports it. Most servers do support this method.

* **Upload package file**. That's the typical extension installation method for Joomla! extensions.

Please note that installing and updating Akeeba Engage (and almost all Joomla! extensions) is actually the same thing. If you want to update Akeeba Engage please remember that you MUST NOT uninstall it before installing the new version! When you uninstall Akeeba Engage you will lose all your comments. This is definitely something you do not want to happen! Instead, simply install the new version on top of the old one. Joomla! will figure out that you are doing an update and will treat it as such, automatically.

## Install from URL

The easiest way to install Akeeba Engage is using the Install from URL feature in Joomla!.

> **Important!** This Joomla! feature requires that your server supports fopen() URL wrappers (allow_url_fopen is set to 1 in your server's php.ini file) or has the PHP cURL extension enabled. Moreover, if your server has a firewall, it has to allow TCP connections over port 443 to `github.com`. If you don't see any updates or if they fail to download please ask your host to check that these conditions are met. If they are met but you still do not see the updates or cannot perform the download please file a bug report in the official Joomla! forum.

First, go to [the download page for Akeeba Engage](https://github.com/akeeba/engage/releases). The latest release is at the top of the page. Right click on the file whose name starts with `pkg_engage_` and choose Copy URL or whatever your browser calls it.

Now go to your site's administator backend and click on Extensions, Manage. Click on the Install from URL tab. Clear the contents of the Install URL field and paste the URL you copied. Then click on the Install button. Joomla! will download and install the Akeeba Engage update.

If Joomla! cannot download the package, please use the Upload Package File method described below. If, however you get an error about copying files, folder not found or a cryptic "-1" error please follow [our installation troubleshooting instructions](https://www.akeebabackup.com/documentation/troubleshooter/abinstallation.html).

## Upload package file

First, go to [the download page for Akeeba Engage](https://github.com/akeeba/engage/releases). The latest release is at the top of the page. Click on the file whose name starts with `pkg_engage_` to download the ZIP file.

All Akeeba Engage installation packages contain the component and all of its associated extensions. Installing it will install all of these items automatically. It can also be used to upgrade Akeeba Engage; just install it **without** uninstalling the previous release.

In any case, do not extract the ZIP files yet!

> **Attention macOS users!** Safari, the default web server provided to you by Apple, is automatically extracting the ZIP file into a directory and removes the ZIP file. In order to install the extension through Joomla!'s extensions installer you must select that directory, right-click on it and select Compress to get a ZIP file of its contents. 

Log in to your site's administrator section. Click on Extensions, Manage link on the top menu. Please click on the Upload Package File tab. Drag and drop the installation ZIP file you had previously downloaded to start the upload and the installation. After a short while, Joomla will tell you that the component has been installed.

> **Warning!** Akeeba Engage is a big extension. Some servers do not allow you to upload files that big. If this is the case you can try the Manual installation or ask your host to follow our installation troubleshooting instructions under "You get an error about the package not being uploaded to the server".

If the installation did not work, please take a look at [our installation troubleshooting instructions](https://www.akeebabackup.com/documentation/troubleshooter/abinstallation.html).
