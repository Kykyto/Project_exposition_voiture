<?php
class AdminLoginPageView
{
    public function content($error)
    {
?>
        <div class="login">
            <div>
                <h2>Admin Login</h2>
                <form action="/Project/Api/api.php" method="post">
                    <input type="text" name="admin_username" placeholder="Username" required><br>
                    <input type="password" name="admin_password" placeholder="Password" required><br>
                    <button type="submit" name="login">Login</button>
                </form>

            </div>

        </div>
    <?php
    }
    public function showPage($error)
    {
    ?>
        <div id="login">
            <div class="mainLogin">
                <input type="checkbox" id="check">

                <div class="login">
                    <form action="/Project/Api/api.php" method="POST">
                        <label for="check">Login</label>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" name="login">Login</button>
                    </form>
                </div>

                <div class="signup">
                    <form action="/Project/Api/api.php" method="POST">
                        <label for="check">Sign up</label>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="text" name="firstname" placeholder="Firstname" required>
                        <input type="text" name="lastname" placeholder="Lastname" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="date" name="DateOfBirth" required>
                        <div id="gender">
                            <input type="radio" id="Male" name="gender" value="Male" required>
                            <label for="Male">Male</label><br>
                            <input type="radio" id="Female" name="gender" value="Female" required>
                            <label for="Female">Female</label><br>
                        </div>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" name="signup">Sign up</button>
                    </form>
                </div>
            </div>
            <?php
            if ($error == 1) {
            ?>
                <div class="mt-2 alert alert-danger alert-dismissible  fade show text-center px-2" role="alert">
                    username or password is incorrect!
                </div>
            <?php
            } ?>
            <?php
            if ($error == 2) {
            ?>
                <div class="mt-2 alert alert-danger alert-dismissible  fade show text-center px-2" role="alert">
                    Duplicate user!
                </div>
            <?php
            } ?>

        </div>
<?php
    }

    public function showLoginPage($error)
    {
        $this->showPage($error);
    }
}
