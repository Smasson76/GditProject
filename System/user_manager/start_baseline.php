<?php
session_start();
include '../view/header.php'; ?>
<main>

    <form action="index.php" method="post" id="view_baseline_form">
        <input type="hidden" name="action" value="Change this">

        <br><br>
        <label for="ato"><h3>Choose an ATO:</h3></label>
        <select name="ato" id="ato">
        <optgroup label="FISMA">
            <option value="blank"></option>
            <option value="blank">NIST SP 800-16 - Training</option>
            <option value="blank">NIST SP 800-18 R1 - Guide for developing security plans for federal systems</option>
            <option value="blank">NIST SP 800-30 - Risk management guide for information technology systems</option>
            <option value="blank">NIST SP 800-134 R1 - Contingency planning guide</option>
            <option value="blank">NIST SP 800-53 Rev 4</option>
        </optgroup>
        <optgroup label="FedRAMP">
            <option value="blank"></option>
            <option value="blank">NIST SP 800-16 - Training</option>
            <option value="blank">NIST SP 800-18 R1 - Guide for developing security plans for federal systems</option>
            <option value="blank">NIST SP 800-30 - Risk management guide for information technology systems</option>
            <option value="blank">NIST SP 800-134 R1 - Contingency planning guide</option>
            <option value="blank">NIST SP 800-53 Rev 4</option>
        </optgroup>
        </select>

        <br><br>
        <label for="ato"><h3>Choose Security Controls:</h3></label>
        <select name="ato" id="ato">
        <optgroup label="FISMA">
            <option value="blank"></option>
            <option value="blank">Low</option>
            <option value="blank">Medium</option>
            <option value="blank">High</option>
        </optgroup>
        </select>
        
        <br><br><br>

        <input type="submit" value="Start Baseline" />
        <br>
    </form>
</section>
<?php include '../view/footer.php'; ?>