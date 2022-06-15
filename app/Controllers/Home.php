<?php
use App\Controllers\BaseController;
namespace App\Controllers;


use\App\Models\HomeModel;
use\App\Models\GeneralModel;
class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface$request, \CodeIgniter\HTTP\ResponseInterface$response, \Psr\Log\LoggerInterface$logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new HomeModel();
        $this->gmodel = new GeneralModel();
    }

    public function index()
    {
        return view('index');
    }

    public function lets_talk()
    {
        $post = $this->request->getPost();  
        if ($post) 
        {
            $msg = $this->model->insert_edit_user($post);
            return $this->response->setJSON($msg);
        }
         return view('Lets_Talk');
    }

    public function current_opening()
    {
        $data['current_openning'] = $this->model->get_currentopening_list();
        return view('current_opening',$data);
    }
    
    public function apply_for_job($id='')
    {
        $post = $this->request->getPost();  
        $file = $this->request->getfile('image');
        //print_r($file);exit;
        if ($post) 
        {
            $msg = $this->model->insert_edit_job($post,$file);
            //print_r($msg);exit;
            return $this->response->setJSON($msg);
        }
        $data = array();
        $data['id'] = $id;
        if(!empty($id))
        {
            $data['current_openning'] = $this->model->get_currentopennings_byid($id);
        }
        return view('Apply_for_job',$data);
    }
    public function about_us()
    {
        return view('about_us');
    }
    public function solution()
    {
        return view('solution');
    }  
    public function testimonial()
    {
        return view('testimonial');
    }
    public function add_current_opennings($id='')
    {
        $post = $this->request->getPost();
        //print_r($post);exit; 
        $data = array();
        if ($post) 
        {
            $msg = $this->model->insert_edit_current_opennings($post);
            return $this->response->setJSON($msg);
        }
        if(!empty($id))
        {
            $data['current_opennings'] = $this->model->get_currentopennings_byid($id);
        }
        return view('add_current_opennings',$data);
    }
    public function current_opennings_list()
    {
      $post = $this->request->getPost();
      $data['current_openning'] = $this->model->get_current_openning_list($post);
      return view('current_openning_list',$data);
    }
    public function Action($method = '') {
        $result = array();
             
        if ($method == 'Update') {
            $post = $this->request->getPost();
            //print_r($post);exit;
            $result = $this->model->UpdateData($post);
        }
        return $this->response->setJSON($result);
    }
}
