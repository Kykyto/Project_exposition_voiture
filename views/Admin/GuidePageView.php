<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminGuidePageView extends AdminLayoutView
{
    public function content()
    {
?>
        <div class="container">
            <div class="Handler">
                <h3>Guide management</h3>
            </div>
            <div class="AddGuideForm">
                <form action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                    <div>
                        <div>
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" required placeholder="Enter the title of the Guide">
                        </div>
                        <div>
                            <label for="Description">Content</label>
                            <textarea name="Description" id="Description" cols="30" rows="10" placeholder="Enter the details of the Guide ..." required></textarea>
                        </div>
                        <div>
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" accept="image/*" multiple required>
                        </div>
                    </div>
                    <button type="submit" name="AddGuide">Add Guide</button>
            </div>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>input</th>
                        <th>manage</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
                    $controller = new AdminGuidePageController();
                    $guides = $controller->getAllGuides();

                    foreach ($guides as $item) {
                    ?>
                        <tr>
                            <td><input type="text" value="<?php echo $item['Title'] ?>" data-guide-id="<?php echo $item['GuideSettingID'] ?>"></td>
                            <td style="width: 30%"><textarea name="" id="" data-guide-id="<?php echo $item['GuideSettingID'] ?>"><?php echo $item['Description'] ?></textarea></td>
                            <td><?= (new DateTime($item['Date']))->format("Y-m-d") ?></td>
                            <td>
                                <div class="manage">
                                    <img style="height:100px;" src="/Project/public/images/<?php echo $item['ImagePath'] ?>" alt="<?php echo $item['ImagePath'] ?>" data-guide-id="<?php echo $item['GuideSettingID'] ?>" data-img-src="<?php echo $item['ImagePath'] ?>">
                                </div>
                            </td>
                            <td><input type="file" name="image" id="image" accept="image/*" data-guide-id="<?php echo $item['GuideSettingID'] ?>"></td>
                            <td>
                                <div class="manage">
                                    <button onclick="updateGuide(<?= $item['GuideSettingID'] ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </button>
                                    <button onclick="deleteGuide(<?= $item['ImageID'] ?>)">
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
    public function showGuidePage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
