<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (!function_exists('url')) {

    function url($slug)
    {
        return base_url() . '/' . $slug;
    }
}

if (!function_exists('html_convert')) {

    function html_convert($text)
    {
        $text = str_replace("'", "", $text);
        $text = str_replace("\"", "", $text);

        return html_entity_decode($text);
    }
}

function searchArrayKeyVal($sKey, $id, $array)
{
    if (is_array($array)) {
        foreach ($array as $key => $val) {
            if ($val[$sKey] == $id) {
                return $key;
            }
        }
    }
    return false;
}

function numberTowords($num)
{
    $ones = array(
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
    );
    $tens = array(
        1 => "ten",
        2 => "twenty",
        3 => "thirty",
        4 => "forty",
        5 => "fifty",
        6 => "sixty",
        7 => "seventy",
        8 => "eighty",
        9 => "ninety",
    );
    $hundreds = array(
        "hundred",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion",
    ); //limit t quadrillion
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {
        if ($i < 20) {
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            $rettxt .= $tens[substr($i, 0, 1)];
            // print_r($ones);
            // echo '<br />'. substr($i,1,1);exit;
            $rettxt .= " ".@$ones[substr($i,1,1)];
        } else {
            $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            $rettxt .= " " . $tens[substr($i, 1, 1)];
            $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    // print_r($rettxt);
    return $rettxt;
}

function encrypt($text)
{

    $config = new \Config\Encryption();
    $config->key = 'RJVAJA';
    $config->driver = 'OpenSSL';

    $encrypter = \Config\Services::encrypter($config);
    $encrypted = $encrypter->encrypt($text);
    $encrypted = base64_encode($encrypted);
    return $encrypted;

}

function decrypt($text)
{
    $data = base64_decode($text);

    $config = new \Config\Encryption();
    $config->key = 'RJVAJA';
    $config->driver = 'OpenSSL';

    $encrypter = \Config\Services::encrypter($config);
    $decrypted = $encrypter->decrypt($data);
//$decrypted = rtrim($decrypted, "\0");
    return $decrypted;
}

function MakeThumb($source_path, $target_path, $width, $height, $defalusize = '600')
{
    if ($height == $defalusize && $width == $defalusize) {
        $height = $defalusize;
        $width = $defalusize;
    } else if ($height >= $width && $height > $defalusize) {
        $calc = $height / $defalusize;
        $height = $defalusize;
        $width = $width / $calc;
    } else if ($height <= $width && $width > $defalusize) {
        $calc = $width / $defalusize;
        $width = $defalusize;
        $height = $height / $calc;
    } else {
        $width = $width;
        $height = $height;
    }

    $image = \CodeIgniter\Config\Services::image()
        ->withFile($source_path)
        ->resize(600, 600, true, 'height')
        ->save($target_path);
}


function generateTransactionId() 
{

    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    $db = \Config\Database::connect();

    $builder = $db->table('payment_log');

    $query = $builder->select('*')->where(array('TxnId' => $txnid))->get();

    $getdata = $query->getRow();

    if (!empty($getdata)) {

        $txnid = generateTransactionId();

    }

    return $txnid;

}


function check_wishlist($product_id = '', $user_id = '')
{
    $db = \Config\Database::connect();
    $builder = $db->table('wishlist');
    $builder->select('product_id, count(id) as res');
    $builder->where(array('product_id' => $product_id, 'user_id' => $user_id, 'is_delete' => 0));
    $query = $builder->get();
    $getdata = $query->getRow();
    
    if (($getdata->res)>=1) 
    {
        echo ($product_id==$getdata->product_id) ? '<i class="lni lni-heart-filled text-primary"></i>' : '<i class="lni lni-heart"></i>' ;

    } else 
    {
        echo '<i class="lni lni-heart"></i>';
    }
    
}
     function send_email($email,$subject,$message,$name) 
    {
      
        // $email          = $this->request->getPost('email');
        // $subject        = $this->request->getPost('subject');
        // $message        = $this->request->getPost('message');
        
      //  $mail = new PHPMailer(true);  
	    try {
		    
		         $mail = new PHPMailer(true);
                 $mail->isSMTP();
                 $mail->SMTPDebug = 0;
                //  $mail->Host = 'smtp.gmail.com';
                //  $mail->Port = 587;
                //  $mail->SMTPAuth = true;
                //  $mail->Username = 'jenithdavda12345@gmail.com'; 
                //  $mail->Password =  'bfrafoqvwumpohlz';
                //  $mail->setFrom('jenithdavda12345@gmail.com', 'epatriotcrm');
                //  $mail->addReplyTo($email, 'epatriotcrm');
                //  $mail->addAddress($email, $name);
                //   $mail->Host = 'mail.koffeekodes.com';
                //  $mail->Port = 465;
                //  $mail->SMTPAuth = true;
                //  $mail->Username = 'test@koffeekodes.com'; 
                //  $mail->Password =  '8;UpV$3j-ep?';
                //  $mail->setFrom('test@koffeekodes.com', 'epatriotcrm');
                //  $mail->addReplyTo($email, 'epatriotcrm');
                //  $mail->addAddress($email, $name);

                 $mail->Host = 'smtp.gmail.com';
                 $mail->Port = 587;
                 $mail->SMTPAuth = true;
                 $mail->Username = 'career@epatriotcrm.com'; 
                 $mail->Password =  'fhvqfkcbbjhgyraz';
                 $mail->setFrom('career@epatriotcrm.com', 'epatriotcrm');
                 $mail->addReplyTo($email, $name);
                 $mail->addAddress($email, $name);
                 $mail->Subject = $subject;  
                 $mail->Body = $message;
                 
                //  $mail->Host = 'mail.koffeekodes.com';
                //  $mail->Port = 465;
                //  $mail->SMTPAuth = true;
                //  $mail->Username = 'test@koffeekodes.com'; 
                //  $mail->Password =  '8;UpV$3j-ep?';
                //  $mail->setFrom('test@koffeekodes.com', 'epatriotcrm');
                //  $mail->addReplyTo($email, 'epatriotcrm');
                //  $mail->addAddress($email, $name);
                //  $mail->Subject = 'Testing PHPMailer';  
                //  $mail->Body = 'This is a plain text message body';
                  
                
                 $data =$mail->send();
               // print_r($data);exit;
                //  if (!$mail->send()) {
                //     echo '<p>'.$data->getMessage().'</p>';
                // } else {
                //     echo '<p>Message successfully sent!</p>';
                // }
			     $msg = array("st" => "succsess", "msg" => "mail send succsess!!!");
			     return $msg;

                } catch (Exception $e) {
                    //print_r($e);
                    echo "Something went wrong. Please try again.";
                }  
    }
    function send_email_employee($email,$subject,$message,$name,$attachment) 
    {
        //print_r($)
      
	    try {
		    
		         $mail = new PHPMailer(true);
                 $mail->isSMTP();
                 $mail->SMTPDebug = 0;
              
                 $mail->Host = 'smtp.gmail.com';
                 $mail->Port = 587;
                 $mail->SMTPAuth = true;
                 $mail->Username = 'career@epatriotcrm.com'; 
                 $mail->Password =  'fhvqfkcbbjhgyraz';
                 $mail->setFrom('career@epatriotcrm.com', 'epatriotcrm');
                 $mail->addReplyTo($email, $name);
                 //$mail->addAttachment($attachment);
                 //$mail->AddAttachment(getcwd().$attachment); 

                 $mail->AddAttachment($attachment, $name = 'Document',  $encoding = 'base64', $type = 'application/pdf');
                 $mail->addAddress($email, $name);
                 $mail->Subject = $subject;  
                 $mail->Body = $message;   
                 $mail->IsHTML(true);
                 $data =$mail->send();
            
			     $msg = array("st" => "succsess", "msg" => "mail send succsess!!!");
			     return $msg;

                } catch (Exception $e) {
                   print_r($e);
                    echo "Something went wrong. Please try again.";
                }  
    }
    function send_email_talk($email,$subject,$message,$name) 
    {
      
        // $email          = $this->request->getPost('email');
        // $subject        = $this->request->getPost('subject');
        // $message        = $this->request->getPost('message');
        
        $mail = new PHPMailer(true);  
		try {
		    
		         //$mail = new PHPMailer();
                 $mail->isSMTP();
                 $mail->SMTPDebug = 0;
                 $mail->Host = 'smtp.gmail.com';
                 $mail->Port = 587;
                 $mail->SMTPAuth = true;
                 $mail->Username = 'info@epatriotcrm.com'; 
                 $mail->Password =  'yprgzctnegngslsw';
                 $mail->setFrom('info@epatriotcrm.com', 'epatriotcrm');
                 $mail->addReplyTo('info@epatriotcrm.com', 'epatriotcrm');
                 $mail->addAddress($email, $name);
                 $mail->Subject = $subject;  
                 $mail->Body = $message;
                 $data =$mail->send();
                 //print_r($data);exit;
			     $msg = array("st" => "succsess", "msg" => "mail send succsess!!!");
			     return $msg;

		} catch (Exception $e) {
		    echo "Something went wrong. Please try again.";
		}  
	
    }

