<?php

require_once('/var/simplesamlphp/src/_autoload.php');
require_once('../web/sites/vehicles/config.inc.php');

$as = new \SimpleSAML\Auth\Simple('default-sp');

$as->requireAuth();

$attributes = $as->getAttributes();

function is_admin($user, $admin) {
    if (in_array($user, $admin)) {
        return true;
    } else {
        return false;
    }
}

?>
