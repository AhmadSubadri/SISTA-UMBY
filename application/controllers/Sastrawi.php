<?php
/**
 * 
 */
class Sastrawi extends CI_Controller
{
	
	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('M_user');
	// 	$this->load->model('M_student');
	// 	if($this->M_user->isNotLogin()) redirect(site_url(''));
	// 	$this->load->library('form_validation');
	// }
	public function stemmer()

	{

		$stemmerFactory = new Sastrawi\Stemmer\StemmerFactory();

		$stemmer = $stemmerFactory->createStemmer();

// stem

		$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';

		$output = $stemmer->stem($sentence);

		echo $output;

		echo "<br>";

//ekonomi indonesia sedang dalam tumbuh yang bangga

		echo $stemmer->stem('Mereka meniru-nirukannya');

//mereka tiru

	}

	public function StopWordRemover(){

//stopword

		$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';

		$stopWordRemoverFactory = new Sastrawi\StopWordRemover\StopWordRemoverFactory();

		$stopword = $stopWordRemoverFactory->createStopWordRemover();

		$outputstopword = $stopword->remove($sentence);

		echo $outputstopword;

//Perekonomian Indonesia sedang pertumbuhan membanggakan

	}
}