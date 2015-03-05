<?php
session_start();
if (isset($_POST["Submit"])){
     $_SESSION['fullName'] = $_POST['fullName'];
     $_SESSION['CWID'] = $_POST['CWID'];
     $_SESSION['Residency'] = $_POST['Residency'];
           if ($_POST["Residency"]=="noSelection"){
               if (($_POST["Year"]=="Frosh")&&((isset($_POST["Townhouse"]))||(isset($_POST["Kitchen"])))){
               echo ("There is no configuration that exists for these choices.<br>");
                   echo (' Here are some options for freshman:<br> 
                   <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
                   <select name="Residency">
                   <option value="Leo">Leo Hall</option>
                   <option value="Champ">Champagnat Hall</option>
                   <option value="Marian">Marian Hall</option>
                   <option value="Sheahan">Sheahan Hall</option>
                   </select><br><br>
                   <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
                   </Form>');
               }else if ($_POST["Year"]=="Frosh"){
                   echo (' Here are some options for freshman:<br> 
                   <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
                   <select name="Residency">
                   <option value="Leo">Leo Hall</option>
                   <option value="Champ">Champagnat Hall</option>
                   <option value="Marian">Marian Hall</option>
                   <option value="Sheahan">Sheahan Hall</option>
                   </select><br><br>
                   <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
                   </Form>');
               }else if ($_POST["Year"]=="Soph"&& ((!isset($_POST["Kitchen"]))&&(!isset($_POST["Townhouse"])))){
                   echo ('Here are some options for sophomores:<br> 
                   <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
                   <select name="Residency">
                   <option value="Midrise">Midrise Hall</option>
                    <option value="Foy">Foy Townhouses</option>
                    <option value="Gartland">Gartland Commons</option>
                    <option value="NewTownhouses">New TownHouses</option>
                    </select><br><br>
                    <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
                    </Form>');
               }else if (($_POST["Year"]=="Soph") &&((isset($_POST["Kitchen"]))||(isset($_POST["Townhouse"])))){
                   echo ('Here are some options for sophomores, with a kitchen and or a townhouse:<br> 
                    <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
                    <select name="Residency">
                   <option value="Foy">Foy Townhouses</option>
                    <option value="Gartland">Gartland Commons</option>
                    <option value="NewTownhouses">New TownHouses</option>
                    </select><br><br>
                    <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
                    </Form>');
               }else{
                   echo('Here are some options for juniors and seniors:<br>
                   <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
                   <select name="Residency">
                    <option value="LowerWest">Lower West</option>
                    <option value="UpperWest">Upper West</option>
                    <option value="FultonStreet">Fulton Street</option>
                    <option value="NewFulton">New Fulton</option>
                    <option value="Talmadge">Talmadge</option>
                    </select><br><br>
                    <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
                    </Form>');
               }
           }                
    else
    {
        $correct = TRUE;
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")) && ($_POST["Year"]!=="Frosh")){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
        if ((($_POST["Residency"]=="Midrise")|| 
             ($_POST["Residency"]=="Foy")|| 
             ($_POST["Residency"]=="Gartland")||
             ($_POST["Residency"]=="NewTownhouses")) && ($_POST["Year"]!=="Soph")){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
        if ((($_POST["Residency"]=="LowerWest")|| 
             ($_POST["Residency"]=="UpperWest")|| 
             ($_POST["Residency"]=="FultonStreet")||
             ($_POST["Residency"]=="NewFulton")||
             ($_POST["Residency"]=="Talmadge")) && (($_POST["Year"]!=="Junior")&&($_POST["Year"]!=="Senior"))){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")||
             ($_POST["Residency"]=="Midrise"))&& (isset($_POST["Townhouse"]))){
            echo ("You want a townhouse, but your selection is not a townhouse.<br>");
            $correct = FALSE;
        }
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")||
             ($_POST["Residency"]=="Midrise"))&& (isset($_POST["Kitchen"]))){
            echo ("You want a kitchen, but your selection does not have a kitchen.<br>");
            $correct = FALSE;
        }
        if ($correct){
            echo (' Your selection fits the criteria, press the button to confirm your selection!
            <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
            <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
            </Form>');
        }else{
        echo ('<button onclick="window.history.back()">Go back!</button>');
        }
    }
}
else if (isset($_POST["Submit2"])){
    if ($_SESSION["Residency"] == "noSelection")
    {
        $_SESSION["Residency"] = $_POST["Residency"];
    }
    echo ('Name: '. $_SESSION["fullName"].'<br>');
    echo ('CWID: '. $_SESSION["CWID"]. '<br>');
    echo ('Residential Life Selection: '. $_SESSION["Residency"]. '<br>');
    //This button currently does nothing...
    echo ('<button>Confirm</button>');
}
else{
    echo ('<html>
            <Form Name ="gatherDetails" Method ="POST" ACTION = "index.php">
            Name:<input Type = "Text" name = "fullName"><br><br>
            CWID:<input Type = "Text" name = "CWID"><br><br>
            Residential Life Options
            <select name="Residency">
                <option value="noSelection"></option>
                <option value="Leo">Leo Hall</option>
                <option value="Champ">Champagnat Hall</option>
                <option value="Marian">Marian Hall</option>
                <option value="Sheahan">Sheahan Hall</option>
                <option value="Midrise">Midrise Hall</option>
                <option value="Foy">Foy Townhouses</option>
                <option value="Gartland">Gartland Commons</option>
                <option value="NewTownhouses">New TownHouses</option>
                <option value="LowerWest">Lower West</option>
                <option value="UpperWest">Upper West</option>
                <option value="FultonStreet">Fulton Street</option>
                <option value="NewFulton">New Fulton</option>
                <option value="Talmadge">Talmadge</option>
            </select><br><br>
            Class:
            <select name="Year">
                <option value = "Frosh">Freshman</option>
                <option value = "Soph">Sophmore</option>
                <option value = "Junior">Junior</option>
                <option value = "Senior">Senior</option>
            </select><br>
            <input type="radio" name="Sex" value="Male">Male<br>
            <input type="radio" name="Sex" value="Female">Female
            <br>
            <input type="checkbox" name="Laundry" value="Yes">Laundry on Premise<br>
            <input type="checkbox" name="Townhouse" value="Yes">Townhouse<br>
            <input type="checkbox" name="Kitchen" value="Yes">Kitchen<br>
            <INPUT TYPE = "Submit" Name = "Submit" VALUE = "Submit">
        </Form>
        </html>');
}
?>