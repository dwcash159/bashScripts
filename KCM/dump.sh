#!/bin/bash

cp database.php /tmp/database.php
cp getDatabaseParams.php /tmp/getDatabaseParams.php

sed -i -e '0,/<?php/ s/<?php/define("_ENGINE", TRUE);/' -e '0,/return/ s/return/$params=/' -e '0,/?>/ s/?>/echo __prepareConfigForBash(\$params,"_","cfg");/' /tmp/database.php
cat /tmp/database.php >> /tmp/getDatabaseParams.php

scriptPath="/tmp/getDatabaseParams.php";

cfg_parser () {

    IFS=$'\n' && ini=( $(php -d error_reporting=E_ERROR -f $scriptPath  ) )
    ini[0]=''

    eval "$(echo "${ini[*]}")"
}
cfg_parser

echo "Database username is : $cfg_params_username"
echo "Database password is : $cfg_params_password"
echo "Database name is : $cfg_params_dbname"

mysqldump $cfg_params_dbname --single-transaction -u $cfg_params_username -p$cfg_params_password | gzip > /tmp/community.kcm.org.sql.gz