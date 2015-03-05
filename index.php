<?php
// John and Mike worked together on the project
// Collaborated directly on all parts of the document
// Both gave equal input and worked through the entire project over Skype


// Starts a new session in which to store variables
session_start();
if (isset($_POST["Submit"])){
	// allows the input of name, CWID 
     $_SESSION['fullName'] = $_POST['fullName'];
     $_SESSION['CWID'] = $_POST['CWID'];
     $_SESSION['Residency'] = $_POST['Residency'];
			// if no selection for housing was chosen iterate down to the next form to move on
           if ($_POST["Residency"]=="noSelection"){
				// freshman can not choose a townhouse or kitchen so offer them these options
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
				// if they are a freshman offer then these options
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
				// if they are a sophomore and don't want a kitchen or town here are their options
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
				// if they are a sophomore and want a kitchen or townhouse these are the options
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
				// if they are a senior or junior these are the options
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
		// the if statement that only allows freshman to choose only Leo, Champ, Marian, or Sheahan
        $correct = TRUE;
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")) && ($_POST["Year"]!=="Frosh")){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
		// the if statement that only allows sophomores to choose only Midrise, Foy, Gartland, or New Townhouses
        if ((($_POST["Residency"]=="Midrise")|| 
             ($_POST["Residency"]=="Foy")|| 
             ($_POST["Residency"]=="Gartland")||
             ($_POST["Residency"]=="NewTownhouses")) && ($_POST["Year"]!=="Soph")){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
		// the if statement that allows juniors and seniors to choose only Lower West, Upper West, Fulton, New Fulton, or Talmadge
        if ((($_POST["Residency"]=="LowerWest")|| 
             ($_POST["Residency"]=="UpperWest")|| 
             ($_POST["Residency"]=="FultonStreet")||
             ($_POST["Residency"]=="NewFulton")||
             ($_POST["Residency"]=="Talmadge")) && (($_POST["Year"]!=="Junior")&&($_POST["Year"]!=="Senior"))){
            echo ("Choose a different location, your housing doesn't match your year.<br>");
            $correct = FALSE;
        }
		// the if statement that allows the option of townhouse to be checked and print if this is not what housing was picked
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")||
             ($_POST["Residency"]=="Midrise"))&& (isset($_POST["Townhouse"]))){
            echo ("You want a townhouse, but your selection is not a townhouse.<br>");
            $correct = FALSE;
        }
		// the if statement that allows the option of kitchen to be checked and print if this is not what housing was picked
        if ((($_POST["Residency"]=="Leo")|| 
             ($_POST["Residency"]=="Champ")|| 
             ($_POST["Residency"]=="Marian")||
             ($_POST["Residency"]=="Sheahan")||
             ($_POST["Residency"]=="Midrise"))&& (isset($_POST["Kitchen"]))){
            echo ("You want a kitchen, but your selection does not have a kitchen.<br>");
            $correct = FALSE;
        }
		// the button to go forward to the confirmation page if everything is correct
        if ($correct){
            echo (' Your selection fits the criteria, press the button to confirm your selection!
            <Form Name ="toConfirmPage" Method ="POST" ACTION = "index.php">
            <INPUT TYPE = "Submit" Name = "Submit2" VALUE = "Submit">
            </Form>');
        }else{
		// the button to go back to the previous page
        echo ('<button onclick="window.history.back()">Go back!</button>');
        }
    }
}
// the button to submit on the second page after all correct options have been chosen
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
	// the HTML form to select housing options
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