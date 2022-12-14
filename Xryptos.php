<?php
require_once __DIR__.'/src/PHPTelebot.php';
require_once __DIR__.'/src/Function.php';
$bot = new PHPTelebot('1560763356:AAHezLHGVwVONTp_wlM8ts8sfRC3gzk20_s', 'Subona_bot');

// Command without Function
$bot->cmd('hontoni','yokatta');

// Command with Function

$bot->cmd('/gas', function(){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
                return Bot::sendMessage(gasChecker(),$options);
});

$bot->cmd('/top', function(){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
            return Bot::sendMessage(topTen(),$options);
});

$bot->cmd('/indodax', function($coin,$amount){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
            return Bot::sendMessage(iPrice($coin,$amount),$options);
});

$bot->cmd('/calc', function($coin,$amount){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
            return Bot::sendMessage(Calculatorv2($coin,$amount),$options);
});

$bot->cmd('/news', function(){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
                return Bot::sendMessage(latestNews(),$options);
});

$bot->cmd('/p', function($coin){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
                return Bot::sendMessage(priceChecker($coin),$options);
});

$bot->cmd('/ex|ex', function($amount,$pair1,$pair2){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
            return Bot::sendMessage(AssetCalculator($amount,$pair1,$pair2),$options);
});

$bot->cmd('/globalStat', function(){
        $options = ['parse_mode' => 'html','reply' => true,'disable_web_page_preview' => true];
                return Bot::sendMessage(GlobalStat(),$options);
});

$bot->cmd('dbug|/dbug', function(){
    $message = Bot::message();
    	$raw = json_encode($message, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  	$text = "<code>$raw</code>";
 	$options = ['parse_mode' => 'html','reply' => true,];
   	        return Bot::sendMessage($text,$options);
});


$bot->run();
