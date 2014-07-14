@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/necessity_index.css') }}
	{{ HTML::script('js/necessity/necessity.js')  }}
@stop

@section('content')
		
		<div id="backgroundContent">
			
			<div id="contentUp">
 				<div id="contUpRead">

 				</div>
			</div>

			<div id="contentMid">
				
				<div>
					<button class="contMidButton" id="buttonA">研究所新生</button>
				</div>
				
				<div>
					<button class="contMidButton" id="buttonB">學士班新生</button>
				</div>
				
				<div>
					<button class="contMidButton" id="buttonA">下載專區</button>
				</div>

			</div>

			<div id="contDownLeft">

			</div>

			<div id="contentDown">

				<div id="contDownSlideResearch">
					
					 <!-- research 的 div -->
					
					<div id="contDownText">
						
						<table>
                          	<th class="formStyleIntroduction">
                          		research
                          	</th>
						</table>

					</div>
					<br>
                   	<div id="contDownForm">
						<table>
								<tr align="Center" >
									<td class="formStyleUpSide">
										辦理事項</br>(適用對象)
									</td>
									<td class="formStyleUpMid">			
										說明
									</td>
									<td class="formStyleUpSide">			
										承辦單位</br>(校園分機)
									</td>
								</tr>
							@foreach($necessityResearchData as $necessityresearchdata)
								<tr>
									<td class="formStyleSide">{{$necessityresearchdata->item }}</td>
									<td class="formStyleMid">{{$necessityresearchdata->explanation }}</td>
									<td class="formStyleSide">{{$necessityresearchdata->organizer }}</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
				
				<div id="contDownSlideFreshman">
 					
 					<!-- freshman 的 div -->

 					<div id="contDownText">
						
						<table>
                          	<th class="formStyleIntroduction">
                          		freshman
                          	</th>
						</table>

					</div>
					<br>
 					<div id="contDownForm">
						<table>
								<tr align="Center" >
									<td class="formStyleUpSide">
										辦理事項</br>(適用對象)
									</td>
									<td class="formStyleUpMid">			
										說明
									</td>
									<td class="formStyleUpSide">			
										承辦單位</br>(校園分機)
									</td>
								</tr>
							@foreach($necessityFreshmanData as $necessityfreshmandata)
								<tr>
									<td class="formStyleSide">{{$necessityfreshmandata->item }}</td>
									<td class="formStyleMid">{{$necessityfreshmandata->explanation }}</td>
									<td class="formStyleSide">{{$necessityfreshmandata->organizer }}</td>
								</tr>
							@endforeach
						</table>
					</div>

				</div>

			</div>
		</div>

@stop