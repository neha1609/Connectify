<? php
	
	class whatsAppBot{
			var $APIurl = 'https://eu88.chat-api.com/instance218389/';
	    	var $token = ' ho2wqbnta7x8ge9z';
	    
		function __construct(){ 
			$json = file_get_contents('php://input');
            $decoded = json_decode($json,true);
        }
        /*echo $decoded;*/
    	ob_start ();
        var_dump($decoded);
        $input = ob_get_contents();
        /*echo $input;*/
        ob_end_clean();
        file_put_contents('input_requests.log',$input.PHP_EOL,FILE_APPEND);
        chdir(dirname($_SERVER['SCRIPT_FILENAME']));
    
    	if(isset($decoded['messages'])){
                        foreach($decoded['messages'] as $message){
                        $text = explode(' ',trim($message['body']));
                        if(!$message['fromMe']){
                        switch(mb_strtolower($text[0],'UTF-8')){
                        case 'hi':  {$this->welcome($message['chatId'],false); break;}
                            case 'chatId': {$this->showchatId($message['chatId']); break;}
                            case 'time':   {$this->time($message['chatId']); break;}
                            case 'me':     {$this->me($message['chatId'],$message['senderName']); break;}
                            case 'file':   {$this->file($message['chatId'],$text[1]); break;}
                            case 'ptt':     {$this->ptt($message['chatId']); break;}
                            case 'geo':    {$this->geo($message['chatId']); break;}
                            case 'group':  {$this->group($message['author']); break;}
                            default:        {$this->welcome($message['chatId'],true); break;}
                            }}}}

    function sendRequest($method,$data){
                        $url = $this->APIurl.$method.'?token='.$this->token;
                        if(is_array($data)){ $data = json_encode($data);}
                        $options = stream_context_create(['http' => [
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json',
                        'content' => $data
                        ]]);
                        $response = file_get_contents($url,false,$options);
                        file_put_contents('requests.log',$response.PHP_EOL,FILE_APPEND);
                    }}
	/*echo "Connection made";*/    
	/*echo $json;*/

?>