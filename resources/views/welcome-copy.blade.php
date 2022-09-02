ini masternya merubah data

anto siboker
gokil

Contoh pengaturan virtual host windows untuk laravel 

<VirtualHost 127.0.0.5:80>
    DocumentRoot 'Folder Penyimpanan'
    DirectoryIndex index.php
    ServerName nama-web-server
    <Directory 'Folder Penyimpanan'>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
    </Directory>
</VirtualHost>

