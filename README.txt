INFINITYFREE - PHP + MySQL DATABASE PROJECT

Files:
- index.php       Main page and table
- db.php          MySQL connection
- add_person.php  Saves name and age
- toggle.php      Changes status 0 <-> 1
- script.js       AJAX/fetch for live updates without page refresh
- style.css       Page design
- database.sql    SQL table

IMPORTANT:
GitHub Pages does NOT run PHP.
Use GitHub to store the project files/source code, and use InfinityFree to run the PHP/MySQL website.

Before uploading to InfinityFree:
1. Create a MySQL database from the InfinityFree control panel.
2. Open phpMyAdmin.
3. Select the database.
4. Import/copy the SQL from database.sql.
5. Edit db.php and replace:
   YOUR_MYSQL_HOST
   YOUR_DATABASE_NAME
   YOUR_DATABASE_USERNAME
   YOUR_DATABASE_PASSWORD
   with the database details shown by InfinityFree.
6. Upload all PHP/CSS/JS files to the website's htdocs folder.
7. Open your InfinityFree website URL.

The Toggle button uses JavaScript fetch/AJAX, so the status changes in MySQL and on the page without refreshing.
