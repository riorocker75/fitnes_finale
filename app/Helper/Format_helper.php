<?php

function format_tanggal($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function format_notif_jam($timestamp){  
    $time_ago = strtotime($timestamp);  
    $current_time = time();  
    $time_difference = $current_time - $time_ago;  
    $seconds = $time_difference;  
    $minutes      = round($seconds / 60 );        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if($seconds <= 60) {  
     return "Baru Saja";  
    } else if($minutes <=60) {  
     if($minutes==1){  
       return "1 menit lalu";  
     }else {  
       return "$minutes menit lalu";  
     }  
    } else if($hours <=24) {  
     if($hours==1) {  
       return "sejam lalu";  
     } else {  
       return "$hours jam lalu";  
     }  
    }else if($days <= 7) {  
     if($days==1) {  
       return "kemarin";  
     }else {  
       return "$days hari lalu";  
     }  
    }else if($weeks <= 4.3) {  //4.3 == 52/12
     if($weeks==1){  
       return "minggu lalu";  
     }else {  
       return "$weeks minggu lalu";  
     }  
    } else if($months <=12){  
     if($months==1){  
       return "sebulan lalu";  
     }else{  
       return "$months bulan lalu";  
     }  
    }else {  
     if($years==1){  
       return "setahun lalu";  
     }else {  
       return "$years tahun lalu";  
     }  
    }  
} 

function status_bayar_pinjaman($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-primary'>Tahap Ajukan</label>";
        break;
        case 1:
            echo "<label class='badge badge-warning'>Masa Angsuran</label>";
        break;
        case 2:
            echo"<label class='badge badge-success'>Lunas</label>";
        break;
        default:
        echo "none ";
        break;
    }
}

function cek_status_anggota($status){
    switch($status){
        case 0:
        echo "<label class='badge badge-warning'>Sedang Tahap Review</label>";
        break;
        case 1:
        echo "<label class='badge badge-success'>Telah Aktif</label>";
        break;
        case 2:
        echo "<label class='badge badge-default'>Akun Ditolak</label>";
        break;
        default:
        echo "none ";
        break;
    }
}

function cek_status_simpanan($status){
    switch($status){
        case 0:
            echo '<label class="badge badge-danger">Non aktif</label>';
        break;
        case 1:
            echo '<label class="badge badge-success">Aktif</label>';
        break;
        case 3:
            echo '<label class="badge badge-danger">Tutup Rekening</label>';
        break;
        default:
            echo "tidak ada";
         break;
    }
}

function jenis_sukarela($kode){
    switch($kode){
        case 1:
            echo "Simpanan Sukarela";
        break;
        case 2:
            echo"Simpanan Wajib";
        break;
        default:
        echo "Simpanan Lainya";
    break;
    }
}

function status_kas($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Aktif</label>";
        break;
        case 0: 
            echo "<label class='badge badge-danger'> Non Aktif</label>";
        break;
        default:
    break;
    }
}


function status_metode($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Langsung</label>";
        break;
        case 2: 
            echo "<label class='badge badge-primary'> Transfer</label>";
        break;
        default:
    break;
    }
}

function status_tarik($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-warning'>Menuggu konfirmasi</label>";
        break;
        case 1: 
            echo "<label class='badge badge-success'>Penarikan Berhasil</label>";
        break;
            case 2: 
            echo "<label class='badge badge-danger'>Penarikan Ditolak</label>";
        break;
        default:
    break;
    }
}

