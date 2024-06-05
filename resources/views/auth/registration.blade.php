<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@lang("Garagiste")</title>
  @vite(['resources/js/app.js','resources/css/app.css'])
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
    .wrapper {
      width: 420px;
      background-color: white;
      border: 2px solid rgb(9, 12, 67);
      color: black;
      border-radius: 12px;
      padding: 30px 40px;
      margin-right: 20px;
      height: 90vh;
    }
    .wrapper h1 {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }
    .input-box {
      position: relative;
      width: 100%;
      height: 30px;
      margin: 25px 0;
    }
    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      border: 2px solid rgb(9, 12, 67);
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
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }
    .remember-forgot {
      display: flex;
      justify-content: space-between;
      font-size: 14.5px;
      margin: -10px 0 15px;
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
      color:white;
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
      margin: 10px 0 5px;
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
      width: 400px;
      height: auto;
      max-height: 100%;
      margin-left: 20px;
    }


  </style>
</head>
<body>

<img src="https://i.pinimg.com/564x/dc/5b/57/dc5b5730b4c45d0d8f68503d67d46d1a.jpg" alt="Mechanic" class="mechanic-image">
<div class="wrapper">
  <form method="POST" action="{{ route('register.post') }}">
    @csrf
    <h1 style="font-weight:bolder; font-size:30px ;color:rgb(9, 12, 67)">S'inscrire</h1>
    <div class="input-box">
      <input type="text" placeholder="Nom complet" id="name" name="name" required autofocus>
      <i class='bx bxs-user' style="color: rgb(234, 94, 0)"></i>
      @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="email" placeholder="Email" id="email" name="email" required>
      <i class='bx bxs-envelope' style="color: rgb(234, 94, 0)"></i>
      @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="text" placeholder="Prenom" id="prenom" name="prenom" required>
      <i class='bx bxs-user' style="color:rgb(234, 94, 0)"></i>
      @if ($errors->has('prenom'))
        <span class="text-danger">{{ $errors->first('prenom') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="text" placeholder="Nom" id="nom" name="nom" required>
      <i class='bx bxs-user' style="color:rgb(234, 94, 0)"></i>
      @if ($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="text" placeholder="Adresse" id="adresse" name="adresse" required>
      <i class='bx bxs-home' style="color: rgb(234, 94, 0)"></i>
      @if ($errors->has('adresse'))
        <span class="text-danger">{{ $errors->first('adresse') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="text" placeholder="Telephone" id="telephone" name="telephone" required>
      <i class='bx bxs-phone'style="color: rgb(234, 94, 0)"></i>
      @if ($errors->has('telephone'))
        <span class="text-danger">{{ $errors->first('telephone') }}</span>
      @endif
    </div>
    <div class="input-box">
      <input type="password" placeholder="Mot de passe" name="password" id="password" required>
      <i class='bx bxs-lock-alt'style="color: rgb(234, 94, 0)"></i>
      @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>
    <button type="submit" class="btn">S'inscrire</button>
    <div class="register-link">
      <p>Vous avez déjà un compte ? <a href="{{route('login')}}">Se connecter</a></p>
    </div>
  </form>
</div>
</body>
</html>
