<?php


namespace App\Http\Traits;


trait SendEmailPHPNative
{

    public function sendEmailPHPNative($to_email, $subject ,$view ,$arrOfViewData)
    {
        //website.pages.billEmail.bill_templete
        //website.pages.billEmail.bill_templete
        $to = $to_email;
        $message = view($view, $arrOfViewData)->render();

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <yalahwy.com>' . "\r\n";
        $headers .= "Cc: {$to_email}" . "\r\n";

        mail($to,$subject,$message,$headers);
    }

}//end class