Pré requisitos 

Docker <br>
Docker-compose <br>
composer <br>
php <br>

----------------------------------------------
Docker <br>

sudo docker-compose up -d --build  <br>

----------------------------------------------
Laravel <br>

composer install  <br>
php artisan key:generate <br> 

Configurar o .ENV para usar o Banco

DB_CONNECTION=mysql <br> 
DB_HOST=srv1056.hstgr.io <br> 
DB_PORT=3306 <br> 
DB_DATABASE=u517242272_eventosItarget <br> 
DB_USERNAME=u517242272_root_eventis <br> 
DB_PASSWORD=E!6L34w/P <br> 

php artisan migrate <br>

----------------------------------------------

