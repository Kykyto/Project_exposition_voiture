<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminReviewPageView extends AdminLayoutView
{
    public function content()
    {
?>
        <div class="container">
            <div class="Handler">
                <h3>Reviews management</h3>
            </div>

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Brand/Vehicule</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/ReviewPageController.php');
                    $controller = new AdminReviewPageController();
                    $reviews = $controller->getReviews();

                    foreach ($reviews as $review) {
                    ?>
                        <tr>

                            <td>
                                <div style="display: flex;justify-content: space-between; align-items:center;">
                                    <a style="color:inherit;" href="/Project/Admin/users/modify/?id=<?= $review['UserID'] ?>"><?= $review['username'] ?></a>
                                    <a style="cursor:pointer" onclick="blockUser(<?= $review['UserID'] ?>)"><?= $review['IsBlocked'] ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-lock-fill" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/></svg>'
                                                                                                                : '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-unlock-fill" viewBox="0 0 16 16"><path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/></svg>' ?>
                                    </a>
                                </div>
                            </td>
                            <td><?php
                                if ($review['BrandName']) {
                                    echo $review['BrandName'];
                                } else {
                                    echo $review['VehiculeName'];
                                }
                                ?></td>
                            <td style="width:50%"><?php echo $review['Comment'] ?></td>
                            <td>
                                <select style="background-color: <?php echo $review['Status'] == 'Pending' ? 'grey' : ($review['Status'] == 'Rejected' ? 'red' : 'green') ?>;" name="status" class="status" id="status<?= $review['ReviewID'] ?>">
                                    <option value="Pending" <?php echo $review['Status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Approved" <?php echo $review['Status'] == 'Approved' ? 'selected' : '' ?>>Approved</option>
                                    <option value="Rejected" <?php echo $review['Status'] == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                                </select>
                            </td>
                            <td style="text-align: center;"><?php echo $review['Rating'] ?></td>
                            <td>
                                <div class="manage">
                                    <button onclick="changeReview(<?= $review['ReviewID'] ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </button>
                                    <button onclick="deleteReview(<?= $review['ReviewID'] ?>)">
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
    public function showReviewPage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
