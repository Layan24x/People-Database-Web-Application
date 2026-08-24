# **People Database Web Application**

## **1. Project Overview**

This project is a simple web application that connects to a MySQL database using PHP.

The application allows the user to:

- Enter a person’s name.
- Enter the person’s age.
- Save the data to a MySQL database.
- Display the saved data in a table.
- Change the person’s status using a Toggle button.
- Update the status in the database without refreshing the page.

---

## **2. Technologies Used**

The following technologies were used:

- **HTML** – Building the web page structure.
- **CSS** – Designing and styling the interface.
- **JavaScript** – Handling user interactions and live updates.
- **PHP** – Backend processing and database communication.
- **MySQL** – Storing the application data.
- **InfinityFree** – Hosting the PHP/MySQL website.
- **GitHub** – Storing and sharing the project source code.

---

# **3. Project Structure**

The project contains the following files:

```text
People-Database/
│
├── index.php
├── db.php
├── add_person.php
├── toggle.php
├── script.js
├── style.css
├── database.sql
└── README.md
```

### **`index.php`**

This is the main page of the website.

It contains:

- Name input field.
- Age input field.
- Submit button.
- People data table.
- Toggle button for each person.

It also loads the existing data from the MySQL database.

---

### **`db.php`**

This file is responsible for connecting PHP to the MySQL database.

The file should contain the database information provided by InfinityFree:

```php
<?php

$host = "YOUR_MYSQL_HOST";
$dbname = "YOUR_DATABASE_NAME";
$username = "YOUR_MYSQL_USERNAME";
$password = "YOUR_MYSQL_PASSWORD";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
```

Replace the placeholders with the information from the InfinityFree control panel.

```text
YOUR_MYSQL_HOST
→ Your MySQL Host Name

YOUR_DATABASE_NAME
→ Your MySQL Database Name

YOUR_MYSQL_USERNAME
→ Your MySQL Username

YOUR_MYSQL_PASSWORD
→ Your MySQL Password
```

**Important:** Do not upload real database passwords to a public GitHub repository.

---

### **`add_person.php`**

This file receives the name and age submitted by the user.

It validates the information and inserts it into the `people` table in the MySQL database.

The new person’s default status is:

```text
0
```

After successfully saving the data, the file returns the new person’s information to JavaScript.

---

### **`toggle.php`**

This file is responsible for changing the person’s status.

If the current status is:

```text
0
```

it changes to:

```text
1
```

If the current status is:

```text
1
```

it changes to:

```text
0
```

The updated value is saved directly to the MySQL database.

---

### **`script.js`**

This file contains the JavaScript functionality of the website.

It is responsible for:

1. Sending the name and age to `add_person.php`.
2. Preventing the page from refreshing when submitting the form.
3. Adding the new person to the table immediately.
4. Sending the person’s ID to `toggle.php`.
5. Updating the status displayed in the table without refreshing the page.

The project uses JavaScript `fetch()` to communicate with the PHP backend.

---

### **`style.css`**

This file controls the appearance of the website.

It is responsible for:

- Page layout.
- Colors.
- Buttons.
- Input fields.
- Table design.
- Responsive layout.

---

### **`database.sql`**

This file contains the SQL command required to create the `people` table.

---

# **4. Creating the MySQL Database on InfinityFree**

First, create an account and a website on InfinityFree.

From the InfinityFree control panel:

1. Open **MySQL Databases**.
2. Create a new MySQL database.
3. Note the database connection information provided by InfinityFree.

You will need:

```text
MySQL Host Name
MySQL Username
MySQL Password
Database Name
MySQL Port
```

The default MySQL port is usually:

```text
3306
```

---

# **5. Creating the Database Table**

After creating the database:

1. Open **phpMyAdmin** from the InfinityFree control panel.
2. Select the database you created.
3. Open the **SQL** tab.
4. Run the following SQL command:

```sql
CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0
);
```

After executing the command, the `people` table will be created.

---

# **6. Database Table Structure**

The `people` table contains four columns:

| Column | Type | Description |
|---|---|---|
| `id` | INT | Unique ID generated automatically |
| `name` | VARCHAR(100) | Person’s name |
| `age` | INT | Person’s age |
| `status` | TINYINT(1) | Person’s status: 0 or 1 |

The `id` is automatically generated using:

```text
AUTO_INCREMENT
```

The default value of `status` is:

```text
0
```

---

# **7. Connecting PHP to MySQL**

Open the `db.php` file and enter the database information provided by InfinityFree.

Example:

```php
<?php

$host = "YOUR_MYSQL_HOST";
$dbname = "YOUR_DATABASE_NAME";
$username = "YOUR_MYSQL_USERNAME";
$password = "YOUR_MYSQL_PASSWORD";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
```

Make sure that the database name, username, host, and password exactly match the information provided by InfinityFree.

---

# **8. Adding a Person**

The website contains two input fields:

```text
Name
Age
```

and a:

```text
Submit
```

button.

For example:

```text
Name: Michael
Age: 22
```

When the user clicks **Submit**, the information is sent to:

```text
add_person.php
```

The PHP file saves the information in the MySQL database.

The initial status is:

```text
0
```

---

# **9. Displaying the Data**

When the website is opened, `index.php` retrieves the saved records from MySQL and displays them in a table.

The records are ordered by ID in ascending order:

```text
ORDER BY id ASC
```

This means that older records remain at the top and newly added records appear at the bottom.

