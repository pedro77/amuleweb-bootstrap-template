# amuleweb-bootstrap-template
aMuleWeb Boostrap template

## Current
* Bootstrap v4.5.0
* jQuery v3.5.1

## Installation
1. Download released zip
2. Unpack it in aMule webserver folder, ex. `/usr/share/amule/webserver`
3. Stop aMule daemon, ex. `sudo systemctl stop amule-daemon`
3. Edit aMule configuration file, ex. `/home/user/.aMule/amule.conf`, and change "Template" setting to "bootstrap" in "WebServer" section, ex:
```
...
[WebServer]
...
  Template=bootstrap
...
```
4. Start aMule daemon, ex. `sudo systemctl start amule-daemon`
