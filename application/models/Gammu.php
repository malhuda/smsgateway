<?php
class Gammu extends CI_Model{
	
function status_koneksi_gammunya()
    {
 		return $this->db->query("select * from phones");

    }
    function cek_inbox()
    {
 		return $this->db->query("select SenderNumber,TextDecoded,ReceivingDateTime,Processed,ID,count(ID)as belum_dibaca from inbox WHERE NOT EXISTS (select NOMOR_KONTAK from kontak_adb
                WHERE inbox.SenderNumber = kontak_adb.NOMOR_KONTAK)and inbox.Processed='false' and inbox.SenderNumber!='TELKOMSEL' and inbox.SenderNumber!=858 order by inbox.ReceivingDateTime DESC limit 5");

    } function cek_inbox_adb()
    {
        return $this->db->query("select kontak_adb.NOMOR_KONTAK,
        kontak_adb.WILAYAH,
        kontak_adb.NAMA_ADB,
        kontak_adb.KODE,
        kontak_adb.PASSWORD_DKB_GANDA_ANOMALI,
        kontak_adb.PASSWORD_DEM,
        kontak_adb.PASSWORD_DUPLICATE_RECORD,
        kontak_adb.PASSWORD_WKTP_NON_REKAM,
        kontak_adb.PASSWORD_CAPIL,
        kontak_adb.PASSWORD_EKTP_MISSING,
        kontak_adb.PASSWORD_EKTP_CETAK,
        count(kontak_adb.ID)as belum_dibaca,
        inbox.ID,
        inbox.UpdatedInDb,
        inbox.ReceivingDateTime,
        inbox.TextDecoded,
        inbox.Processed,
        inbox.SenderNumber
        from kontak_adb left join inbox on kontak_adb.NOMOR_KONTAK=inbox.SenderNumber where inbox.Processed='false' and inbox.SenderNumber!='TELKOMSEL' and inbox.SenderNumber!=858 order by inbox.ReceivingDateTime DESC ");

    }function inbox_baru()
    {
 		return $this->db->query("select SenderNumber,TextDecoded,ReceivingDateTime,Processed,ID from inbox WHERE NOT EXISTS (select NOMOR_KONTAK from kontak_adb
                WHERE inbox.SenderNumber = kontak_adb.NOMOR_KONTAK)and inbox.Processed='false' and inbox.SenderNumber!='TELKOMSEL' and inbox.SenderNumber!=858 order by inbox.ReceivingDateTime DESC");

    }function inbox()
    {
        return $this->db->query("select kontak_adb.NOMOR_KONTAK,
        kontak_adb.WILAYAH,
        kontak_adb.NAMA_ADB,
        kontak_adb.KODE,
        kontak_adb.PASSWORD_DKB_GANDA_ANOMALI,
        kontak_adb.PASSWORD_DEM,
        kontak_adb.PASSWORD_DUPLICATE_RECORD,
        kontak_adb.PASSWORD_WKTP_NON_REKAM,
        kontak_adb.PASSWORD_CAPIL,
        kontak_adb.PASSWORD_EKTP_MISSING,
        kontak_adb.PASSWORD_EKTP_CETAK,
        inbox.ID,
        inbox.UpdatedInDb,
        inbox.TextDecoded,
        inbox.Processed,
        inbox.SenderNumber
        from kontak_adb left join inbox on kontak_adb.NOMOR_KONTAK=inbox.SenderNumber where inbox.Processed='false' and inbox.SenderNumber!='TELKOMSEL' and inbox.SenderNumber!=858 order by inbox.ReceivingDateTime DESC ");

    }
    function keyword1($pecah)
    {
        return $this->db->query("SELECT keyword1 FROM tbl_autoreply WHERE keyword1='$pecah[0]'");

    } function keyword2($keyword2)
    {
        return $this->db->query("SELECT * FROM tbl_autoreply WHERE keyword2='$keyword2'");

    }
}
