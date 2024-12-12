<p>This is the data file</p>
<?php
echo '<pre>';
// print_r($_GET);
// $studentName = $_GET['studentName'];
// $firstNumber = $_GET['firstNumber'];
// $secondNumber = $_GET['secondNumber'];

print_r($_POST);
$studentName = $_POST['studentName'];
$firstNumber = $_POST['firstNumber'];
$secondNumber = $_POST['secondNumber'];

echo $studentName;
?>
<table border="1">
    <tr>
        <td>Stdent Name</td>
        <td><?php echo $studentName?></td>
    </tr>
    <tr>
        <td>First Number</td>
        <td><?php echo $studentName?></td>
    </tr>
    <tr>
        <td>Second Number</td>
        <td><?php echo $secondNumber?></td>
    </tr>
</table>