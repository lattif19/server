<?php

    function tanggl_id($tanggal){
        
        $tahun = substr($tanggal, "0", "4");
        $b = substr($tanggal, "5", "2");
            switch ($b){
                case "01" : $bulan = "Januari"; break;
                case "02" : $bulan = "Februari"; break;
                case "03" : $bulan = "Maret"; break;
                case "04" : $bulan = "April"; break;
                case "05" : $bulan = "Mei"; break;
                case "06" : $bulan = "Juni"; break;
                case "07" : $bulan = "Juli"; break;
                case "08" : $bulan = "Agustus"; break;
                case "09" : $bulan = "September"; break;
                case "10" : $bulan = "Oktober"; break;
                case "11" : $bulan = "November"; break;
                case "12" : $bulan = "Desember"; break;
            }
        $hari = substr($tanggal, "8", "2");

        return $hari." ".$bulan." ".$tahun;

    }

    function menit_to_jam($menit){
        $jam = floor($menit/60);
                if($jam < 1){ $jam2 = "00"; }elseif($jam<10){ $jam2= "0".$jam; }else{ $jam2 = $jam; }
        $m  = $menit-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }
        return $jam2.":".$menit;
    }

    function jumlah_lembur($jam_pulang, $jam_standar){
        //Cek dulu apakah jam pulang standar lebih kecil dari pada jam pulang sebenarnya
        //Batas Lembur Malam Sampai Jam 7:59 Pagi Atau = 479;
        if(to_menit($jam_standar) > to_menit($jam_pulang) ){
            //Cek : Apakah pulang terlalu awal atau lembur melewati tengah malam;
            if(to_menit($jam_pulang) > 479){
               //Hasil jika pulangnya terlalu awal
               return "00:00";
            }else{
                //Hasil jika pulangnya melebihi tengah malam;
                //(24:00 - Jam Pulang Standar) + Jam Lembur Malam
                $jam1 = (1440 - to_menit($jam_standar))+to_menit($jam_pulang);
                return menit_to_jam($jam1);
            }
        }

        $total  = to_menit($jam_pulang) - to_menit($jam_standar);
        $jam    = floor($total/60);
                if($jam < 1){ $jam2 = "00"; }elseif($jam<10){ $jam2= "0".$jam; }else{ $jam2 = $jam; }
        $m      = $total-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }

        return $jam2.":".$menit;
    }

    function jam_pulang_standar($data, $jam_masuk, $jam_kerja){
        //normal
        // masih ada masalah > ini harusnya jam ambil dari pengaturan jam masuk
        if(to_menit($data) <= 480){
            $data = (to_menit($jam_masuk)+to_menit($jam_kerja))/60; 
            return $data.":00";
        }
        //telat
            $total = (to_menit($jam_masuk)+to_menit($jam_kerja))+(to_menit($data)-to_menit($jam_masuk));
            $jam = floor($total/60);
            $m = $total-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }
            return $jam.":".$menit;
        }
    
  
    
    function format_jam($data){
        return substr($data,"0", 5);
    }
    
    function to_menit($data){
        return (substr($data, "0", 2) * 60)+substr($data, "3", 2);
    }
?> 
