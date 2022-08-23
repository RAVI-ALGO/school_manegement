<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <style>
        * {
  transition: .1s ease;
}

body {
  background: #d8d8d8;

  font-family: 'Montserrat';
  margin: 0;
}

a {
  text-decoration: none;
}

.container-shadow {
  position: absolute;
  width: 525px;
  height: 675px;
  left: 50%;
  margin-left: -262.5px;
  margin-top: 60px;
  box-shadow: 0px 30px 50px -20px #000;
}

.container {
  position: absolute;
  width: 525px;
  height: 675px;
  left: 50%;
  margin-left: -262.5px;
  margin-top: 60px;
/*   background: url('https://bit.ly/2kBRtBE'); */
/*   background: #673AB7; */
background-color: #7f53ac;
background-image: linear-gradient(315deg, #7f53ac 0%, #647dee 74%);

  box-shadow: 0px 0px 50px -20px #000;
}

.wrap {
  position: relative;
  width: 400px;
  margin: 0 auto;
}

.headings {
  position: relative;
  margin: 90px auto 70px;
}

.headings > a:first-child {
  margin-left: 20px;
  margin-right: 45px;
}

.headings > a {
  color: rgba(255, 255, 255, 0.7);
  padding-bottom: 10px;
  border-bottom: solid 2px rgba(17, 97, 237, 0);
  display: inline-block;
}

.headings > a:hover {
  color: rgba(255, 255, 255, 1);
}

.headings > a.active {
  color: rgba(255, 255, 255, 1);
  border-bottom: solid 2px rgba(17, 97, 237, 1);
}

.headings > a span {
  font-size: 22px;
  letter-spacing: 1px;
  text-transform: uppercase;
}

label {
  color: rgba(255, 255, 255, 0.8);
  text-transform: uppercase;
  padding: 13px 20px;
  position: relative;
  display: block;
  font-size: 14px;
}

input {
  width: 100%;
  color: #fff;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 1px;
  background: rgba(255, 255, 255, 0.1);
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(255, 255, 255, 0);
  margin-bottom: 10px;
}

input:active,
input:focus {
  border: 2px solid rgba(255, 255, 255, 0.7);
}

#password {
  padding-right: 50px;
}

#password + i {
  color: rgba(255, 255, 255, 0.7);
  font-size: 25px;
  float: right;
  position: relative;
  top: -43px;
  right: 15px;
  cursor: pointer;
}

#password + i:hover {
  color: rgba(255, 255, 255, 1);
}

input[type='checkbox'] {
  width: inherit;
  padding: 0;
  margin: 20px 5px 30px 20px;
}

input[type='checkbox'] + span {
  color: #fff;
}

#rlabel {
  display: inline-block;
  padding: 0;
  top: 1px;
}

#remember:hover,
#rlabel:hover {
  cursor: pointer;
}

input[type='submit'] {
  width: 100%;
  background: #4082f5;
  text-transform: uppercase;
  padding: 12px;
  cursor: pointer;
  box-shadow: 0px 10px 40px 0px rgba(17, 97, 237, 0.4);
}

input[type='submit']:hover {
  background: #5a96ff;
}

#sign-up-form input[type='submit'] {
  margin-top: 50px;
}

footer .hr {
  border-bottom: 2px solid rgba(255, 255, 255, 0.1);
  margin: 60px 0px 40px;
}

footer .fp {
  text-align: center;
}

footer .fp a {
  color: rgba(255, 255, 255, 0.6);
  cursor: pointer;
}

footer .fp a:hover {
  color: rgba(255, 255, 255, 1);
}

#sign-in-form {
  display: block;
}

#sign-up-form {
  display: none;
}

@media (max-width: 524px) {
  .container-shadow {
    width: 400px;
    margin-top: 60px;
    left: 50%;
    margin-left: -200px;
  }
  .container {
    width: 400px;
    margin-top: 60px;
    left: 50%;
    margin-left: -200px;
  }
  .wrap {
    width: 300px;
  }
  footer .hr {
    margin-top: 50px;
  }
}

@media (max-width: 399px) {
  .container-shadow {
    width: 100%;
    margin: 0px;
    left: inherit;
  }
  .container {
    width: 100%;
    margin: 0px;
    left: inherit;
  }
  .wrap {
    width: 80%;
  }
}

@media (max-width:330px) {
  .wrap {
    width: 90%
  }
}
    </style>
    <title>Document</title>
</head>
<body>
<div class="container-shadow">
  </div>
  <div class="container">
    <div class="wrap">
      <div class="headings">
        <a id="sign-in" href="#" class="active"><span>Log In</span></a>
        <a id="sign-up" href="#"><span>Sign Up</span></a>
      </div>
      <div id="sign-in-form">
        <form>
          <label for="username">Username</label>
          <input id="username" type="text" name="username">
          <label for="password">Password</label>
          <input id="password" type="password" name="password">
          <i id="show-pw" class="fa fa-eye"></i>
          <input id="remember" type="checkbox">
          <label for="remember" id="rlabel">Keep me Signed in</label>
          <input type="submit" name="submit" value="Sign in">
        </form>

        <footer>
          <div class="hr"></div>
          <div class="fp"><a href="">Forgot Password?</a></div>
        </footer>
      </div>
      <div id="sign-up-form">
        <form>
          <label for="username">Username</label>
          <input type="text" name="username">
          <label for="password">Password</label>
          <input id="password" type="password" name="password">
          <label for="password0">Re-Enter Password</label>
          <input id="password0" type="password" name="password0">
          <input type="submit" name="submit" value="Create Account">
        </form>
      </div>
    </div>
  </div>
</body>
</html>