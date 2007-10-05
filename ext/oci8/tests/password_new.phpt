--TEST--
oci_password_change()
--SKIPIF--
<?php if (!extension_loaded('oci8')) die("skip no oci8 extension"); 
die ("skip password test in OCI8 1.3.0 Beta"); 
?>
--FILE--
<?php

require dirname(__FILE__)."/connect.inc";

$new_password = "test";
var_dump(oci_password_change($dbase, $user, $password, $new_password));

if (!empty($dbase)) {
	var_dump($new_c = ocilogon($user,$new_password,$dbase));
}
else {
	var_dump($new_c = ocilogon($user,$new_password));
}

var_dump(oci_password_change($dbase, $user, $new_password, $password));


echo "Done\n";

?>
--EXPECTF--
resource(%d) of type (oci8 connection)
resource(%d) of type (oci8 connection)
resource(%d) of type (oci8 connection)
Done
