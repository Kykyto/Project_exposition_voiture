<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminAddNewsPageView extends AdminLayoutView
{

    public function content()
    {
?>
        <div class="NewsInfo">
            <div>
                <h3>Add New News</h3>
            </div>
            <form id="AddNewsForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" required placeholder="Enter the title of the News">
                    </div>
                    <div>
                        <label for="Firstname">Firstname</label>
                        <textarea name="Content" id="content" cols="30" rows="10" placeholder="Enter the details of the News ..." required></textarea>
                    </div>
                    <div>
                        <label for="images">Images</label>
                        <?php $this->slider([]); ?>
                        <input type="file" name="images[]" id="images" accept="image/*" multiple required>
                    </div>

                </div>
                <button type="submit" name="AddNews">Add News</button>
            </form>
        </div>

<?php
    }
    public function showNewsPage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
