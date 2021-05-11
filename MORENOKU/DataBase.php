<?php
	/**
	 * 
	 */
	class DataBase
	{
		function connect(){
			$con1 = mysqli_connect("localhost","root","");
			mysqli_select_db($con1,"pwd_g1");
			return($con1);
		}
	}