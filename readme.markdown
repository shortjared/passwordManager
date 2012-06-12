passwordManager
---------------
The password manager was written as a quick solution to the mess of passwords we tried to remember at one of my day jobs. It allows for the organization or technical administration to assign individuals to one or more groups.

Each password can be defined to one or more groups. Each registered user can be defined to one or more groups.


All of the passwords that a user has access to are not only protected by their personal login (Only valid users can retrieve passwords), but also they must know the company wide "masterpass".


Setup
-------

Typical elefant web installation should be working.

Change masterpassword in `passwordManager/conf/config.php`.

Add a Group. Add a user to that group. Create a new password. Add Group to Password.


In order to see passwords, go to http://example.com/passwordManager. Potentially add a menu link only visible to your logged in users.


Support
-------
I cannot offer any support beyond what is found here, and the occasional updates I may release.

Support may be found at http://elefantcms.com/forum.
