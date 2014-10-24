@extends('_master')	

@section('title')
	Random User Generator
@stop


@section('head')
        <meta name="description" content="Random User Generator">
        <meta name="keywords" content="Random User Generator" />
        <link rel='stylesheet' href='/css/loremstyle.css' type='text/css'>
@stop


@section('content')
  
        <div class="container">
                <h2>Lorem Ipsum Generator</h2>
                <blockquote>Create random user data for your applications. Like Lorem Ipsum, but for people.
				</blockquote>
                <h3>Fill Details</h3>
                
                	{{ Form::open(array('url' => '/user-generator', 'method' => 'GET')) }}
                    {{ Form::label('noofusers','How many users?') }}
                    {{ Form::text('noofusers'); }}<br />
                    <h4>Include</h4>
                    {{ Form::label('location','location?') }}                   
                    {{ Form::checkbox('location'); }}<br />
                    {{ Form::label('profile','profile?') }}                   
                    {{ Form::checkbox('profile'); }}<br />               
                    {{ Form::submit('Generate!'); }}
                    {{ Form::close() }}
                <br />
@stop  
              
@section('logic') 
                <p><?php 
                
                    if (isset($_GET['noofusers'])) 
                        {
                            $noofusers = $_GET['noofusers'];
                            
                            if (!is_numeric($noofusers)) 
                            {
                                 echo "Please enter Number in 'How many users?'  !";		 
                            }
                        } 
                    else 
                        {
                        $noofusers = 6;
                        }	     
                        
					if (isset($_GET['location'])) 
						{
						$location=true;
						} 
						else 
						{
						$location=false;
						}
							
					if (isset($_GET['profile'])) 
						{
						$profile=true;
						} 
						else 
						{
						$profile=false;
						}					
						
                     $faker = Faker\Factory::create();
                         
                    if ($noofusers  && !$location && !$profile) 
						{ for($i=0;$i<$noofusers; $i++)
							{ 
							 echo $faker->name($noofusers).'<br>';
							} 
                  		}
				  
				  	 if ($noofusers && $location && !$profile) 
						{
						  for($i=0;$i<$noofusers; $i++)
							{ 
							  echo $faker->name($noofusers).'<br>';
							  echo $faker->address.'<br>'.'<br>';

							} 
						}
		
				  	if ($noofusers && $location && $profile) 
						{
						  for($i=0;$i<$noofusers; $i++)
							{ 
							  echo $faker->name($noofusers).'<br>';
							  echo $faker->address.'<br>';
							  echo $faker->text.'<br>'.'<br>';

							} 
						}
				  
				  ?>
                </p>
        </div>

@stop

