"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};window.LArea=function(){var e=function(){this.gearArea,this.data,this.index=0,this.value=[0,0,0]};return e.prototype={init:function(e){switch(this.params=e,this.trigger=document.querySelector(e.trigger),e.valueTo&&(this.valueTo=document.querySelector(e.valueTo)),this.keys=e.keys,this.type=e.type||1,this.type){case 1:case 2:break;default:throw new Error("错误提示: 没有这种数据源类型")}this.bindEvent()},getData:function(a){var r=this;if("object"==_typeof(r.params.data))r.data=r.params.data,a();else{var i=new XMLHttpRequest;i.open("get",r.params.data),i.onload=function(e){if(200<=i.status&&i.status<300||0===i.status){var t=JSON.parse(i.responseText);r.data=t.data,a&&a()}},i.send()}},bindEvent:function(){var c=this;function e(e){c.gearArea=document.createElement("div"),c.gearArea.className="gearArea",c.gearArea.innerHTML='<div class="area_ctrl slideInUp"><div class="area_btn_box"><div class="area_btn larea_cancel">取消</div><div class="area_btn larea_finish">确定</div></div><div class="area_roll_mask"><div class="area_roll"><div><div class="gear area_province" data-areatype="area_province"></div><div class="area_grid"></div></div><div><div class="gear area_city" data-areatype="area_city"></div><div class="area_grid"></div></div><div><div class="gear area_county" data-areatype="area_county"></div><div class="area_grid"></div></div></div></div></div>',document.body.appendChild(c.gearArea),function(){switch(c.gearArea.querySelector(".area_province").setAttribute("val",c.value[0]),c.gearArea.querySelector(".area_city").setAttribute("val",c.value[1]),c.gearArea.querySelector(".area_county").setAttribute("val",c.value[2]),c.type){case 1:c.setGearTooth(c.data);break;case 2:c.setGearTooth(c.data[0])}}(),c.gearArea.querySelector(".larea_cancel").addEventListener("touchstart",function(e){c.close(e)}),c.gearArea.querySelector(".larea_finish").addEventListener("touchstart",function(e){c.finish(e)});var t=c.gearArea.querySelector(".area_province"),a=c.gearArea.querySelector(".area_city"),r=c.gearArea.querySelector(".area_county");t.addEventListener("touchstart",i),a.addEventListener("touchstart",i),r.addEventListener("touchstart",i),t.addEventListener("touchmove",n),a.addEventListener("touchmove",n),r.addEventListener("touchmove",n),t.addEventListener("touchend",s),a.addEventListener("touchend",s),r.addEventListener("touchend",s)}function i(e){e.preventDefault();for(var t=e.target;!t.classList.contains("gear");)t=t.parentElement;clearInterval(t["int_"+t.id]),t["old_"+t.id]=e.targetTouches[0].screenY,t["o_t_"+t.id]=(new Date).getTime();var a=t.getAttribute("top");t["o_d_"+t.id]=a?parseFloat(a.replace(/em/g,"")):0,t.style.webkitTransitionDuration=t.style.transitionDuration="0ms"}function n(e){e.preventDefault();for(var t=e.target;!t.classList.contains("gear");)t=t.parentElement;t["new_"+t.id]=e.targetTouches[0].screenY,t["n_t_"+t.id]=(new Date).getTime();var a=30*(t["new_"+t.id]-t["old_"+t.id])/window.innerHeight;t["pos_"+t.id]=t["o_d_"+t.id]+a,t.style["-webkit-transform"]="translate3d(0,"+t["pos_"+t.id]+"em,0)",t.setAttribute("top",t["pos_"+t.id]+"em"),e.targetTouches[0].screenY<1&&s(e)}function s(e){e.preventDefault();for(var t=e.target;!t.classList.contains("gear");)t=t.parentElement;var a=(t["new_"+t.id]-t["old_"+t.id])/(t["n_t_"+t.id]-t["o_t_"+t.id]);Math.abs(a)<=.2?t["spd_"+t.id]=a<0?-.08:.08:Math.abs(a)<=.5?t["spd_"+t.id]=a<0?-.16:.16:t["spd_"+t.id]=a/2,t["pos_"+t.id]||(t["pos_"+t.id]=0),function(n){var s=0,o=!1;function d(){n.style.webkitTransitionDuration=n.style.transitionDuration="200ms",o=!0}clearInterval(n["int_"+n.id]),n["int_"+n.id]=setInterval(function(){var e=n["pos_"+n.id],t=n["spd_"+n.id]*Math.exp(-.03*s);if(e+=t,.1<Math.abs(t));else{var a=2*Math.round(e/2);e=a,d()}0<e&&(e=0,d());var r=2*-(n.dataset.len-1);if(e<r&&(e=r,d()),o){var i=Math.abs(e)/2;!function(e,t){switch(t=Math.round(t),e.setAttribute("val",t),c.type){case 1:c.setGearTooth(c.data);break;case 2:switch(e.dataset.areatype){case"area_province":c.setGearTooth(c.data[0]);break;case"area_city":var a=e.childNodes[t].getAttribute("ref"),r=[],i=c.data[2];for(var n in i)if(n==a){r=i[n];break}c.index=2,c.setGearTooth(r)}}}(n,i),clearInterval(n["int_"+n.id])}n["pos_"+n.id]=e,n.style["-webkit-transform"]="translate3d(0,"+e+"em,0)",n.setAttribute("top",e+"em"),s++},30)}(t)}c.getData(function(){c.trigger.addEventListener("click",e)})},setGearTooth:function(e){var t=this,a=e||[],r=a.length,i=t.gearArea.querySelectorAll(".gear"),n=i[t.index].getAttribute("val"),s=r-1;if(s<n&&(n=s),i[t.index].setAttribute("data-len",r),0<r){var o,d=a[n][this.keys.id];switch(t.type){case 1:o=a[n].child;break;case 2:var c=t.data[t.index+1];for(var l in c)if(l==d){o=c[l];break}}var v="";for(l=0;l<r;l++)v+="<div class='tooth'  ref='"+a[l][this.keys.id]+"'>"+a[l][this.keys.name]+"</div>";if(i[t.index].innerHTML=v,i[t.index].style["-webkit-transform"]="translate3d(0,"+2*-n+"em,0)",i[t.index].setAttribute("top",2*-n+"em"),i[t.index].setAttribute("val",n),t.index++,2<t.index)return void(t.index=0);t.setGearTooth(o)}else i[t.index].innerHTML="<div class='tooth'></div>",i[t.index].setAttribute("val",0),1==t.index&&(i[2].innerHTML="<div class='tooth'></div>",i[2].setAttribute("val",0)),t.index=0},finish:function(e){var t=this,a=t.gearArea.querySelector(".area_province"),r=t.gearArea.querySelector(".area_city"),i=t.gearArea.querySelector(".area_county"),n=parseInt(a.getAttribute("val")),s=a.childNodes[n].textContent,o=a.childNodes[n].getAttribute("ref"),d=parseInt(r.getAttribute("val")),c=r.childNodes[d].textContent,l=r.childNodes[d].getAttribute("ref"),v=parseInt(i.getAttribute("val")),u=i.childNodes[v].textContent,h=i.childNodes[v].getAttribute("ref");t.trigger.value=s+(c?","+c:"")+(u?","+u:""),t.value=[n,d,v],this.valueTo&&(this.valueTo.value=o+(l?","+l:"")+(h?","+h:"")),t.close(e)},close:function(e){e.preventDefault();var t=new CustomEvent("input");this.trigger.dispatchEvent(t),document.body.removeChild(this.gearArea),this.gearArea=null}},e}();