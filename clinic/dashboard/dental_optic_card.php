<?php if ($user['user_type'] === 'Admin') : ?>
    <div class="container-fluid py-2">
        <div>Dental</div>
        <div class="card p-3 z-1 bg-primary shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Current Patients</h5>
            <img src="../icons/bxs-user.svg">
        </div>

        <div class="card p-3 z-1 bg-success shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Confirmed Patients</h5>
            <img src="../icons/bxs-user-check.svg" id="img2">
        </div>

        <div class="card p-3 z-1 bg-warning shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Stocks</h5>
            <img src="../icons/bxs-bar-chart-alt-2.svg">
        </div>

        <div class="card p-3 z-1 bg-danger shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Pending Requests</h5>
            <img src="../icons/bxs-user-plus.svg" id="img4">
        </div>
    </div>


<?php elseif ($user['user_type'] === 'Optical') : ?>
    <div class="container-fluid py-2">
        <div>Optic</div>
        <div class="card p-3 z-1 bg-primary shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Current Patients</h5>
            <img src="../icons/bxs-user.svg">
        </div>

        <div class="card p-3 z-1 bg-success shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Confirmed Patients</h5>
            <img src="../icons/bxs-user-check.svg" id="img2">
        </div>

        <div class="card p-3 z-1 bg-danger shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Pending Requests</h5>
            <img src="../icons/bxs-user-plus.svg" id="img4">
        </div>
    </div>


<?php endif; ?>