@ECHO OFF
:Awal

cls
title CEK PULSA MODEM
@ECHO.
@ECHO.
color 0a
MODE 103,45
@ECHO.
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO   ออออออออออออออออออออออออออ... MEMERIKSA PULSA MODEM SILAHKAN TUNGGU...อออออออออออออออออออออออออออออ
@ECHO   อออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออออ
@ECHO.
@ECHO.


 cd c:\gammu\bin
 gammu --identify
 



 
gammu getussd *888#
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
pause>nul

:exit