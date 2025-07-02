<?= $this->include('partials/header') ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">All Candidate Details</h2>

    <div class="container mt-5">
        <div data-url="<? ?>"></div>
        <div id="formUrl" data-url="<?php echo base_url('search/index_no/__index_no') ?>"></div>
        <div class="search-container mb-4">

            <form id="searchForm" class="row g-3 align-items-center" method="post" action=''>
                <div class="col-auto">
                    <label for="searchInput" class="col-form-label">Index</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" id="indexSelect" name="index_no">
                        <?php foreach ($candidates as   $candidate) { ?>
                            <option value="<?= $candidate[0] ?>"><?= $candidate[0] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit" id="searchBtn">Search</button>
                </div>

                <div class="col-auto">
                    <button class="btn btn-primary" type="button" id="loadAllButton" data-url="<?php echo base_url('loadAll') ?>">Load All</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-success" type="button" id="avlButton" data-url="<?php echo base_url('search/availability/Available') ?>">Available</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-danger" type="button" id="busyButton" data-url="<?php echo base_url('search/availability/Busy') ?>">Busy</button>
                </div>
            </form>
        </div>

        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Last Attended Company</th>
                    <th>Current Attending Company</th>
                    <th>Availability</th>
                    <th>Contact</th>
                    <th>Modified BY</th>
                </tr>
            </thead>
            <tbody id="tBody">
                <?= $this->include('partials/candidateTable') ?>

            </tbody>
        </table>
    </div>


</div>

</div>

<?= $this->include('partials/footer') ?>