Example:

| **ID** | **Name** | **Age** | **Status** | **Action** |
|---:|---|---:|---:|---|
| 1 | John | 25 | 0 | Toggle |
| 2 | Sarah | 30 | 1 | Toggle |
| 3 | Michael | 22 | 0 | Toggle |

If a new person is added:

| **ID** | **Name** | **Age** | **Status** | **Action** |
|---:|---|---:|---:|---|
| 1 | Michael | 25 | 0 | Toggle |
| 2 | Sarah | 30 | 1 | Toggle |
| 3 | John | 22 | 0 | Toggle |
| 4 | Layan | 21 | 0 | Toggle |

---

# **10. Toggle Function**

Each person has a **Toggle** button.

When the button is clicked, the person’s ID is sent to:

```text
toggle.php
```

The PHP file changes the status.

For example:

```text
0 → 1
```

or:

```text
1 → 0
```

The new status is also saved in the MySQL database.

---

# **11. Live Update Without Page Refresh**

One of the main requirements of this project is that the Toggle button must update the status without refreshing the page.

This is achieved using JavaScript and the `fetch()` function.

The process works as follows:

```text
User clicks Toggle
        ↓
JavaScript
        ↓
fetch()
        ↓
toggle.php
        ↓
MySQL Database
        ↓
Status is changed
        ↓
JavaScript receives the new status
        ↓
Table is updated
```

The page does not need to be refreshed.

---

# **12. Uploading the Project to InfinityFree**

After completing the project, open the InfinityFree control panel.

1. Open **File Manager**.
2. Open the `htdocs` folder.
3. Upload the project files.

The structure should look like:

```text
htdocs/
│
├── index.php
├── db.php
├── add_person.php
├── toggle.php
├── script.js
└── style.css
```

The website can then be accessed using the InfinityFree website URL.

---

# **13. Testing the Website**

The application should be tested after uploading it.

### **Test 1: Add a Person**

Enter:

```text
Name: Michael
Age: 22
```

Click:

```text
Submit
```

The person should appear in the table.

The status should initially be:

```text
0
```

---

### **Test 2: Toggle Status**

Click the **Toggle** button.

The status should change:

```text
0 → 1
```

Click the button again:

```text
1 → 0
```

The change should happen without refreshing the page.

---

### **Test 3: Database Verification**

Open phpMyAdmin and check the `people` table.

The saved records should appear in the database.

The status should also match the value displayed on the website.

---

# **14. Uploading the Project to GitHub**

GitHub is used to store and share the project source code.

To upload the project:

1. Log in to GitHub.
2. Create a new repository.
3. Give the repository a name, for example:

```text
People-Database
```

4. Create the repository.
5. Upload the project files.

The repository should contain:

```text
index.php
db.php
add_person.php
toggle.php
script.js
style.css
database.sql
README.md
```

---

# **15. Important: GitHub Pages and PHP**

GitHub Pages cannot run PHP or connect directly to a MySQL database.

GitHub Pages is mainly used for static files such as:

- HTML
- CSS
- JavaScript

Therefore, this project uses two services for different purposes.

### **GitHub**

Used for:

- Storing the source code.
- Sharing the project.
- Version control.

### **InfinityFree**

Used for:

- Hosting the website.
- Running PHP.
- Connecting to MySQL.
- Hosting the database.

The architecture is:

```text
GitHub
   ↓
Source Code

InfinityFree
   ↓
PHP Website
   ↓
MySQL Database
```

---

# **16. Project Workflow**

The complete workflow of the application is:

```text
User
 ↓
Enter Name and Age
 ↓
Click Submit
 ↓
JavaScript fetch()
 ↓
add_person.php
 ↓
MySQL Database
 ↓
Data is saved
 ↓
JavaScript updates the table
```

For the Toggle function:

```text
User
 ↓
Click Toggle
 ↓
JavaScript fetch()
 ↓
toggle.php
 ↓
MySQL Database
 ↓
Status changes
 ↓
JavaScript updates the table
```

---

# **17. Security Notes**

Never publish your real MySQL password in a public GitHub repository.

The `db.php` file should use placeholders when the project is uploaded to GitHub:

```php
$host = "YOUR_MYSQL_HOST";
$dbname = "YOUR_DATABASE_NAME";
$username = "YOUR_MYSQL_USERNAME";
$password = "YOUR_MYSQL_PASSWORD";
```

Before running the project on InfinityFree, replace these placeholders with the actual database information.

For a production application, sensitive database credentials should be stored securely and should not be exposed in publicly accessible source code.

---

# **18. Final Result**

The project fulfills the required tasks:

- HTML, CSS, and JavaScript are used to build the web interface.
- PHP is used as the backend.
- MySQL is used as the database.
- The user can enter a name and age.
- The data is saved to MySQL.
- Saved data is displayed in a table.
- Each person has a Status value.
- The Toggle button changes Status from 0 to 1 and from 1 to 0.
- The database is updated when Toggle is clicked.
- The table updates immediately without refreshing the page.
- The website is hosted on InfinityFree.
- The source code is stored on GitHub.

---

# **19. Conclusion**

This project demonstrates how a web application can communicate with a MySQL database using PHP.

It also demonstrates how JavaScript `fetch()` can be used to communicate with PHP in the background and update the webpage dynamically without requiring a page refresh.

The project provides a simple example of frontend development, backend development, database management, and web hosting working together.
