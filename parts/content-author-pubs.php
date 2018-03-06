<div class="col s12">

<?php
// , '0000-0002-1363-5027' 0000-0003-4883-1375

$idNum = get_field('orcid_id', 'user_' . $author_id  . '');

$orcidID = array();
array_push($orcidID, $idNum);

$pubLimit = 30;
$ordem = 'pessoa';

//fetch($orcidID, 'nome', $pubLimit);
//fetch($orcidID, 'bio', $pubLimit);
fetch($orcidID, 'publica', $pubLimit, $ordem);

function cURL($url) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	return curl_exec($ch);
	curl_close($ch);
}


function fetch($orcidID, $elementID, $pubLimit, $ordem) {
	if ($elementID == 'publica') {
		$profileContent = [];
		foreach ($orcidID as $id) {
			$url = 'https://pub.orcid.org/v2.0/' . $id . '/works';
			$out = cURL($url);
			array_push($profileContent, $out);
		}
		$sliceProfile = 2;
	} else {
		foreach ($orcidID as $id) {
			$url = 'https://pub.orcid.org/v2.0/' . $id . '/person';
			$output = cURL($url);
		}
		$sliceProfile = 1;
	}


	$z = -1;
	$arrayPublica = array ();

	foreach ($profileContent as $output) {
	$z++;

	$jsonInput = json_decode($output, true);

	if ($sliceProfile == 1) {

		// Biografia
		if ($elementID == 'bio'){
			echo '<h2>Biografia</h2>';
			echo $jsonInput['biography']['content'];
		}

	} else {
		$pubIDs = [];
		$y = 0;
			foreach ($jsonInput['group'] as $entry1) {
				foreach ($entry1['work-summary'] as $entry2) {
					if($y==$pubLimit) {
						break;
					}
					array_push($pubIDs, $entry2['put-code']);
					$y++;
				}
			}

			// Chamar a função para obter Publications
			$dadosJournal = fetchPubArray($orcidID[$z], $pubIDs, $pubLimit);
			foreach ($dadosJournal as $entry1) {
				array_push($arrayPublica, $entry1);
			}
	}
}
	// Chamar a função para escrever HTML
				escreve($arrayPublica, $ordem);
}


function fetchPubArray(&$orcidID, &$pubIDs, &$pubLimit) {
	$array = array (
	);


	$i = 0;
	$varNum = 1;
	foreach ($pubIDs as $pubID) {
		$i++;
		if ($i == 1) {
			${'array' . $varNum} = [];
		} elseif ($i == 50) {
			$varNum++;
			${'array' . $varNum} = [];
			$i = 0;
		}
		array_push(${'array' . $varNum}, $pubID);
	}


	$out = cURL('https://pub.orcid.org/v2.0/' . $orcidID . '/person');
	$jsonInputNome = json_decode($out, true);

	if (!is_null($jsonInputNome['name']['credit-name'])) {
		$pessoa = $jsonInputNome['name']['credit-name']['value'];
	} else {
		$nome1 = $jsonInputNome['name']['given-names']['value'];
		$nome2 = $jsonInputNome['name']['family-name']['value'];
		$pessoa = $nome1 . ' ' . $nome2;
	}


	for ($i=1; $i <= $varNum ; $i++) {


	$str = implode (",", ${'array' . $i});
	$urlPubName = 'https://pub.orcid.org/v2.0/' . $orcidID . '/works/' . $str;
    $output = cURL($urlPubName);

    $jsonInput = json_decode($output, true);

    foreach ($jsonInput['bulk'] as $entry1) {

    ${'array' . $i} = array (
		'id' => '',
		'titulo' => '',
		'journal' => '',
		'source' => '',
		'data' => '',
		'tipo' => '',
		'url' => ''
	);


	${'array' . $i}['id'] = $pessoa;

	 foreach ($entry1['work']['title']['title'] as $tituloPub) {
	 	$journalFetchTitulo = $tituloPub;
	 	${'array' . $i}['titulo'] = $journalFetchTitulo;
	}

	//var_dump($entry1['work']);

	if (!is_null($entry1['work']['journal-title'])) {
	foreach ($entry1['work']['journal-title'] as $tituloJour) {
		$journalFetchNome = $tituloJour;
		${'array' . $i}['journal'] = $journalFetchNome;
	}
	} else {
	}

	if (!is_null($entry1['work']['source'])) {
	foreach ($entry1['work']['source']['source-name'] as $sourceName) {
		$journalFetchSource = $sourceName;
		${'array' . $i}['source'] = $journalFetchSource;
	}
	} else {
	}

	if (!is_null($entry1['work']['publication-date'])) {
		if (!is_null($entry1['work']['publication-date']['year'])) {
			foreach ($entry1['work']['publication-date']['year'] as $pubData) {
				$journalFetchData = $pubData;
				${'array' . $i}['data'] = $journalFetchData;
			}
		} else {
		}
	} else {
	}



	$journalFetchTipo = $entry1['work']['type'];
	$journalTipoUnder = str_replace('_', ' ', $journalFetchTipo);
	$journalTipoCapital = ucwords(strtolower($journalTipoUnder));
	${'array' . $i}['tipo'] = $journalTipoCapital;


	if (!is_null($entry1['work']['url'])) {
	foreach ($entry1['work']['url'] as $pubURL) {
		$journalFetchURL = $pubURL;
		${'array' . $i}['url'] = $journalFetchURL;
		array_push($array, ${'array' . $i});
	}
	} else {
	}
	}
	return $array;
	}
}


