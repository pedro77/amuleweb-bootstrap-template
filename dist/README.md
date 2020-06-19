# amuleweb-bootstrap-template
aMuleWeb Boostrap template
* Bootstrap v4.5.0
* jQuery v3.5.1

## Installation
1. Download released zip
2. Unpack it in aMule webserver folder `/usr/share/amule/webserver`
3. Stop aMule daemon `sudo systemctl stop amule-daemon`
3. Edit aMule configuration file `/home/user/.aMule/amule.conf` and change "Template" setting to "bootstrap" in "WebServer" section:
```
...
[WebServer]
...
  Enabled=1
...
  Template=bootstrap
...
```
4. Start aMule daemon, ex. `sudo systemctl start amule-daemon`

## Official references
* http://www.amule.org
* http://wiki.amule.org/wiki/AMuleWeb
