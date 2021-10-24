<?php
require 'get_config.php';

$appurl = $_GET['appurl'];

$Token = $_GET['token'];
$Mail = $_GET['mail'];

$Config = get_config();

$Config_arr = json_decode($Config, true);

$name = $Config_arr["name"];
$Contact_Email = $Config_arr["Contact_Email"];
$Host = $Config_arr["SMTP_Host"];
$Username = $Config_arr["SMTP_Username"];
$Password = $Config_arr["SMTP_Password"];
$Port = $Config_arr["SMTP_Port"];

//Import PHPMailer classes into the global namespace

//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;



require '../admin/public/PHPMailer/src/Exception.php';

require '../admin/public/PHPMailer/src/PHPMailer.php';

require '../admin/public/PHPMailer/src/SMTP.php';



//Instantiation and passing `true` enables exceptions

$mail = new PHPMailer(true);



try {

    //Server settings

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

    $mail->isSMTP();                                            //Send using SMTP

    $mail->Host       = $Host;                     //Set the SMTP server to send through

    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Username   = $Username;                     //SMTP username

    $mail->Password   = $Password;                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

    $mail->Port       = $Port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);



    //Recipients

    $mail->setFrom($Username, $name);

    $mail->addAddress($Mail);

    $mail->addReplyTo($Contact_Email, $name);



    //Content

    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = 'PASSWORD RESET';

    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

    

    <head>

        <meta charset="UTF-8">

        <meta content="width=device-width, initial-scale=1" name="viewport">

        <meta name="x-apple-disable-message-reformatting">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="telephone=no" name="format-detection">

        <title></title>

        <!--[if (mso 16)]>

        <style type="text/css">

        a {text-decoration: none;}

        </style>

        <![endif]-->

        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->

        <!--[if gte mso 9]>

    <xml>

        <o:OfficeDocumentSettings>

        <o:AllowPNG></o:AllowPNG>

        <o:PixelsPerInch>96</o:PixelsPerInch>

        </o:OfficeDocumentSettings>

    </xml>

    <![endif]-->

    </head>

    

    <body>

        <div class="es-wrapper-color">

            <!--[if gte mso 9]>

                <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">

                    <v:fill type="tile" color="#fafafa"></v:fill>

                </v:background>

            <![endif]-->

            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">

                <tbody>

                    <tr>

                        <td class="esd-email-paddings" valign="top">

                            <table class="es-content esd-footer-popover" cellspacing="0" cellpadding="0" align="center">

                                <tbody>

                                    <tr>

                                        <td class="esd-stripe" style="background-color: #fafafa;" bgcolor="#fafafa" align="center">

                                            <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">

                                                <tbody>

                                                    <tr>

                                                        <td class="esd-structure es-p40t es-p20r es-p20l" style="background-color: transparent; background-position: left top;" bgcolor="transparent" align="left">

                                                            <table width="100%" cellspacing="0" cellpadding="0">

                                                                <tbody>

                                                                    <tr>

                                                                        <td class="esd-container-frame" width="560" valign="top" align="center">

                                                                            <table style="background-position: left top;" width="100%" cellspacing="0" cellpadding="0">

                                                                                <tbody>

                                                                                    <tr>

                                                                                        <td class="esd-block-image es-p5t es-p5b" align="center" style="font-size:0"><a target="_blank"><img src="https://tlr.stripocdn.email/content/guids/CABINET_dd354a98a803b60e2f0411e893c82f56/images/23891556799905703.png" alt style="display: block;" width="175"></a></td>

                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td class="esd-block-text es-p15t es-p15b" align="center">

                                                                                            <h1 style="color: #333333; font-size: 20px;"><strong>FORGOT YOUR </strong></h1>

                                                                                            <h1 style="color: #333333; font-size: 20px;"><strong>&nbsp;PASSWORD?</strong></h1>

                                                                                        </td>

                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td class="esd-block-text es-p40r es-p40l" align="center">

                                                                                            <p>HELLO</p>

                                                                                        </td>

                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td class="esd-block-text es-p35r es-p40l" align="left">

                                                                                            <p style="text-align: center;">There was a request to change your password!</p>

                                                                                        </td>

                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td class="esd-block-text es-p25t es-p40r es-p40l" align="center">

                                                                                            <p>If did not make this request, just ignore this email. Otherwise, please click the button below to change your password:</p>

                                                                                        </td>

                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td class="esd-block-button es-p40t es-p40b es-p10r es-p10l" align="center"><span class="es-button-border"><a href="'.$appurl.'/password_reset/recoverpw.php?token='.$Token.'" class="es-button" target="_blank">RESET PASSWORD</a></span></td>

                                                                                    </tr>

                                                                                </tbody>

                                                                            </table>

                                                                        </td>

                                                                    </tr>

                                                                </tbody>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </body>

    

    </html>';



    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}