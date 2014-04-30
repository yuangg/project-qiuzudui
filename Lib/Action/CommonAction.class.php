<?php
class CommonAction extends Action
{
	protected  function checkLogin() {
		if(empty($_SESSION['user']))
		{
			exit;
		}
	}
}
?>