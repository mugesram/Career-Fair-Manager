<?= $this->include('partials/header') ?>
<div id="formUrl" data-url="<?php echo base_url('edit/__index_no/__availability/__company') ?>"></div>
<div id="content" class="container mt-5">
    <h2 class="mb-4">Modify Candidate Details</h2>
    <div class="form-container mb-4">
        <form id="candidateForm" class="">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="candidateSelect" class="form-label">Select Candidate :</label>
                    <select class="form-select" id="index_no" name="index_no" required>
                        <option></option>
                        <?php foreach ($candidates as   $candidate) { ?>
                            <option value="<?= $candidate[0] ?>"><?= $candidate[0] ?> | <?= $candidate[1] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="availability" class="form-label">Candidate Availability:</label>
                    <select class="form-select" id="availability" name="availability" required>
                        <option></option>
                        <option value="Available">Available</option>
                        <option value="Busy">Busy</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group chekAvailable">
                    <label for="InterviwerSelect" class="form-label">Select Current Interviewer:</label>
                    <select class="form-select" id="InterviwerSelect" name="InterviwerSelect">
                        <?php foreach ($companies as   $company) { ?>
                            <option value="<?= $company[0] ?>"><?= $company[1] ?></option>
                        <?php } ?>
                    </select>
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