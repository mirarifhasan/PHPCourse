<?php
    
    if(!empty($_POST)){
        echo"<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";
        
    }
?>


<html>

    <head>
    
    </head>

    
    <body>
        <form action="" method ="POST" enctype="multipart/form-data">

            <label>Name: </label>
            <input type="text" name="person_name" value="" placeholder="Enter your name"/>

            <div>
                <label>Address: </label>
                <textarea name="person_address" placeholder="Enter your address"></textarea>
            </div>

            <label>Age: </label>
            <select name="person_age">
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
            </select>

            
            <div>
                <input type="file" name="fileToUpload" id="filetoUpload">
            </div>
            
            <div>
                <input type="submit" name="" value="Submit"/>
            </div>
            
            
        </form>
    </body>


</html>