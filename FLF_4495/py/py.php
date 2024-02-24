<?php
#$client_id = $_POST["startrowMB"];
$client_id = 87;
?>

<form method='post' name='frmfprdMB' action='../clients.php'>
            <input type='text'  name='startrowMB' value=''>

        </form>

<?php
//error_reporting(E_ALL);
//ini_set("display_errors",1);
//echo shell_exec('pip3 install pandas');
echo shell_exec('python3 --version');
$command = escapeshellcmd("python3 CSIS4495_GRavell_300358682.py '$client_id'");
$output = shell_exec($command);

echo $output;
?>