function escreve($arrayPublica, $ordem) {
	echo '<meta charset="UTF-8">';

	if ($ordem == 'data') {
		uasort($arrayPublica, 'cmpData');
	} elseif ($ordem == 'tipo') {
		uasort($arrayPublica, 'cmpTipo');
	} elseif ($ordem == 'pessoa') {
		uasort($arrayPublica, 'cmpPessoa');
	}

	echo '<h3 class="col s12 light center">Publications</h3><ul id="publications" class="collection">';
	foreach ($arrayPublica as $entry1) {

			if (isset($entry1['titulo'])) {
				$titulo = $entry1['titulo'];
			} else {
				continue;
			}
			if (isset($entry1['journal'])) {
				$journal = $entry1['journal'];
			}
			if (isset($entry1['id'])) {
				$pessoa = $entry1['id'];
			}
			if (isset($entry1['data'])) {
				$data = $entry1['data'];
			}
			if (isset($entry1['tipo'])) {
				$tipo = $entry1['tipo'];
			}
			if (isset($entry1['url'])) {
				$url = $entry1['url'];
			}
			if (isset($entry1['source'])) {
				$source = $entry1['source'];
			}


			echo '<li class="collection-item avatar"><i class="material-icons circle pink">bookmark_border</i>';
			echo '<span class="title"><a href="' . $url . '">' . $titulo . '</a></span>';
			echo '<p><em>' . $journal;
			echo ' (' . $data . ')</em></br>';
			echo '</p>';
			echo '<a href="' . $url .'" class="secondary-content"><i class="material-icons">link</i></a></li>';

	}
	echo '</ul>';
}


// Ordenações
// Data de Publication
function cmpData($a, $b) {

    if ($a['data'] < $b['data']) {
        return 1;
    } else if ($a['data'] > $b['data']) {
        return -1;
    } else {
        return 0;
    }
}

// Tipo de Publication > Data
function cmpTipo($a, $b) {

    if ($a['tipo'] < $b['tipo']) {
        return -1;
    } else if ($a['tipo'] > $b['tipo']) {
        return 1;
    } else {

        if ($a['data'] < $b['data']) {
        return 1;
    } else if ($a['data'] > $b['data']) {
        return -1;
    } else {
        return 0;
    };
    }
}

// Pessoa
function cmpPessoa($a, $b) {

    if ($a['id'] < $b['id']) {
        return -1;
    } else if ($a['id'] > $b['id']) {
        return 1;
    } else {

        if ($a['data'] < $b['data']) {
        return 1;
    } else if ($a['data'] > $b['data']) {
        return -1;
    } else {
        return 0;
    };
    }
}
?>
</div>
