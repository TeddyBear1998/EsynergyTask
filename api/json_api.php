<?php

header("Content-Type:application/json");
require("../private/cms_helper.php");
// TODO: Validate data
// TODO: if have time, create like a nice curl request, so you can call this from POSTMAN
// In postman, as query params pass date_from, date_to for filtering data. Could pass a limit - so user can decide how many items to display.
$cms = new Helper();
$data = $cms->getData("SELECT * FROM product LIMIT 10");
echo json_encode($data);

?>
