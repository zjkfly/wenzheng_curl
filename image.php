<?php
$data = array ('Login.Token1' => '1317443033','Login.Token2' => 'fbd18b34f0295edaff602adf993bf42e1d873706','goto' => 'http://my.sdwz.cn/loginSuccess.portal','gotoOnFail' => 'http://my.sdwz.cn/loginFailure.portal');
$data = http_build_query($data);
$opts = array (
'http' => array (
'method' => 'POST',
'header'=> "Content-type: application/x-www-form-urlencodedrn" .
"Content-Length: " . strlen($data) . "rn",
'content' => $data
)
);
$context = stream_context_create($opts);
$html = file_get_contents('http://my.sdwz.cn/userPasswordValidate.portal', false, $context);
echo $html;
?>