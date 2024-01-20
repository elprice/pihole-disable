# pihole-disable

The simple solution to temporarily disable pihole from your network! 

![Alt text](image.png)

## Installation
> **Note**: this was installed on Debian.

On the pihole host:
```sh
cd /var/www/html
git clone https://github.com/elprice/pihole-disable.git disable

# need to disable piholes redirect of all non-/admin/ URLs to /admin/. Can accomplish this without deleting the file by renaming it
cd /etc/lighttpd/conf-enabled
mv 16-pihole-admin-redirect.conf 16-pihole-admin-redirect.conf.old

# move the pihole-disable config to lighttpd dir 
mv /var/www/html/disable/17-pihole-disable.conf 17-pihole-disable.conf

# restart lighttpd
systemctl reload lighttpd
```

Try loading the app @ <your-pihole-url>/disable
