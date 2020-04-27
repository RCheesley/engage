Akeeba Engage can be updated just like any other Joomla! extension, using the Joomla! extensions update feature. Please note that Joomla! is fully responsible for discovering available updates and installing them on your site. Akeeba Ltd does not have any control of the update process.

> **Note:** This Joomla! feature requires that your server supports fopen() URL wrappers (allow_url_fopen is set to 1 in your server's php.ini file) or has the PHP cURL extension enabled. Moreover, if your server has a firewall, it has to allow TCP connections over port 443 to www.github.com. If you don't see any updates or if they fail to download please ask your host to check that these conditions are met. If they are met but you still do not see the updates please file a bug report in the official Joomla! forum. In the meantime you can use the manual update methods discussed further below this page.

You can access the extensions update feature in different ways depending on your Joomla version:

* Joomla 3: From the icon your Joomla! administrator control panel page. You will find the icon in the left-hand sidebar, under the Maintenance header. When there are updates found for any of your extensions you will see the Updates are available message. Clicking on it will get you to the Update page of Joomla! Extensions Manager.

* Joomla 3 (alternate method): From the top menu of your Joomla! administrator click on Extensions, Manager. From that page click on the Update tab found in the left-hand sidebar. Clicking on it will get you to the Update page of Joomla! Extensions Manager.

* Joomla 4: From the icon your Joomla! administrator control panel page. By default you will find the icon in the right-hand modules area, under the Update Checks header. When there are updates found for any of your extensions you will see the Updates are available message. Clicking on it will get you to the Update page of Joomla! Extensions Manager.

* Joomla 4 (alternate method): From the sidebar of your Joomla! administrator click on System. On the new page find the Update area towards the bottom of the middle column and click the Extensions link. This takes you to the Update page of Joomla! Extensions Manager.

If you do not see the updates try clicking on the Find Updates button in the toolbar of the Joomla! Extensions: Update page. If you do not see the updates still you may want to wait up to 24 hours before retrying. This has to do with the way Joomla! caches the update information.

If there is an update available for Akeeba Engage tick the box to the left of its row and then click on the Update button in the toolbar. Joomla! will now download and install the update.

If Joomla! cannot download the package, please use one of the manual update methods described below. If, however you get an error about copying files, folder not found or a cryptic "-1" error please follow [our installation troubleshooting instructions](https://www.akeebabackup.com/documentation/troubleshooter/abinstallation.html).

If you get a white page while installing the update please try using the manual update method (described below).

## Updating manually

As noted in the installation documentation, installing and updating Akeeba Engage is actually the same thing. If the automatic update using Joomla!'s extensions update feature does not work, please install the update manually following the instructions in the installation page.

> **Important**
>
> When installing an update manually you MUST NOT uninstall your existing version of Akeeba Engage. Uninstalling Akeeba Engage will always remove all your settings and comments, forever. This process is irreversible. You definitely do not want that to happen!

Sometimes Joomla! may forget to copy some files when updating extensions. If you find Akeeba Engage suddenly not working or if you get a warning that your installation is corrupt you need to download the latest version's ZIP file and install it twice on your site, without uninstalling it before or in-between these installations. This will most certainly fix this issue.

If the error occurs again after a while, without you updating our software, please contact your host. Some hosts will delete or rename files automatically and without any confirmation as part of a (broken and unfit for purpose) "malware scanner / antivirus". Unfortunately, these scanners return a lot of false positives -innocent files mistakenly marked as malicious- but rename / delete them nonetheless, breaking software installed on the server. If you are on such a host we very strongly recommend that you move to a decent host, run by people who actually know what they are doing. It will be far less headache for you and would actually improve your site's security.