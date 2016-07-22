<?php
#!/usr/bin/php -q

/**
* @desc
*/
function convertToFlatArray($Array,$Separator='.',$FlattenedKey='') {
    $FlattenedArray=Array();
    foreach($Array as $Key => $Value) {
        if(is_Array($Value)) {
            $_FlattenedKey=(strlen($FlattenedKey)>0?$FlattenedKey.$Separator:"").$Key;
            $FlattenedArray=array_merge(
                $FlattenedArray,
                convertToFlatArray($Value,$Separator,$_FlattenedKey)
            );
        } else {
            $_FlattenedKey=(strlen($FlattenedKey)>0?$FlattenedKey.$Separator:"").$Key;
            $FlattenedArray[$_FlattenedKey]=$Value;
        }
    }
    return $FlattenedArray;
}

/**
*
*/
function __prepareConfigForBash($Array,$Separator='.',$_FlattenedKey='') {

    //$flatConfig=cmfcArray::convertToFlatArray($Array,$Separator,$_FlattenedKey);
    $flatConfig=convertToFlatArray($Array,$Separator,$_FlattenedKey);

    $shellConfig='';
    foreach ($flatConfig as $optionName=>$optionValue) {
        $shellConfig.="$optionName=\"".addslashes($optionValue)."\"\n";
    }

    return $shellConfig;
}
