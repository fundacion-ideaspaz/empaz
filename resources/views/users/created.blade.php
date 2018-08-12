<table width="650" align="center">
<tr>
	<td style="background-color: #00aabf; padding: 15px; text-align: center;">
		<!-- This line must be changed with the server -->
		<img src="http://ec2-18-218-90-62.us-east-2.compute.amazonaws.com/img/logo-b.png">
	</td>
</tr>
<tr>
	<td style="background-color: #f2f2f2; padding: 20px; text-align: center;">
		<h2 style="color: #666;">Estimado/a {{$user->nombre}}</h2>
  <p style="color: #666; text-align: center;">
    Hemos creado una cuenta para usted en la plataforma EmPaz. Para activar su cuenta, por favor haga clic en el siguiente enlace:
  </p>
  <p>
    <a style="color: #fff; font-size: 16px; display: block; text-align: center; width: 200px; margin:auto; background-color: #00aabf; padding: 10px 20px; text-decoration: none;" href="{{URL::to('/')}}/users/{{$user->id}}/activate/{{$user->confirmation_code}}">Activar Cuenta</a>
  </p>
  <p style="color: #666; text-align: center;">Luego puede ingresar a la medición empresarial de EmPaz usando su usuario y contraseña. <strong>Nota</strong>: Para la correcta visualización del cuestionario, se recomienda ingresar desde un computador de escritorio o portátil.</p>
	</td>
</tr>

</table>
