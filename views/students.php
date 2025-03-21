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
        border: 1px solid var(--line-clr) !important;

    }

    .search-container-dash i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #bbc0c9 !important;
        font-size: 18px;
        pointer-events: none;
    }

    tr {
        cursor: pointer;
        height: 50px !important;
    }

    /* Style for the filters container */
    .filters {
        margin-top: 20px;
    }

    /* Style for the tabs */
    .tabs {
        display: flex;
        gap: 15px;
    }

    .tab {
        background: none;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .tab.active {
        color: #007bff !important;
        border-bottom: 2px solid #007bff !important;
    }

    .tab:hover {
        color: #007bff;
    }

    /* Style for the dropdowns */
    .dropdowns {
        display: flex;
        gap: 10px;
    }

    .form-select {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }

    /* Style for the Add Student button */
    .add-student {
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 20px;
        background-color: #007bff;
        border: none;
    }

    .add-student:hover {
        background-color: #0056b3;
    }

    /* Adjust the search bar to match the image */
    .search-container-dash {
        position: relative;
        width: 300px;
    }

    .search-container-dash input {
        width: 100%;
        padding: 8px 40px 8px 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 14px;
    }

    .search-container-dash .fa-magnifying-glass {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
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


                    <!-- Filters Section -->
                    <div class="filters d-flex justify-content-between align-items-center mt-3">
                        <!-- Tabs for filtering by category -->
                        <div class="tabs d-flex gap-3">
                            <button class="tab active">ALL Students</button>
                            <button class="tab">STEM</button>
                            <button class="tab">ABM</button>
                            <button class="tab">HUMMMS</button>
                        </div>

                        <!-- Dropdowns for Filter by and Sort by -->
                        <div class="dropdowns d-flex gap-2">
                            <select class="form-select" style="width: 150px;">
                                <option>Filter by</option>
                                <option value="grade">Grade</option>
                                <option value="age">Age</option>
                                <option value="status">Status</option>
                            </select>
                            <select class="form-select" style="width: 150px;">
                                <option>Sort by</option>
                                <option value="name-asc">Name (A-Z)</option>
                                <option value="name-desc">Name (Z-A)</option>
                                <option value="grade-asc">Grade (Low to High)</option>
                                <option value="grade-desc">Grade (High to Low)</option>
                            </select>
                        </div>

                        <!-- Add Student Button -->
                        <button class="btn btn-primary add-student">Add Student</button>
                    </div>
                </div>
            </div>
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