<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UtilisateurModel;
 
class Param extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('param');
    } 
 
    public function param(){
        $session = session();
        $model = new UtilisateurModel();
        $password = $this->request->getVar('password');
        $newpassword = $this->request->getVar('newpassword');
        $data = $model->where('id', $session->get('id'))->first();
        if(password_verify($password, $data['mdp'])){
            
                
                $model->set('mdp', password_hash($newpassword, PASSWORD_DEFAULT))->where('id', $data['id']);
              
                $model->update();
               
                $session->setFlashdata('goodmsg', 'Mot de passe enregistré');
                return redirect()->to(site_url('Login'));
            
            
            
        }
        else {
            
            $session->setFlashdata('msg', 'Mauvais mot de passe');
            return redirect()->to(site_url('Param'));
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url());
    }
} 