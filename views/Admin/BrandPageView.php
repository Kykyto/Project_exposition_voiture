<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminBrandPageView extends AdminLayoutView
{
    public function content()
    {
?>
        <div class="container">
            <div class="Handler">
                <h3>Brand management</h3>
                <div>
                    <a href="/Project/Admin/brand/add/">Add Brand</a>
                </div>
            </div>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>

                        <th>Brand</th>
                        <th>Country Of Origin</th>
                        <th>Head Office</th>
                        <th>Year Of Establishment</th>
                        <th>Logo</th>
                        <th>Manage</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
                    $controller = new AdminBrandsPageController();
                    $brands = $controller->getBrandsData();

                    foreach ($brands as $brand) {
                    ?>
                        <tr>
                            <td><?php echo $brand['BrandName'] ?></td>
                            <td><?php echo $brand['CountryOfOrigin'] ?></td>
                            <td><?php echo $brand['Siegesocial'] ?></td>
                            <td><?php echo $brand['YearOfEstablishment'] ?></td>
                            <td>
                                <div class="manage">
                                    <img style="height:50px;" src="/Project/public/images/<?php echo $brand['Logo'] ?>" alt="<?php echo $brand['Logo'] ?>">
                                </div>
                            </td>
                            <td>
                                <div class="manage">
                                    <a href="/Project/Admin/brand/details/?id=<?php echo $brand['BrandID'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-car-front" viewBox="0 0 16 16">
                                            <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276" />
                                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                                        </svg>
                                    </a>

                                </div>
                            </td>
                            <td>
                                <div class="manage">
                                    <a href="/Project/Admin/brand/update/?id=<?= $brand['BrandID'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <button onclick="deleteBrand(<?= $brand['BrandID'] ?>,<?= $brand['ImageID'] ?>,'<?= $brand['Logo'] ?>')">
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

<?php
    }
    public function showBrandsPage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
