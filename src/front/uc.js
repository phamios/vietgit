typeof CYBOT=="undefined"&&(CYBOT={}),CYBOT.Cookie=function(n){this.name=n,this.consented=!1,this.declined=!1,this.hasResponse=!1,this.consentID="0",this.consent={stamp:"0",necessary:!0,preferences:!1,statistics:!1,marketing:!1},this.isOutsideEU=!1,this.host="",this.iswhitelabel=!1,this.doNotTrack=!1,this.consentLevel="strict",this.isRenewal=!1,this.dialog=null,this.responseMode="",this.serial="",this.scriptId="Cookiebot",this.scriptElement=null,this.whitelist=[],this.init=function(){var f=this,n=document.getElementById(this.scriptId),e,r,t,u;if(!n&&(this.iswhitelabel=!0,this.scriptId="CookieConsent",n=document.getElementById(this.scriptId),!n)){for(e=document.getElementsByTagName("script"),i=0;i<e.length;i++)if(r=e[i],f.hasAttr(r,"src")&&(f.hasAttr(r,"data-cbid")||r.getAttribute("src").toLowerCase().indexOf("cbid=")>0)&&r.getAttribute("src").toLowerCase().indexOf("/uc.js")>0){n=r;break}n&&(f.hasAttr(n,"id")?this.scriptId=n.getAttribute("id"):f.hasAttr(n,"src")&&(n.getAttribute("src").toLowerCase().indexOf("consent.cookiebot.com")<0?(this.scriptId="CookieConsent",n.id=this.scriptId):this.iswhitelabel=!1))}n&&(this.scriptElement=n,this.host="https://"+n.src.match(/:\/\/(.[^/]+)/)[1]+"/"),t=this.getCookie(this.name),t&&(t=="-2"?(this.declined=!1,this.consented=!1,this.hasResponse=!1,this.consent.preferences=!1,this.consent.statistics=!1,this.consent.marketing=!1,this.consentLevel="implied"):(t=="0"?(this.declined=!0,this.consent.preferences=!1,this.consent.statistics=!1,this.consent.marketing=!1):(this.consented=!0,this.consent.preferences=!0,this.consent.statistics=!0,this.consent.marketing=!0,t=="-1"&&(this.isOutsideEU=!0)),this.hasResponse=!0),t.indexOf("{")==0&&t.indexOf("}")>0?(u=eval("("+t+")"),this.consentID=u.stamp,this.consent.stamp=u.stamp,this.consent.preferences=u.preferences,this.consent.statistics=u.statistics,this.consent.marketing=u.marketing,this.responseMode="leveloptin"):(this.consentID=t,this.consent.stamp=t)),this.setDNTState(),typeof CookiebotDialog!="undefined"&&CookiebotDialog.hide(),this.consented||this.declined?this.setOnload():this.process(!1)},this.runScripts=function(){var o=this,e=[],s=document.getElementsByTagName("script"),n,u,t;for(i=0;i<s.length;i++)n=s[i],o.hasAttr(n,"data-cookieconsent")&&o.hasAttr(n,"type")&&n.getAttribute("type").toLowerCase()=="text/plain"&&e.push(n);for(i=0;i<e.length;i++){var n=e[i],h=n.getAttribute("data-cookieconsent").toLowerCase().split(","),r=!0;for(j=0;j<h.length;j++)u=h[j].trim(),u!="preferences"||Cookiebot.consent.preferences||(r=!1),u!="statistics"||Cookiebot.consent.statistics||(r=!1),u!="marketing"||Cookiebot.consent.marketing||(r=!1);if(r){var c=n.parentNode,l=n.nextElementSibling,f=document.createElement("script");for(t=0;t<n.attributes.length;t++)typeof n.attributes[t].value!="undefined"&&n.attributes[t].value!=""&&f.setAttribute(n.attributes[t].name,n.attributes[t].value);f.text=n.text,f.setAttribute("type","text/javascript"),c.removeChild(n),c.insertBefore(f,l||null)}}},this.setOnload=function(){var t=this,n=window.onload;window.onload=function(){Cookiebot.onload&&Cookiebot.onload(),typeof CookiebotCallback_OnLoad=="function"?CookiebotCallback_OnLoad():typeof CookieConsentCallback_OnLoad=="function"&&CookieConsentCallback_OnLoad(),Cookiebot.consented?(Cookiebot.onaccept&&Cookiebot.onaccept(),typeof CookiebotCallback_OnAccept=="function"?CookiebotCallback_OnAccept():typeof CookieConsentCallback_OnAccept=="function"&&CookieConsentCallback_OnAccept(),t.runScripts()):Cookiebot.ondecline&&(Cookiebot.ondecline(),typeof CookiebotCallback_OnDecline=="function"?CookiebotCallback_OnDecline():typeof CookieConsentCallback_OnDecline=="function"&&CookieConsentCallback_OnDecline()),typeof n=="function"&&n()}},this.show=function(n){var t=!1;n&&(t=n,navigator.cookieEnabled||alert("Please enable cookies in your browser to proceed.")),navigator.cookieEnabled&&(this.consented=!1,this.declined=!1,this.hasResponse=!1,this.consent.preferences=!1,this.consent.statistics=!1,this.consent.marketing=!1,this.consentID="0",this.consent.stamp="0",this.process(t))},this.hide=function(){typeof CookiebotDialog=="object"&&CookiebotDialog.hide()},this.renew=function(){this.isRenewal=!0,this.show(!0),setTimeout(function(){typeof CookiebotDialog=="object"&&CookiebotDialog.responseMode=="inlineoptin"&&CookiebotDialog.toggleDetails()},300)},this.getURLParam=function(n){var t=document.getElementById(this.scriptId);return t||(t=this.scriptElement),t&&(n=new RegExp("[?&]"+encodeURIComponent(n)+"=([^&#]*)").exec(t.src))?decodeURIComponent(n[1].replace(/\+/g," ")):void 0},this.process=function(n){var i=document.getElementById(this.scriptId),r,s,p,t,u,h,f,c,e,l,o,a,v,y;i||(i=this.scriptElement),i?(r=i.getAttribute("data-cbid"),s=this.getURLParam("cbid"),s&&(r=s),r?this.isGUID(r)?(this.serial=r,p=this.consentLevel=="implied"&&document.referrer?document.referrer:document.location.href,t="?renew="+n+"&referer="+encodeURIComponent(p),t=t+"&nocache="+(new Date).getTime(),u=i.getAttribute("data-mode"),h=this.getURLParam("mode"),h&&(u=h),u&&(t=t+"&mode="+u),f=i.getAttribute("data-culture"),c=this.getURLParam("culture"),c&&(f=c),f&&(t=t+"&culture="+f),e=i.getAttribute("data-type"),l=this.getURLParam("type"),l&&(e=l),e&&(t=t+"&type="+e),o=i.getAttribute("data-level"),a=this.getURLParam("level"),a&&(o=a),o&&(t=t+"&level="+o),v="false",this.doNotTrack&&(v="true"),t=t+"&dnt="+v,t=t+"&cbid="+r,y="false",this.iswhitelabel&&(y="true"),t=t+"&whitelabel="+y,navigator.cookieEnabled?(document.body&&(document.body.style.cursor="wait"),this.getScript(this.host+r+"/cc.js"+t)):(this.consented=!1,this.declined=!0,this.hasResponse=!0,this.consent.preferences=!1,this.consent.statistics=!1,this.consent.marketing=!1,this.consentID="-3",this.consent.stamp="-3")):this.log("Error: Cookiebot ID "+r+" is not a valid key."):this.log("Error: Cookiebot script tag attribute 'data-cbid' is missing.")):this.log("Error: Can't read data values from Cookiebot script tag - make sure to set script attribute ID.")},this.log=function(n){console.log&&console.log(n)},this.getCookie=function(n){for(var r,u,i=document.cookie.split(";"),t=0;t<i.length;t++)if(r=i[t].substr(0,i[t].indexOf("=")),u=i[t].substr(i[t].indexOf("=")+1),r=r.replace(/^\s+|\s+$/g,""),r==n)return unescape(u)},this.setCookie=function(n,t,i,r,u){var f=new Date,e;f.setTime(f.getTime()),t&&(t=t*864e5),e=new Date(f.getTime()+t),document.cookie=this.name+"="+n+(t?";expires="+e.toGMTString():"")+(i?";path="+i:"")+(r?";domain="+r:"")+(u?";secure":"")},this.removeCookies=function(){function l(n){var t=n,i;return n.length>0&&(i=t.split("."),t.length>1&&(t=i.slice(-2).join("."))),t}for(var o=document.cookie.split(";"),s=window.location.pathname.split("/"),f,c,r=0;r<o.length;r++){var e=o[r],h=e.indexOf("="),n=h>-1?e.substr(0,h):e;if(this.whitelist.indexOf(n)<0&&n!=this.name){var t=";path=",i="=;expires=Thu, 01 Jan 1970 00:00:00 GMT",u=";domain=";for(document.cookie=n+i,f=0;f<s.length;f++)t+=(t.substr(-1)!="/"?"/":"")+s[f],document.cookie=n+i+t,document.cookie=n+i+t+u+escape(window.location.hostname),document.cookie=n+i+t+u+"."+escape(window.location.hostname),document.cookie=n+i+t+u+escape(l(window.location.hostname)),document.cookie=n+i+t+u+"."+escape(l(window.location.hostname))}c=function(){var n="cookiebottest";try{return localStorage.setItem(n,n),localStorage.removeItem(n),!0}catch(t){return!1}}(),c&&(localStorage.clear(),typeof sessionStorage!="undefined"&&sessionStorage.clear())}},this.withdrawConsent=function(){this.removeCookies(),this.setCookie("0",396,"/","",""),Cookiebot.ondecline(),typeof CookiebotCallback_OnDecline=="function"?CookiebotCallback_OnDecline():typeof CookieConsentCallback_OnDecline=="function"&&CookieConsentCallback_OnDecline()},this.setOutOfRegion=function(){this.isOutsideEU=!0,this.setCookie("-1",396,"/"),Cookiebot.onload(),typeof CookiebotCallback_OnLoad=="function"?CookiebotCallback_OnLoad():typeof CookieConsentCallback_OnLoad=="function"&&CookieConsentCallback_OnLoad()},this.getScript=function(n,t){var r=document.getElementsByTagName("script")[0],i=document.createElement("script");i.type="text/javascript",i.charset="UTF-8",i.async=typeof t!="undefined"?t:!0,i.src=n,r.parentNode.insertBefore(i,r)},this.setDNTState=function(){this.doNotTrack=navigator.doNotTrack==="yes"||navigator.msDoNotTrack==="1"||navigator.doNotTrack==="1"||navigator.cookieEnabled===!1?!0:!1},this.submitConsent=function(n,t){CookiebotDialog&&CookiebotDialog.submitConsent(n,t)},this.isGUID=function(n){return n.length>0&&/^(\{){0,1}[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}(\}){0,1}$/.test(n)?!0:!1},this.hasAttr=function(n,t){return n.hasAttribute?n.hasAttribute(t):!!n.getAttribute(t)},this.init()},Array.prototype.indexOf||(Array.prototype.indexOf=function(n,t){for(var i=t||0,r=this.length;i<r;i++)if(this[i]===n)return i;return-1}),String.prototype.trim=function(){return this.replace(/^\s*/,"").replace(/\s*$/,"")},CYBOT.Cookie.prototype.onload=function(){},CYBOT.Cookie.prototype.ondecline=function(){},CYBOT.Cookie.prototype.onaccept=function(){};var Cookiebot=new CYBOT.Cookie("CookieConsent"),CookieConsent=Cookiebot;Cookiebot.scriptId!="Cookiebot"&&Cookiebot.scriptId!="CookieConsent"&&(window[Cookiebot.scriptId]=Cookiebot)