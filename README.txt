 ______ _____     
|  ____/ ____|    
| |__ | |  __ ___ 
|  __|| | |_ / __|
| |___| |__| \__ \
|______\_____|___/

EGs Web Panel for Atheme IRC Services.
 * author: J. Newing (synmuffin)
 * email: jnewing@gmail.com
 * website: http://epicgeeks.net/
 * irc: pool.ircmojo.org (channel #egs)


=====================================================================================
=====================================================================================


LEGAL
=================

This file is part of EGs.

Foobar is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

EGs is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with EGs.  If not, see http://www.gnu.org/licenses/


=====================================================================================
=====================================================================================


Support
==============================
If you need support please first check here: http://epicgeeks.net/egs/documentation/
after reading that several times and you find you still need help join us on irc @

server: pool.ircmojo.org channel: #egs


Installation
==============================

During this installation I'm going to assume a few things. 
	
	1) that you know your way around a shell
	2) that you have some understanding of the mysql cli client tool 
	3) That you have Atheme irc services running with both the httpd and xmlrpc modules running.


Step 1
=================

Obtain a copy of the EGs source.


Step 2
=================

Edit the egs/config/config.php file to reflect your web server and Atheme installation. 
There are lots of comments and notes for you to follow along with.


=====================================================================================
=====================================================================================


Step 3 (Optional)
=================

This last step is only for people who wish to use mod-rewrite and remove the index.php file from their urls.
Copy and paste the following into an .htaccess file and place it in your root EGs folder.

<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # You need to change the path to match that of your installation.
    # For example if you installed the EGs system to http://www.yoursite.com/egs/ you would 
    # change that line to read:
    # RewriteBase /egs/
    #     
    # Alternately if your install was located on a subdomain example: http://services.epicgeeks.net 
    # we would change the RewriteBase line to read:
    # RewriteBase /
    
    RewriteBase /egs/

    RewriteCond %{REQUEST_URI} ^system.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]
    
    RewriteCond %{REQUEST_URI} ^application.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]

    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
    ErrorDocument 404 /index.php
</IfModule>  


=====================================================================================
=====================================================================================


Done!

That's it! You should be able to direct your browser to http://www.yoursite.com/services/ and login using your Atheme Nickserv account nickname and password. Remember for support etc... feel free to drop in on us at irc.epicgeeks.net channel #egs and we'll be happy to help!
