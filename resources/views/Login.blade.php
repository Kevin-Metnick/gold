<!DOCTYPE html>
<html>
	<head>
		<title>
			Login
		</title>
	</head>
	<body>
		<form action='/Login-Opertion' method='post'>
		{{ csrf_field() }}
		<input type="text" name='name'>
		<input type='pass' name='password'>
		<button type='submit'>
		 提交
		</button>
		</form>
			<form action='/Login-Opertion' method='post'>
		{{ csrf_field() }}
		<input type="text" name='name'>
		<input type='password' name='password'>
		<input type='text' name='phone'>
		<input type='text' name='email'>
		<input type='text' name='parent'>
		<button type='submit'>
		 提交
		</button>
		</form>


	</body>
</html>