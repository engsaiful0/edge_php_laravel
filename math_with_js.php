<html>

<body>
    <script>
        function sumOfTwoNumbers() {
            //alert("Inside the Javascript Function");
            console.log("Inside the Javascript Function");
            var firstNumber = document.getElementById('firstNumberId').value;
            console.log('firstNumber=' + firstNumber);

            var secondNumber = document.getElementById('secondNumberId').value;
            console.log('secondNumber=' + secondNumber);

            var sum = Number(firstNumber) + Number(secondNumber);
            console.log("sum=" + sum);
        }
    </script>
    <form method="post" action="data.php">
        <table>
            <tr>
                <td>Student Name</td>
                <td> <input type="text" name="studentName" placeholder="Enter the name"></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="number" name="firstNumber" id="firstNumberId" placeholder="Enter the First Number"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="number" name="secondNumber" id="secondNumberId" placeholder="Enter the Second Number"></td>
            </tr>
            <tr>
                <td></td>
                <td><input onclick="sumOfTwoNumbers()" type="button" value="Add"></td>
            </tr>
        </table>
    </form>

</body>

</html>