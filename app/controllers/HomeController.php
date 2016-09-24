<?php
namespace App\Controllers;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'microVi Framework!';
        
        $strings = Home::all();
        
        $welcome = $strings[0];
        
        unset($strings[0]);
        
        return $this->view('default/index', compact('title', 'welcome', 'strings'));
    }

    public function store(){
        if(isset($_POST['text'])){
            $text = $this->validate($_POST['text']);
            
            Home::create([
                'text' => $text
            ]);
            
            flash_set('flash', 'Text successfully added', 'success', $_SERVER['HTTP_REFERER']);
        } else {
            $this->error();
        }
    }

    public function update($data){
        if(isset($_POST['text']) && isset($data[0])){
            $text = $this->validate($_POST['text'], 1);
            
            $id = (int)$data[0];
            
            Home::where('id', $id)
                ->update([
                    'text' => $text
                ]);
            
            flash_set('flash', 'Text successfully updated', 'success', $_SERVER['HTTP_REFERER']);
        } else {
            $this->error();
        }
    }

    public function destroy($id){
        if(isset($id[0])){
            $id = (int)$id[0];
            
            Home::destroy($id);
            
            flash_set('flash', 'Text successfully deleted', 'success', $_SERVER['HTTP_REFERER']);
        } else {
            $this->error();
        }
    }

    private function error(){
        flash_set('flash', 'Woops! Something went wrong! (((', 'danger', $_SERVER['HTTP_REFERER']);
    }

    private function validate($string, $form = 0){
            $text = trim($string);
            
            if(length($text) < 3){
                if($form === 0)
                    flash_set('old_input', $text);
                else
                    flash_set('old_input2', $text);
                flash_set('flash', 'Text must be at least 3 characters', 'warning', $_SERVER['HTTP_REFERER']);
            } else {
                return $text;
            }
    }
}