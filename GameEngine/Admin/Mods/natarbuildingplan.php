<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       natarbuildingplan.php                                       ##
##  Developed by:  Dzoki                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################
include_once("../../Session.php");
mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
mysql_select_db(SQL_DB);
if ($session->access < ADMIN) die("Access Denied: You are not Admin!");

$id = $_POST['id'];
$amt = $_POST['vill_amount'];
 
for($i=1;$i<=$amt;$i++) {
   
        $kid = rand(1,4);
       
        $wid = $database->generateBase($kid);
        $database->setFieldTaken($wid);
        $time = time();
        $q = "insert  into `s1_vdata`(`wref`,`owner`,`name`,`capital`,`pop`,`cp`,`celebration`,`type`,`wood`,`clay`,`iron`,`maxstore`,`crop`,`maxcrop`,`lastupdate`,`loyalty`,`exp1`,`exp2`,`exp3`,`created`) values ('$wid','3','WW Buildingplan',0,233,232,0,0,80000.00,80000.00,80000.00,80000,80000.00,80000,1314974534,100,0,0,0,1314968914)";
        mysql_query($q) or die(mysql_error());
        $q = "insert  into ".TB_PREFIX."fdata (`vref`,`f1`,`f1t`,`f2`,`f2t`,`f3`,`f3t`,`f4`,`f4t`,`f5`,`f5t`,`f6`,`f6t`,`f7`,`f7t`,`f8`,`f8t`,`f9`,`f9t`,`f10`,`f10t`,`f11`,`f11t`,`f12`,`f12t`,`f13`,`f13t`,`f14`,`f14t`,`f15`,`f15t`,`f16`,`f16t`,`f17`,`f17t`,`f18`,`f18t`,`f19`,`f19t`,`f20`,`f20t`,`f21`,`f21t`,`f22`,`f22t`,`f23`,`f23t`,`f24`,`f24t`,`f25`,`f25t`,`f26`,`f26t`,`f27`,`f27t`,`f28`,`f28t`,`f29`,`f29t`,`f30`,`f30t`,`f31`,`f31t`,`f32`,`f32t`,`f33`,`f33t`,`f34`,`f34t`,`f35`,`f35t`,`f36`,`f36t`,`f37`,`f37t`,`f38`,`f38t`,`f39`,`f39t`,`f40`,`f40t`,`f99`,`f99t`,`wwname`) values ($wid,0,1,0,4,0,1,0,3,0,2,0,2,0,3,0,4,0,4,0,3,0,3,0,4,0,4,0,1,0,4,0,2,0,1,0,2,20,17,20,11,0,0,20,10,10,22,10,25,0,0,20,15,10,19,0,0,0,0,0,0,10,23,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,16,0,0,0,0,'World Wonder')";
        mysql_query($q);
        $database->addUnits($wid);
        $database->addTech($wid);
        $database->addABTech($wid);
        $q = "UPDATE ".TB_PREFIX."units SET u41 = u41 + '150000', u42 = u42 + '150000', u43 = u43 + '150000', u44 = u44 + '150000', u45 = u45 + '150000', u46 = u46 + '150000', u47 = u47 + '150000', u48 = u48 + '150000' , u49 = u49 + '150000', u50 = u50 + '150000' WHERE vref = '".$wid."'"; 
        mysql_query($q);
}

    
    mysql_query("Insert into ".TB_PREFIX."admin_log values (0,$id,'Added <b>$amt</b> WW Buildingplan Villages',".time().")");


header("Location: ../../../admin.php?p=natarbuildingplan&g");
?>