<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../view/header.php'; 
include '../view/header-nav.php';

?>

<main>
    <h2>Plan of Action & Milestone for [Control Name/ID]</h2>
        <br><br>

        <form action="index.php" id="poam-form" class="poam-form" method="post">   
            <input type="hidden" name="action" value="poam_create">   
            <input type="hidden" name="clientid" value="<?php echo $clientid; ?>">

            <input type="hidden" name="poam_id" value="<?php echo $clientid; ?>">
            <input type="hidden" name="poam_ctrl" value="<?php echo $clientid; ?>">

            <label for="poam_item_001">POAM ID:</label>
                <span class="poam-form">[POAM ID]</span><br>
            <label for="poam_item_002">Affected Controls:</label>
                <span class="poam-form">[POAM Controls]</span><br>

            <label for="poam_item_003">Weakness Name</label>
                <textarea name="poam_item_003" rows="1"></textarea><br>
            <label for="poam_item_004">Weakness Description</label>
                <textarea name="poam_item_004" rows="5"></textarea><br>
            <label for="poam_item_005">Weakness Detector Source</label>
                <input id="" name="poam_item_005" type="text" placeholder="" class=""><br>
            <label for="poam_item_006">Weakness Source Identifier</label>
                <input id="" name="poam_item_006" type="text" placeholder="" class=""><br>

            <label for="poam_item_007">Asset Identifier</label>
                <input id="" name="poam_item_007" type="text" placeholder="" class=""><br>
            <label for="poam_item_008">Point of Contact</label>
                <input id="" name="poam_item_008" type="text" placeholder="" class=""><br>
            <label for="poam_item_009">Resources Required</label>
                <input id="" name="poam_item_009" type="text" placeholder="" class=""><br>

            <label for="poam_item_010">Overall Remediation Plan</label>
                <textarea name="poam_item_010" rows="5"></textarea><br>

            <label for="poam_item_011">Original Detection Date</label>
                <input id="" name="poam_item_011" type="date" placeholder="" class=""><br>
            <label for="poam_item_012">Scheduled Completion Date</label>
                <input id="" name="poam_item_012" type="date" placeholder="" class=""><br>

            <label for="poam_item_013">Planned Milestones</label>
                <textarea name="poam_item_013" rows="5"></textarea><br>
            <label for="poam_item_014">Milestone Changes</label>
                <textarea name="poam_item_014" rows="5"></textarea><br>
            <label for="poam_item_015">Status Date</label>
                <input id="" name="poam_item_015" type="date" placeholder="" class=""><br>
            
            <label for="poam_item_016">Vendor Dependency</label>
                <input id="" name="poam_item_016" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_016" type="radio" value="No" placeholder="" class="">No<br>

            <label for="poam_item_017">Last Vendor Check-in Date</label>
                <input id="" name="poam_item_017" type="date" placeholder="" class=""><br>
            <label for="poam_item_018">Vendor Dependent Product Name</label>
                <input id="" name="poam_item_018" type="text" placeholder="" class=""><br>

            <label for="poam_item_019">Original Risk Rating</label>
                <select name="poam_item_019">
                    <option value="">Select</option>
                    <option value="Low">Low</option>
                    <option value="Moderate">Moderate</option>
                    <option value="High">High</option>
                </select><br>
            <label for="poam_item_020">Adjusted Risk Rating</label>
                <select name="poam_item_020">
                    <option value="">Select</option>
                    <option value="Low">Low</option>
                    <option value="Moderate">Moderate</option>
                    <option value="High">High</option>
                    <option value="N/A">N/A</option>
                </select><br>

            <label for="poam_item_021">Risk Adjustment</label>
                <input id="" name="poam_item_021" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_021" type="radio" value="No" placeholder="" class="">No
                <input id="" name="poam_item_021" type="radio" value="Pending" placeholder="" class="">Pending<br>
            <label for="poam_item_022">False Positive</label>
                <input id="" name="poam_item_022" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_022" type="radio" value="No" placeholder="" class="">No
                <input id="" name="poam_item_022" type="radio" value="Pending" placeholder="" class="">Pending<br>
            <label for="poam_item_023">Operational Requirement</label>
                <input id="" name="poam_item_023" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_023" type="radio" value="No" placeholder="" class="">No
                <input id="" name="poam_item_023" type="radio" value="Pending" placeholder="" class="">Pending<br>

            <label for="poam_item_024">Deviation Rationale</label>
                <textarea name="poam_item_024" rows="5"></textarea><br>
            <label for="poam_item_025">Supporting Documents</label>
                <textarea name="poam_item_025" rows="5"></textarea><br>
            <label for="poam_item_026">Comments</label>
                <textarea name="poam_item_026" rows="5"></textarea><br>

            <label for="poam_item_027">Auto-Approve</label>
                <input id="" name="poam_item_027" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_027" type="radio" value="No" placeholder="" class="">No<br>
            <label for="poam_item_028">Binding Operational Directive 22-01 Tracking</label>
                <input id="" name="poam_item_028" type="radio" value="Yes" placeholder="" class="">Yes
                <input id="" name="poam_item_028" type="radio" value="No" placeholder="" class="">No<br>

            <label for="poam_item_029">Binding Operational Directive 22-01 Due Date</label>
                <input id="" name="poam_item_029" type="date" placeholder="" class=""><br>
            <label for="poam_item_030">CVE</label>
                <input id="" name="poam_item_030" type="text" placeholder="" class=""><br>


            <br><br>
            <input class="button primary pill" style="margin:0 auto;" type="submit" value="Update" />
            <br><br>
    </form>
</main> 

<?php include '../view/footer.php'; ?>