<?php
class JP1
{
	public $API = 'gt11111g388';
	
	public function request($price = NULL , $order_id = NULL , $callback = NULL)
	{
		try
		{
		$client = new jahanpayApi ;
		$api = $this->API;
		$amount = $price ; //Tooman
		$callbackUrl = $callback;
		$orderId = $order_id;
		$txt = Rh::user_ip();
		$res = $client->call('requestpayment',array($api , $amount , $callbackUrl , $orderId , $txt));
		
		}
		catch(Exception $e)
		{
			$res= -6;
			return -6;
		}
		
		return $res;
	}
	
	public $SaleReferenceId = '';
	public function verify($price = NULL ,$order_id = NULL , $au = NULL)
	{
		
		$this->SaleReferenceId = $au;
		$client = new jahanpayApi ;
		$api = $this->API;
		$amount = $price ; //Tooman
		$result = $client->call('verification',array($api,$amount,$au));
		if($result==1)
			return true;
		return false;
		
	}
	public function go2bank($id='')
	{
		$url = "http://jahanpay.org/index.php/pay_invoice/{$id}";
		header("location: $url");
		die($url);
	}
}


class jahanpayApi
{
	private 
			$apiUrl = 'http://jahanpay.org/index.php/api' ,
			$timeOut = 30 ; //second
	
	protected
			$api ='';
	
	
	public function requestpayment($api=0,$amount=0,$callback='',$order_id=0,$description='',$bank='auto')
	{
		$data = array(
			'method'=>'requestpayment' ,
			'api'=>$api ,
			'amount'=>$amount ,
			'order_id'=>$order_id ,
			'description'=>$description ,
			'bank'=>$bank ,
			'callback'=>$callback ,
		);
		return $this->checkCUrl() ? $this->sendCurl($data):$this->sendContent($data);
	}
	
	public function verification($api=0,$amount=0,$au='')
	{
		$data = array(
			'method'=>'verification' ,
			'api'=>$api ,
			'amount'=>$amount ,
			'au'=>$au ,
		);
		return $this->checkCUrl() ? $this->sendCurl($data):$this->sendContent($data);
	}
	
	public function call($method='',array $arr=array())
	{
		if($method == 'requestpayment')
		{
			$_ = array();
			for($i=0;$i<6;$i++)
			{
				$_[$i] = isset($arr[$i])?$arr[$i]:NULL;
			}
			return $this->requestpayment($_[0],$_[1],$_[2],$_[3],$_[4],$_[5]);
		}
		else
		{
			$_ = array();
			for($i=0;$i<3;$i++)
			{
				$_[$i] = isset($arr[$i])?$arr[$i]:NULL;
			}
			return $this->verification($_[0],$_[1],$_[2]);
		}
	}
	
	
	
	private function checkCUrl()
	{
		if(function_exists('curl_init') and extension_loaded('curl'))
			return true;
		return false;
	}
	
	private function sendCurl( array $postdata = array())
	{
		$data = array();
		foreach($postdata as $key=>$val)
		{
			$data[] = "{$key}=" . urlencode($val);
		}
		
		$do = curl_init();
		curl_setopt($do,CURLOPT_URL,$this->apiUrl.'?'.join('&',$data));
		curl_setopt($do, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($do,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($do, CURLOPT_CONNECTTIMEOUT, $this->timeOut);
		$response = curl_exec($do);
		curl_close($do);
		return $response;
	}
	
	private function sendContent(array $postdata = array())
	{
		$data = array();
		foreach($postdata as $key=>$val)
		{
			$data[] = "{$key}=" . urlencode($val);
		}
		return file_get_contents($this->apiUrl.'?'.join('&',$data));

	}
}
