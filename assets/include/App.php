<?php
class App{
    public $host=  "localhost";
    public $database= "projetecole"; //nom de votre base de données ici
    public $password= "";  // votre mot de passe utilisateur ici
    public $user= "root"; //votre nom d'utilisateur 
    public $lien_connexion;
    //connexion à la base de données
    public function __construct()
    {
        $this->connecter();
    }
    public function connecter()
    {
        $this->lien_connexion =  new PDO("mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8",$this->user,$this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        if(!$this->lien_connexion)
        {
            echo "erreur de connexion à la base de données";
        }
    }
    public function SelectionnerTout($requete)
    {
        $ligne= $this->lien_connexion->query($requete);
        $ligne->execute();
        $resultat= $ligne->fetchAll(PDO::FETCH_OBJ);
        if($resultat)
        {
            return $resultat;
        }else{
            return false ;
        }
    }
//lecture d'un élément de la base de données
    public function SelectionnerUn($requete)
    {
        $ligne= $this->lien_connexion->query($requete);
        $ligne->execute();
        $resultat= $ligne->fetch(PDO::FETCH_OBJ);
        if($resultat)
        {
            return $resultat;
        }else{
            return false ;
        }
    }
    public function inserer($requete, $tableau_donnee,$destination)
    {
        
            $insert= $this->lien_connexion->prepare($requete);
            $insert->execute($tableau_donnee);
            header("location: ".$destination."");
        
    } 

    //supprimer les éléments de la base de données
    public function supprimer($requete,$destination)
    {
            $sup= $this->lien_connexion->query($requete);
            $sup->execute();
            header("location: ".$destination."");
    } 

    public function maj($req,$destination)
    {
        $ligne= $this->lien_connexion->prepare($req);
        $ligne->execute();  
        header("location: ".$destination."");

    }
    public function se_connecter_admin($requete, $tableau_donnee,$destination){
        $tab=['email'=>$tableau_donnee['email']];
        $connection_user=  $this->lien_connexion->prepare($requete);
        $connection_user->execute($tab);
        $resultat= $connection_user->fetch(PDO::FETCH_ASSOC);
        if($connection_user->rowCount()>0)
        {
            if(password_verify($tableau_donnee['password'],$resultat['password']))
            {
                //début des sessions
                // `id`, `email`, `password`, `firstname`, `first_login`, `image`
                session_start();
                $_SESSION['email_admin']= $resultat['email'];
                $_SESSION['nom_admin']= $resultat['firstname'];
                $_SESSION['id_admin']= $resultat['id'];
                $_SESSION['first_login']=$resultat['first_login'];
                $_SESSION['image']=explode(',',$resultat['image']);
                header("location: ".$destination."");
            }else {
                echo "mauvais mot de passe";
            }
        }else{
            echo "aucune adresse mail correspondante";
        }
    }
    public function se_connecter_client($requete, $tableau_donnee,$destination){
        $tab=["email"=>$tableau_donnee['email']];
        $connection_user=  $this->lien_connexion->prepare($requete);
        $connection_user->execute($tab);
        $resultat= $connection_user->fetch(PDO::FETCH_ASSOC);
        if($connection_user->rowCount()>0)
        {
            if(password_verify($tableau_donnee['password'],$resultat['password']))
            {
                //début des sessions
                session_start();
                $_SESSION['email_client']= $resultat['email'];
                $_SESSION['nom_client']= $resultat['name'];
                $_SESSION['id_client']= $resultat['id'];
                header("location: ".$destination."");
            }else {
                echo "mauvais mot de passe";
            }
        }else{
            echo "aucune adresse mail correspondante";
        }
    }



    public function se_connecter_etudiant($requete, $tableau_donnee,$destination){
        $tab=["matricule"=>$tableau_donnee['matricule']];
        $connection_user=  $this->lien_connexion->prepare($requete);
        $connection_user->execute($tab);
        $resultat= $connection_user->fetch(PDO::FETCH_ASSOC);
        if($connection_user->rowCount()>0)
        {
            if(password_verify($tableau_donnee['password'],$resultat['password']))
            {
                //début des sessions
                session_start();
                $_SESSION['name_etudiant']= $resultat['name'];
                $_SESSION['matricule_etudiant']= $resultat['matricule'];
                $_SESSION['surname_etudiant']= $resultat['surname'];

                $_SESSION['date_naiss_etudiant']= $resultat['date_naiss'];
                $_SESSION['sexe_etudiant']= $resultat['sexe'];
                
                $_SESSION['religion_etudiant']= $resultat['religion'];
                $_SESSION['email_etudiant']= $resultat['email'];

                 $_SESSION['id_niveau_etudiant']= $resultat['id_niveau'];
                $_SESSION['password_etudiant']= $resultat['password'];
                $_SESSION['image_etudiant']= $resultat['image'];
                header("location: ".$destination."");
            }else {
                echo "mauvais mot de passe";
            }
        }else{
            echo "aucune adresse mail correspondante";
        }
    }
    public function debut_session()
    {
        session_start();
    }
}
?>
