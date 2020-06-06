<?php

    function Clean()
    {
        ?>
        <script>
location = 'javascript:document.write();\n\
document.close()'
</script>
        <?php
    }
?>

<?php
$token = 'token';
$chatid = 'chat_id';

        send_img($token, $chatid, 'https://miro.medium.com/max/3200/1*0KFB17_NGTPB0XWyc4BSgQ.jpeg');
        send_doc($token, $chatid, 'https://miro.medium.com/max/3200/1*0KFB17_NGTPB0XWyc4BSgQ.jpeg');
        send_mess('Hello World!', $token, $chatid);

        function send_mess($text, $token, $chatid){
            if($text != null){
            $url = "https://api.telegram.org/bot" . $token . "/sendMessage";            
            $ch = curl_init();
            
            $data = array(
                'chat_id' => $chatid,
                'text' => $text,
            );
           
           curl_setopt($ch, CURLOPT_URL, $url);           
           curl_setopt($ch, CURLOPT_POST, 1);
           curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
           curl_exec($ch);
           curl_close($ch);
           Clean();
            }
 else {
                echo 'Text: null';
 }
        }
        
        function send_img($token, $chatid, $imagePath){
            if($imagePath != null){            
            $url = "https://api.telegram.org/bot" . $token . "/sendPhoto";            
            $ch = curl_init();
            
            $data = array(
                'chat_id' => $chatid,
                'photo' => $imagePath,
            );
            
            curl_setopt($ch, CURLOPT_URL, $url);           
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);
            curl_close($ch);
            Clean();
            }
 else {
                echo 'Path: null';
 }
        }
        
        function send_doc($token, $chatid, $documentPath){
            if($documentPath != null){            
            $url = "https://api.telegram.org/bot" . $token . "/sendDocument";            
            $ch = curl_init();
            
            $data = array(
                'chat_id' => $chatid,
                'document' => $documentPath,
            );
            
            curl_setopt($ch, CURLOPT_URL, $url);           
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);
            curl_close($ch);
            Clean();
            }
 else {
                echo 'Path: null';
 }
        }
        exit();
?>