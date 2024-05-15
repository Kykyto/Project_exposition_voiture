<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');

class AdminBrandDetailsPageView extends AdminLayoutView
{

    public function content($id)
    {
?>
        <div class="container">
            <div class="Handler">
                <h3>Brand management</h3>
                <div>
                    <a href="/Project/Admin/vehicle/add/">Add Vehicle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>

                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Version</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
                        $controller = new AdminBrandsPageController();
                        $vehicles = $controller->getVehiculesByID($id);

                        foreach ($vehicles as $vehicle) {
                        ?>
                            <tr>

                                <td><?php echo $vehicle['BrandName'] ?></td>
                                <td><?php echo $vehicle['ModelName'] ?></td>
                                <td><?php echo $vehicle['ModelYear'] ?></td>
                                <td><?php echo $vehicle['Version'] ?></td>

                                <td>
                                    <div class="manage">
                                        <img style="height:100px;" src="/Project/public/images/<?php echo $vehicle['ImagePath'] ?>" alt="<?php echo $vehicle['ImagePath'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="Show-Details">
                                        <a href="/Project/vehicle/?id=<?php echo $vehicle['VehicleID'] ?>">
                                            Show Details
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="manage">
                                        <a href="/Project/Admin/brand/details/update/?id=<?= $vehicle['VehicleID'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                        <button onclick="deleteVehicule(<?= $vehicle['VehicleID'] ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            </div>


        </div>

<?php
    }

    public function showBrandDetailsPage($id)
    {
        $this->showNavbar();
        $this->content($id);
        $this->showFooter();
    }
}

?>