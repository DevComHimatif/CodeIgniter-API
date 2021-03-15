#!/bin/sh

/wait-for-it.sh db:5432 -- php spark migrate;

/usr/sbin/apache2ctl -D FOREGROUND;