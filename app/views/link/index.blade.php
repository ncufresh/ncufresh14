@extends('layouts.layout')

@section('js_css')
	{{ HTML::script('js/admin/link.js') }}
@stop

@section('content')
	<table>
		<thead>
			<td>ID</td>
			<td>顯示名稱</td>
			<td>網址</td>
			<td>刪除</td>
		</thead>
		<tbody id="links_list">
		@foreach($links as $link)
			<tr data-id="{{ $link->id }}">
				<td>{{ $link->id }}</td>
				<td>{{ $link->display_name }}</td>
				<td>{{ $link->url }}</td>
				<td><span class="glyphicon glyphicon-remove link-del"></span></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<form id="link_form" action="{{ URL::to('/api/v1/link') }}">
		<label>顯示名稱:</label><input name="display_name" type="text"><br>
		<label>網址:</label><input name="url" type="url"><br>
		<input type="submit">
	</form>
@stop