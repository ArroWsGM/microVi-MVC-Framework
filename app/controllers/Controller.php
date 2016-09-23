<?php
namespace App\Controllers;

class Controller
{
    public function index()
    {
        $welcome = 'Welcome to microVi{lluminated} framework!';
        return $this->view('default/index', compact('welcome'));
    }
    
    public function view($view_name = 'default/index', $data = [])
    {
        if(!is_array($data))
            $data = [];
        
        extract($data, EXTR_OVERWRITE);
        
        $file = BASE_PATH . "/app/views/$view_name.php";
        if(file_exists($file))
            require $file;
        else
            throw new \Exception("View {$view_name} not found.");
    }
}