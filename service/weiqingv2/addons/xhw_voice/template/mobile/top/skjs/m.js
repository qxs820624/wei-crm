/*! Copyright 2014 Baidu Inc. All Rights Reserved. */;(function(){var m=void 0,n=!0,p=null,s=!1;function t(a){return function(){return a}}var u=["search!"],ga=3,ha="BAIDU_DUP_replacement",ia="http://dup.baidustatic.com/painter/",y=document,A={},ja=0,ka=1,E=2,F=3,G=4,la=5;function ma(a){var b=na(a),d=b[0],b=b[1];this.id=a;this.name=b;this.uri=H(b);this.Ca=!b;this.status=ja;d&&b&&(this.Ha=I(L(d+"!"))||{load:function(){}});this.v=[]}
var R=window.BAIDU_DUP_require||function(a,b,d){M(a,function(){for(var c=[],d=0;d<a.length;d++)c[d]=I(L(a[d]));Q(b)&&b.apply(window,c)},d)};
function M(a,b,d){var c=a.length;if(0===c)b();else for(var i=c,g=0;g<c;g++)(function(a){function h(){if(a.status<E)k();else{for(var h=a.v,c=[],b=0;b<h.length;b++){var q=h[b];q&&L(q).status<F&&c.push(q)}0===c.length?k():M(c,k,d)}}function k(){a&&a.status<F&&(a.status=F);0===--i&&b()}var c=a.Ha;c&&(c.normalize&&(a.name=c.normalize(a.name,H)),c.name2url&&(a.uri=c.name2url(a.name)));a.status<E?c&&Q(c.load)?c.load(a.name,R,function(h){S(a.id,[],function(){return h});k()}):oa(a,h,d):h()})(L(a[g]))}
var T={},U={},V={};function oa(a,b,d){a.status=ka;V[a.id]?b():U[a.id]?T[a.id].push(b):(U[a.id]=n,T[a.id]=[b],d?(b=a.uri,a=y.createElement("script"),a.charset="utf-8",a.async=n,a.src=b,b=y.getElementsByTagName("head")[0]||y.body,b.insertBefore(a,b.firstChild)):y.write('<script charset="utf-8" src="'+a.uri+'"><\/script>'))}var S=window.BAIDU_DUP_define||function(a,b,d){var c=L(a);c.status<E&&(c.v=b,c.factory=d,c.status=c.Ca?F:E);if(U[a]){delete U[a];V[a]=n;b=T[a];for(delete T[a];a=b.shift();)a()}};
function I(a){if(!a)return p;if(a.status>=G)return a.W;if(a.status<F&&a.W===m)return p;a.status=G;for(var b=[],d=0;d<a.v.length;d++)b[d]=I(L(a.v[d]));var c=d=a.factory;Q(d)&&(c=d.apply(window,b));a.status=la;return a.W=c}function H(a){return/^https?:\/\//.test(a)?a:ia+a+".js"}function L(a){return A[a]||(A[a]=new ma(a))}function na(a){var b,d=a?a.indexOf("!"):-1;-1<d&&(b=a.slice(0,d),a=a.slice(d+1,a.length));return[b,a]}function Q(a){return"[object Function]"===Object.prototype.toString.call(a)}
S("util/lang",[],function(){function a(a){for(var c={},b="Array Boolean Date Error Function Number RegExp String".split(" "),g=0,f=b.length;g<f;g++)c["[object "+b[g]+"]"]=b[g].toLowerCase();return a==p?"null":c[Object.prototype.toString.call(a)]||"object"}var b=Object.prototype.hasOwnProperty;return{A:b,a:a,getAttribute:function(a,c){for(var b=a,g=c.split(".");g.length;){if(b===m||b===p)return;b=b[g.shift()]}return b},ga:function(d){if("object"!==a(d))return"";var c=[],i;for(i in d)b.call(d,i)&&c.push(i+
"="+encodeURIComponent(d[i]));return c.join("&")},k:function(b){var c=[];switch(a(b)){case "object":c=Array.prototype.slice.call(b);break;case "array":c=b;break;case "number":case "string":c.push(b)}return c},unique:function(a){for(var c=[],b={},g=a.length,f=0;f<g;f++){var h=a[f];b[h]||(c[c.length]=h,b[h]=n)}return c},removeItem:function(a,c){for(var b=[].slice.call(a),g=b.length-1;0<=g;g--)b[g]===c&&b.splice(g,1);return b},da:function(){}}});
S("util/browser",["util/lang"],function(a){var b={},d=navigator.userAgent,c=window.RegExp;/msie (\d+\.\d)/i.test(d)&&(b.q=document.documentMode||+c.$1);/opera\/(\d+\.\d)/i.test(d)&&(b.opera=+c.$1);/firefox\/(\d+\.\d)/i.test(d)&&(b.Ta=+c.$1);/(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(d)&&!/chrome/i.test(d)&&(b.eb=+(c.$1||c.$2));if(/chrome\/(\d+\.\d)/i.test(d)){b.na=+c.$1;var i;try{i="scoped"in document.createElement("style")}catch(g){i=s}i&&(b.Ma=n)}try{/(\d+\.\d)/.test(a.getAttribute(window,
"external.max_version"))&&(b.Za=+c.$1)}catch(f){}a="Android iPad iPhone Linux Macintosh Windows".split(" ");c="";for(i=0;i<a.length&&!(c=a[i],d.match(RegExp(c.toLowerCase(),"i")));i++);b.platform=c;return b});
S("util/dom",["util/lang"],function(a){function b(a){try{if(a&&"object"===typeof a&&a.document&&"setInterval"in a)return n}catch(b){}return s}function d(a,c){c=2===arguments.length?c:a.parent;return a!=c||!b(a)}function c(a,c){for(var c=2===arguments.length?c:a.parent,h=0;10>h++&&d(a,c);){var k;try{k=!!a.parent.location.toString()}catch(b){k=s}if(!k)return n;a=a.parent}return 10<=h}function i(a){return 9===a.nodeType?a:a.ownerDocument||a.document}return{c:function(c,b){return"string"===a.a(c)&&0<
c.length?(b||window).document.getElementById(c):c.nodeName&&(1===c.nodeType||9===c.nodeType)?c:p},Da:b,r:d,B:c,sa:i,z:function(a){a=i(a);return a.parentWindow||a.defaultView||p},i:function(a){a=b(a)?a.document:i(a);return"CSS1Compat"===a.compatMode?a.documentElement:a.body},K:function(b,f){1===arguments.length&&"number"===a.a(arguments[0])&&(f=arguments[0],b=m);for(var f=f||10,h=window,k=0;k++<f&&d(h)&&!c(h)&&(!b||!b(h));)h=h.parent;return h}}});
S("util/style",["util/lang","util/dom","util/browser"],function(a,b,d){function c(a,c){if(!a)return"";var d="",d=-1<c.indexOf("-")?c.replace(/[-][^-]{1}/g,function(a){return a.charAt(1).toUpperCase()}):c.replace(/[A-Z]{1}/g,function(a){return"-"+a.charAt(0).toLowerCase()}),e=b.z(a);if(e&&e.getComputedStyle){if(e=e.getComputedStyle(a,p))return e.getPropertyValue(c)||e.getPropertyValue(d)}else if(a.currentStyle)return e=a.currentStyle,e[c]||e[d];return""}function i(a){var k={top:0,left:0};if(a===b.i(a))return k;
var d=b.sa(a),e=d.body,d=d.documentElement;a.getBoundingClientRect&&(a=a.getBoundingClientRect(),k.left=Math.floor(a.left)+Math.max(d.scrollLeft,e.scrollLeft),k.top=Math.floor(a.top)+Math.max(d.scrollTop,e.scrollTop),k.left-=d.clientLeft,k.top-=d.clientTop,a=c(e,"borderLeftWidth"),e=c(e,"borderTopWidth"),a=parseInt(a,10),e=parseInt(e,10),k.left-=isNaN(a)?2:a,k.top-=isNaN(e)?2:e);return k}function g(a,b){var d=c(a,"margin"+b).toString().toLowerCase().replace("px","").replace("auto","0");return parseInt(d,
10)||0}function f(c){for(var k=b.z(c),j=100;c&&c.tagName;){var e=100;if(d.q){if(5<d.q)try{e=parseInt(a.getAttribute(c,"filters.alpha.opacity"),10)||100}catch(f){}j=j>e?e:j}else{try{e=100*(k.getComputedStyle(c,p).opacity||1)}catch(l){}j*=e/100}c=c.parentNode}return 0===j?0:j||100}return{Xa:c,Wa:i,p:function(a){var c=b.c(a);if(!c)return s;a=i(c);c=b.z(c);if(!c)return a;for(var d=0;c!==c.parent&&10>d++&&!b.B(c)&&c.frameElement;){var e=i(c.frameElement);a.left+=e.left;a.top+=e.top;c=c.parent}return a},
Ua:g,M:function(a,c){var d=b.c(a),e=d.offsetWidth;c&&(e+=g(d,"Left")+g(d,"Right"));return e},L:function(a,c){var d=b.c(a),e=d.offsetHeight;c&&(e+=g(d,"Top")+g(d,"Bottom"));return e},Va:f,ua:function(a){for(var c=b.c(a),a=b.z(c),c=f(c),d=0;10>d++&&b.r(a)&&!b.B(a);){var e=a.frameElement?f(a.frameElement):100,c=c*(e/100);a=a.parent}return c},aa:function(a){try{var c=b.i(a||window).scrollWidth;if(c||0===c)return c}catch(d){}return-1},$:function(a){try{var c=b.i(a||window).scrollHeight;if(c||0===c)return c}catch(d){}return-1},
n:function(a){try{var c=b.i(a||window).clientWidth;if(c||0===c)return c}catch(d){}return-1},m:function(a){try{var c=b.i(a||window).clientHeight;if(c||0===c)return c}catch(d){}return-1},ya:function(a){var c=b.i(a);return a.pageYOffset||c.scrollTop},xa:function(a){var c=b.i(a);return a.pageXOffset||c.scrollLeft}}});
S("util/url",["util/dom"],function(a){return{Z:function(a,d,c){a=a.match(RegExp("(\\?|&|#)"+d+"=([^&#]*)(&|#)?"));d="";a&&(d=a[2]);c&&(d=decodeURIComponent(d));return d},N:function(b){var b=a.K(b),d="";a.r(b)&&(d=b.document.referrer);return d=d||b.location.href}}});
S("util/event",["util/dom"],function(a){return{bind:function(b,d,c){if(b=a.Da(b)?b:a.c(b))if(b.addEventListener)b.addEventListener(d,c,s);else if(b.attachEvent)b.attachEvent("on"+d,c);else{var i=b["on"+d];b["on"+d]=function(){i&&i.apply(this,arguments);c.apply(this,arguments)}}return b}}});
S("util/cookie",["util/lang"],function(a){return{get:function(a,d){var c=RegExp("(^| )"+a+"=([^;]*)(;|$)").exec(document.cookie);return c?d?decodeURIComponent(c[2]):c[2]:""},set:function(b,d,c,i){var g=c.expires;"number"===a.a(g)&&(g=new Date,g.setTime(+g+c.expires));document.cookie=b+"="+(i?encodeURIComponent(d):d)+(c.path?"; path="+c.path:"")+(g?"; expires="+g.toGMTString():"")+(c.domain?"; domain="+c.domain:"")}}});
S("util/data",["util/lang","util/dom"],function(a,b){function d(c,b,d){var d=d?h:g,f;if("string"===a.a(c)){for(c=c.split(".");c.length;)f=c.shift(),d[f]=c.length?d[f]!==m?d[f]:{}:b,d=d[f];f=b}return f}function c(c,b){var d=b?h:g,f;"string"===a.a(c)&&(f=a.getAttribute(d,c));return f}function i(a,b,e){if(!a||!b)return s;var h=c(a)||{};switch(e){case "+1":e=h[b]||0;h[b]=++e;break;default:h[b]=parseInt(e,10)}d(a,h);return h[b]}var g={},f=b.K(),h=f.BAIDU_DUP_info||(f.BAIDU_DUP_info={});return{l:function(a,
c){var b=window;return b[a]?b[a]:b[a]=c},o:function(a){var c=window,b=c[a];c[a]=m;return b},h:d,d:c,fa:function(c,b){var d=b?h:g;switch(a.a(c)){case "string":for(var f=c.split(".");f.length;){var l=f.shift();if(f.length&&d[l]!==m)d=d[l];else return delete d[l],n}}return s},T:function(a,c){return i(a,c,"+1")},ab:function(a,c,b){return i(a,c,b)},count:i,ra:function(a,b){return!a||!b?s:(c(a)||{})[b]||0},La:function(a,b){if(!a||!b)return s;var h=c("pageConfig")||{};h[a]=b;d("pageConfig",h);return n},
qa:function(a){return!a?s:(c("pageConfig")||{})[a]}}});
S("util/storage",[],function(){function a(a,c,b){if(d)try{d.setItem(a,b?encodeURIComponent(c):c)}catch(h){}}function b(a,c){if(d){var b=d.getItem(a);return c&&b?decodeURIComponent(b):b}return p}var d;try{d=window.localStorage}catch(c){}return{ma:function(){var c=s;try{d.removeItem("BAIDU_DUP_storage_available"),a("BAIDU_DUP_storage_available","1"),b("BAIDU_DUP_storage_available")&&(c=n),d.removeItem("BAIDU_DUP_storage_available")}catch(g){}return c},setItem:a,getItem:b,ja:function(c,g,f){if(d){g=
f?encodeURIComponent(g):g;f=b(c)||"";try{a(c,f+((f&&"|")+g))}catch(h){}}},ia:function(c,g,f){if(d)if(g=f?encodeURIComponent(g):g,f=b(c)||"",f=f.replace(RegExp(g+"\\|?","g"),"").replace(/\|$/,""))try{a(c,f)}catch(h){}else d.removeItem(c)}}});
S("util/log",["util/lang","util/event","util/storage"],function(a,b,d){function c(a,c){var b=new Image,d="BAIDU_DUP_log_"+Math.floor(2147483648*Math.random()).toString(36);window[d]=b;b.onload=b.onerror=b.onabort=function(){b.onload=b.onerror=b.onabort=p;b=window[d]=p;c&&c(i,a,n)};b.src=a}var i="BAIDU_DUP_log_storage";return{Ya:c,bb:function(){var a=d.getItem(i);if(a)for(var a=a.split("|"),b=0,h=a.length;b<h;b++)c(decodeURIComponent(a[b]),d.ia)},G:function(g){var g="object"===a.a(g)?g:{},f=g.url||
"http://cbjslog.baidu.com/log",h=g.option||"now",g=a.ga(g.data||{}),f=f+((0<=f.indexOf("?")?"&":"?")+g+(g?"&":"")+"rdm="+ +new Date);switch(h){case "now":c(f);break;case "block":break;default:d.ja(i,f,n),b.bind(window,"unload",function(){c(f,d.ia)})}}}});S("util","util/lang,util/dom,util/style,util/url,util/event,util/cookie,util/data,util/storage,util/log,util/browser".split(","),function(a,b,d,c,i,g,f,h,k,j){return{lang:a,b:b,style:d,url:c,event:i,cookie:g,data:f,fb:h,log:k,V:j}});
S("biz",["util","slot"],function(a,b){function d(c,b){var d=/^[0-9a-zA-Z]+$/;return!c||!d.test(c)||!b?[]:b="array"===a.lang.a(b)?b:Array.prototype.slice.call(arguments,1)}function c(c,b,d){if(!b||!b.length)return s;var d=d||{S:s,ca:s,ea:s},j=d.ca?a.data.d(i):{},e=d.S?g:i,j=d.ea?{}:a.data.d(e)||j,d={},o;for(o in j)a.lang.A.call(j,o)&&(d[o]="array"===a.lang.a(j[o])?j[o].slice():j[o]);var j=d[c]||[],l=b.length;for(o=0;o<l;o++){var q=b[o];"string"===typeof q&&(q=encodeURIComponent(q),100>=q.length&&(j[j.length]=
q))}if(!j.length)return s;d[c]=a.lang.unique(j);a.data.h(e,d);return n}var i="bizOrientations",g="bizUrgentOrientations";return{U:function(a,b){var g=d.apply(this,arguments);return c(a,g)},ka:function(a,b){var g=d.apply(this,arguments);return c(a,g,{S:n,ca:n})},Oa:function(a,b){var g=d.apply(this,arguments);return c(a,g,{S:n,ea:n})},va:function(c){var c=Math.max(0,Math.min(c||500,500)),b=[],d=a.data.d(g)||a.data.d(i)||{};if("object"===a.lang.a(d))for(var j in d)a.lang.A.call(d,j)&&(b[b.length]=j+
"="+d[j].join(","));a.data.h(g,m);b.sort(function(a,c){return a.length-c.length});d="";j=b.length;for(var e=0;e<j&&!(d.length+b[e].length>=c);e++)d+=(e?"&":"")+b[e];return d},la:function(c,d){var g=b.u(),j={},e;for(e in g)if(g.hasOwnProperty(e)){var i=RegExp(d+"_[0-9]","g"),l=a.b.c("BAIDU_DUP_wrapper_"+e),q=s;l&&0<l.firstChild.outerHTML.length&&(q=n);if(d&&i.test(e)||!d)j[e]=q}c.apply(window,[j])}}});
S("preview",["biz","util"],function(a,b){function d(){function a(c){var d=b.url.Z;return d(i,"baidu_clb_preview_"+c)||d(i,"baidu_dup_preview_"+c)}var i=b.url.N(),g=a("sid"),f=a("mid"),h=a("vc"),k=+a("ts"),j=p;3E4>=+new Date-k&&(j={ha:g,Fa:f,Qa:h});d=function(){return j};return j}return{za:function(a){var b=[],g=d();g&&a==g.ha&&(b.push("mid="+g.Fa),b.push("sid="+g.Qa));return b.join("&")},d:function(){return d()},ba:function(a){var d=s;a?/cpro_template=/gi.test(a)&&(b.data.h("#unionPreviewSwitch",
n),d=n):d=!!b.data.d("#unionPreviewSwitch");return d},Aa:function(){var a=b.data.d("#unionPreviewData");return a?"prev="+encodeURIComponent(a)+"&pt=union":""},Pa:function(a){b.data.h("#unionPreviewData",a)},Sa:function(){b.data.fa("#unionPreviewSwitch");b.data.fa("#unionPreviewData")}}});
S("slot",["util"],function(a){function b(){for(var a={response:{},holder:"",stack:[],errors:[],status:{}},c=k.length-1;0<=c;c--)a.status[k[c]]=0;return a}function d(a,c){var b=s;"fillAsync"===c&&(b=n);o[a]&&-1!==o[a].stack.join(" ").toLowerCase().indexOf("async")&&(b=n);return b}function c(a,c){if(!a)return"";var b=l+a;c&&(b+="_"+c);return b}function i(a,c,b){if(!a||!c)return s;b===m&&(b=+new Date);return o[a]?(o[a].status[c]=b,n):s}function g(a,c){f(a,"errors",c)}function f(c,b,d){c&&b&&d&&(c=o[c])&&
"array"===a.lang.a(c[b])&&c[b].push(d)}function h(a){return!a?o:o[a]||s}var k="add,create,request,response,render,finish".split(","),j=[],e={},o={},l="BAIDU_DUP_wrapper_";return{add:function(){var c={ids:[],preloadIds:[]},d=a.lang.k(arguments);if(!d.length)return c;for(var d=d.join(",").split(","),l=[],g=[],f=d.length,k=0;k<f;k++){var r=d[k];if(e.hasOwnProperty(r)){var z=r+"_"+e[r],D=h(z).stack||[];if("preload"===D[D.length-1]){c.preloadIds.push(z);continue}e[r]+=1}else e[r]=0;r=r+"_"+e[r];o[r]=new b;
i(r,"add");g.push(r);l.push(r)}j=j.concat(g);c.ids=l;return c},create:function(b,e,l){if(!b||!e)return s;var h=c(b),f=n;if(a.b.c(h))return o[b].holder=h,f;if(d(b,e)){l=l||"";o[b].holder=l;l=a.b.c(l);try{l&&(l.innerHTML='<div id="'+h+'"></div>',o[b].holder=h)}catch(j){g(b,"Failed to insert wrapper"),f=s}}else if(document.write('<div id="'+h+'"></div>'),!a.b.c(h))try{var k=document.getElementsByTagName("script"),z=k[k.length-1];if(z){var D=z.parentNode;if(D){var W=document.createElement("div");W.id=
c(b,"b");D.insertBefore(W,z)}}}catch(qa){g(b,"Failed to create backup wrapper")}i(b,"create");return f},pa:d,ta:function(a){return d(a)?"async":"sync"},Y:function(b){return!b?"":(b=a.b.c(o[b].holder)||a.b.c(c(b))||a.b.c(c(b,"b")))&&b.id||""},u:h,R:function(a,c){if(!a||!c)return s;return o[a]?(o[a].response=c,i(a,"response"),n):s},s:i,j:g,H:function(a,c){f(a,"stack",c)},J:function(c){c=a.lang.k(c);if(!c.length)return s;var b=[],d={},l;for(l=0;l<j.length;l++)d[j[l]]=l+1;for(l=0;l<c.length;l++){var e=
d[""+c[l]];e===m&&(e=0);b.push(e)}return b},p:function(b){b=a.lang.k(b);if(!b.length)return["-1x-1"];for(var d=[],l=0;l<b.length;l++){var e=b[l],h;try{var f=a.b.c(c(e))||a.b.c(c(e,"b"));if(f){var k=a.style.p(f);k&&(h=[k.top,k.left])}}catch(j){g(e,"Unable to get ps")}h=h?h:[-1,-1];d.push(h.join("x"))}return d}}});
S("api",["slot","util"],function(a,b){return{getDai:a.J,getSlots:a.u,getFillType:a.ta,getFillWrapperId:a.Y,setStatus:a.s,addErrorItem:a.j,addStackItem:a.H,bind:b.event.bind,getType:b.lang.a,sendLog:b.log.G,putInfo:b.data.h,getInfo:b.data.d,defineOnce:b.data.l,addCount:b.data.T,getCount:b.data.ra,getConfig:b.data.qa}});
S("param",["slot","preview","biz","util"],function(a,b,d,c){function i(a,c){for(var c=c||0,b=[],d=0,e=a.length;d<e;d++)b.push(a[d].split("_")[c]);return b.join(",")}function g(a){a=a||window.document.domain;0===a.indexOf("www.")&&(a=a.substr(4));"."===a.charAt(a.length-1)&&(a=a.substring(0,a.length-1));var c=a.match(RegExp("([a-z0-9][a-z0-9\\-]*?\\.(?:com|cn|net|org|gov|info|la|cc|co|jp|us|hk|tv|me|biz|in|be|io|tk|cm|li|ru|ws|hn|fm|tw|ma|in|vn|name|mx|gd|im)(?:\\.(?:cn|jp|tw|ru|th))?)$","i"));return c?
c[0]:a}var f=window,h=f.document,k=f.screen,j=f.navigator,e=+new Date,o=[{key:"di",value:function(a){return i(a.id)}},{key:"dcb",value:t("BAIDU_DUP_define")},{key:"dtm",value:t("BAIDU_DUP2_SETJSONADSLOT")},{key:"dbv",value:function(){var a=c.V;return a.Ma?"1":a.na?"2":"0"}},{key:"dci",value:function(c){for(var b="-1",d={fill:"0",fillOnePiece:"1",fillAsync:"2",preload:"3"},e=0;e<c.id.length;e++){var h=a.u(c.id[e]);if(h){var h=h.stack,g=h.length;if(1<=g){b=d[h[g-1]];break}}}return b}},{key:"dri",value:function(a){return i(a.id,
1)}},{key:"dis",value:function(){var a=0;c.b.r(f)&&(a+=1);c.b.B(f,f.top)&&(a+=2);var b=c.style.n(),d=c.style.m();if(40>b||10>d)a+=4;return a}},{key:"dai",value:function(c){return a.J(c.id).join(",")}},{key:"dds",value:function(){var a=c.data.d("dds");return c.lang.ga(a)}},{key:"drs",value:function(){var a={uninitialized:0,loading:1,loaded:2,interactive:3,complete:4};try{return a[h.readyState]}catch(c){return-1}}},{key:"dvi",value:t("1410832926")},{key:"ltu",t:n,value:function(){var a=c.url.N(function(a){var b=
c.style.n(a),a=c.style.m(a);return 400<b&&120<a?n:s});0<a.indexOf("cpro_prev")&&(a=a.slice(0,a.indexOf("?")));return a}},{key:"liu",t:n,value:function(){return c.b.r(f)?h.URL:""}},{key:"ltr",t:n,value:function(){var a=c.b.K(),b="";try{b=a.opener?a.opener.document.location.href:""}catch(d){}return b||a.document.referrer}},{key:"lcr",t:n,value:function(){var a=h.referrer,b=a.replace(/^https?:\/\//,""),b=b.split("/")[0],b=b.split(":")[0],b=g(b),d=g(),e=c.cookie.get("BAIDU_DUP_lcr");if(e&&d===b)return e;
return d!==b?(c.cookie.set("BAIDU_DUP_lcr",a,{domain:d}),a):""}},{key:"ps",value:function(c){return a.p(c.id).join(",")}},{key:"psr",value:function(){return[k.width,k.height].join("x")}},{key:"par",value:function(){return[k.availWidth,k.availHeight].join("x")}},{key:"pcs",value:function(){return[c.style.n(),c.style.m()].join("x")}},{key:"pss",value:function(){return[c.style.aa(),c.style.$()].join("x")}},{key:"pis",value:function(){return(c.b.r(f)?[c.style.n(),c.style.m()]:[-1,-1]).join("x")}},{key:"cfv",
value:function(){var a=0;if(j.plugins&&j.mimeTypes.length){var c=j.plugins["Shockwave Flash"];c&&c.description&&(a=c.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s)+r/,".")+".0")}else if(f.ActiveXObject&&!f.opera)for(c=10;2<=c;c--)try{var b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+c);b&&(a=b.GetVariable("$version").replace(/WIN/g,"").replace(/,/g,"."))}catch(d){}return parseInt(a,10)}},{key:"ccd",value:function(){return k.colorDepth||0}},{key:"chi",value:function(){return f.history.length||
0}},{key:"cja",value:function(){return j.javaEnabled().toString()}},{key:"cpl",value:function(){return j.plugins.length||0}},{key:"cmi",value:function(){return j.mimeTypes.length||0}},{key:"cce",value:function(){return j.cookieEnabled||0}},{key:"col",value:function(){return(j.language||j.browserLanguage||j.systemLanguage).replace(/[^a-zA-Z0-9\-]/g,"")}},{key:"cec",value:function(){return(h.characterSet?h.characterSet:h.charset)||""}},{key:"cdo",value:function(){var a=window.orientation;a===m&&(a=
-1);return a}},{key:"tsr",value:function(){var a=0,c=+new Date;e&&(a=c-e);return a}},{key:"tlm",value:function(){return Date.parse(h.lastModified)/1E3}},{key:"tcn",value:function(){return Math.round(+new Date/1E3)}},{key:"tpr",value:function(a){var a=a&&a.max_age?a.max_age:24E4,c=(new Date).getTime(),b,d;try{b=!!window.top.location.toString()}catch(e){b=s}d=b?window.top:window;(b=d.BAIDU_DUP2_pageFirstRequestTime)?c-b>=a&&(b=d.BAIDU_DUP2_pageFirstRequestTime=c):b=d.BAIDU_DUP2_pageFirstRequestTime=
c;return b||""}},{key:"_preview",value:function(a){return b.za(i(a.id))}},{key:"dpt",value:function(){var a="none";b.ba()&&(a="union");return a}},{key:"coa",t:n,value:function(a){var b=a.id,b=b[0].split("_")[0],a={},d=s,e=c.data.d("#novaOpenApi");if(e&&b&&e[b]){var d=n,b=e[b],h;for(h in b)h&&b.hasOwnProperty(h)&&"undefined"!==typeof b[h]&&(a[h]=encodeURIComponent(b[h]).toString())}d&&(a.c01=1);h="";for(var g in a)g&&a.hasOwnProperty(g)&&"undefined"!==typeof a[g]&&(h+="&"+g+"="+a[g]);return h=h.slice(1)}},
{key:"_unionpreview",value:function(){return b.Aa()}},{key:"baidu_id",value:t("")},{key:"_orientation",value:function(){return d.va()}}];return{get:function(a,c){for(var b=[],d=0,e=o.length;d<e;d++){var h;try{var g=o[d],f=g.key,k=g.t,j=g.value,j="function"===typeof j?j(a):j,j=k?encodeURIComponent(j):j;if(c&&c===f)return j;h=f&&0!==f.indexOf("_")?f+"="+j:j}catch(i){h=encodeURIComponent(i.toString()),h=h.slice(0,100)}h&&b.push(h)}b=b.join("&");return b.slice(0,2048)}}});
S("request",["param","slot","util"],function(a,b,d){S("request!",[],{name2url:function(c){return"http://cb.baidu.com/ecom?"+a.get({id:c.split(",")})}});S("batch!",[],{name2url:function(c){return"http://cb.baidu.com/ecom?"+a.get({id:c.split(",")})}});return{send:function(a,i,g){if(!a||!i||g===m)return s;var f=[];if("array"!==d.lang.a(a))b.s(a,"request"),f=["request!"+a];else{for(f=0;f<a.length;f++)b.s(a[f],"request");f=1===a.length?["request!"+a[0]]:["batch!"+a.join(",")]}R(f,i,g);return n}}});
S("control",["slot","request","preview","util"],function(a,b,d,c){function i(b,d,g){var e=d.deps,f=d.data,i=a.Y(b);g&&!i?a.j(b,"HolderNotFound"):e&&(0>e[0].indexOf("clb/")&&a.s(b,"finish"),R(e,function(d){if("object"===c.lang.a(f)){f.id=b;if(d.hasOwnProperty("validate"))try{var g=d.validate(f);g!==n&&c.log.G({data:{type:g||"ResponseError",errorPainter:e[0],id:b,slotType:f._stype,materialType:f._isMlt,html:!!f._html}})}catch(j){a.j(b,"validateException")}if(d.hasOwnProperty("render"))try{a.s(b,"render"),
d.render(f,i)}catch(k){a.j(b,"RenderException")}else a.j(b,"RenderNotFound")}else a.j(b,"ResponseFormatError")},g))}function g(c,d,g){if(!c)return s;var g=g||"",e=a.add(c),c=e.ids[0]||e.preloadIds[0];if(!c)return s;var f=a.pa(c,d);a.H(c,d);a.create(c,d,g);e.ids.length?b.send(c,function(b){a.R(c,b);i(c,b,f)},f):e.preloadIds.length&&(d=a.u(c).response,i(c,d,f));return n}function f(c){for(var b=0,d=c+"_"+b;0!==a.J([d])[0];){var e=a.u(d);if((e=e&&e.response)&&0===e.deps[0].indexOf("clb/")){var g=e.data,
e=g._isMlt;(0===e&&""!==g._html||e===s&&g._fxp)&&a.s(d,"finish",0)}d=c+"_"+ ++b}if(c!==m&&(c=(b=window.BAIDU_CLB_SLOTS_MAP)&&b[c],c!==m&&(e=c._isMlt,0===e&&""!==c._html||e===s&&c._fxp)))c._done=s}window.BAIDU_CLB_prepareMoveSlot=f;return{fill:function(a){return g(a,"fill")},I:function(a,c){return g(a,"fillAsync",c)},Ia:function(){function g(d){b.send(d,function(b){if("array"===c.lang.a(b)){if(b&&b.length===d.length)for(var e=0;e<d.length;e++)a.R(d[e],b[e])}else"object"===c.lang.a(b)&&b&&1===d.length&&
a.R(d[0],b)},s)}var f=c.lang.k(arguments),f=c.lang.unique(f),j=d.d();if(j)for(var e=0,i=f.length;e<i;e++)f[e]==j.ha&&(f.splice(e,1),e--);for(f=a.add(f).ids;f.length;){j=f.splice(0,16);for(e=0;e<j.length;e++)a.H(j[e],"preload");g(j)}},Ja:f}});
S("global",["control","biz","util","preview"],function(a,b,d,c){function i(a){a=a.split(".");return j[a[0]]+a[1]}function g(){var a=k.BAIDU_DUP;if(!("object"===d.lang.a(a)&&a.push)){if("array"===d.lang.a(a)&&a.length)for(var c=0;c<a.length;c++)f(a[c]);k.BAIDU_DUP=m;d.data.l("BAIDU_DUP",{push:f});d.data.l("BAIDU_DUP_proxy",function(a){if(a)return function(){try{return f([a].concat(d.lang.k(arguments)))}catch(c){0<ga--&&d.log.G({data:{type:"ExecuteException",errorName:a,args:d.lang.k(arguments).join("|"),
isQuirksMode:"CSS1Compat"!==document.compatMode,documentMode:document.documentMode||"",readyState:document.readyState||"",message:c.message}})}}});for(c in o)c&&d.lang.A.call(o,c)&&d.data.l(c,k.BAIDU_DUP_proxy(c));h()}}function f(a){if("array"!==d.lang.a(a))return s;var c=a.shift();d.data.T("apiCount",c);return(c=o[c]||l[c]||s)&&c.apply(p,a)}function h(){function a(c){for(var b=0,d=u.length;b<d;b++)if(0===c.indexOf(u[b]))return n;return s}d.data.l("BAIDU_DUP_require",function(c){for(var b=0,d=c.length;b<
d;b++)if(a(c[b]))return;R.apply(p,arguments)});d.data.l("BAIDU_DUP_define",function(c,b){for(var d=0,e=b.length;d<e;d++)if(a(b[d]))return;S.apply(p,arguments)})}var k=window,j={clb:"BAIDU_CLB_",dan:"BAIDU_DAN_",nova:"cpro",dup:"BAIDU_DUP_"},e=[{f:["clb.fillSlot","clb.singleFillSlot","clb.fillSlotWithSize"],g:["fill"],e:a.fill},{f:["clb.fillSlotAsync"],g:["fillAsync"],e:a.I},{f:["clb.preloadSlots"],g:["preload"],e:a.Ia},{f:["clb.prepareMoveSlot"],g:["prepareMove"],e:a.Ja},{f:["clb.addOrientation"],
g:["addOrientation"],e:b.U},{f:["clb.addOrientationOnce"],g:["addOrientationOnce"],e:b.ka},{f:["clb.setOrientationOnce"],g:["setOrientationOnce"],e:b.Oa},{f:["clb.setConfig"],g:["putConfig"],e:d.data.La},{f:["clb.addSlot","clb.enableAllSlots","clb.SETHTMLSLOT"],g:[],e:d.lang.da},{f:["dup.addSlotStatusCallback"],g:[],e:b.la}],e=function(a){for(var c={},b={},d=0;d<a.length;d++){for(var e=a[d],g=e.f,f=e.g,e=e.e;g.length;)c[i(g.shift())]=e;for(;f.length;)b[f.shift()]=e}return{Ga:c,Ka:b}}(e),o=e.Ga,l=
e.Ka;return{Ba:function(){var e=d.data.o(i("clb.ORIENTATIONS"));if(e)for(var f in e)Object.prototype.hasOwnProperty.call(e,f)&&b.U(f,e[f]);d.data.h("#novaOpenApi",d.data.o("cproStyleApi"));var h=d.data.o("cproArray");if(h)for(var e=0,j=h.length;e<j;e++)h[e]&&h[e].id&&a.I(h[e].id,"cpro_"+h[e].id);if(h=d.data.o("cpro_mobile_slot")){e=0;for(j=h.length;e<j;e++){var k=h[e],l=k.id,o=d.data.d("#novaOpenApi")||{};o[l]||(o[l]={});for(f in k)f&&"id"!==f&&k.hasOwnProperty(f)&&(o[l][f]=k[f]);d.data.h("#novaOpenApi",
o);h[e]&&h[e].id&&a.I(h[e].id,"cpro_"+h[e].id)}}if(f=d.data.o("cpro_id"))c.ba(f)&&(c.Pa(f),f="u0"),a.fill(f);a.fill(d.data.o(i("clb.SLOT_ID")));g()}}});S("logService",["util/lang","util/event"],function(a,b){b.bind(window,"load",function(){R(["detect"],a.da,n)})});
S("fingerprint",["util/storage","util/event","util/browser","util/data","param"],function(a,b,d,c,i){var g=window,f=s;d.q?6<=d.q&&(f=n):a.ma()&&(f=n);0<=g.location.href.indexOf("wa.kuwo.cn")||(f&&(c.d("isFPLoaded",n)===n?f=s:c.h("isFPLoaded",n,n)),f&&b.bind(g,"load",function(){var a=g.document,c=a.body,b="http://pos.baidu.com/wh/o.htm?ltr="+i.get({},"ltr"),d=a.createElement("div");d.id="BAIDU_DUP_fp_wrapper";d.style.position="absolute";d.style.left="-1px";d.style.bottom="-1px";d.style.zIndex=0;d.style.width=
0;d.style.height=0;d.style.overflow="hidden";d.style.visibility="hidden";d.style.display="none";a=a.createElement("iframe");a.id="BAIDU_DUP_fp_iframe";a.src=b;a.style.width=0;a.style.height=0;a.style.visibility="hidden";a.style.display="none";try{d.insertBefore(a,d.firstChild),c&&c.insertBefore(d,c.firstChild)}catch(f){}}))});S("replacement",["util"],function(a){function b(){var d=a.url.N(),c=a.url.Z(d,ha,n);b=function(){return c};return c}return{wa:function(){return b()}}});
R(["replacement"],function(a){(a=a.wa())?R([a]):(R(["global"],function(a){a.Ba()}),R(["logService"]),R(["fingerprint"]))});
window.BAIDU_DUP_define&&window.BAIDU_DUP_define("detect",["api"],function(a){function b(c){c.url="";c.host=window.location.hostname;c.from="DUP";a.sendLog({data:c,$a:"now"})}try{setTimeout(function(){var c=a.getSlots(),d;for(d in c){var g=c[d],f=g.response,h=s;if("object"!==a.getType(f))h=n;else{var h=n,k;for(k in f)if(Object.prototype.hasOwnProperty.call(f,k)){h=s;break}}var j=g.status,g=g.stack;h?b({type:"preload"===g[0]?"preloadFail":"loadFail",id:d}):!j.render&&!j.finish&&b({type:"renderFail",
id:d,error:"preload"===g[0]?"PreloadNotFilled":"NotFilled",empty:!(!f.data||!f.data._html)})}},0)}catch(d){}});
window.BAIDU_DUP_define&&window.BAIDU_DUP_define("viewWatch",["util","param"],function(a,b){function d(){var b=+new Date,d=500;x===h&&N&&(d=b-N);N=b;for(var j in l)if(o.call(l,j)){x===g&&(x=f);var i=l[j];i.F&&(i.P+=d);i.D&&(i.O+=d);i.Q=b-i.timestamp;if(x===h)J&&(i.w+=b-i.C);else if(72E5<=i.Q)c(s);else{var k=i=m,q=m;for(q in l)if(o.call(l,q)){var w=l[q];if(J){var v=a.b.c(w.Ra);if(!v)break;try{var B=e.n(r),C=e.m(r),K=e.p(v);w.top=K.top;w.left=K.left;var X=e.ya(r),Y=e.xa(r),Z=e.M(v),$=e.L(v),aa=K.top-
X+0.35*$,ba=K.left-Y+0.35*Z;w.F=0<aa&&aa<C&&0<ba&&ba<B;var pa=Z*$,ca=e.p(v),O=ca.top-X,P=ca.left-Y,da=e.M(v),ea=e.L(v),fa=v=0,v=0>O?Math.max(O+ea,0):Math.min(ea,Math.max(C-O,0)),fa=0>P?Math.max(P+da,0):Math.min(da,Math.max(B-P,0));i=fa;k=v;w.D=k*i>0.5*pa}catch(ra){w.F=s,w.D=s}}else w.F=s,w.D=s}}}}function c(c){clearInterval(B);var b=document.domain.toLowerCase();if(!(-1<b.indexOf("autohome.com.cn")||-1<b.indexOf("sina.com.cn")||-1<b.indexOf("pconline.com.cn")||-1<b.indexOf("pcauto.com.cn")||-1<b.indexOf("pclady.com.cn")||
-1<b.indexOf("pcgames.com.cn")||-1<b.indexOf("pcbaby.com.cn")||-1<b.indexOf("pchouse.com.cn")||-1<b.indexOf("xcar.com.cn")))if(x!==f)x=h;else{x=h;d();var b=s,e;for(e in l)if(e&&l.hasOwnProperty(e)&&l[e]){var g=l[e];"block"===g.Ea&&(b=n);g.total=q;a.log.G({url:i(g)})}if(c&&b)if(c=+new Date,k.q)for(b=c+200;b>+new Date;);else{e=1E5;for(b=0;b<e;b++);b=+new Date;e=Math.min(200*e/(b-c),1E7);for(b=0;b<e;b++);}}}function i(a){var c=["tu="+a.id,"word="+b.get(m,"ltu"),"if="+b.get(m,"dis"),"aw="+a.width,"ah="+
a.height,"pt="+a.Q,"it="+a.P,"vt="+a.O,"csp="+C,"bcl="+a.oa,"pof="+a.Na,"top="+a.top,"left="+a.left,"total="+a.total];return a.url+(a.X?a.X+"&":"")+c.join("&")}var g=1,f=2,h=3,k=a.V,j=a.event.bind,e=a.style,o=a.lang.A,l=[],q=0,B=0,x=g,J=n,N=0,C=[1E4<screen.availWidth?0:screen.availWidth,1E4<screen.availHeight?0:screen.availHeight].join(),r=window;a.b.r(window)&&!a.b.B(window)&&(r=window.top);B=setInterval(d,500);(function(){function a(){var c=+new Date,b;for(b in l)if(o.call(l,b)){var d=l[b];d.w+=
c-d.C;d.C=c}J=s}function c(){var a=+new Date,b;for(b in l)o.call(l,b)&&(l[b].C=a);J=n}k.q?(j(document,"focusin",c),j(document,"focusout",a)):(j(window,"focus",c),j(window,"blur",a))})();j(window,"beforeunload",c);return{register:function(b){var c=+new Date,d=b.id,f=b.wrapperId,g=b.url||"http://eclick.baidu.com/a.js?",h=b.logType||"storage",b=b.extra||"";if(f&&!l[f]){var i=a.b.c(f);if(i){var j=e.p(i);l[f]={id:d,Ra:f,url:g,Ea:h,X:b,timestamp:c,P:0,F:s,O:0,D:s,Q:0,w:0,C:c,top:j.top,left:j.left,cb:C,
opacity:e.ua(i),oa:[e.n(),e.m()].join(),Na:[e.aa(),e.$()].join(),width:e.M(i),height:e.L(i)};q++}}},getWatchCount:function(){return q}}});})();