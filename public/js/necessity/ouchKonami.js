$(document).ready(function() {
	
	// var audioElement = document.createElement('audio');
 //    audioElement.setAttribute('src', '../../images/necessity/music.mp3');
 //    audioElement.setAttribute('autoplay', 'autoplay');
 //    //if(audioElement != full)
 //    //{
 //    	console.log(audioElement);
 //    //}
    
    $.konami({
	code:                   [82,69,88,72,85,65,78,71],
	interval:		100,
    complete:		function(){
		//do your thing.
		// alert('HI! Welcome Back , My Dear Friend!!!');
  
      	$(".Note1").animate({ 	
			 marginLeft: "782px"	 	
		},1600,'linear',function() {	
	       
	       	$(".Note1").animate({ 	
			 	marginLeft: "406px"	 	
			},1600,'linear',function() {
				
				$(".Block").animate({
					marginLeft: "-1680px"
				},6000);

				$(".Note1").animate({
			 		marginLeft: "-1474px"
			 	},6000,'swing',function(){
					
					$(".Block").animate({
						marginLeft: "1500px"
					},0);

					$(".Note1").animate({
			 			marginLeft: "2050px"
			 		},0,'swing',function(){

						$(".Block").animate({
							marginLeft: "-1900px"
					  	},6000,'swing');

						$(".Note1").animate({
							marginLeft: "-1350px"
						},6000,'swing',function(){
		
							$(".Block").animate({
								marginLeft: "1500px"
							},0,'swing');

							$(".Note1").animate({
				 				marginLeft: "1706px"
				 			},0,'swing',function(){
				 				
				 				$(".Block").animate({
									marginLeft: "200px"
								},2480,'swing');

								$(".Note1").animate({
			 						marginLeft: "550px"
			 					},2312,'swing',function(){
			 						
			 						$(".ButtonUpA").animate({
										marginTop: "-50px"
									},400,'swing',function(){
										$(".ButtonUpA").animate({
										marginTop: "3px"
										},400,'swing',function(){
											
											$(".What").css({
									 		 	width: "70px",
						 						height: "70px"
									 		});

											$(".Note1").animate({
			 									marginTop: "-100px"
						 					},400,'swing',function(){
						 						
						 						$(".Note1").animate({
			 										marginTop: "-64px"
			 									},400,'swing',function(){
			 										
			 										$(".What").css({
									 		 			width: "0px",
						 								height: "0px"
									 				});
			 										
			 										$(".Note1").animate({
			 											marginTop: "103px"
			 										},1000,'swing',function(){
			 											
			 											$(".Note1").animate({
			 												marginLeft: "-1400px"
			 											},4500,'swing');

			 										});

			 									});
						 					});

											$(".ButtonUpA").animate({
												marginLeft: "-2100px"
											},6134,'swing');
									 		$(".ButtonUpB").animate({
												marginLeft: "-1750px"
											},6134,'swing');
											$(".ButtonUpC").animate({
												marginLeft: "-1400px"
											},6134,'swing',function(){

												$(".ButtonUpA").animate({
													marginLeft: "1950px"
												},0,'swing');
									 			$(".ButtonUpB").animate({
													marginLeft: "2350px"
												},0,'swing');
												$(".ButtonUpC").animate({
													marginLeft: "2700px"
												},0,'swing');

												$(".Note1").animate({
			 										marginLeft: "3550px"
			 									},0,'swing',function(){

			 										$(".ButtonUpA").animate({
														marginLeft: "-2100px"
													},6000,'swing');
									 				$(".ButtonUpB").animate({
														marginLeft: "-1750px"
													},6000,'swing');
													$(".ButtonUpC").animate({
														marginLeft: "-1400px"
													},6000,'swing');

													$(".Note1").animate({
			 											marginLeft: "-1400px"
			 										},6500,'swing',function(){
			 											
			 											$(".ButtonUpA").animate({
															marginLeft: "1950px"
														},0,'swing');
									 					$(".ButtonUpB").animate({
															marginLeft: "2350px"
														},0,'swing');
														$(".ButtonUpC").animate({
															marginLeft: "2700px"
														},0,'swing');

														$(".Note1").animate({
			 												marginLeft: "2900px"
			 											},0,'swing',function(){

			 												$(".ButtonUpA").animate({
																marginLeft: "53px"
															},5500,'swing');
									 						$(".ButtonUpB").animate({
																marginLeft: "403px"
															},5500,'swing');
															$(".ButtonUpC").animate({
																marginLeft: "753px"
															},5500,'swing');

															$(".Note1").animate({
			 													marginLeft: "943px"
			 												},5500,'swing',function(){

			 													$(".Note1").animate({
			 														marginLeft: "550px",
			 														marginTop: "-64px"
			 													},1000,'swing');

			 												});

			 											});

			 										});

			 									});
											});
										});						
									});
								});
				 			});
						});	 									 		
			 		});
			 	});
			});
		});
	}
});

});
