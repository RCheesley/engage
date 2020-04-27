Akeeba Engage is a Joomla extension of the “package” type. This means that it consists of several Joomla extensions grouped together. There is a component, a backend library (Akeeba FOF), a frontend linbrary (Akeeba FEF) and several plugins. You **must** uninstall the “package” extension, not the individual extensions (component, plugins etc). If you fail to do so the uninstallation will fail and / or leave files and extensions behind. If that happens to you install Akeeba Engage again and then uninstall if following the instructions below.

**WARNING!** Uninstalling Akeeba Engage permanently deletes **all comments**. This process is irreversible. DO NOT uninstall Akeeba Engage if you plan on keeping the comments.

## Uninstalling Akeeba Engage

First, go the extensions manager page.

* Joomla 3: From the top menu of your Joomla! administrator click on Extensions, Manage. From the left-hand sidebar choose Manage.

* Joomla 4: From the sidebar of your Joomla! administrator click on System. On the new page find the Manage area towards the top of the middle column and click the Extensions link.

In the Search box type `Akeeba Engage package`. It will show you a single item called "Akeeba Engage package" whose Type is Package.

Select the item's checkbox and click on the Uninstall button in the toolbar. The extension and all its dependencies will be automatically uninstalled.

## Information about FOF
   
All of our software, as well as some third party software, installs our FOF framework version 3 or 4. This is automatically removed when the _last_ extension to use it is being uninstalled.

Please **DO NOT** try to uninstall the file_fof30 or file_fof40 File type extension manually. Joomla will let you do that even when it's not safe, meaning your site may become inaccessible.

Furthermore, please note that Joomla 3 (but NOT Joomla 4) comes with a similarly named FOF extension of the Library type installed. This is the very old version 2.4.3, last updated April 2015, which is no longer supported or maintained by our company. That version is bundled with Joomla itself. It is NOT part of any Akeeba extension as of mid-2015. Moreover, it cannot be uninstalled - it's a protected extension. Please do not ask us for assistance about this extension, it's part of Joomla itself.

Finally, if you had a really old version of our software installed you might find an extension named `F0F` (ef zero ef). That was an updated version of FOF 2.x, named in a way that does not conflict with Joomla's copy of FOF 2 (it's complicated...). We have not used this framework since mid-2015 so you should be able to safely remove it as long as no third party extension still uses it. Since it's been so many years since we last updated it or used it in our software we will no longer answer inquiries about it. Thank you for your understanding.