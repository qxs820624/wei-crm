// JavaScript Document
$(function() {
    tab(".activity_title li", ".acticity_list > ul > li", "curn")

})

function tab(a, b, c) { //a 是点击的目标,,b 是所要切换的目标,c 是点击目标的当前样式
    var len = $(a);
    len.bind("click",
    function() {
        var index = 0;
        $(this).addClass(c).siblings().removeClass(c);
        index = len.index(this); //获取当前的索引
        $(b).eq(index).show().siblings().hide();
        return false;
    }).eq(0).trigger("click"); //浏览器模拟第一个点击
}


$(function() {
    $(".close,.layer").click(function() {
        $(".center").fadeOut(110);
        $(".layer").fadeOut(140);
        $("body").css({
            "height": "auto",
            "overflow": "auto"
        });

   
	})

}) 

$(function(){
	    var hh = $(window).height();
		var autioPlay = function(autioDom,controlDom){
	 	var autoplay = typeof($(autioDom).attr('autoplay'));;
		$(".moeny_dao").click(function(){
					autioDom.play();	 
		$("body").css({"height": hh, "overflow": "hidden"  });
        $(".moeny,.layer").show();
				   clearTimeout(t);
        var t = setTimeout(function() { 
		$(".center").fadeOut(110);
		$(".layer").fadeOut(140);
		$("body").css({"height":"auto","overflow":"auto"});
		 }, 6000);
			})
	    $(".close,.layer").click(function(){
				autioDom.pause();
		})
		}	
		autioPlay(document.getElementById('player'),$('.player'));

	});
$(function() {
    $(".moeny_fff").click(function() {
        var hh = $(window).height();
        $("body").css({
            "height": hh,
            "overflow": "hidden"
        });
        $(".bargain_layer,.layer").show();
        var autioPlay = function(autioDom, controlDom) {
            var autoplay = typeof($(autioDom).attr('autoplay'));;
            clearTimeout(a);
            var a = setTimeout(function() {
                autioDom.play();
                $(".close,.layer").click(function() {
                    autioDom.pause();
                })
            },
            1300);
			
		 clearTimeout(b);
         var b = setTimeout(function() {   
		$(".center").fadeOut(400);
        $(".layer").fadeOut(500);
        $("body").css({
            "height": "auto",
            "overflow": "auto"
        });},6500);
			
        }
        autioPlay(document.getElementById('player_audio'), $('.player_audio'));
    })
});