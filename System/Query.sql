SELECT `nist80053oscal`.*, `nistbaselines`.* 
FROM `nist80053oscal` 
JOIN `nistbaselines` 
ON `nist80053oscal`.`ctrl_id`=`nistbaselines`.`ctrl_id`
WHERE `nistbaselines`.`ctrl_base_low`='x';