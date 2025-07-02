<?= $this->include('partials/header') ?>
<div id="formUrl" data-url="<?php echo base_url('admin/update') ?>"></div>
<div id="content" class="container mt-5">
    <h2 class="mb-4">Upload Data</h2>
    <div class="form-container mb-4">
        <form id="dataForm" class="" method="post" action="">

            <div class="row">
                <div class="col-md-6 form-group ">
                    <label for="data" class="form-label">Excel Data:</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                </div>
                <div class="col-md-6 form-group ">
                    <label for="modifyingBy" class="form-label">Password:</label>
                    <input class="form-control" type="text" id="modifier_pin" name="modifier_pin" required>
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="formSubmit">Submit</button>
                <button type="button" class="btn btn-secondary" id="refresh">Refresh</button>
            </div>
        </form>
    </div>
</div>
<!-- end -->


</div>

</div>
<?= $this->include('partials/footer') ?>