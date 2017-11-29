<table width="650" align="center">
<tr>
	<td style="background-color: #00aabf; padding: 15px; text-align: center;">
		<img src="http://empazweb.org/img/logo-b.png">
	</td>
</tr>
<tr>
	<td style="background-color: #f2f2f2; padding: 20px; text-align: center;">
		<h2 style="color: #666;">Hola, {{$user->nombre}}</h2>
  <p style="color: #666; text-align: center;">
    Han creado una cuenta para ti en el proyecto Empaz. Para activar tu cuenta, da click en el siguiente enlace:
  </p>
  <p>
    <a style="color: #fff; font-size: 16px; display: block; text-align: center; width: 200px; margin:auto; background-color: #00aabf; padding: 10px 20px; text-decoration: none;" href="{{URL::to('/')}}/users/{{$user->id}}/activate/{{$user->confirmation_code}}">Activar Cuenta</a>
  </p>
  <p style="color: #666; text-align: center;">Luego deberas ingresar a tu cuenta con el usuario y contraseña que te hayan otorgado</p>

	</td>
</tr>

</table>