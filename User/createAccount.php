<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <H1>Create new Account</H1>
                <form action= "processCreate.php" method="post">
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div>
                        <label for="psw" class="form-label">Pass word</label>
                        <input type="password" name="psw" id="psw" class="form-control">
                    </div>
                    <div>
                        <label for="confpsw" class="form-label">Confirm Password</label>
                        <input type="password" name="confpsw" id="confpsw" class="form-control">
                    </div>
                    <div>
                        <label for="fullname" class="form-label">Full name</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                    <div>
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="create" class="btn btn-primary mt-3"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>