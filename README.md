# myblog
Simple test task "Blog"

To install this app please:
1. edit file /config/config_db.php, change dbname and user/pass to yours.
2. create db for instance:  
<pre>
"CREATE DATABASE `{YOUR_DB_NAME}` CHARACTER SET utf8 COLLATE utf8_general_ci;"
</pre>
3. Import mysql_dump.sql into your new db. 
<pre>
import mysql -u root -p {YOUR_DB_NAME} < /PATH/TO/dump.sql 
</pre>
Or may be by phpmyadmin.

4. I use nginx, so config of server is like:
<pre>
# test task: myblog.loc
server {
    listen 80;
    server_name myblog.loc www.myblog.loc;

    fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    include        fastcgi_params;
    root /home/yura/www/myblog/public;
    charset utf-8;
    client_max_body_size 100m;
    
    location / {
	    index index.php index.html;
	    try_files /$uri /$uri/ @indexhandler;
    }
    
    location @indexhandler {
	    rewrite (.*) /index.php?$uri;
    }
     location ~ \.php$ {
      include snippets/fastcgi-php.conf;

 # With php7.0-cgi alone:
 # fastcgi_pass 127.0.0.1:9000;
 # With php7.0-fpm:
 fastcgi_pass unix:/run/php/php7.0-fpm.sock;
 }
}
</pre>
Notice that "root" look in myblog/public folder.

If you set the servername not localhost dont forget to edit your hosts file

5. <pre> php composer.phar install/update</pre> 

There is one user:
 <pre> 
login: yura
pass: 123
</pre>
