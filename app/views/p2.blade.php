@extends('_master')	

@section('title')
	Password Generator
@stop


@section('head')
<meta name="description" content="xkcd Style Password Generator">
<meta name="keywords" content="Password Generator" />
<link rel='stylesheet' href='/css/p2style.css' type='text/css'>
@stop


@section('logic')

<?php

if (isset($_GET['countwords'])) 
    {
		$countwords = $_GET['countwords'];
		
		if (!is_numeric($countwords)) 
		{
			 echo "Please enter Number in 'Number of words' <br>!";
		}
	} 
	else 
	{
    $countwords = 1;
	}

if (isset($_GET['lengthpassword'])) 
    {
		$lengthpassword = $_GET['lengthpassword'];
		
		if (!is_numeric($lengthpassword)) 
		{
			 echo "Please enter Number in 'Length of password'  !";		 
		}
	} 
	else 
	{
    $lengthpassword = 6;
	}

if (isset($_GET['uppercase'])) 
	{
    $uppercase=true;
	} 
	else 
	{
    $uppercase=false;
	}

if (isset($_GET['symbol'])) 
	{
    $symbol=true;
	} 
	else 
	{
    $symbol=false;
	}

if (isset($_GET['number'])) 
	{
    $number=true;
	} 
	else 
	{
    $number=false;
	}

if ($words = file(app_path().'/database/p2/words.txt')) 
	{
		$selected_words = [];      
		$symbols = ['!', '@', '#'];
		$numbers = [0,1,2,3,4,5,6,7,8,9];
				
		for($i=0;$i<$countwords; $i++)
		{
		$randomsymbol = rand(0, count($symbols)-1);
		$randomnumber = rand(0, count($numbers)-1);		
		$max = count($words)-1;    
		$rand = rand(0, $max);
		$word  = $words[$rand];
		array_push($selected_words, $word);
		}
	
		if ($uppercase)
		{
			foreach ($selected_words as $index => $word)
			{    
			$selected_words[$index] = ucfirst($word);
			$selected_words[$index] = substr($selected_words[$index],0, $lengthpassword); 
			$selected_words[$index]  = $selected_words[$index].'  ';
			}
		}
		
		if ($symbol) 
		{
			foreach ($selected_words as $index => $word) 
			{		
			$selected_words[$index]  = $symbols[$randomsymbol].$word.'<br>';
			$selected_words[$index] = substr($selected_words[$index],0, $lengthpassword); 
			$selected_words[$index]  = $selected_words[$index].'  ';
			}
		}
		
		if ($number) 
		{
			foreach ($selected_words as $index => $word) 
			{		
			$selected_words[$index]  = $numbers[$randomnumber].$word.'<br>';
			$selected_words[$index] = substr($selected_words[$index],0, $lengthpassword); 
			$selected_words[$index]  = $selected_words[$index].'  ';		
			}
		}

		$password = implode("", $selected_words);

       /* # works only with number of words = 1 
	      $password = str_shuffle($password);	
    	*/
	}
	 ?>
@stop



@section('content')

    <div class="container">
    <h2>xkcd Style Password Generator</h2>
    <h4>This Password Generator generates passwords consisting from common words. Such words are hard to guess (even by brute force), but easy to remember, making them interesting password choices.</h4>
    <h3>Fill Details</h3>
    <form method="GET" action="p2">
    <label name="countwords">Number of words</label>
    <input type="text" id="countwords" name="countwords" value="3"/><br />
    <label name="lengthpassword">Maximum Length of password</label>
    <input type="text" id="lengthpassword" name="lengthpassword" value="4"/><br />
    <label name="uppercase">Upper case First Letter?</label>
    <input type="checkbox" name="uppercase" value="checkbox" <?php echo ($uppercase) ? 'checked = "checked"' : ''; ?>/><br />
    <label name="symbol">Use a symbol?</label>
    <input type="checkbox" name="symbol" value="symbol" /><br />
    <label name="number">Include a number?</label>
    <input type="checkbox" name="number" value="number" /><br />
    <input type="submit" name="submit" value="Generate a new Password"/>
    </form>
    <br />
    <p>Your Password is:</p>
    <p><?php echo ($password) ? $password : ''; ?></p>
    </div>
@stop
