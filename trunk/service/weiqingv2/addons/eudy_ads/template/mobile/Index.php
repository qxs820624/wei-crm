<?php
require_once "weixin/jssdk.php";
$jssdk = new JSSDK("wx407e5e3a7f3e000a", "f2acd58e147500fb91eda296a2f8f492");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>奔跑吧阿达西</title>
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <script type="text/javascript">
        // Fix for IE ignoring relative base tags.
        //    (function() {
        //        var baseTag = document.getElementsByTagName('base')[0];
        //        baseTag.href = baseTag.href;
        //    })();

        function ajax( url , options )
        {
            if ( !url ) {
                console.log( "No Target URL is provided. URL : " + url );
                return -1;
            }

            var parameters = '';
            var callback = false; // callback function

            // Getting provided callback function
            if ( typeof options.callback === 'function' ) {
                callback = options.callback;
            } else if ( typeof options.callback === 'string' ) {
                callback = window[ options.callback ];
            }

            // Creating url string from the parameters
            if ( options.data instanceof Object ) {
                for ( key in options.data ) {
                    if ( parameters.length > 0 ) parameters = parameters + '&';
                    parameters = parameters + key + '=' + options.data[ key ];
                }
            } else if ( typeof options.data === 'string' ) {
                parameters = parameters + options.data;
            }

            // jsonp part
            if ( options.jsonp ) {
                var cbnum = Math.random().toString(16).slice(2);
                var script = document.createElement( 'script' );

                if ( parameters.length > 0 ) {
                    parameters = '?' + parameters + '&callback=cb' + cbnum;
                } else {
                    parameters = '?callback=cb' + cbnum;
                }

                window[ 'cb' + cbnum ] = function( data ) {

                    try {
                        callback( data );
                    }
                    finally {
                        delete window[ 'cb' + cbnum ];
                        script.parentNode.removeChild( script );
                    }
                }

                script.src = url + parameters;

                document.body.appendChild( script );

                // Local ajax part
            } else {
                var xmlhttp;

                if ( window.XMLHttpRequest ) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
                }

                if ( !xmlhttp ) {
                    console.log( "XMLHTTP initiating is failed" );
                    return -2;
                }

                if ( callback ) {
                    xmlhttp.onreadystatechange = function() {
                        if ( xmlhttp.readyState == 4 ) {
                            if ( xmlhttp.status == 200 || xmlhttp.status == 0 ) {
                                console.log(window["context"],"shit");
                                callback.call(window["context"], xmlhttp.responseText);
                            } else {
                                console.log( "XMLHTTP Response error : " + xmlhttp.statusText );
                                return -4;
                            }
                        }
                    }
                }

                try {
                    if ( options.isPost ) {
                        xmlhttp.open( "POST" , url , true );
                        xmlhttp.setRequestHeader( "Content-type","application/x-www-form-urlencoded" );
                        xmlhttp.send( parameters );
                    } else {
                        xmlhttp.open( "GET" , url + '?' + parameters , true );
                        xmlhttp.send();
                    }
                } catch ( err ) {
                    console.log( "XMLHTTP Request error : " + err.message );
                    return -3;
                }
            }
        }

    </script>
    <style>
        body {
            text-align: center;
            background: #cdcab9;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }
        html {
            -ms-touch-action: none; /* Direct all pointer events to JavaScript code. */
            overflow: hidden;
        }
        canvas {
            display:block;
            position:absolute;
            margin: 0 auto;
            padding: 0;
            border: 0;
        }
    </style>
    <script type="text/javascript">
        function ajax( url , options )
        {
            if ( !url ) {
                console.log( "No Target URL is provided. URL : " + url );
                return -1;
            }

            var parameters = '';
            var callback = false; // callback function

            // Getting provided callback function
            if ( typeof options.callback === 'function' ) {
                callback = options.callback;
            } else if ( typeof options.callback === 'string' ) {
                callback = window[ options.callback ];
            }

            // Creating url string from the parameters
            if ( options.data instanceof Object ) {
                for ( key in options.data ) {
                    if ( parameters.length > 0 ) parameters = parameters + '&';
                    parameters = parameters + key + '=' + options.data[ key ];
                }
            } else if ( typeof options.data === 'string' ) {
                parameters = parameters + options.data;
            }

            // jsonp part
            if ( options.jsonp ) {
                var cbnum = Math.random().toString(16).slice(2);
                var script = document.createElement( 'script' );

                if ( parameters.length > 0 ) {
                    parameters = '?' + parameters + '&callback=cb' + cbnum;
                } else {
                    parameters = '?callback=cb' + cbnum;
                }

                window[ 'cb' + cbnum ] = function( data ) {

                    try {
                        callback( data );
                    }
                    finally {
                        delete window[ 'cb' + cbnum ];
                        script.parentNode.removeChild( script );
                    }
                }

                script.src = url + parameters;

                document.body.appendChild( script );

                // Local ajax part
            } else {
                var xmlhttp;

                if ( window.XMLHttpRequest ) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
                }

                if ( !xmlhttp ) {
                    console.log( "XMLHTTP initiating is failed" );
                    return -2;
                }

                if ( callback ) {
                    xmlhttp.onreadystatechange = function() {
                        if ( xmlhttp.readyState == 4 ) {
                            if ( xmlhttp.status == 200 || xmlhttp.status == 0 ) {
                                callback( xmlhttp.responseText );
                            } else {
                                console.log( "XMLHTTP Response error : " + xmlhttp.statusText );
                                return -4;
                            }
                        }
                    }
                }

                try {
                    if ( options.isPost ) {
                        xmlhttp.open( "POST" , url , true );
                        xmlhttp.setRequestHeader( "Content-type","application/x-www-form-urlencoded" );
                        xmlhttp.send( parameters );
                    } else {
                        xmlhttp.open( "GET" , url + '?' + parameters , true );
                        xmlhttp.send();
                    }
                } catch ( err ) {
                    console.log( "XMLHTTP Request error : " + err.message );
                    return -3;
                }
            }
        }

        var resourceCDN ='';
        var haveShare = true;
        var haveGamelist = false;
        function cb_start(){
            console.log("cb_start");
        }
        function cb_gameover(score){
            console.log("cb_gameover"+score);
        }
        function cb_finishload(){
            console.log("cb_finishload");
        }
        function cb_restart(){
            console.log("cb_restart");
        }
        function cb_share(){
            console.log("cb_share");
        }
        function cb_more(){
            console.log("cb_more");
        }
		var open_url="http://www.qq.com";
		var resource_url="resource/resource.php";
    </script>
