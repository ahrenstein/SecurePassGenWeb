<?php
// ----------------------------------------------------------------------
// <copyright file="index.php" company="Ahrenstein">
//     Copyright (c) 2014 Ahrenstein., All Rights Reserved.
//     Authors:
//          Matthew Ahrenstein 2014 @ahrenstein
// </copyright>
// ----------------------------------------------------------------------

//Check for required files, and if they are missing, display an error on the page
(include_once 'includes/coreFunctions.class.php') or die("ERROR! Core functions class is missing. This file is required as it houses the password generation algorithm."); //Core password functionality
?>

<html>
<head>
<title>Secure Password Generator Web</title>
</head>
<body>

<?php
//Set the initial variables we will use
$sFQDN = "";
$sSeedPhrase = "";
$sSecdPass = "";

//Start grabbing variables from the form (This will happen upon page load, and upon the clicking of "Generate Password")
if(isset($_POST["fqdn"]))
{
        $sFQDN = $_POST["fqdn"];
}
if(isset($_POST["seedphrase"]))
{
        $sSeedPhrase = $_POST["seedphrase"];
}

$DoIGen = $_POST["GenOp"]; //Set a variable to true if the "Generate Password" button is clicked. This prevents the form from performing this function upon page load

if($DoIGen == "Generate Password") //Perform the secure password generation
{
        if($sFQDN == "" or $sSeedPhrase == "")  //Check to make sure both fields are filled out and provide an error if they are not
        {
                $sSecdPass = "ERROR: Both fields are required!";
        }
        else{
                $passGen = new PassGenFunctions();
                $sSecdPass = $passGen->GenPass($sFQDN, $sSeedPhrase);
        }
}
?>

<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST"> <!--When the POST method is called via the submit button, PHP will grab the textbox variables-->
<label for="FQDN">Server FQDN: </label><input type="text" name="fqdn" size="50" value="<?php echo $sFQDN; ?>"/></br><br> <!--Variable for the Server's FQDN in a textbox-->
<label for="Seed Phrase">Seed Phrase: </label><input type="text" name="seedphrase" size="50" value="<?php echo $sSeedPhrase; ?>" /></br><br> <!--Variable for the Seed String in a textbox-->
<input type="submit" name="GenOp" value="Generate Password" /> <!--Submit button-->
<br><br><label for="SecdPass">DoE Compliant Password: </label><input type="text" name="secdpass" size="50" value="<?php echo $sSecdPass; ?>" /></br><br> <!--Output is sent to this text box-->
</form>
</body>
</html>
