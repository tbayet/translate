<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header>
	<h1>Please Logg in</h1>
</header>
<div id="page">
	<div id="content">
		<table id="logbox">
			<tr>
				<th>Connexion</th>
				<th>Inscription</th>
			</tr>
			<tr>
				<td id="connexion">
					<form>
						<p>
							Username : <input type="text" id="username" /> <br />
							Password : <input type="password" id="password" /> <br />
							<input type="submit" id="submit" value="loggin" />
						</p>
					</form>
				</td>
				<td id="inscription">
					<form>
						<p>
							Username : <input type="text" id="username" /> <br />
							Password : <input type="password" id="password" /> <br />
							Confirm password : <input type="password" id="password" /> <br />
							Email : <input type="mail" id="email" /> <br />
							<input type="submit" id="submit" value="suscribe" />
						</p>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
<footer>
	Developped by Thomas Bayet
</footer>

</body>
</html>