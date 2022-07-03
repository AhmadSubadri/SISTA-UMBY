<?php
function hapus_simbol($result) {
	$result = strtolower($result);
	$result = preg_replace('/&amp;.+?;/', '', $result);
	$result = preg_replace('/\s+/', '', $result);
	$result = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '+', $result);
	$result = preg_replace('|-+|', '', $result);
	$result = preg_replace('/&amp;#?[a-z0-9]+;/i','',$result);
	$result = preg_replace('/[^%A-Za-z0-9 _-]/', '', $result);
	$result = trim($result, '');
	return $result;
}

function kgram($teks21,$gram)
{
	$length=strlen($teks21);
	$teksSplit=null;
	if(strlen($teks21) < $gram){
		$teksSplit[]=$teks21;
	}else{
		for($i=0;$i<=$length-$gram;$i++){
			$teksSplit[]=substr($teks21,$i,$gram);
			echo"{";
			echo $teksSplit[$i];
			echo "}";
		}
	}
}
function kgrams($teks21,$gram)
{
	$length=strlen($teks21);
	$teksSplit=null;
	if(strlen($teks21) < $gram){
		$teksSplit[]=$teks21;
	}else{
		for($i=0;$i<=$length-$gram;$i++){
			$teksSplit[]=substr($teks21,$i,$gram);
			echo"{";
			echo $teksSplit[$i];
			
			echo "}";
		}
	}
}
function rollingHash($string, $h4nk)
{
	$basis=$h4nk;
	$pjgKarakter=strlen($string);
	{
		$basis=$h4nk;
		$pjgKarakter=strlen($string);
		$hash=0;
		for ($i=0;$i<$pjgKarakter;$i++){
			$ascii=ord($string[$i]);
			$hash+=$ascii*pow($basis,$pjgKarakter-($i+1));
		}
		$a=$pjgKarakter-2;
		$ascii1=ord($string[$a]);
		$c=$pjgKarakter-1;
		$ascii2=ord($string[$c]);
		$b=$ascii1*$basis+($ascii2);
		return $hash + $b;
	}
}

function katahubung($stringg) {
       
        $stringg = str_replace(' ', '', $stringg);
        return $stringg;
}

function strip_stopwords($str = "")
{
  global $stopwords;

  // 1.) break string into words
  // [^-\w\'] matches characters, that are not [0-9a-zA-Z_-']
  // if input is unicode/utf-8, the u flag is needed: /pattern/u
  $words = preg_split('/[^-\w\']+/', $str, -1, PREG_SPLIT_NO_EMPTY);

  // 2.) if we have at least 2 words, remove stopwords
  if(count($words) > 1)
  {
    $words = array_filter($words, function ($w) use (&$stopwords) {
      return !isset($stopwords[strtolower($w)]);
      # if utf-8: mb_strtolower($w, "utf-8")
    });
  }

  // check if not too much was removed such as "the the" would return empty
  if(!empty($words))
    return implode(" ", $words);
  return $str;
}

function clean($string) {
       $string = strtolower($string);
       $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);
       $string= preg_replace('/[0-9]+/', '', $string);
        $string = str_replace('-',' ',$string);
    return $string;
}

function hasing($teks21,$gram, $h4nk)
{
	$ngrams = array();
	$len = strlen($teks21);
	for($i = 0; $i < $len; $i++) {
		if($i > ($gram - 2)) {
			$ng = '';
			for($j = $gram-1; $j >= 0; $j--) {
				$ng .= $teks21[$i-$j]; 
			}
			$ngrams[] = $ng;
		}
	}
	$roll_hash = array();  
	foreach($ngrams as $car){
		$roll_hash[] = char2hash($car,$h4nk);   
	}

	return $roll_hash;
}

function char2hash($string,$prima) {
      
        if (strlen($string) == 1) {
                return ord($string);
        } else {
                $result = 0;
                $length = strlen($string);
                for ($i = 0; $i < $length; $i++) {
                        $result += ord(substr($string, $i, 1)) * pow($prima, $length-$i-1);
                }
                
//                        return $result % 10007;
                return $result;
        }
}

// require_once __DIR__ . '\vendor\autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container
// $stemmerFactory = new Sastrawi\Stemmer\StemmerFactory();
// $stemmer  = $stemmerFactory->createStemmer();

function hapus($a)
{
	$h4nk = $a;
	$fingerPrint=null;
	$sudah = false;
	for($i=0;$i<count($h4nk);$i++){
		if ($fingerPrint!=null){
			foreach ($fingerprint as $row =>$value){
				if ($value ==$h4nk[$i]){
					$sudah=true;
				}
			}
		}
	}
	if ($sudah==false){
		$fingerPrint[]=$h4nk[$i];
	}
	$sudah=false;
	{
		return $fingerPrint
		;
	}
}
function h4nkhapus($teks21,$gram)
{
	$length=strlen($teks21);
	$teksSplit=null;
	if(strlen($teks21) < $gram){
		$teksSplit[]=$teks21;
	}else{
		for($i=0;$i<=$length-$gram;$i++){
			$teksSplit[]=substr($teks21,$i,$gram);

			// echo $teksSplit[$i];

		}
	}
}
function hashx($teks,$gram,$h4nk)
{
	$hashGram=null;
	foreach($gram as $a=>$teks){
		$hashGram[]= rollingHash($teks);
	}
	return $hashGram;
}

function fingerPrint($hash1,$hash2)
{
	$fingerPrint=null;
	$hashUdahDicek=null;
	$sama=false;
	$countHash1=count($hash2);
	for ($i=0; $i<count($hash1);$i++){
		for($j=0;$j<$countHash1;$j++){
			if($hash1[$i]==$hash2[$j]){
				$fingerPrint[]=$hash1[$i];
			}
		}
	}
	return $fingerPrint;
}
?>