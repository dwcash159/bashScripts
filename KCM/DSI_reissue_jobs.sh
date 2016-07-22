#!/bin/bash
for i in `seq 1224271 1224408`;
do
php /wwwroot/databridge/app/console dsi:print:soffice job --id=$i --debug
done
