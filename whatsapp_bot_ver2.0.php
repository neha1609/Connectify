<? php
	class whatsAppBot {
		var $APIurl = 'https://eu88.chat-api.com/instance218389/';
        var $token = 'ho2wqbnta7x8ge9z';

        public function __construct(){ 
        	$json = file_get_contents('php://input');
            $decoded = json_decode($json,true);
        }
    
        ob_start();
        var_dump($decoded);
        $input = ob_get_contents();
        ob_end_clean();
        file_put_contents('input.log',$input.PHP_EOL,FILE_APPEND);
	}
?>