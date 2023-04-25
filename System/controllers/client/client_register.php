<?php 
    include '../../views/header.php'; 
    ?>

<div class="container">
    <div class="row my-5">
        <div class="card bg-light shadow">
            <div class="card-body">
            <h2 class="mb-4">Register Client</h2>
            <form action="." method="post">
            <input type="hidden" name="action" value="add_client">
            <input type="hidden" name="cl_id" value="<?php echo $current_admin->getID(); ?>">

            <div class="pl-lg-4">
            <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="co_name">Company</label>
                        <input type="text" id="co_name" class="form-control form-control-alternative" name="co_name" value=""/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="co_short">Nickname</label>
                        <input type="text" id="co_short" class="form-control form-control-alternative" name="co_short" value=""/>
                        </div>
                    </div>
                </div>
            <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_first">First</label>
                        <input type="text" id="cl_first" class="form-control form-control-alternative" name="cl_first" value=""/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_last">Last</label>
                        <input type="text" id="cl_last" class="form-control form-control-alternative" name="cl_last" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_title">Title</label>
                        <input type="text" name="cl_title" id="cl_title" class="form-control form-control-alternative" value=""/>                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_email">Email</label>
                        <input type="text" name="cl_email" id="cl_email" class="form-control form-control-alternative" value=""/>                        
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_password_1">Password</label>
                        <input type="password" name="cl_password_1" id="cl_password_1" class="form-control form-control-alternative" value=""/>                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                        <label class="input-group-text" for="cl_password_2">Confirm Password</label>
                        <input type="password" name="cl_password_2" id="cl_password_2" class="form-control form-control-alternative" value=""/>                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                        <input class="btn btn-sm btn-primary" type="submit" value="Create Client" />
                        </div>
                    </div>
                </div>
            </div>

            </form>

            </div>
        </div>
    </div>
</div>


<?php include '../../views/footer.php'; ?>



