@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
	{{ HTML::script('js/crash.js') }}

@stop

@section('content')
<canvas id="canvas" width="1px" height="1px"></canvas>

<div id="about-content">
	<div id="page1">
		<div id="page1-content">
			<div id="page1-photo">photo</div>
			<div id="page1-text">　　嗨！各位中央新生你們好！不管是研究新生或是大一新生，都是經過許多的努力才能
				來到這裡。想必你們也對未來的學校──中央大學，抱持著有點複雜的心情，像是初戀般既期待又怕受傷害。
				不過別擔心，因為曾經的我們也是如此，徬徨茫然的我們，也曾受過大一新生知訊網的幫助。而如今，該是
				我們指引帶領你們融入中央大學這個大家庭了。
				<br>
				　　大一新生知訊網，一代傳一代，年年創新，力求精進，已走過無數的年頭，也幫助過許許多多期待著未來學
				校生活的新生們。我們最主要的目的，便是帶領大家認識未來的生活環境，事先調適進入學校的心態，甚至
				提早認識新的同學們。不管多少，那怕只是解開一個小疑惑，只要能幫到大家，就是對我們最大的鼓勵。
				為此，我們蒐集了許許多多的資料，協助大家了解中央大學。大一必讀裡整理了各位新生必須知道的基本資
				訊，不管是註冊、兵役、修課規定、相關附件下載……等，都包含在這裡供各位參考。中大生活則蒐羅了許多
				大家在生活上可能遇到的問題，餐廳、宿舍、日常必需品購買……都可在這裡找到你需要的答案。校園導覽為
				一張彙整了校內的所有景觀建築的地圖，並提供相關的資訊與說明。影音專區存放著影音組為協助各位認識
				校園的精心剪輯的影片，將校園生活融入到影片裡，幫助大家從另一個角度了解校園生活的面貌。新生論壇
				則提供了一個大家交流、互相認識、解決疑惑的平台。不論有各式疑問都可在這提出，相信一定會有許多熱
				心的學長姐們為你們解除疑惑。另外在論壇裡也有開設各個系所與社團的討論版，想詳細了解各個系所與社
				團的詳細資料與聯絡方式，可一定要前去一探究竟喔!!
				<br>
				　　最後，非常感謝各位使用大一生活知訊網，我們將在十月完成我們團隊的使命─「帶領各位熟悉中大校園」。在這之後，我們也將把這項引路人的使命傳承給下一代的你們。如果你們有感受到知訊網的用心，願意為下一屆的學弟妹們盡一份心力，擔負起引路的責任。歡迎你們加入下一屆的知訊網團隊，貢獻自己的能力、才華與熱情。
			</div>
		</div>
	</div>
	<div id="button1">
	</div>
	<div id="button2">
	</div>
	<div id="page2">
		<div id="page2-content">
			<div id="photos" class="items"></div>
			<div id="execute" class="items"></div>
			<div id="Design" class="items"></div>
			<div id="Media" class="items"></div>
			<div id="Program" class="items"></div>
			<div id="Project" class="items"></div>
		</div>
		<div id="photos-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div id="display-photo"><img src="SSASAS"></div>
				<div id="prelook">
					<div id="left-button"></div>
					<div id="prelook-box">
						<div id="prelook-inbox">
							<!--photos-->
							<img class="prelook-photos" src="1"/>
							<img class="prelook-photos" src="2"/>
							<img class="prelook-photos" src="3"/>
							<img class="prelook-photos" src="4"/>
						</div>
					</div>
					<div id="right-button"></div>
				</div>
			</div>
		</div>
		<div id="execute-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
			</div>
		</div>
		<div id="Design-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
			</div>
		</div>
		<div id="Media-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
			</div>
		</div>
		<div id="Program-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
			</div>
		</div>
		<div id="Project-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
			</div>
		</div>
	</div>
</div>

@stop