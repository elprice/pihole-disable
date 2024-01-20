# pihole-disable

The simple solution to temporarily disable pihole from your network! 
![Alt text](image.png)  
(Perfect for family members that complain about links not working for time to time!) 

## Installation
> **Note**: the author installed this on Debian. Other distros should work!

On the pihole host:
```sh
cd /var/www/html
git clone https://github.com/elprice/pihole-disable.git disable

# need to disable piholes redirect of all non-/admin/ URLs to /admin/ by renaming it. Don't worry - it's behavior is provided in the included in the pihole-disable config.
cd /etc/lighttpd/conf-enabled
mv 16-pihole-admin-redirect.conf 16-pihole-admin-redirect.conf.old

# move the pihole-disable config to lighttpd dir 
mv /var/www/html/disable/17-pihole-disable.conf 17-pihole-disable.conf

# restart lighttpd
systemctl reload lighttpd
```

## Usage
pihile-disable should be available @ http://\<your-pihole-url\>/disable

> **Note**: if a different path than /disable/ is desired just clone the project to a different directory name under /var/www/html and update the 17-pihole-disable.conf regex to the new directory path
