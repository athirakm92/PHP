<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	public function createInvoice($invoicedata){
		$this->db->insert('invoice',$invoicedata);
		return $this->db->insert_id();
	}
	
	public function createInvoiceItems($itemsata){
		$this->db->insert('invoiceitems',$itemsata);
		return true;
	}
	
	public function getInvoiceList($userid){
		$this->db->select('id,invoiceid,createdon');    
		$this->db->from('invoice');
		$this->db->where('invoice.userid',$userid);
		return $this->db->get()->result();
	}
	
	public function getInvoiceDetails($invoiceid){
		$this->db->select('invoice.id,invoice.invoiceid,invoice.createdon,users.name as username,users.email,users.address,users.phonenumber');    
		$this->db->from('invoice');
		$this->db->join('users', 'invoice.userid = users.id');
		$this->db->where('invoice.id',$invoiceid);
		return $this->db->get()->row();
	}
	
	public function getInvoiceItemDetails($invoiceid){
		$this->db->select('productname,quantity,unitprice,tax,invoice.id,invoice.invoiceid,invoice.createdon,users.name as username,users.email,users.address,users.phonenumber');    
		$this->db->from('invoice');
		$this->db->join('invoiceitems', 'invoice.id = invoiceitems.invoiceid');
		$this->db->join('users', 'invoice.userid = users.id');
		$this->db->where('invoice.id',$invoiceid);
		return $this->db->get()->result();
	}
}