function preview_file($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/syarat/'.$nama_file);
    // ini link dari route
    $url_pdf=url('review/syarat/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/syarat/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        case"pdf":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
            
            echo "<i class='fas fa-file-pdf' style='font-size:100px;color:#D81F28'></i><br/>";
            echo "Klik Untuk Lebih Detail<br>";
            echo "Matikan IDM atau sejenisnya";

            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}

// end preview syarat

// start perview bukti

function preview_bukti($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/bukti_bayar/'.$nama_file);
    // ini link dari route
    $url_pdf=url('review/bukti/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/bukti_bayar/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        case"pdf":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
            
            echo "<i class='fas fa-file-pdf' style='font-size:100px;color:#D81F28'></i><br/>";
            echo "Klik Untuk Lebih Detail<br>";
            echo "Matikan IDM atau sejenisnya";

            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}
// end perview bukti


function status_transfer($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-warning'>Menunggu persetujuan</label>";
        break;
        case 1:
            echo "<label class='badge badge-success'>Transfer diterima</label>";
        break;
        case 2:
            echo "<label class='badge badge-danger'>Transfer ditolak</label>";
        break;
        default:
        echo"tidak ada";
    break;
    }
}

// pengecekan link bukti bayar di admin
    function link_bukti_bayar($jenis,$rek){
        $url_umum = url('admin/pembayaran/simpanan-umum/detail/'.$rek);
        $url_umroh = url('admin/pembayaran/simpanan-umroh/detail/'.$rek);
        $url_pendidikan = url('/admin/pembayaran/simpanan-pendidikan/detail/'.$rek);
        $url_pinjaman = url('/admin/pembayaran/pinjaman/detail/'.$rek);

        if($jenis == "TRFU"){
            echo "
            <a href='$url_umum' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a>
            ";
        }elseif($jenis == "TRFH"){
            echo "
            <a href='$url_umroh' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a>
            ";
        }elseif($jenis == "TRFD"){
            echo "
            <a href='$url_pendidikan' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
             </a>   
            ";
        }elseif($jenis == "TRFP"){
            echo "
            <a href='$url_pinjaman' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
             </a> 
            ";
        }

    }


    // pengecekan link status tarik dana
    function link_tarik_dana($jenis,$rek){
        $url_umum = url('admin/pembayaran/simpanan-umum/detail/'.$rek);
        $url_deposit = url('admin/pembayaran/simpanan-deposit/detail/'.$rek);
        $url_umroh = url('admin/pembayaran/simpanan-umroh/detail/'.$rek);
        $url_pendidikan = url('/admin/pembayaran/simpanan-pendidikan/detail/'.$rek);

        if($jenis == "TDUM"){
            echo "
            <a href='$url_umum' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a>
            ";
        }elseif($jenis == "TDBK"){
            echo "
            <a href='$url_deposit' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a>
            ";
        }elseif($jenis == "TDUH"){
            echo "
            <a href='$url_umroh' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a>   
            ";
        }elseif($jenis == "TRPN"){
            echo "
            <a href='$url_pendidikan' style='padding:0 7px'> 
                <i class='fa fa-eye'></i>
            </a> 
            ";
        }

        // end else
    }

    // penarikan dana nulled
        // pengecekan link status tarik dana
        function link_tarik_dana_nulled($jenis,$rek){
            $url_umum = url('admin/pembayaran/simpanan-umum/detail/'.$rek);
            $url_deposit = url('admin/pembayaran/simpanan-deposit/detail/'.$rek);
            $url_umroh = url('admin/pembayaran/simpanan-umroh/detail/'.$rek);
            $url_pendidikan = url('/admin/pembayaran/simpanan-pendidikan/detail/'.$rek);
    
            if($jenis == "TDUM"){
                echo $url_umum ;
            }elseif($jenis == "TDBK"){
                echo $url_deposit;
            }elseif($jenis == "TDUH"){
                echo $url_umroh;
            }elseif($jenis == "TRPN"){
                echo $url_pendidikan;
            }
    
            // end else
        }

        function jabatan($status){
            switch($status){
                case 1:
                    echo "Manager" ;
                break;
                case 2:
                    echo "Asisten Manager" ;
                break; 
                case 3:
                    echo "Pengurus" ;
                break;
                case 4:
                    echo "Staf Lapangan" ;
                break;
                default:
                echo "None jabatan";
            break;
            }
        }

        function akses($status){
            switch($status){
                case 1:
                    echo "Admin (Asisten Manager)";
                break;
                case 2:
                    echo "Pengurus";
                break;
                case 4: 
                    echo "Manager";
                break;
                default:
                echo "Tidak ada akses";
            break;
            }
        }