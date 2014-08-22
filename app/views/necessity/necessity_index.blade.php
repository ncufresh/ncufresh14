@extends('layouts.layout')

@section('js_css')
		
	{{ HTML::style('css/necessity/necessity_index.min.css') }}
	{{ HTML::script('js/necessity/necessity.min.js')  }}
	{{ HTML::script('js/necessity/ouchKonami.min.js')  }}
@stop

@section('content')

	<div class="backgroundContent">	
		
		<div class="ContentUp">
			
			<div class="Block">
			</div>	
				<a target="_blank" href="http://140.115.185.138/ncuosafresh/finddorm.php">
				 	<div class="Note1"></div>
				</a>
			</div>
			<div class="What"></div>
				
		<div class="ContentMid">
			<div id="buttonA" class="ButtonUpA"></div>
			<div id="buttonB" class="ButtonUpB"></div>
			<div id="buttonC" class="ButtonUpC"></div>
		</div>

		<div class="ContentDown">
				<!-- Research's Button -->
			<div class="ContentDownYR">
				
					
				<div class="Left1R"></div>
		
				<div class="LeftMidR" >
					<div>
						<a href="#a1"><div class="ResearchButtonA"></div></a>
					</div>
					<div>	
						<a href="#a2"><div class="ResearchButtonB"></div></a>
					</div>
					<div>
						<a href="#a3"><div class="ResearchButtonC"></div></a>
					</div>
					<div>
						<a href="#a4"><div class="ResearchButtonD"></div></a>
					</div>
					<div>
						<a href="http://140.115.185.138/ncuosafresh/military.php" target="_blank"><div class="ResearchButtonE"></div></a>
					</div>
					<div>
						<a href="#a6"><div class="ResearchButtonF"></div></a>
					</div>
					<div>		
						<a href="#a7"><div class="ResearchButtonG"></div></a>
					</div>
					<div>	
						<a href="#a8"><div class="ResearchButtonH"></div></a>
					</div>
				</div>
				
				<div class="Left2R"></div>
			
			</div>
				<!-- Freshman's Button -->
			<div class="ContentDownYF">

				<div class="Left1F"></div>
				<div class="LeftMidF" >
					<div>
						<a href="#b1"><div class="FreshmanButtonA"></div></a>
					</div>
					<div>
						<a href="#b2"><div class="FreshmanButtonB"></div></a>
					</div>
					<div>
						<a href="#b3"><div class="FreshmanButtonC"></div></a>
					</div>
					<div>	
						<a href="#b4"><div class="FreshmanButtonD"></div></a>
					</div>
					<div>	
						<a href="http://140.115.185.138/ncuosafresh/military.php" target="_blank"><div class="FreshmanButtonE"></div></a>
					</div>
					<div>	
						<a href="#b6"><div class="FreshmanButtonF"></div></a>
					</div>
					<div>	
						<a href="#b7"><div class="FreshmanButtonG"></div></a>
					</div>
					<div>	
						<a href="#b8"><div class="FreshmanButtonH"></div></a>
					</div>
					<div>	
						<a href="#b9"><div class="FreshmanButtonI"></div></a>
					</div>
					<div>	
						<a href="#b11"><div class="FreshmanButtonJ"></div></a>
					</div>
					<div>	
						<a href="#b12"><div class="FreshmanButtonK"></div></a> 
					</div>
				</div>
				<div class="Left2F"></div>
				
					

			</div>

	
			<div class="ContentDownB">
				
				<!-- Research's Form -->
				<div class="ContentDownBR" >

					<div class="Research1">
						<font color="#8ef1e4" size="5"><br><br> &nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;請輸入rexhuang</font></div>
					<div class="PaddingMid" >
						<div class="IntroductionR" >
							<table>
                          	<th class="formStyleIntroduction" >
                          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          		歡迎您加入本校的行列，為便利您到本校辦理各項事務，特印製本通知，希望您能詳細閱讀，並依規定準備所須資料，按時辦理各項新生事務。<br> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								此外，「<font color="green">103 學年度教務章則</font>」(預定 8 月中旬上網)裡的各類法規關係著您在中大求學的點點滴滴，未來若有相關疑問，只要點選查詢馬上就能找到解答喔！順手把它加入我的最愛吧!<br> 
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
					<div class="Research2"></div>
					
				</div>

				
				<!-- Freshman's Form -->
				<div>
					<div class="ContentDownBF" >

					<div class="Freshman1"></div>
					<div class="PaddingMid">
						<div class="IntroductionF" >
							<table>
                          	<th class="formStyleIntroduction" >
                          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          		歡迎您加入本校的行列，為便利您到本校辦理各項事務，特印製本通知，希望您能詳細閱讀，並依規定準備所須資料，按時辦理各項新生事務。<br> 
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								此外，「<font color="green">103 學年度教務章則</font>」
								(預定 8 月中旬上網)裡的各類法規關係著您在中大求學的點點滴滴，未來若有相關疑問，只要鍵入
								 <font color="green">http://pdc.adm.ncu.edu.tw/rule/rule103/rul103_index.html</font>或至大一生活知訊網(
								 <a target="_blank" href="http://ncufresh.ncu.edu.tw"><font color="green">http://ncufresh.ncu.edu.tw</font></a>)，馬上就能找到解答喔！順手把它加入我的最愛吧!有關各學士班應修科目及畢業條件，轉入大二及大一休學復學生請參考「
								 <a target="_blank" href="http://pdc.adm.ncu.edu.tw/rule/rule102/rul102_index.html"><font color="blue"><b>102 學年度教務章則</b></font></a>」、轉入大三者請參考「
								 <a target="_blank" href="http://pdc.adm.ncu.edu.tw/rule/rule101/rul101_index.html"><font color="blue"><b>101 學年度教務章則</b></font></a>」。<br> 
								
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
					<div class="Freshman2"></div>
					
				</div>

				<!-- Download's Form -->

				<div>
					<div class="ContentDownBD" >

					<div class="Download1"></div>
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
					<div class="Download2"></div>
					
				</div>

				</div>


				</div>

			</div>
	


		</div>

	</div>



@stop