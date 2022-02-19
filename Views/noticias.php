<?php
	echo "<pre>";
	print_r($this->dados2);
	echo "</pre>";


	foreach ($this->dados2 as $key) {
		echo "ID: {$key['Id']} Titulo: {$key['titulo']} Imagem: {$key['imagem']} Texto: {$key['texto']} <br><br>";
	}
?>

