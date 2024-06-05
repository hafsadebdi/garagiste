<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@lang('Garagiste')</title>
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: system-ui;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #fff;
  color: black;
  padding: 20px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 20px;
}

.wrapper {
  width: 400px;
  background-color: white;
  border: 2px solid rgb(34, 34, 80);
  color: black;
  border-radius: 12px;
  padding: 30px 40px;
}

.wrapper h1 {
  font-size: 36px;
  text-align: center;
}

.input-box {
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
}

.input-box input {
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgb(34, 34, 80);
  border-radius: 40px;
  font-size: 16px;
  color: black;
  padding: 20px 45px 20px 20px;
}

.input-box input::placeholder {
  color: black;
}

.input-box i {
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;
}

.remember-forgot {
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}

.remember-forgot label input {
  accent-color: blue;
  margin-right: 3px;
}

.remember-forgot a {
  color: black;
  text-decoration: none;
}

.remember-forgot a:hover {
  text-decoration: underline;
}

.btn {
  width: 100%;
  height: 45px;
  background-color: rgb(234, 94, 0);
  color: white;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  font-weight: 600;
}

.btn:hover {
  color: rgb(234, 94, 0);
  background: white;
}

.register-link {
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;
}

.register-link p a {
  color: rgb(9, 12, 67);
  text-decoration: none;
  font-weight: 600;
}

.register-link p a:hover {
  text-decoration: underline;
}

.mechanic-image {
  width: 500px;
  height: auto;
}

.wrapper1 {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 110vh;
  background: rgba(39, 39, 39, 0.4);
}

.nav {
  position: fixed;
  top: 0;
  display: flex;
  justify-content: space-around;
  width: 100%;
  height: 100px;
  line-height: 100px;
  background: transparent;
  z-index: 100;
}

.nav-logo p {
  color: white;
  font-size: 25px;
  font-weight: 600;
}

.nav-menu ul {
  display: flex;
}

.nav-menu ul li {
  list-style-type: none;
}

.nav-menu ul li .link {
  text-decoration: none;
  font-weight: 500;
  color: #fff;
  padding-bottom: 15px;
  margin: 0 25px;
}

.link:hover,
.active {
  border-bottom: 2px solid #fff;
}

    /* style nav */

     .wrapper1{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
    background: rgba(39, 39, 39, 0.4);
}
.nav{
    position: fixed;
    top: 0;
    display: flex;
    justify-content: space-around;
    width: 100%;
    height: 100px;
    line-height: 100px;
    background:  transparent;
    z-index: 100;
}
.nav-logo p{
    color: white;
    font-size: 25px;
    font-weight: 600;
}
.nav-menu ul{
    display: flex;
}
.nav-menu ul li{
    list-style-type: none;
}
.nav-menu ul li .link{
    text-decoration: none;
    font-weight: 500;
    color: #fff;
    padding-bottom: 15px;
    margin: 0 25px;
}
.link:hover, .active{
    border-bottom: 2px solid #fff;
}

  </style>
</head>
<body>
    <div class="wrapper1">
        <nav class="nav">
            <!-- <div class="nav-logo">
                <img src="{{asset('dist/img/AdminLTELogo.jpeg')}}" alt="" width="100px" height="80px" >
            </div> -->
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="#" class="link active"></a></li>
                    <li><a href="#" class="link"></a></li>
                    <li><a href="#" class="link"></a></li>
                </ul>
            </div>


        </nav>
    </div>
      <img src="{{asset('https://i.pinimg.com/564x/dc/5b/57/dc5b5730b4c45d0d8f68503d67d46d1a.jpg')}}" alt="Mechanic" class="mechanic-image">

  <div class="wrapper">
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <h1 style="font-weight:bolder; font-size:30px ;color:rgb(9, 12, 67)">Se connecter</h1>
      <div class="input-box">
        <input type="email" placeholder="Email" id="email" name="email" requiblue autofocus>
        <i class='bx bxs-envelope' style="color:rgb(234, 94, 0)"></i>
        <div style="color:blue">
          @error('email')
            {{ $message}}
          @enderror
        </div>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Mot de passe" name="password" id="password" requiblue>
        <i class='bx bxs-lock-alt' style="color: rgb(234, 94, 0)"></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="{{ route('forget.password.get') }}">Mot de passe oublié</a>
      </div>
      <button type="submit" class="btn">Se connecter</button>
      <div class="register-link">
        <p>Vous n'avez pas un compte ? <a href="{{'registration'}}">S'inscrire</a></p>
      </div>
    </form>
  </div>
</body>
</html>
