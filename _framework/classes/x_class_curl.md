# Classes Framework
	This is my personal framework, feel free to use it as you wish.  
	For help visit bugfish.eu!
	
	
## x_class_curl
	Class to control a Curl Requests.
	No Mysql / No Tables / No Sessions / No Cookies
	  
|Function|Description|
| --|-- |
|last_info| last curl info out of last request|
|set_auth($username, $password)| Set Default Auth Basic|
|set_curldomain($path)| Set Default Curl Domain Pre-Extension|
|set_proxy($proxy_ip, $proxy_port, $proxy_pass = false, $proxy_prot = 'HTTP')| Set Proxy Settings|
|set_cert($cert_verifypeer, $cert_pemfile, $cert_pass = false)| Set SSL Cert Settings|
|xml_to_array($xml)|xml_to_array conversion|
|xml_to_json($xml)|xml_to_json conversion|
|json_to_array($json)|json_to_array conversion|
|json_to_xml($json)|json_to_xml conversion|
|array_to_xml($array)|array_to_xml conversion|
|array_to_json($array)|array_to_json conversion|
|auth_request($urlextension, $type, $header = false, $body = false, $ext = false, $ovr_domain = false, $ovr_username = false, $ovr_password = false, $proxy = false, $cert = false)| Request with Basic Auth |
|request($urlextension, $type,$body = false, $header = false, $ext = false, $ovr_domain = false, $proxy = false, $cert = false)|Request without Basic Auth |
|download($url, $localfile, $header = false, $ext = false, $proxy = false, $cert = false)| Download File from URL to Localfile |
|auth_upload($filepath, $header = false, $ext = false, $ovr_domain = false, $ovr_username = false, $ovr_password = false, $proxy = false, $cert = false)| Upload File with Authentication|
|upload($filepath, $type = "GET", $header = false, $ext = false, $ovr_domain = false, $proxy = false, $cert = false)| Upload File without Authentication|



