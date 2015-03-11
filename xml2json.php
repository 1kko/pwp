<?
    $xmlNode=simplexml_load_file($_GET['url']);
    $json=json_encode($xmlNode, true);
    print_r($json);
?>
