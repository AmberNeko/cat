$(document).ready(function(){
	$(".ci").delay(10000).animate({opacity:'1'},2000);
	$(".ci").next().delay(3000).animate({opacity:'1'},2000).animate({opacity:'0'},2000);
	
	$(".ci").next().next().delay(6000).animate({opacity:'1'},2000).animate({opacity:'0'},2000);

	$(".link").click(function(){
		// event.preventDefault();
		var x=this.hash;
		
		$("html,body").stop().animate({scrollTop:$(x).offset().top},1000);return false;
	});

	// let tf=new Object();
	// for(i=0;i<6;i++){
	// 	$('.card').eq(i).data('tf',true);
	// 	tf['tf'+i]=$('.card').eq(i).data('tf');
	// }
	// $(".clip-H").delay(3000).animate({backgroundColor:'#353ADC'},{duration:3000,step:function(now,fx){$(this).css('clip-Path','polygon(4% 20%,'+(now+5)+'% 80%, '+(now+2.5)+'% '+(now-40)+'%, '+(now+5)+'% '+(now+20)+'%, '+(now+5)+'% '+(now-40)+'%, '+(now+1.3)+'% '+(now-60)+'%, '+(now-5)+'% '+(now-20)+'%, '+(now-7.5)+'% 20%, '+(now-5)+'% '+(now-40)+'%, '+(now-6.3)+'% '+(now-20)+'%)')}},1000);
});


let h = Math.floor($(window).height()*0.4);
// let tf={};
// for(i=0;i<6;i++){
// 	$('.card').eq(i).data('tf',true);
// 	tf['tf'+i]=$('.card').eq(i).data('tf');
// 	tf['tf'+i]=true;
// }
function sc(){
	$('.card').each(function(){
		
		let to=$(this).offset().top;
		let scroll = $(window).scrollTop();
		let ts=to - scroll;
		if(ts< h && $(this).hasClass('fa')){
			$(this).removeClass("fa").addClass('tr');
			// $(this).filter(":nth-child(3n+1)").animate({left:'0vw',opacity:'1'},1000);
			// $(this).filter(":nth-child(3n+2)").animate({bottom:'0vw',opacity:'1'},1000);
			// $(this).filter(":nth-child(3n)").animate({right:'0vw',opacity:'1'},1000);
			// $(this).animate({opacity:'1'},1000);
			// $(this).addClass("ani");
				// $(this).animate({opacity:"1"},{duration:1000,queue:false},'linear')

				// $(this).animate({opacity:1,'n':'0'},{
				// 	step:function(now,fx){
				// 		tf['tf'+$(this).eq()]=false;
				// 		$(this).css({"transform":'translate3d('+now+','+now+',0)'});
				// 	},complete:function(){
				// 		tf['tf'+$(this).eq()]=true;
				// 	},
				// 	duration:1000,queue:false}, 'linear');

					// $(this).animate({opacity:'1'},{duration:1000,queue:false});
	} else if(ts> h && $(this).hasClass('tr')){
			$(this).removeClass("tr").addClass('fa');
			// $(this).filter(":nth-child(3n+1)").animate({left:'-50vw',opacity:'0'},1000);
			// $(this).filter(":nth-child(3n+2)").animate({bottom:'-5vw',opacity:'0'},1000);
			// $(this).filter(":nth-child(3n)").animate({right:'-50vw',opacity:'0'},1000);
			// $(this).animate({opacity: '0'},1000);
			// // $(this).animate({
			// 	opacity: '0'
			// },{duration:1000,queue:false},'linear');

			// $(this).filter(".card:nth-child(3n+1)").animate({'n':'25'},{
			// 	step:function(now,fx){
			// 		tf['tf'+$(this).eq()]=false;
			// 		$(this).css({"transform":'translate3d(-'+now+'vw,0px,0px)'});
			// },complete:function(){
			// 	tf['tf'+$(this).eq()]=true;
			// 	},
			// 	duration:1000,queue:false}, 'linear');
			// $(this).filter(".card:nth-child(3n+2)").animate({'n':'10'},{
			// 	step:function(now,fx){
			// 		tf['tf'+$(this).eq()]=false;
			// 		$(this).css({"transform":'translate3d(0px,'+now+'vw,0px)'});
			// 	},complete:function(){
			// 		tf['tf'+$(this).eq()]=true;
			// 	},duration:1000,queue:false}, 'linear');
			// $(this).filter(".card:nth-child(3n)").animate({'n':'25'},{
			// 	step:function(now,fx){
			// 		tf['tf'+$(this).eq()]=false;
			// 		$(this).css({"transform":'translate3d('+now+'vw,0px,0px)'});
			// 	},complete:function(){
			// 		tf['tf'+$(this).eq()]=true;
			// 	},duration:1000,queue:false}, 'linear');
			// 	$(this).animate({opacity:0},{duration:1000,queue:false});

		}
	});
	}

let timer;
// if(tf['tf0'] && tf['tf1'] && tf['tf2'] && tf['tf3'] && tf['tf4'] && tf['tf5']){
$(window).scroll(function(){

	clearTimeout(timer);
			timer=setTimeout(
			sc(),100);
		// requestAnimationFrame(sc);
});
// }
$(window).trigger('scroll');