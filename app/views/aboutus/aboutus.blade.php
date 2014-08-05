@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
@stop

@section('content')
<div id="about-content">
	<div id="page1">
		<div id="page1-content">
			<div id="page1-photo">photo</div>
			<div id="page1-text"><p>　　嗨！各位中央新生你們好！不管是研究新生或是大一新生，都是經過許多的努力才能
				來到這裡。想必你們也對未來的學校──中央大學，抱持著有點複雜的心情，像是初戀般既期待又怕受傷害。
				不過別擔心，因為曾經的我們也是如此，徬徨茫然的我們，也曾受過大一生活知訊網的幫助。而如今，該是
				我們指引帶領你們融入中央大學這個大家庭了。
				<br>
				　　大一生活知訊網，一代傳一代，年年創新，力求精進，已走過無數的年頭，也幫助過許許多多期待著未來學
				校生活的新生們。我們最主要的目的，便是帶領大家認識未來的生活環境，事先調適進入學校的心態，甚至
				提早認識新的同學們。不管多少，那怕只是解開一個小疑惑，只要能幫到大家，就是對我們最大的鼓勵。
				為此，我們蒐集了許許多多的資料，協助大家了解中央大學。<a href="{{route('necessity.necessity_index')}}">新生必讀</a>裡整理了各位新生必須知道的基本資
				訊，不管是註冊、兵役、修課規定、相關附件下載……等，都包含在這裡供各位參考。<a href="{{route('nculife.index')}}">中大生活</a>則蒐羅了許多
				大家在生活上可能遇到的問題，餐廳、宿舍、日常必需品購買……都可在這裡找到你需要的答案。<a href="{{route('SchoolGuide')}}">校園導覽</a>為
				一張彙整了校內的所有景觀建築的地圖，並提供相關的資訊與說明。<a href="{{route('video')}}">影音專區</a>存放著影音組為協助各位認識
				校園的精心剪輯的影片，將校園生活融入到影片裡，幫助大家從另一個角度了解校園生活的面貌。<a href="{{route('forum')}}">新生論壇</a>
				則提供了一個大家交流、互相認識、解決疑惑的平台。不論有各式疑問都可在這提出，相信一定會有許多熱
				心的學長姐們為你們解除疑惑。另外在論壇裡也有開設各個系所與社團的討論版，想詳細了解各個系所與社
				團的詳細資料與聯絡方式，可一定要前去一探究竟喔!!
				<br>
				　　最後，非常感謝各位使用大一生活知訊網，我們將在十月完成我們團隊的使命─「帶領各位熟悉中大校園
				」。在這之後，我們也將把這項引路人的使命傳承給下一代的你們。如果你們有感受到知訊網的用心，願意為下一屆的學弟妹們盡一份心力，擔負起引路的責任。歡迎你們加入下一屆的知訊網團隊，貢獻自己的能力、才華與熱情。
			</p></div>
		</div>
	</div>
	<div id="button1">
	</div>
	<div id="button2-image">
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
				<div id="display-photo"><img id="display-photo-img" src="{{ asset( 'images/aboutus/photo/10555134_10203012672293586_811617165_n.jpg') }}"></div>
				<div id="prelook">
					<div id="left-button"></div>
					<div id="prelook-box">
						<div id="prelook-inbox">
							<!--photos-->
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10555134_10203012672293586_811617165_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10565925_10203012672173583_1273624557_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10574743_10203012672093581_949492594_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10581147_10203012672213584_354706518_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10583116_10203012669613519_1889995466_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10588635_10203012167080956_1143309023_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10589744_10203012161760823_420058060_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10589801_10203012669373513_39160036_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10590082_10203012165680921_1672890430_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10592102_10203012162240835_421779702_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10592209_10203012161520817_159434669_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10592283_10203012165400914_1586460589_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10595842_10203012669413514_941585090_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10595989_10203012166200934_1444732859_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/10596127_10203012669453515_479418446_n.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-14-52-37-713.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-15-20-23-947.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-15-22-00-536.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-15-22-53-160.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-15-23-21-210.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-29-15-24-31-900.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-30-13-49-49-746.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-30-13-50-01-858.jpg') }}"/>
							<img class="prelook-photos" src="{{ asset( 'images/aboutus/photo/C360_2014-07-30-18-43-39-139.jpg') }}"/>
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
				<div class="each-words">統籌整個知訊網的相關事宜，與學校各單位、各系學會、社團、學生組織協調；招募知訊網工人、規劃進度、預算、指引整個網站的年度大方向，擔任各組之間溝通橋梁，協同身邊這群一起努力的夥伴，為新生製作最好的知訊網。</div>
			</div>
		</div>
		<div id="Design-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
				<div class="each-words">知訊網上可見之處皆是出自於他們筆下，與企劃組合作設計網站頁面，美工組繪製網站的各個頁面、和許多精美的圖片，努力為新生繪出最有活力的知訊網。</div>
			</div>
		</div>
		<div id="Media-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
				<div class="each-words">剪輯影片、編寫劇本、拍攝相片；影音組主要負責知訊網的影片製作，自己擔當導演拍攝影片，讓新生搶先體驗大學生活的樂趣。</div>
			</div>
		</div>
		<div id="Program-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
				<div class="each-words">負責架構網站、撰寫程式，將整個知訊網推動的幕後功臣；程設組運用程式碼編織而成的知訊網，將帶給新生最好的知訊網體驗。</div>
			</div>
		</div>
		<div id="Project-back" class="contents">
			<div class="content-close"></div>
			<div class="each-content">
				<div class="each-photo"></div>
				<div class="each-words">決定知訊網的風格、配置網頁版面、美工樣式、還有網站內容，與各組協調知訊網的設計企劃，再監督美工與程設組實作，並呈現出理想中的知訊網。</div>
			</div>
		</div>
	</div>
</div>

@stop