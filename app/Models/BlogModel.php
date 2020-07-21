<?php

    namespace App\Models;
    use Codeigniter\Model;

    class BlogModel extends Model
    {
        protected $table = 'blog';
        protected $primary_key = 'id';
        protected $allowed_Fields = ['post_title','post_description'];
        




    }












?>