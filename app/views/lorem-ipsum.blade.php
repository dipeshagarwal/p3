@extends('_master')	

@section('title')
	Lorem Ipsum Generator
@stop


@section('head')
        <meta name="description" content="Lorem Ipsum Generator">
        <meta name="keywords" content="Lorem Ipsum Generator" />
        <link rel='stylesheet' href='/css/loremstyle.css' type='text/css'>
@stop


@section('content')
 <div class="container">
                <h2>Lorem Ipsum Generator</h2>
                <blockquote>
	In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the graphic elements of a document or visual presentation. 
	By replacing the distraction of meaningful content with filler text of scrambled Latin it allows viewers to focus on graphical elements such as font, typography, and layout.
				</blockquote>
                <h3>Fill Details</h3>
                
                	{{ Form::open(array('url' => '/lorem-ipsum', 'method' => 'GET')) }}
                    {{ Form::label('noofparagraphs','How many paragraphs do you want?') }}
                    {{ Form::text('noofparagraphs'); }}<br />
                    {{ Form::submit('Generate!'); }}
                    {{ Form::close() }}
                <br />
  @stop  
              
 @section('logic')               
                <p><?php 
                
                    if (isset($_GET['noofparagraphs'])) 
                        {
                            $noofparagraphs = $_GET['noofparagraphs'];
                            
                            if (!is_numeric($noofparagraphs)) 
                            {
                                 echo "Please enter Number in 'How many paragraphs do you want'  !";		 
                            }
                        } 
                    else 
                        {
                        $noofparagraphs = 6;
                        }	     
                        
                     $faker = Faker\Factory::create();
                         
                     for($i=0;$i<$noofparagraphs; $i++)
                        { 
                         for($j=0;$j<2;$j++)
                                {
                               echo $faker->paragraph($noofparagraphs);
                                }
                         echo $faker->paragraph($noofparagraphs).'<br>'.'<br>'.'<br>';
                        } 
                  ?>
                </p>
        </div>

@stop


