#!/bin/bash

# requires: gnome-web-photo imagemagick (from apt-get)
screen_width="2048" #<--set here your screen's width dimension
screen_height="1024" #<--set here your screen's height dimension
interval="300" #<--set here the seconds you want to sleep till the next update
url="http://naver.com" #<-- webpage url to load
#url="http://instagram.com" #<-- webpage url to load
destination="$HOME/Pictures/pwp.png" #<-- destination filename
timeout="300" #<--webpage loading timeout

#while true; do
	set -x
	gnome-web-photo --mode=photo --width=$screen_width $url $destination
	convert $destination -crop "$screen_width"x"$screen_height"+0+0 $destination
	gsettings set org.gnome.desktop.background picture-uri file://$destination
	echo "Sleeping $interval seconds till the next update..."
#	sleep $interval
#done
