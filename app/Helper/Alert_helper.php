<?php

    function show_alert(){

        if(Session::has('alert-success')){
            $alert = Session::get('alert-success');
            echo '<div class="snackbar-top snackbar-success">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-warning')){
            $alert = Session::get('alert-warning');
            echo '<div class="snackbar-top snackbar-warning">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-danger')){
            $alert = Session::get('alert-danger');
            echo '<div class="snackbar-top snackbar-danger">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }elseif(Session::has('alert-primary')){
            $alert = Session::get('alert-primary');
            echo '<div class="snackbar-top snackbar-primary">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }

        if(Session::has('full-alert')){
            $alert = Session::get('full-alert');
            echo '<div class="snackbar snackbar-dark">';
            echo '<div>'.$alert.'</div>';
            echo '</div>';
        }
        
    }

// function tes_alert(){
//     return "ini pesan dari alret";
// }

// cek login status

   

    function agama($status){
        switch($status){
            case 1:
                echo "ISLAM";
                 break;
             case 2:
                echo "KRISTEN";
                 break;
             case 3:
                echo "KONGHUCU";
                 break;
            case 4:
                echo "LAINYA";
                 break;
             default:
                echo "tidak ada";
                 break;
        }
    }

    function jenis_kelamin($status){
         switch($status){
            case 1:
                echo "Pria";
                 break;

               case 2:
                echo "Wanita";
                 break;    
           
             default:
                echo "tidak ada";
                 break;
        }
    }

    function role_user($level){
         switch($level){
            case 1:
                echo "Admin";
                 break;

               case 2:
                echo "Member";
                 break;    
           
             default:
                echo "tidak ada";
                 break;
        }
    }


     function role_pengunjung($level){
         switch($level){
            case 1:
                echo "Pengunjung";
                 break;

               case 2:
                echo "Member";
                 break;    
           
             default:
                echo "tidak ada";
                 break;
        }
    }
     function role_penjaga($level){
         switch($level){
            case 1:
                echo "Admin";
                 break;

               case 2:
                echo "Personal Trainer";
                 break;    
           
             default:
                echo "tidak ada";
                 break;
        }
    }

    

    

   