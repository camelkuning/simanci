@echo off
set "php_path=  C:\xampp-8-2.12\php\php.exe"

set "artisan_path=A:\...Semester 6\Pterpan\simanciapp"

cd "%artisan_path%"

%php_path% artisan migrate:fresh

%php_path% artisan db:seed --class=KunciSeeder
%php_path% artisan db:seed --class=UserSeeder
%php_path% artisan db:seed --class=KantorSeeder

echo "Migrate and Seed Succesfuly"  

pause