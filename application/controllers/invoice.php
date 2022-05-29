<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('Invoice_model');
	}
	public function index()
	{
		$error = '';
		$success = '';
		$data = array();
		if($this->input->post('createinvoice')){
			if(empty($this->input->post('productname'))){
				$error = 'Please enter productname';
			} else if(empty($this->input->post('quantity'))){
				$error = 'Please enter quantity';
			} else if(empty($this->input->post('unitprice'))){
				$error = 'Please enter unitprice';
			} else if(empty($this->input->post('tax'))){
				$error = 'Please enter tax';
			} else{
				$productname = $this->input->post('productname');
				$quantity = $this->input->post('quantity');
				$unitprice = $this->input->post('unitprice');
				$tax = $this->input->post('tax');
				if(!empty($productname)){
					//add invoice data...
					$invoicedata['invoiceid'] = 'INV'.rand(1000000,99999999);
					$invoicedata['userid'] = 1;//default user id is given as 1
					$invoicedata['status'] = 'Pending';
					$invoiceid = $this->Invoice_model->createInvoice($invoicedata);
					for($i = 0; $i < count($productname); $i++){
						if(!empty($productname[$i])){
							$this->db->trans_begin();
							//add invoice items ...
							$itemsdata['uuid'] = uniqid();
							$itemsdata['invoiceid'] = $invoiceid;
							$itemsdata['productname'] = $productname[$i];
							$itemsdata['quantity'] = $quantity[$i];			
							$itemsdata['unitprice'] = $unitprice[$i];
							$itemsdata['tax'] = $tax[$i];
							$this->Invoice_model->createInvoiceItems($itemsdata);
							if ($this->db->trans_status() === FALSE){
								$this->db->trans_rollback();
							} else {
								$success = 'Invoice created successfully';
								$this->db->trans_commit();
							}
						}
					}
				}
			}
		}
		$data['error'] = $error;
		$data['success'] = $success;
		$this->load->view('addinvoice',$data);
	}
	
	public function listinvoice()
	{
		//userid is taken as 1 for default
		$userid = 1;
		$data['resultinvoice'] = $this->Invoice_model->getInvoiceList($userid);
		$this->load->view('listinvoice',$data);
	}
	
	public function invoicedetails($invoiceid){
		$data['invoice'] = $this->Invoice_model->getInvoiceDetails($invoiceid);
		$data['invoiceitems'] = $this->Invoice_model->getInvoiceItemDetails($invoiceid);
		$this->load->view('invoicedetails',$data);
	}
}
