<link rel="stylesheet" href="../css/students.css">
<style>
    .search-container-dash {
        margin-top: 10px !important;
        position: relative !important;
    }

    .search-container-dash input {
        width: 350px !important;
        height: 40px !important;
        font-size: 16px !important;
        padding: 10px 20px 10px 40px !important;
        border-radius: 30px !important;
        border: 1px solid var(--line-clr);

    }

    .search-container-dash i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #bbc0c9;
        font-size: 18px;
        pointer-events: none;
    }

    tr {
        cursor: pointer;
        height: 50px !important;
    }
</style>
<div class="col-md-12 students-content">
    <div class="row mb-3">
        <div class="row">
            <div class="card p-3 card-header-student">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="card-title d-flex align-items-center">
                            <h5>List of Students</h5>
                            <form action="" id="searchForm" style="margin-left: 230px !important;">
                                <div class="search-container-dash">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" placeholder="Search..." id="searchInput">
                                    <!-- Suggestions dropdown -->
                                    <div id="suggestions"
                                        style="display: none; position: absolute; top: 100%; left: 0; right: 0; background: white; border: 1px solid #ddd; border-radius: 4px; max-height: 200px; overflow-y: auto; z-index: 1000;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>

    <div class="row mb-3">
        <div class="card p-3 card-table ">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped ">
                        <thead>
                            <tr>
                                <th scope="col" class="align-middle">#</th>
                                <th scope="col" class="align-middle">First</th>
                                <th scope="col" class="align-middle">Last</th>
                                <th scope="col" class="align-middle">Handle</th>
                            </tr>
                        </thead>
                        <tbody d-flex align-items-center>
                            <tr>
                                <th scope="row" class="align-middle">1</th>
                                <td class="align-middle">Mark</td>
                                <td class="align-middle">Otto</td>
                                <td class="align-middle">@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle">2</th>
                                <td class="align-middle">Jacob</td>
                                <td class="align-middle">Thornton</td>
                                <td class="align-middle">@fat</td>
                            </tr>
                            <tr>
                                <th scope="row" class="align-middle">3</th>
                                <td colspan="2" class="align-middle">Larry the Bird</td>
                                <td class="align-middle">@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>