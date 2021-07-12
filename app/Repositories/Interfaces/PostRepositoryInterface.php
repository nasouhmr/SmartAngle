<?php
namespace App\Repositories\Interfaces; 

interface PostRepositoryInterface
{ 
    public function getPosts(); 
    public function getPost(); 
    public function savePost(); 
}