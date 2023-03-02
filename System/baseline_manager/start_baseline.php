<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../view/header.php'; 
include '../view/header-nav.php';

?>

<main>

    <form action="index.php" method="post" id="view_baseline_form">
        <input type="hidden" name="action" value="select_framework">
        <br><br>
        <label for="framework_id"><h3>Choose a Framework:</h3></label>
        <select name="framework_id" id="ato">
        <optgroup label="NIST">
            <option value="nist80053oscal">NIST SP 800-53</option>
            <option value="nist80053oscal">NIST 800-171</option>
        </optgroup>
        <optgroup label="FISMA">
            <option value="blank">-- add more later</option>
        </optgroup>
        <optgroup label="FedRAMP">
            <option value="blank">FEDRAMP CMMC</option>
        </optgroup>
        </select>

        <br><br>
        <label for="impact"><h3>Choose Impact Level:</h3></label>
        <select name="impact" id="ato">
            <option value="low">Low</option>
            <option value="mod">Moderate</option>
            <option value="high">High</option>
        </select>

        <br><br>
        
        <input type="checkbox" name="hide_unselected">
        <label for="hide_unselected">Hide Unselected Controls</label>
        

        <br><br><br>

        <input class="button secondary pill" type="submit" value="Start Baseline" />
        <br>
    </form>
</section>
<?php include '../view/footer.php'; ?>