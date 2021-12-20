Akeeba Engage is a Joomla extension of the “package” type. This means that it consists of several Joomla extensions grouped together. Installing the “package“ extension's ZIP file installs all of these extensions automatically. The instructions below describe how to perform this installation.

Please keep two important things in mind.

The installation and updates of extensions are performed _by Joomla itself_ without the participation of the extension's code. If the extension installation or update fails it is something that has to do with Joomla and your server, not the extension being installed / updated. An extremely limited number of issues concerning only the post-installation / post-update process are the purview of the extension developer. This is true for all Joomla extensions, not just those published by Akeeba Ltd.

Akeeba Engage does require you to make some initial configuration as described in our [[Installation and Setup Guide]]. This has to do with the way Joomla permissions work. If you skip the configuration you will get a comment section on _all_ of your articles – even those which are supposed to behave as static page – visible to everyone but only Author users and above will be able to file comments. Before complaining that the extension isn't working please review its configuration. Thank you!

# How to install or update the extension

Please note that installing and updating Akeeba Engage (and almost all Joomla! extensions) is actually the same thing. If you want to update Akeeba Engage please remember that you MUST NOT uninstall it before installing the new version! When you uninstall Akeeba Engage you will lose all your comments. This is definitely something you do not want to happen! Instead, simply install the new version on top of the old one. Joomla! will figure out that you are doing an update and will treat it as such, automatically.

First, go to [the download page for Akeeba Engage](https://www.akeeba.com/download/official/engage.html). The latest release is at the top of the page.

All Akeeba Engage installation packages contain the component and all of its associated extensions. Installing it will install all of these items automatically. It can also be used to upgrade Akeeba Engage; just install it **without** uninstalling the previous release.

In any case, do not extract the ZIP files yet!

> **Attention macOS users!** Safari, the default web server provided to you by Apple, is automatically extracting the ZIP file into a directory and removes the ZIP file. In order to install the extension through Joomla!'s extensions installer you must select that directory, right-click on it and select Compress to get a ZIP file of its contents. 

Log in to your site's administrator section. Click on Extensions, Manage link on the top menu. Please click on the Upload Package File tab. Drag and drop the installation ZIP file you had previously downloaded to start the upload and the installation. After a short while, Joomla will tell you that the component has been installed.

If the installation did not work, please take a look at [our installation troubleshooting instructions](https://www.akeebabackup.com/documentation/troubleshooter/abinstallation.html).