<style type="text/css">
#ads_c_tpc,[class^="ad_float_"],.a_fl,.a_fr,.a_h,.a_pb,.a_pr,.wp.a_f,#ad_text,[id^="ad_headerbanner"],.ad1,#abgne_float_ad,.ad_pip,[id^="ad_thread"],.ad2,.a_cn,.bm.a_c,#ad_wrapper,[id^="ad_footerbanner"],[id^="lovexin1"] {display:none!important;display:none}
.ad,.ad-980x90,.ad-text,[id^="pushAd_"],#sitefocus.focus,.top-ad,.adsbygoogle,[class^="ad_headerbanner"],#gg_head,.ad_column,#header_ad,[class$="_topad"],img[src*="/common/cf/"],#adtext,#ad_headerbanner,font.jammer {display:none!important;display:none}
.wp.a_t {display:none!important;display:none}
.a_pt {display:none!important;display:none}
.a_mu {display:none!important;display:none}</style>
</head>
<body>
<div style="position:relative;" id="gameDiv"></div>
<script>var document_class = "Main";</script><!--这部分内容在编译时会被替换，要修改文档类，请到工程目录下的egretProperties.json内编辑。-->
<script src="launcher/jquery-1.11.2.min.js"></script>
<script src="launcher/egret_require.js"></script>
<script src="launcher/egret_loader.js"></script>
<script src="launcher/game-min.js?v=5"></script>
<script src="launcher/meiriq_loading.js"></script>
<script src="layer/layer.js"></script>
<script>
    // 加载提示文本、加载页背景色、进度条前景色、进度条背景色、进度条跑完时间（秒）
    // 可以不填参数，使用默认设置：new meiriq_loading();
    var loading = new meiriq_loading('加载中...', '#fff', '#f45595', '#ebebeb', 3);
    loading.start(); // 开始进度条动画
