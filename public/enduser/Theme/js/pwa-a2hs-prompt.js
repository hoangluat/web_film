const A2HS_TEMPLATE=`
<div class="fixed z-50 bottom-0 banner-pwa">
<div class="m-2 bg-purple-700 rounded-lg border-purple-900 border p-2 shadow-lg">
<div class="px-2"><span class="block">Cài đặt BiluTV để xem phim nhanh hơn</span></div>
<div class="m-1">
<button class="px-3 py-1 bg-white rounded-full text-black w-40" id="pwa-install-btn">Cài đặt</button>
<button class="w-20" id="pwa-dismiss">Để sau</button>
</div>
</div>
</div>
`;function A2HS_FUNC(){var dialogElem=document.createElement('div');dialogElem.style.cssText='position:fixed;width:100%;bottom:0;background:white;font-family:sans-serif;padding:1em;z-index:9999;border-top:1px #d3d3d3 solid;display:none;';dialogElem.innerHTML=A2HS_TEMPLATE;document.body.appendChild(dialogElem);function _getCookie(name){var v=document.cookie.match('(^|;) ?'+name+'=([^;]*)(;|$)');return v?v[2]:null;}
function _setCookie(name,value,days){var d=new Date;d.setTime(d.getTime()+24*60*60*1000*days);document.cookie=name+'='+value+';path=/;expires='+d.toGMTString();}
function showDialog(){var deferredPrompt;var installBtn=document.getElementById('pwa-install-btn');var installDismissBtn=document.getElementById('pwa-dismiss');var installDialog=dialogElem;var installDialogDontShow=_getCookie('installDialogHide');window.addEventListener('beforeinstallprompt',(e)=>{e.preventDefault();deferredPrompt=e;if(installDialogDontShow)return;installDialog.style.display='block';installBtn.addEventListener('click',(e)=>{installDialog.style.display='none';deferredPrompt.prompt();deferredPrompt.userChoice.then((choiceResult)=>{if(choiceResult.outcome==='accepted'){_setCookie('installDialogHide','true',999);console.log('User accepted the A2HS prompt');}else{console.log('User dismissed the A2HS prompt');}
deferredPrompt=null;});});installDismissBtn.addEventListener('click',(e)=>{installDialog.style.display='none';_setCookie('installDialogHide','true',999);});});}
showDialog();}
document.addEventListener('DOMContentLoaded',function(){A2HS_FUNC();},false);