<table>
<tr>
	<td style="background-color: #00aabf; padding: 15px;">
		<img src="http://empazweb.org/img/logo-b.svg">
	</td>
</tr>
<tr>
	<td>
		<h2 style="color: #666;">Hola, {{$user->nombre}}</h2>
  <p style="color: #666;">
    Han creado una cuenta para ti en el proyecto Empaz. Para activar tu cuenta, da click en el siguiente enlace:
  </p>
  <p>
    <a style="color: #fff; display: block; width: 200px; background-color: #00aabf; padding: 10px 20px; text-decoration: none;" href="{{URL::to('/')}}/users/{{$user->id}}/activate/{{$user->confirmation_code}}">Activar Cuenta</a>
  </p>
  <p style="color: #666;">Luego deberas ingresar a tu cuenta con el usuario y contraseña que te hayan otorgado</p>

	</td>
</tr>

</table>