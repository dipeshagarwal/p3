@extends('_master')	

@section('title')
	P3 Developer's Best Friend
@stop


@section('head')
	<meta name='viewport' content='width=device-width, initial-scale=1'>    
	<link rel='stylesheet' href='/css/indexstyle.css' type='text/css'>
@stop


@section('body')
    <div class='container'>
        
    <h1>Developer's Best Friend</h1>
    
    <h2>Lorem Ipsum Generator</h2>
    <blockquote>
        In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the graphic elements of a document or visual presentation. 
        By replacing the distraction of meaningful content with filler text of scrambled Latin it allows viewers to focus on graphical elements such as font, typography, and layout.
    </blockquote>
    
    <p>Create random filler text for your applications.</p>
    <a href='/lorem-ipsum'>Generate some text...</a>
    
    <br>
    
    <h2>Random User Generator</h2>
    <p>Create random user data for your applications. Like Lorem Ipsum, but for people.</p>
    <a href='/user-generator'>Generate some users...</a>
    
    
    <h2>xkcd Style Password Generator</h2>
    <p>This Password Generator generates passwords consisting from common words. Such words are hard to guess (even by brute force), but easy to remember, making them interesting password choices.</p>
    <a href='/p2'>Generate Password...</a>
        
    </div>
    
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
    <script src='//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>

@stop