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
			return $teksSplit[$i];
		// 	echo"{";
		// 	echo $teksSplit[$i];
		// echo "}";
		}
	}
}

function rollingHash($string, $y)
{
	$basis=$y;
	$pjgKarakter=strlen($string);
	{
		$basis=$y;
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

function hasing($teks21,$gram, $y)
{
	$length=strlen($teks21);
	$teksSplit=null;
	if(strlen($teks21) < $gram){
		$teksSplit[]=$teks21;
	}else{
		for($i=0;$i<=$length-$gram;$i++){
			$teksSplit[]=substr($teks21,$i,$gram);
		// return rollingHash($teksSplit[$i], $y);
			echo"";
			echo rollingHash($teksSplit[$i], $y);
			echo ",";
		}
	}
}

function hapus($a)
{
	$y = $a;
	$fg=null;
	$sudah = false;
	for($i=0;$i<count($y);$i++){
		if ($fg!=null){
			foreach ($fg as $row =>$value){
				if ($value ==$y[$i]){
					$sudah=true;
				}
			}
		}
	}
	if ($sudah==false){
		$fg[]=$y[$i];
	}
	$sudah=false;
	{
		return $fg
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

			echo $teksSplit[$i];

		}
	}
}
function hashx($teks,$gram,$y)
{
	$hashGram=null;
	foreach($gram as $a=>$teks){
		$hashGram[]= rollingHash($teks, $y);
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