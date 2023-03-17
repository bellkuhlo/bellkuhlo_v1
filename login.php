<?php
// templates/admin/login.php
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URLROOT; ?>/bellkuhlo/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/bellkuhlo/templates/admin/css/admin.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URLROOT; ?>/bellkuhlo/controllers/AdminController.php" method="POST">
                            <div class="form-group">
                                <label for="username">Benutzername:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/bellkuhlo/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
