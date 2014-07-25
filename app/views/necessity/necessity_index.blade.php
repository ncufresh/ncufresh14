@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/necessity_index.css') }}
	{{ HTML::style('css/necessity_image.css') }}
	{{ HTML::script('js/necessity/necessity.js')  }}
@stop

@section('content')
	<div class="backgroundContent">	
		
		<div class="ContentUp">
			
			<img class="Block" src="{{ asset('images/necessity/Block.png') }}">	
			<a target="_blank" href="http://140.115.185.138/ncuosafresh/finddorm.php">
				<img class="Note1" src="{{ asset('images/necessity/Note1.png') }}">
			</a>

		</div>
				
		<div class="ContentMid">
			
			<img id="buttonA" class="ButtonUpA" src="{{ asset('images/necessity/ButtonUpA1.png') }}">
			<img id="buttonB" class="ButtonUpB" src="{{ asset('images/necessity/ButtonUpB1.png') }}">
			<img id="buttonC" class="ButtonUpC" src="{{ asset('images/necessity/ButtonUpC1.png') }}">
		
		</div>

		<div class="ContentDown">
				<!-- Research's Button -->
			<div class="ContentDownYR">
				
					
				<img class="Left1R" src="{{ asset('images/necessity/Left1.png') }}">
		
				<div class="LeftMidR" >
					<div>
						<a href="#a1"><img class="ResearchButtonA" src="{{ asset('images/necessity/ResearchButtonA1.png') }}"></a>
					</div>
					<div>	
						<a href="#a2"><img class="ResearchButtonB" src="{{ asset('images/necessity/ResearchButtonB1.png') }}"></a>
					</div>
					<div>
						<a href="#a3"><img class="ResearchButtonC" src="{{ asset('images/necessity/ResearchButtonC1.png') }}"></a>
					</div>
					<div>
						<a href="#a4"><img class="ResearchButtonD" src="{{ asset('images/necessity/ResearchButtonD1.png') }}"></a>
					</div>
					<div>
						<a href="#a5"><img class="ResearchButtonE" src="{{ asset('images/necessity/ResearchButtonE1.png') }}"></a>
					</div>
					<div>
						<a href="#a6"><img class="ResearchButtonF" src="{{ asset('images/necessity/ResearchButtonF1.png') }}"></a>
					</div>
					<div>		
						<a href="#a7"><img class="ResearchButtonG" src="{{ asset('images/necessity/ResearchButtonG1.png') }}"></a>
					</div>
					<div>	
						<a href="#a8"><img class="ResearchButtonH" src="{{ asset('images/necessity/ResearchButtonH1.png') }}"></a>
					</div>
				</div>
				
				<img class="Left2R" src="{{ asset('images/necessity/Left2.png') }}">
			
			</div>
				<!-- Freshman's Button -->
			<div class="ContentDownYF">

				<img class="Left1F" src="{{ asset('images/necessity/Left1.png') }}">
				<div class="LeftMidF" >
					<div>
						<a href="#b1"><img class="FreshmanButtonA" src="{{ asset('images/necessity/FreshmanButtonA1.png') }}"></a>
					</div>
					<div>
						<a href="#b2"><img class="FreshmanButtonB" src="{{ asset('images/necessity/FreshmanButtonB1.png') }}"></a>
					</div>
					<div>
						<a href="#b3"><img class="FreshmanButtonC" src="{{ asset('images/necessity/FreshmanButtonC1.png') }}"></a>
					</div>
					<div>	
						<a href="#b4"><img class="FreshmanButtonD" src="{{ asset('images/necessity/FreshmanButtonD1.png') }}"></a>
					</div>
					<div>	
						<a href="#b5"><img class="FreshmanButtonE" src="{{ asset('images/necessity/FreshmanButtonE1.png') }}"></a>
					</div>
					<div>	
						<a href="#b6"><img class="FreshmanButtonF" src="{{ asset('images/necessity/FreshmanButtonF1.png') }}"></a>
					</div>
					<div>	
						<a href="#b7"><img class="FreshmanButtonG" src="{{ asset('images/necessity/FreshmanButtonG1.png') }}"></a>
					</div>
					<div>	
						<a href="#b8"><img class="FreshmanButtonH" src="{{ asset('images/necessity/FreshmanButtonH1.png') }}"></a>
					</div>
					<div>	
						<a href="#b9"><img class="FreshmanButtonI" src="{{ asset('images/necessity/FreshmanButtonI1.png') }}"></a>
					</div>
					<div>	
						<a href="#b10"><img class="FreshmanButtonJ" src="{{ asset('images/necessity/FreshmanButtonJ1.png') }}"></a>
					</div>
					<div>	
						<a href="#b11"><img class="FreshmanButtonK" src="{{ asset('images/necessity/FreshmanButtonK1.png') }}"></a> 
					</div>
				</div>
				<img class="Left2F" src="{{ asset('images/necessity/Left2.png') }}">
				
					

			</div>

	
			<div class="ContentDownB">
				
				<!-- Research's Form -->
				<div class="ContentDownBR" >

					<img class="Research1" src="{{ asset('images/necessity/Research1.png') }}">
					<div class="PaddingMid" >
						<div class="IntroductionR" >
							<table>
                          	<th class="formStyleIntroduction" >
                          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          		歡迎您加入本校的行列，為便利您到本校辦理各項事務，特印製本通知，希望您能詳細閱讀，並依規定準備所須資料，按時辦理各項新生事務。<br> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								此外，「103 學年度教務章則」(預定 8 月中旬上網)裡的各類法規關係著您在中大求學的點點滴滴，未來若有相關疑問，只要點選查詢馬上就能找到解答喔！順手把它加入我的最愛吧!<br> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								凡本校新生均須在規定時間內繳交各項新生資料，並依本通知之規定辦理各項事務，方為完成註冊手續。<br><br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								(註冊及上課日期：<font color="red">9 月 15 日</font>（星期一）本校網址：<a target="_blank" href="http://www.ncu.edu.tw"><font color="blue"><b>http://www.ncu.edu.tw</b></font></a> 總機：<font color="red">03-4227151</font>)
                          	</th>
							</table>
						</div>

						<br>

						<div class="Form">
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
									<td class="formStyleSide" {{"id='a".$necessityresearchdata->id."'" }}>{{$necessityresearchdata->item }}</td>
									<td class="formStyleMid">{{$necessityresearchdata->explanation }}</td>
									<td class="formStyleSide">{{$necessityresearchdata->organizer }}</td>
								</tr>
							@endforeach
						</table>
						</div>

					</div>
					<img class="Research2" src="{{ asset('images/necessity/Research2.png') }}">
					
				</div>

				
				<!-- Freshman's Form -->
				<div>
					<div class="ContentDownBF" >

					<img class="Freshman1" src="{{ asset('images/necessity/Freshman1.png') }}">
					<div class="PaddingMid" >
						<div class="IntroductionF" >
							<table>
                          	<th class="formStyleIntroduction" >
                          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          		歡迎您加入本校的行列，為便利您到本校辦理各項事務，特印製本通知，希望您能詳細閱讀，並依規定準備所須資料，按時辦理各項新生事務。<br> 
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								此外，「<a target="_blank" href="https://www.google.com.tw/?gfe_rd=cr&ei=FrbMU7iTO8jE4ALL24CgDw"><font color="green">103 學年度教務章則</font></a>」
								(預定 8 月中旬上網)裡的各類法規關係著您在中大求學的點點滴滴，未來若有相關疑問，只要鍵入
								 <a target="_blank" href="https://www.google.com.tw/?gfe_rd=cr&ei=FrbMU7iTO8jE4ALL24CgDw"><font color="green">http://pdc.adm.ncu.edu.tw/rule/rule103/rul103_index.html</font></a> 或至大一生活知訊網(
								 <a target="_blank" href="http://ncufresh.ncu.edu.tw"><font color="green">http://ncufresh.ncu.edu.tw</font></a>)，馬上就能找到解答喔！順手把它加入我的最愛吧!有關各學士班應修科目及畢業條件，轉入大二及大一休學復學生請參考「
								 <a target="_blank" href="https://www.google.com.tw/?gfe_rd=cr&ei=FrbMU7iTO8jE4ALL24CgDw"><font color="blue"><b>102 學年度教務章則</b></font></a>」、轉入大三者請參考「
								 <a target="_blank" href="https://www.google.com.tw/?gfe_rd=cr&ei=FrbMU7iTO8jE4ALL24CgDw"><font color="blue"><b>101 學年度教務章則</b></font></a>」。<br> 
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								凡本校新生(含復學生、轉學生)均須在規定時間內繳交各項新生資料，並依本通知之規定辦理各項事務，方為完成註冊手續。<br>
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								本註冊通知電子檔，可於教務處網站(<a target="_blank" href="http://pdc.adm.ncu.edu.tw/"><font color="blue"><b>http://pdc.adm.ncu.edu.tw</b></font></a>)左方「快速連結」→「新生專區」中下載。 <br><br>
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								(註冊及上課日期：<font color="red">9 月 15 日</font>（星期一）本校網址：<a target="_blank" href="http://www.ncu.edu.tw"><font color="blue"><b>http://www.ncu.edu.tw</b></font></a> 總機：<font color="red">03-4227151</font>)
                          	</th>
							</table>
						</div>
						<br>
						<br>

						<div class="Form">
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
								<tr >
									<td class="formStyleSide" {{"id='b".$necessityfreshmandata->id."'" }}>{{$necessityfreshmandata->item }}</td>
									<td class="formStyleMid">{{$necessityfreshmandata->explanation }}</td>
									<td class="formStyleSide">{{$necessityfreshmandata->organizer }}</td>
								</tr>
							@endforeach
						</table>
						</div>

					</div>
					<img class="Freshman2" src="{{ asset('images/necessity/Freshman2.png') }}">
					
				</div>

				<!-- Download's Form -->

				<div>
					<div class="ContentDownBD" >

					<img class="Download1" src="{{ asset('images/necessity/download1.png') }}">
					<div class="DownloadMid" >
				
						<div class="DownloadForm1">

						<?php $n = 1;?>
								
				  		@foreach($necessityDownloadData as $necessitydownloaddata)
							

							@if( $n <= 10 )		
						 	
						 		<font size="5" face="微軟正黑體">{{	link_to_route('downloadReturn', $necessitydownloaddata -> name , array( 'id' =>  $necessitydownloaddata -> id ))}}</font>

								<br>
							
							@endif
							
							<?php $n++;?>

						@endforeach 
						<P>
							<br>
						</P>

						</div>

						<div class="DownloadForm2">

							<?php $m = 1 ?>
								
				  		@foreach($necessityDownloadData as $necessitydownloaddata)
						
							@if( $m > 10 )		
						 	
						 		<font size="5" face="微軟正黑體">{{	link_to_route('downloadReturn', $necessitydownloaddata -> name , array( 'id' =>  $necessitydownloaddata -> id ))}}</font>

								<br>
							
							@endif
							
							<?php $m++;?>

						@endforeach
						
						</div>

					</div>
					<img class="Download2" src="{{ asset('images/necessity/download2.png') }}">
					
				</div>

				</div>


				</div>

			</div>
	


		</div>

	</div>



@stop