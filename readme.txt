[center][color=purple][size=13pt][b]Simple Twitter mod [/b][/size][/color]
[b]Author:[/b] [url=http://missallsunday.com]Suki[/url][/center]


[color=purple][b][size=12pt]License[/size][/b][/color]

 * This SMF modification is subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this SMF modification except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/


[color=purple][b][size=12pt]Description[/size][/b][/color]

[b]For SMF 2.0.x only[/b]

This mod uses TwitterOAuth PHP Library  by Abraham Williams (abraham[at]abrah.am) http://abrah.am

[b]This mod needs PHP 5.2+ and cURL Library[/b]

This mod allows you to publish new topics to your twitter account automatically, all the topics made by users who have an active account will be automatically published on your twitter account.

The message will be as follows:

topic name url
url will be normal url or if enable, bit.ly url


-Set the ID of the board or boards you [b]don't[/b] want the mod work.
-Permisisons to post new topics to twitter
-You can use the bit.ly API  to short your urls
-works with every theme, this mod des not modify any file at all! ;)

You will have to create a twitter app, [b]without the twitter app, this mod will not work.[/b]


[size=12pt][color=purple]Laguage[/color][/size]
-English/utf8
-Spanish_latin/utf8
-Spanish_es/utf8


[size=12pt][color=purple]Change Log[/color][/size]
-5/Jan/12 1.2
	+Compatible with 2.0.x
	+fixed bug on users_denied and boards array
	+Updated twitter library
	+Disable the admin form via JavaScript if cURL is not installed 

-23/June/11  1.1. version.
	+Added a permission, now you can manage which membergroups can post new topics to twitter
	+Added a single user ban, now you can put the IDs of single users, those users will not be able to post new topics to twitter even if they are on a group with permissions.
	+Updated to SMF 2.0
	+Cleaning up the Settings part
	+Updated the twitter API
	+Re-work of language strings
	
-10/March/11  Finished first version.
