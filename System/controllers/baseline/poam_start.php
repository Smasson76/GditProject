<?php 
    include 'views/header.php'; 
    ?>

<div class="container">
    <div class="row my-5">
        <div class="card bg-light shadow">
            <div class="card-body">
            <h2 class="mb-4">Plan of Action & Milestone for <?php echo $ctrl->getCtrlID();?></h2>
            <form action="." method="post">
            <input type="hidden" name="action" value="create_poam">
            <input type="hidden" name="adm_id" value="<?php echo $current_admin->getID(); ?>">
            <input type="hidden" name="co_id" value="<?php echo $current_client->getID(); ?>">
            <input type="hidden" name="blc_id" value="<?php echo $ctrl->getBaselineCtrlID(); ?>">
            <input type="hidden" name="bl_id" value="<?php echo $ctrl->getBaselineID(); ?>">

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_003">Weakness Name</label>
                <textarea class="form-control" name="poam_item_003" rows="1"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_004">Weakness Description</label>
                <textarea class="form-control" name="poam_item_004" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_005">Weakness Detector Source</label>
                <input id="poam_item_005" name="poam_item_005" type="text" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_006">Weakness Source Identifier</label>
                <input id="poam_item_006" name="poam_item_006" type="text" class="form-control" placeholder="" class="">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_007">Asset Identifier</label>
                <input id="poam_item_007" name="poam_item_007" type="text" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_008">Point of Contact</label>
                <input id="poam_item_008" name="poam_item_008" type="text" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_009">Resources Required</label>
                <input id="poam_item_009" name="poam_item_009" type="text" class="form-control" placeholder="" class="">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_010">Overall Remediation Plan</label>
                <textarea class="form-control" name="poam_item_010" rows="5"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_011">Original Detection Date</label>
                <input id="poam_item_011" name="poam_item_011" type="date" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_012">Scheduled Completion Date</label>
                <input id="poam_item_012" name="poam_item_012" type="date" class="form-control" placeholder="" class="">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_013">Planned Milestones</label>
                <textarea class="form-control" name="poam_item_013" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_014">Milestone Changes</label>
                <textarea class="form-control" name="poam_item_014" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_015">Status Date</label>
                <input id="poam_item_015" name="poam_item_015" type="date" class="form-control" placeholder="" class="">
            </div>
            
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_016">Vendor Dependency</label>
                <div class="input-group-text form-check-inline">
                    <input id="poam_item_016" name="poam_item_016" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class=""> 
                        <label for="poam_item_016" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_016" name="poam_item_016" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_016" class="form-check-label me-2">No</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_017">Last Vendor Check-in Date</label>
                <input id="poam_item_017" name="poam_item_017" type="date" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_018">Vendor Dependent Product Name</label>
                <input id="poam_item_018" name="poam_item_018" type="text" class="form-control" placeholder="" class="">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_019">Original Risk Rating</label>
                <select class="form-control" name="poam_item_019">
                    <option value="">Choose...</option>
                    <option value="Low">Low</option>
                    <option value="Moderate">Moderate</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_020">Adjusted Risk Rating</label>
                <select class="form-control" name="poam_item_020">
                    <option value="">Choose...</option>
                    <option value="Low">Low</option>
                    <option value="Moderate">Moderate</option>
                    <option value="High">High</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_021">Risk Adjustment</label>
                <div class="input-group-text">
                    <input id="poam_item_021" name="poam_item_021" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class="">
                        <label for="poam_item_021" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_021" name="poam_item_021" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_021" class="form-check-label me-2">No</label>
                    <input id="poam_item_021" name="poam_item_021" type="radio" class="form-check-input me-2" value="Pending" placeholder="" class="">
                        <label for="poam_item_021" class="form-check-label me-2">Pending</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_022">False Positive</label>
                <div class="input-group-text">
                    <input id="poam_item_022" name="poam_item_022" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class="">
                        <label for="poam_item_022" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_022" name="poam_item_022" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_022" class="form-check-label me-2">No</label>
                    <input id="poam_item_022" name="poam_item_022" type="radio" class="form-check-input me-2" value="Pending" placeholder="" class="">
                        <label for="poam_item_022" class="form-check-label me-2">Pending</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_023">Operational Requirement</label>
                <div class="input-group-text">
                    <input id="poam_item_023" name="poam_item_023" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class="">
                        <label for="poam_item_023" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_023" name="poam_item_023" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_023" class="form-check-label me-2">No</label>
                    <input id="poam_item_023" name="poam_item_023" type="radio" class="form-check-input me-2" value="Pending" placeholder="" class="">
                        <label for="poam_item_023" class="form-check-label me-2">Pending</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_024">Deviation Rationale</label>
                <textarea class="form-control" name="poam_item_024" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_025">Supporting Documents</label>
                <textarea class="form-control" name="poam_item_025" rows="5"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_026">Comments</label>
                <textarea class="form-control" name="poam_item_026" rows="5"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_027">Auto-Approve</label>
                <div class="input-group-text">
                    <input id="poam_item_027" name="poam_item_027" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class="">
                        <label for="poam_item_027" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_027" name="poam_item_027" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_027" class="form-check-label me-2">No</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_028">Binding Operational Directive 22-01 Tracking</label>
                <div class="input-group-text">
                    <input id="poam_item_028" name="poam_item_028" type="radio" class="form-check-input me-2" value="Yes" placeholder="" class="">
                        <label for="poam_item_028" class="form-check-label me-2">Yes</label>
                    <input id="poam_item_028" name="poam_item_028" type="radio" class="form-check-input me-2" value="No" placeholder="" class="">
                        <label for="poam_item_028" class="form-check-label me-2">No</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_029">Binding Operational Directive 22-01 Due Date</label>
                <input id="" name="poam_item_029" type="date" class="form-control" placeholder="" class="">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="poam_item_030">CVE</label>
                <input id="" name="poam_item_030" type="text" class="form-control" placeholder="" class="">
            </div>

            <br><br>
            <input class="btn btn-md btn-primary" type="submit" value="Save" />
            <br><br>

            </form>

            </div>
        </div>
    </div>
</div>


<?php include 'views/footer.php'; ?>