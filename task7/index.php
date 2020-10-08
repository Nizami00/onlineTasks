<html>
<body>
<form action="index.php" method="post">
    <label for="balance">Your balance:</label><br>
    <input type="number" id="balance" min="1" name="balance"
           value="<?php echo (int) ($_POST["balance"] ?? null);?>"/><br>
    <label for="ages">How many ages:</label><br>
    <input type="number" id="ages" min="1" name="ages"
           value="<?php echo (int) ($_POST["ages"] ?? null);?>"/><br>
    <label for="percents">Percents per year</label><br>
    <input type="number" id="percents" min="1" name="percents"
           value="<?php echo (int) ($_POST["percents"] ?? null);?>"/><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>

<?php
require_once 'InvestorCalculator.php';
if(isset($_POST['balance']) && isset($_POST['ages']) && isset($_POST['percents'])){
    $calculator = new InvestorCalculator(
        $_POST['balance'],
        $_POST['ages'],
        $_POST['percents']
    );
    echo $calculator->getBalance();
}


