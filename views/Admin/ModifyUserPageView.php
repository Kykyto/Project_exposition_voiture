<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminModifyUsersPageView extends AdminLayoutView
{
    public function content($id)
    {
        $controller = new AdminUsersPageController();
        $user = $controller->getUserById($id);
?>
        <div class="userInfo">
            <div>
                <h3>User informations</h3>
                <a href="/Project/Api/api.php?toggleUser=<?= $user['IsBlocked'] ? 0 : 1 ?>&UserID=<?= $user['UserID'] ?>" style="background-color:<?= $user['IsBlocked'] ? "green" : "red" ?>"><?= $user['IsBlocked'] ? "Activate" : "Block" ?></a>
            </div>
            <form action="/Project/Api/api.php" method="post">
                <div>
                    <input type="hidden" name="UserID" value="<?= $user['UserID'] ?>">
                    <div>
                        <label for="Username">Username</label>
                        <input disabled id="Username" name="username" type="text" value="<?= $user['username'] ?>" required>
                    </div>
                    <div>
                        <label for="Firstname">Firstname</label>
                        <input disabled id="Firstname" name="FirstName" type="text" value="<?= $user['FirstName'] ?>" required>
                    </div>
                    <div>
                        <label for="Lastname">Lastname</label>
                        <input disabled id="Lastname" name="LastName" type="text" value="<?= $user['LastName'] ?>" required>
                    </div>
                    <div>
                        <label for="Gender">Gender</label>
                        <select disabled id="Gender" name="Gender" required>
                            <option value="Male" <?= $user['Gender'] == 'Male' ? "selected" : "" ?>>Male</option>
                            <option value="Female" <?= $user['Gender'] == 'Female' ? "selected" : "" ?>>Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="DateOfBirth">Date Of Birth</label>
                        <input disabled id="DateOfBirth" name="DateOfBirth" type="date" value="<?= $user['DateOfBirth'] ?>" required>
                    </div>
                    <div>
                        <label for="Email">Email</label>
                        <input disabled id="Email" name="Email" type="email" value="<?= $user['Email'] ?>" required>
                    </div>
                </div>
            </form>
        </div>

<?php
    }
    public function showUserPage($id)
    {
        $this->showNavbar();
        $this->content($id);
        $this->showFooter();
    }
}
