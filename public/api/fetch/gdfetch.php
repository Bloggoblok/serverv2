<?php
  function getDriveId($url) 
  {
        $path = explode('/', parse_url($url) ['path']);
        return (isset($path[3]) && !empty($path[3])) ? $path[3] : '';
   }
        

  function getDL($gurl)
    {

        $headers = [
            'accept-encoding: gzip, deflate, br',
            'content-length: 0',
            'content-type: application/x-www-form-urlencoded;charset=UTF-8',
            'origin: https://drive.google.com',
            'referer: https://drive.google.com/drive/my-drive',
            'x-drive-first-party: DriveWebUi',
            'x-json-requested: true'
        ];

        $gid = getDriveId($gurl);

        $ch = curl_init("https://drive.google.com/uc?id=$gid&authuser=0&export=download");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, []);
        curl_setopt($ch, CURLOPT_ENCODING,  'gzip,deflate');
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $result = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($statusCode == '200') { 
            $res = json_decode(str_replace(')]}\'', '', $result), true);
            return $res;
        }
    
        return false;


    }
    
    $mUrl = getDL($_GET['url']);
    $dUrl = $mUrl['downloadUrl'];
    header("Location: $dUrl");
    die();

?>