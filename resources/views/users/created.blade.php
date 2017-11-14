<div>
  <h2>Hola, {{$user->nombre}}</h2>
  <p>
    Han creado una cuenta para ti en el proyecto Empaz. Para activar tu cuenta, da click en el siguiente enlace:
  </p>
  <p>
    <a href="{{URL::to('/')}}/users/{{$user->id}}/activate/{{$user->confirmation_code}}">Activar Cuenta</a>
  </p>
  <p>Luego deberas ingresar a tu cuenta con el usuario y contraseña que te hayan otorgado</p>
</div>