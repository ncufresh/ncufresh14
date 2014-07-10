<?php
{{ Form::open(array('url'=>'new','method'=> 'post'))}}
{{ Form::label('title','Title') }}
{{ Form::text('title','',array('class' => 'form-control' , 'id' => 'inputTitle' , 'placeholder' => 'Tittle')) }} <br>
{{ Form::label('author_id','Your ID') }}
{{ Form::text('author_id','',array(
        'class' => 'form-control' , 'id' => 'inputAuthor_id' , 'placeholder' => 'Your ID'
)) }} <br>
{{ Form::label('article_type','Article Type') }} 
{{ Form::select('article_type',array('common' => 'Common' , 'club' => 'Club' , 'deparment' => 'Deparment'),'department    ',array('class' => 'form-control','id' => 'selectType' ) ) }} <br>
{{ Form::label('content','Content') }}
{{ Form::text('content') }} <br>
{{ Form::submit('Create',array('type' => 'button' , 'class' => 'btn btn-primary' )) }}
{{ Form::close() }}
?>