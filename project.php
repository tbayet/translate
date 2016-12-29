<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header>
	<h1>$user['name'] - $project['name']</h1>
</header>
<div id="page">
	<div id="content">
	</div>
</div>
<footer>
	<a href="http://translate.yandex.com/" target="_blank">Powered by Yandex.Translate</a>
</footer>

<script>
	var	srt_ar = <?php
		$srt_ar = array();
		$file = fopen("./files/test.srt", "r");
		$nb;
		$buff;
		$i;

		while ($nb = fgets($file))
		{
			$nb = substr($nb, 0, strlen($nb) - 2);
			if (is_numeric($nb))
			{
				$nb = intval($nb) - 1;
				$i = 0;
				$srt_ar[$nb] = array();
				$buff = fgets($file);
				$srt_ar[$nb][$i++] = substr($buff, 0, strlen($buff) - 2);
				while(($buff = fgets($file)) && strcmp($buff, "\r\n") !== 0)
					$srt_ar[$nb][$i++] = utf8_encode(substr($buff, 0, strlen($buff) - 2));
			}
		}
		echo json_encode($srt_ar);
		fclose($file);
	?>;
	var	i = 0;
	var j;
	var div, para, para2, title, input, inputtrad, entete;
	var content = document.getElementById("content");
	var p_text;

	//document.write(srt_ar.toString());
	while (srt_ar[i])
	{
		//adding a div
		div = document.createElement("div");
		div.className = "element";
		content.appendChild(div);

		//adding number
		entete = document.createElement("div");
		entete.className = "entete";
		div.appendChild(entete);
		title = document.createElement("h3");
		entete.appendChild(title);
		p_text = document.createTextNode(i + 1);
		title.appendChild(p_text);

		j = 0;
		//adding time
		title = document.createElement("h4");
		div.appendChild(title);
		p_text = document.createTextNode(srt_ar[i][j++]);
		title.appendChild(p_text);

		while (srt_ar[i][j])
		{
			//adding text
			para = document.createElement("p");
			div.appendChild(para);
			p_text = document.createTextNode(srt_ar[i][j]);
			para.appendChild(p_text);
			//adding trad
			para2 = document.createElement("p");
			div.appendChild(para2);
			inputtrad = document.createElement("input");
			inputtrad.type = "text";
			inputtrad.className = "trad";
			inputtrad.disabled = true;
			//---->translateText(srt_ar[i][j], "fr", inputtrad);
			para2.appendChild(inputtrad);
			//adding input
			input = document.createElement("input");
			input.type = "text";
			input.className = "result";
			div.appendChild(input);
			j++;
		}
		i++;
	}
	function translateText(textAPI, langAPI, inputtrad)
	{
		var keyAPI = "trnsl.1.1.20161229T041736Z.65dd058529799b6b.cd475f6e9c57bd9632ed3b86bcca91c9fff3b0db";
		var url = "https://translate.yandex.net/api/v1.5/tr.json/translate";

		var xhr = new XMLHttpRequest();
		var data = "key="+keyAPI+"&text="+textAPI+"&lang="+langAPI;

		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);
		xhr.onreadystatechange = function() {
			if (this.readyState==4 && this.status==200) {
				var res = this.responseText;
				var json = JSON.parse(res);
				if (json.code == 200) {
					inputtrad.value = json.text[0];
					inputtrad.size = (json.text[0].length).toString();
				}
				else {
					inputtrad.value = "Error Code: " + json.code;
				}
			}
		}
	}
</script>

</body>
</html>