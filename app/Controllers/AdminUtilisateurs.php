<?php


namespace App\Controllers;


use App\Models\ReservationLogementModel;
use App\Models\ReservationModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminUtilisateurs extends Controller
{
    public function save(){
        helper(['form']);

        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password' => 'required|min_length[6]|max_length[20]',
            'confpassword' => 'matches[password]',
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_id'=> $this->request->getVar('id'),
                'user_name' => $this->request->getVar('name'),
                'user_email' => $this->request->getVar('email'),
                'role'=>$this->request->getVar('role'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $model->save($data);
            return redirect()->to(site_url('AdminUtilisateurs/liste'));
        }else{
            $data['validation'] = $this->validator;
            echo view('admin_utilisateur_ajouter', $data);
        }
    }

    public function ajouter(){
        helper(['form']);
        $data = [];
        echo view('admin_utilisateur_ajouter', $data);
    }

    public function supprimer($id){

        # Redirige vers une pages d'erreur si l'utilisateur possède des réservations validées
        $model = new ReservationModel();
        $reservations = $model->listeReservationsParEtat(true, $id);
        if( count($reservations)>0 ){
            return view('admin_message.php',[
                'titre'=>'Erreur',
                'message'=>'Vous ne pouvez supprimer un client qui possède des réservations validée']);
        }

        # Redirige vers une pages d'erreur si l'utilisateur possède des réservations non validées
        $model = new ReservationModel();
        $reservations = $model->listeReservationsParEtat(false, $id);
        if( count($reservations)>0 ){
            return view('admin_message.php',[
                'titre'=>'Erreur',
                'message'=>"Supprimez d'abord les réservations non validées de cet utilisateur !"]);
        }
        return redirect()->to( '/AdminUtilisateurs/liste' );
    }
    
    public function delUser($user_id){
        # Supprimer un utilisateur
        $model = new UserModel();
        $model ->delete($user_id);
        
        return redirect()->to('/AdminUtilisateurs/liste');
    }

    public function liste(){

        # Récupère ts les utilisateurs
        $model = new UserModel();
        $allUtils = $model->findAll();

        # Renvoie vers la vue
        return view('admin_utilisateurs.php', ['users'=>$allUtils] );
    }
}