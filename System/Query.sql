SELECT `nist80053oscal`.*, `nistbaselines`.* 
FROM `nist80053oscal` 
JOIN `nistbaselines` 
ON `nist80053oscal`.`ctrl_id`=`nistbaselines`.`ctrl_id`
WHERE `nistbaselines`.`ctrl_base_low`='x';


SELECT * FROM nist80053oscal JOIN nistbaselines
                ON nist80053oscal.ctrl_id=nistbaselines.ctrl_id 
                WHERE ctrl_base_low ='x' OR ctrl_base_low = '' AND ctrl_base_mod = ''
                AND ctrl_base_high = '';