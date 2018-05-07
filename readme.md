# CS3380 FINAL PROJECT

### Group Members

Jacob Hassler

Alex Flynn

Sharoze Amir

### Application Description

This application allows a user to create an account for a database where they can then log in to add, edit, delete or search an entry. The user is able to enter the name, breed and age of an animal and store that information in a table. From there, each entry in our table is able to be located, updated or deleted. This type of application could be used for organizations such as animal shelters to register animals into a database.   

### Database Schema

Users

| Field| Type | NULL| Key |Default | Extra | 
| ------------- |:-------------:| -----:|--- |---|---
|ID | int(6) |NO |PRI|None|auto_increment|
|Username| varchar(16)|NO||None|None|
|Password | varchar(16)|NO|None|None||


Animals

| Field| Type | NULL| Key |Default | Extra | 
| ------------- |:-------------:| -----:|--- |---|---
| ID | int(6) |NO |PRI|None|auto_increment|
| Name| text|NO||None|None|
| Breed |text|NO|None|None||
|Age|int(3)|NO|None|None||
|User_Id|int(6)|NO|Foreign|None||





### ERD Diagram (Seperate file on Git)





### CRUD

#### Create

Upon login, a user can click the add button, which will take them to a form where they can enter the name, breed and age of an animal. Once the submit button is clicked, thier entry will be stored into the database. This is executed in the add.php file on line 43.

```php
$query = "INSERT INTO Animals(Name, Breed, Age, User_Id) VALUES ('$Name', '$Breed', '$Age', '$id');"; -->
```

#### Read

A user is able to click the search button which will redirect them to a form where they can now search for an animal by its name, breed or age. Our table will now be filtered to the users request. This functionality is implemented in read.php on lines 20-28.
```php
        $ID = empty($_POST['ID']) ? '' : $_POST['ID'];
        $Name = empty($_POST['Name']) ? '' : $_POST['Name'];
        $Breed = empty($_POST['Breed']) ? '' : $_POST['Breed'];
        $Age = empty($_POST['Age']) ? '' : $_POST['Age'];
        $Animals = array();

        $sql = "SELECT * FROM Animals WHERE Name LIKE '%" . $Name . "%' AND Breed LIKE '%" . $Breed . "%' AND Age LIKE '%" . $Age . "%'";

        $result = $database->query($sql);  
       
```

#### Update

Once an enrtry is stored in the database, the use can then edit the input information to thier liking. THis helps in the event that there was an input error when originally filling the forms to be stored in the database. This functionality is seen in update.php on lines 21-28.
```php
        $ID = $_REQUEST['ID'];
        $Name = $_REQUEST['Name'];
        $Breed = $_REQUEST['Breed'];
        $Age = $_REQUEST['Age'];


    $sql = "UPDATE Animals SET Name='" . $Name . "', Breed='" . $Breed . "', Age='" . $Age . "' WHERE ID='" . $ID . "'";
        $result = $database->query($sql); -->
```
#### Delete

Once a user has entered something into the database, they then have the option to completely delete a previously stored entry from the database. A delete button is available for every entry in the table. The delete functionality is displayed in delete.php on lines 21-27.
```php
<!--    $id = $_REQUEST['ID'];

        $animals = array();

        $sql = "DELETE FROM Animals WHERE ID='" . $id . "'";

        $result = $database->query($sql);
```    
    
#### Video Demonstration

https://you.tube/Q8tRwUy7nyc
        
