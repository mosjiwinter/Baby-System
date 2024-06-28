<!DOCTYPE html>
<html>
<head>
	<title></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


	<link href="css/signin.css" rel="stylesheet">




</head>
<body>


	<body class="text-center">
    
<main class="form-signin">
  <form method="post" action="chk_login.php">
   
    <img class="mb-4" src="logo3.svg" alt="" width="300" height="300">
    
    <h1 class="h3 mb-3 fw-normal">Project Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="input_user" name="input_user" placeholder="Username" maxlength="25" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="input_pass" name="input_pass" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button type="submit" class="w-100 btn btn-success btn-lg">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021 - Notification and children tracking through Line Beacon.</p>
  </form>
  </form>
</main>




</body>
</html>