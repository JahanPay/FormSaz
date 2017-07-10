<?php
class JP2
{
	public $API = 'gt11111g388';
	
	private $go = array();
	
	public function request($amount = NULL , $order_id = NULL , $callback = NULL)
	{
		$client = new SoapClient("http://www.jpws.me/directservice?wsdl");
		
		$res = $client->requestpayment($this->API , $amount , $callback , $order_id );
		if($res['result']!=1)
		{
			$res = array_map('urldecode',$res);
			print_r($res);
			die;
		}
		else
		{
			$this->go[$res['au']] = "please w8...<div style='display:none'>".$res['form']."<script language='javascript'>document.jahanpay.submit()</script>";
			return $res['au'];
		}
	}
	
	public $SaleReferenceId = '';
	public function verify($price = NULL ,$order_id = NULL , $au = NULL)
	{
		$client = new SoapClient("http://www.jpws.me/directservice?wsdl");
			
			$result = $client->verification($this->API , $price , $au , $order_id, $_POST + $_GET );
			if( ! empty($result) and $result['result']==1)
				return true;
			return false;
		
	}
	public function go2bank($id='')
	{
		die($this->go[$id]);
	}
}