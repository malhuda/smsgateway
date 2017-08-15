@ECHO OFF
:Awal

cls
title STOP GAMMU SERVICE
@ECHO.
@ECHO.
color 0b
MODE 103,20
@ECHO.
@ECHO   ออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO   อออออออออออออออออออออออออ...SEDANG MENGHENTIKAN GAMMU SILAHKAN TUNGGU...อออออออออออออออออออออออออออ
@ECHO   ออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO.
@ECHO.


 cd c:\gammu\bin
 gammu-smsd -k -c -sdrc
@ECHO.
@ECHO   ออออออออออออออSMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL VERSION 1.0อออออออออออออออออออออออออ 
@ECHO   THIS PROGRAM BUILD ON KEMENTERIAN DALAM NEGERI - TIM PENGELOLAAN DATABASE ADMINISTRASI KEPENDUDUKAN
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO.
@ECHO.
@ECHO   TEKAN ENTER UNTUK MENUTUP PROGAM.
@ECHO.
pause>nul

:exit