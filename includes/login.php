<?php

require_once('/var/simplesamlphp/src/_autoload.php');
require_once('../web/sites/vehicles/config.inc.php');

$as = new \SimpleSAML\Auth\Simple('default-sp');

$as->requireAuth();

$attributes = $as->getAttributes();

if (!(in_array($attributes['urn:mace:dir:attribute-def:cwlLoginName'][0], $auth['saml']['admin']['urn:mace:dir:attribute-def:cwlLoginName']))) {
        print("<h1>Vehicle Administrators only</h1>");
        exit();
}
?>
