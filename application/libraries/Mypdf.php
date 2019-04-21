<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
class Mypdf extends Dompdf
{
	public $filename;
	protected $ci;

	public function __construct()
	{
		parent::__construct();
		$this->filename = "laporan.pdf";
	}

	protected function ci()
	{
		return get_instance();
	}

	public function load_view($view, $data = array())
	{
		$html = $this->ci()->load->view($view,$data,TRUE);
		$this->load_html($html);
		$this->render();
		$this->stream($this->filename, array("Attachment" => false));
	} 
}

?>