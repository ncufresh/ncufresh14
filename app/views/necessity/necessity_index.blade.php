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

			<div id="contDownLeftResearch">
				
					<button><a href="#30">分類一</a></button>
					<button><a href="#31">分類二</a></button>
					<button><a href="#32">分類三</a></button>
					<button><a href="#33">分類四</a></button>
					<button><a href="#34">分類五</a></button>
					<button><a href="#35">分類六</a></button>
					<button><a href="#36">分類七</a></button>
					<button><a href="#37">分類八</a></button>
			
			</div>

			<div id="contDownLeftFreshman">
				
					<button><a href="#30">分類一</a></button>
					<button><a href="#31">分類二</a></button>
					<button><a href="#32">分類三</a></button>
					<button><a href="#33">分類四</a></button>
					<button><a href="#34">分類五</a></button>
					<button><a href="#35">分類六</a></button>
					<button><a href="#36">分類七</a></button>
					<button><a href="#37">分類八</a></button>
					<button><a href="#37">分類九</a></button>
					<button><a href="#37">分類十</a></button>
					<button><a href="#37">分類十一</a></button>
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
								<tr >
									<td class="formStyleSide" {{"id='".$necessityresearchdata->id."'" }}>{{$necessityresearchdata->item }}</td>
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
									<td class="formStyleSide" {{"id='".$necessityresearchdata->id."'" }}>{{$necessityfreshmandata->item }}</td>
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