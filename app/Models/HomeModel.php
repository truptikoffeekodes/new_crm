<?php

namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model
{
    public function insert_edit_user($post)
    {
        $db = $this->db;
        $builder = $db->table('user');
        $pdata = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'message' => $post['message'],
        );

        $result = $builder->insert($pdata);
        $email = "info@epatriotcrm.com";
        $name = "patriotcrm";
        $message = "Name:".$post['name']."<br>Email:".$post['email']."<br>Message:".$post['message'];
        $subject = "Drop A Line";

        if ($result) {
            
           $data = send_email_talk($email,$subject,$message,$name);
            $msg = array("st" => "success", "msg" => "Registration Successfully!!!");
        } else {
            $msg = array("st" => "failed", "msg" => "Registration Fail!!!");
        }
        return $msg;
    }

    public function insert_edit_job($post,$file)
    {
        
        $db = $this->db;
        $builder = $db->table('apply_job');
        $pdata = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'contact'=> $post['contact'],
            'visa' => $post['visa']
        );
        if ($file->isValid() && !$file->hasMoved()) {
            $original_path = '/job/' . date('Ymd') . '/';
    
            if (!file_exists(getcwd() . $original_path)) {
                mkdir(getcwd() . $original_path, 0777, true);
            }
    
            $newName = $file->getRandomName();
            $file->move(getcwd() . $original_path, $newName);
    
            $pdata['image'] = $original_path . $newName;
        }
        
        $result = $builder->insert($pdata);

        
        $builder1 = $db->table('current_openning');
        $builder1->select('*');
        $builder1->where(array("id" => @$post['jid']));
        $builder1->limit(1);
        $result1 = $builder1->get();
        $result_array1 = $result1->getRowArray();
        print_r(base_url().$pdata['image']);exit;
        $subject ="New Application!!!";
        $message = "Title:".$result_array1['title']."<br>Name:".$post['name']."<br>Email:".$post['email']."<br>Contact:".$post['contact']
        ."<br><a href=".base_url().$pdata['image']."Document</a>";
        $email = 'career@epatriotcrm.com'; 
        $name = 'epatriotcrm';
        $attachment = $pdata['image'];

        $subject1 ="Apply For Job";
        $message1 = "Thank you for your submission, A member of our team will contact you shortly.";
        // $email = $post['email'];
        $email1 = $post['email']; 
        $name1 = $post['name'];

        if ($result) {
             $data = send_email_employee($email,$subject,$message,$name,$attachment);
             $data = send_email($email1,$subject1,$message1,$name1);
             //print_r($data);exit;
             
             
             
            //$mail = new PHPMailer(true);  
            //try {
                
                // $mail = new PHPMailer(true);
                //  $mail->isSMTP();
                //  $mail->SMTPDebug = 2;
                //  $mail->Host = 'smtp.gmail.com';
                //  $mail->Port = 587;
                //  $mail->SMTPAuth = true;
                //  $mail->Username = 'jenithdavda12345@gmail.com'; 
                //  $mail->Password =  'bfrafoqvwumpohlz';
                //  $mail->setFrom('jenithdavda12345@gmail.com', 'Your Name');
                //  $mail->addReplyTo('jenithdavda12345@gmail.com', 'Your Name');
                //  $mail->addAddress('jigar.koffeekodes@gmail.com', 'Receiver Name');
                //  $mail->Subject = 'Testing PHPMailer';
                // // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
                //  $mail->Body = 'This is a plain text message body';
                //  //$mail->addAttachment('test.txt');
                //  $mail->send();
                 $result1 = array("st" => "succsess", "msg" => "Registration succsess!!!");
             
                 
        } else {
                 $result1 = array("st" => "failed", "msg" => "Registration Fail!!!");
               }
               
              // print_r($result1);exit;
      return $result1;

    }
      public function insert_edit_current_opennings($post)
    {
        $db = $this->db;
        $builder = $db->table('current_openning');
        $builder->select('*');
        $builder->where(array("id" => @$post['id']));
        $builder->limit(1);
        $result = $builder->get();
        $result_array = $result->getRow();

        if(empty($post['description']))
        {
            $msg = array('st' => 'fail', 'msg' => "Please add Description!!!");
            return $msg;   
        }
       
        $msg = array();
        $pdata = array(
            'title' => $post['title'],
            'location' => $post['location'],
            'sub_title' => $post['sub_title'],
            'type_of_position' => !empty(@$post['type_of_position'])?@$post['type_of_position']:'',
            'description' => $post['description'],
        );

        
        if (!empty($result_array)) {
         
            $pdata['update_by'] = 1;
            $pdata['update_at'] = date('Y-m-d H:i:s');
            if (empty($msg)) {
                $builder->where(array("id" => $post['id']));
                $result = $builder->Update($pdata);
                if ($result) {
                    $msg = array('st' => 'success', 'msg' => "Your Details updated Successfully!!!");
                } else {
                    $msg = array('st' => 'fail', 'msg' => "Your Details Updated fail");
                }
            }
        } else {

            //$uid = (@$post['id'] != '') ? @$post['id'] : session('AU_ID');
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = 1;
          
            if (empty($msg)){
              
                $result = $builder->insert($pdata);
               $id = $db->insertID();
                
                if ($result) {
                        $msg = array('st' => 'success', 'msg' => "Your Details Added Successfully..!!");
                    }else{
                        $msg = array('st' => 'fail', 'msg' => "Your Details Updated fail");    
                    }
                
            }
        }
        return $msg;
    }
    public function get_currentopening_list()
    {
        $db = $this->db;
        $builder = $db->table('current_openning');
        $builder->select('*');
        $builder->where(array("is_delete" => 0));
        $builder->limit(9);
        $builder->orderBy('id','DESC');
        $result = $builder->get();
        $result_array = $result->getResultArray();
        return $result_array;
    }
    public function get_currentopennings_byid($id)
    {
        $db = $this->db;
        $builder = $db->table('current_openning');
        $builder->select('*');
        $builder->where(array("is_delete" => 0,"id"=>$id));
        $result = $builder->get();
        $result_array = $result->getRowArray();
        return $result_array;
    }
    public function get_current_openning_list()
    {

        $db = $this->db;
        $builder = $db->table('current_openning');
        $builder->select('*');
        $builder->where(array("is_delete" => 0));
        $builder->orderBy('id','DESC');
        $query = $builder->get();
        $getdata = $query->getResultArray();
        return $getdata;
    }
    public function UpdateData($post)
    {    
        $result = array();
        $db = $this->db;
        $gnmodel = new GeneralModel();
        
        if ($post['type'] == 'Remove') 
        {
			if ($post['method'] == 'current_opennings') 
            {  
                $result = $gnmodel->update_data_table('current_openning', array('id' => $post['pk']), array('is_delete' => 1));
            }
        }
        return $result;
    }

}