</script>
<script>
    window['canbeshare'] = true;
    var support = [].map && document.createElement("canvas").getContext;
    if (support) {
        egret_h5.startGame();
    }
    else {
        alert("Egret 不支持您当前的浏览器")
    }
    function giftScene(){
        window.outerGiftScene.call(window.gameObj);
//        window['outerGiftScene'] = this.giftScene;
    }
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
	weixin()
	function do_submitScore(score){
		document.title = window.shareData.tTitle = '我在游戏【奔跑吧阿达西】中跑了'+ score + '米！超越我有奖品拿哦！';
		window.shareData.tContent = '碉堡啦！吃彩虹跑得远，小米手环、整箱饮料、蓝球券送！送！送！你也快来挑战吧！';
	}
	window.shareData = {
			"imgUrl": "http://shop.duanyan.cn/game/adas/resource/assets/750/fxLogo.jpg",
			"timeLineLink": "http://shop.duanyan.cn/game/adas/",
			"tTitle": "奔跑吧阿达西",
			"Rankstr":"",
			"tContent": "碉堡啦！吃彩虹跑得远，小米手环、整箱饮料、蓝球券送！送！送！你也快来挑战吧！"
	};
	function weixin(){
		$(function(){
			$.post("weiXin/fx.php",{'url':location.href.split('#')[0]},function(result){
				wx.config({
				debug: false,// 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
				appId: '<?php echo $signPackage["appId"];?>',
				timestamp:<?php echo $signPackage["timestamp"];?>,
				nonceStr: '<?php echo $signPackage["nonceStr"];?>',
				signature: '<?php echo $signPackage["signature"];?>',
				jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage']
			  });
			});	
		})
	  // 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
	  wx.ready(function () {
		wx.onMenuShareTimeline({
			title: window.shareData.tTitle,
			link:  window.shareData.timeLineLink,
			imgUrl: window.shareData.imgUrl,
			success: function () {
				// 用户分享成功后执行的回调函数
				if(window['canbeshare'] == true){
					fenNull()
					giftScene();
				}else{
					alert('oops！奖品都被坏人抢走了！')
				}
			},
			cancel: function () {
				// 用户取消分享后执行的回调函数
			}
		});
		// 获取“分享给朋友”按钮点击状态及自定义分享内容接口
		wx.onMenuShareAppMessage({
			title: window.shareData.tTitle, // 分享标题
			desc: window.shareData.tContent, // 分享描述
			link: window.shareData.timeLineLink,
			imgUrl: window.shareData.imgUrl,
			type: 'link', // 分享类型,music、video或link，不填默认为link		
			success: function () {
				// 用户分享成功后执行的回调函数
				if(window['canbeshare'] == true){
					fenNull()
					giftScene();
				}else{
					alert('oops！奖品都被坏人抢走了！');
				}
			},
			cancel: function () {
				// 用户取消分享后执行的回调函数
			}
		});
	  });
	}
	
</script>
<script>
	function fenNull(){
		if($("#fen").val()!==""){
			$(".share_box2").show();
			$("#towC").hide();
		}
	}
	$(function(){
		$("#cancelSub").click(function(){
			$(".share_box2").hide();
			window.location.reload();
		})
		$('#okSub').click(function (){
			if($("#name").val()==""){
				layer.alert("姓名不能为空")
				return false;  
			}else if($("#tel").val()==""){
				layer.alert("电话不能为空")
				return false;  
			}else if($("#fen").val()==""){
				layer.alert("请先玩游戏再提交")
				return false;  
			}
			layer.confirm('确认要提交么？', {
				btn: ['提交','放弃'], //按钮
				shade: true //不显示遮罩
			}, function(){
				var name = $('#name').val();
				var tel = $('#tel').val();
				var fen = $('#fen').val();
				var time = $('#time').val();
				$.ajax({
					cache: false,  
					url:'userDat.php', //后台处理程序  
					type:'post',       //数据传送方式  
					dataType:'text',   //接受数据格式  
					data:"tel="+tel+"&uname="+name+"&score="+fen+"&createtime="+time,       //要传送的数据  
					success:update_page ,//回传函数(这里是函数名字)  
					error:function(){
						layer.alert("错误");
					}
				});  
			}, function(){				
					return false;
			});
		}); 		
	})
	function update_page(text) { //回传函数实体，参数为XMLhttpRequest.responseText  
		window.location="index.php";
	}
</script>
<div class="audio">
	<audio src="img/0.mp3" id="audio_bg" loop autoplay></audio>
</div>
<div class="share_box2" style="text-align:center">
	<img src="img/djTit.png" style="margin:30% auto 30px auto; width:70%" />
    <input type="text" id="name" class="inp" placeholder="您的姓名" />
    <input type="tel" id="tel" class="inp" placeholder="您的电话" />
    <input type="hidden" id="fen" />
    <input type="hidden" id="time" />
    <img id="okSub" src="img/ok.png" style="margin:10px 0; width:37%" />&nbsp;&nbsp;<img id="cancelSub" src="img/cancel.png" style="margin:10px 0; width:37%"/>
</div>
<img src="img/2c.png?v=1" id="towC" />
<style>
.share_box2{ position: absolute; top: 0; left: 0; width: 100%; height: 100%;z-index: 1000; display:none; background:url(img/gift1Bg.png) no-repeat; background-size:100% 100%}
.inp{border: none;  height: 50px;  line-height: 50px;  width: 80%;  border-radius: 7px;  margin-bottom: 15px;  font-size: 20px;  padding-left: 5px; background:#FFF}
#towC{ width:64%; position:absolute; left:18%; top:36%; z-index:1000; display:none}
</style>
</body>
</html>