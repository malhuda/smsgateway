@ECHO OFF
:Awal

cls
title GAMMU SERVICE STARTED
@ECHO.
@ECHO.
color 0a
MODE 103,25
@ECHO.
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO   อออออออออออออออออออออออออ...SEDANG MENJALANKAN GAMMU SILAHKAN TUNGGU...ออออออออออออออออออออออออออออ
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO.
@ECHO.
PING -n 10 127.0.0.1>nul
ver
cd c:\gammu\bin

 gammu --identify
 gammu-smsd -s -c -sdrc


start firefox localhost/smsgateway/index 



@ECHO.
@ECHO.
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO   ออออออออออออออSMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL VERSION 1.0อออออออออออออออออออออออออ 
@ECHO   THIS PROGRAM BUILD ON KEMENTERIAN DALAM NEGERI - TIM PENGELOLAAN DATABASE ADMINISTRASI KEPENDUDUKAN
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO.
@ECHO.
@ECHO   TEKAN ENTER UNTUK MENUTUP PROGAM.
@ECHO.


:exit