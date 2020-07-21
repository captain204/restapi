<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Blog extends ResourceController
{
    protected $modelName = 'App\Models\BlogModel';
    protected $format = 'json';

    public function index()
    {
        $posts = $this->model->findAll();
        return $this->respond($posts);
    }

    public function create()
    {
        helper(['form']);
        $rules = [
            'title'=>'required|min_length[6]',
            'description'=> 'required'
        ];
        if ($this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        }else{
            $data = [
                'post_title'=>$this->request->getVar('title'),
                'post_description'=>$this->request->getVar('description'),
            ];
            $post_id = $this->model->insert($data);
            $data['post_id'] = $post_id;
            return $this->responseCreated($data);
        }

    }

    public function update($id=null)
    {

        helper(['form']);
        $rules = [
            'title'=>'required|min_length[6]',
            'description'=> 'required'
        ];
        if ($this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        }else{

            $input = $this->request->getRawInput();
            $data =[
                'id'=>$id,
                'post_description'=>$input['title'],
                'post_description'=>$input['description']
            ];

            $thid->model->save($data);
            return $this->respond($data);

        }

    }



}
