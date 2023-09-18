var P=Object.defineProperty;var I=(u,e,s)=>e in u?P(u,e,{enumerable:!0,configurable:!0,writable:!0,value:s}):u[e]=s;var r=(u,e,s)=>(I(u,typeof e!="symbol"?e+"":e,s),s);import{u as g}from"./links.6d4c0bdb.js";import{r as v,o as n,c,a as y,b,n as H,D as L,t as f,d as x,f as m,w as B,g as A,F as k,h as S}from"./vue.runtime.esm-bundler.b39e1078.js";import{_ as z}from"./_plugin-vue_export-helper.b97bdf23.js";import"./index.0eabb636.js";import{b as Y,S as R,c as C}from"./Caret.164d8058.js";/* empty css                                            *//* empty css                                              */import{_ as t,s as a}from"./default-i18n.3881921e.js";import"./constants.1758f66e.js";import{T as E}from"./Tags.993eb9a7.js";import"./TruSeoHighlighter.3c8290a7.js";/* empty css                                              */import{C as O}from"./GoogleSearchPreview.e8c93b1b.js";import{t as G}from"./tags.8f5c2702.js";import{S as M}from"./Information.70c6532e.js";import{S as j}from"./Gear.a85d4a2b.js";import{T as D}from"./Slide.cdf6c622.js";const o="all-in-one-seo-pack";class N{constructor(){r(this,"personalize",!1);r(this,"head",(e,s)=>this[e+"Head"]!==void 0?this[e+"Head"](s):s.initialTitle?s.initialTitle:e);r(this,"body",(e,s)=>this[e+"Body"]!==void 0?this[e+"Body"](s):s.initialBody?s.initialBody:s);r(this,"titleHead",e=>e.error==="title-missing"?t("We couldn't find an SEO Title.",o):e.error==="title-too-short"?this.personalize?a(t("Your SEO title is only %1$d characters long, which is too short.",o),e.value.length):a(t("The SEO title is only %1$d characters long, which is too short.",o),e.value.length):e.error==="title-too-long"?this.personalize?a(t("Your SEO title is %1$d characters long, which is too long.",o),e.value.length):a(t("The SEO title is %1$d characters long, which is too long.",o),e.value.length):this.personalize?a(t("Your SEO title is set and is %1$d characters long.",o),e.value.length):a(t("The SEO title is set and is %1$d characters long.",o),e.value.length));r(this,"titleBody",e=>{const s=g();return{code:e.error==="title-missing"?null:e.value,message:t("Ensure your page's title includes your target keywords, and design it to encourage users to click.",o)+"<br><br>"+t("Writing compelling titles is both a science and an art. There are automated tools that can analyze your title against known metrics for readability and click-worthiness. You also need to understand the psychology of your target audience.",o),buttonText:t("Edit Your Page Title",o),buttonLink:s.aioseo.data.staticHomePage?`${s.aioseo.urls.staticHomePage}&aioseo-scroll=aioseo-post-settings-post-title-row&aioseo-highlight=aioseo-post-settings-post-title-row`:`${s.aioseo.urls.aio.searchAppearance}&aioseo-scroll=aioseo-home-page-site-title&aioseo-highlight=aioseo-home-page-site-title`}});r(this,"descriptionHead",e=>e.error==="description-missing"?this.personalize?t("No meta description was found for your page.",o):t("No meta description was found for the page.",o):e.error==="description-too-short"?this.personalize?a(t("Your meta description is only %1$d characters long, which is too short.",o),e.value.length):a(t("The meta description is only %1$d characters long, which is too short.",o),e.value.length):e.error==="description-too-long"?this.personalize?a(t("Your meta description is %1$d characters long, which is too long.",o),e.value.length):a(t("The meta description is %1$d characters long, which is too long.",o),e.value.length):this.personalize?a(t("Your meta description is set and is %1$d characters long.",o),e.value.length):a(t("The meta description is set and is %1$d characters long.",o),e.value.length));r(this,"descriptionBody",e=>{const s=g();return{code:e.error==="description-missing"?null:e.value,message:t("Write a meta description for your page. Use your target keywords (in a natural way) and write with human readers in mind. Summarize the content - describe the topics your article discusses.",o)+"<br><br>"+t("The description should stimulate reader interest and get them to click on the article. Think of it as a mini-advertisement for your content.",o),buttonText:t("Edit Your Meta Description",o),buttonLink:s.aioseo.data.staticHomePage?`${s.aioseo.urls.staticHomePage}&aioseo-scroll=aioseo-post-settings-meta-description-row&aioseo-highlight=aioseo-post-settings-meta-description-row`:`${s.aioseo.urls.aio.searchAppearance}&aioseo-scroll=aioseo-home-page-meta-description&aioseo-highlight=aioseo-home-page-meta-description`}});r(this,"h1TagsHead",e=>e.error==="h1-missing"?t("No H1 tag was found.",o)+" "+t("For the best SEO results there should be exactly one H1 tag on each page.",o):e.error==="h1-too-many"?a(t("%1$d H1 tags were found.",o),e.value.length)+" "+t("For the best SEO results there should be exactly one H1 tag on each page.",o):this.personalize?t("One H1 tag was found on your page.",o):t("One H1 tag was found on the page.",o));r(this,"h1TagsBody",e=>{const s=g();return{code:e.error==="h1-missing"?null:e.value.join("<br>"),message:t("WordPress sites usually insert the page or post title as an H1 tag (although custom themes can change this behavior).",o)+"<br><br>"+t("Ensure your most important keywords appear in the H1 tag - don't force it, use them in a natural way that makes sense to human readers.",o)+"<br><br>"+t("Because your headline plays a large role in reader engagement, it's worth spending extra time perfecting it. Many top copywriters spend hours getting their headlines just right - sometimes they spend longer on the headline than the rest of the article!",o)+"<br><br>"+t("A good headline stimulates reader interest and offers a compelling reason to read your content. It promises a believable benefit.",o)+"<br><br>"+t("You should write as if your readers are selfish people with short attention spans (because that describes a large percentage of the world's population). Readers visit websites for selfish reasons - they're not there to make you happy.",o),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?s.aioseo.urls.staticHomePage:null}});r(this,"h2TagsHead",e=>e.error==="h2-missing"?this.personalize?t("No H2 tags were found on your page.",o):t("No H2 tags were found on the page.",o):this.personalize?t("H2 tags were found on your page.",o)+" ("+e.value.length+")":t("H2 tags were found on the page.",o)+" ("+e.value.length+")");r(this,"h2TagsBody",e=>{const s=g();return{code:e.error==="h2-missing"?null:e.value.join("<br>"),message:t("Make sure you have a good balance of H2 tags to plain text in your content. Break the content down into logical sections, and use headings to introduce each new topic.",o)+"<br><br>"+t("Also, try to include synonyms and relevant terminology in H2 tag text. Search engines are pretty smart - they know which words usually occur together in each niche.",o)+"<br><br>"+t("It should be easy to include your main and supporting keywords in the H2 tags - after all, these keywords describe your content! If it's hard to work the keywords into your subheadings, it could be a sign that the keywords aren't closely related to your content.",o)+"<br><br>"+t("Don't try to force keywords into sub-headings if they feel unnatural. It will send the wrong message to your readers, possibly driving them away.",o),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?s.aioseo.urls.staticHomePage:null}});r(this,"noImgAltAttsHead",e=>e.error==="image-missing-alt"?this.personalize?t("Some images on your page have no alt attribute.",o)+" ("+e.value.length+")":t("Some images on the page have no alt attribute.",o)+" ("+e.value.length+")":this.personalize?t("All images on your page have alt attributes.",o):t("All images on the page have alt attributes.",o));r(this,"noImgAltAttsBody",e=>{const s=g();return{codeAlt:e.error!=="image-missing-alt"?null:e.value.map(l=>G.decodeHTMLEntities(l)).join(`
`),message:t("Make sure every image has an alt tag, and add useful descriptions to each image. Add your keywords or synonyms - but do it in a natural way.",o),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?s.aioseo.urls.staticHomePage:null}});r(this,"linksRatioHead",e=>e.error==="internal-links-missing"?this.personalize?t("No internal links were found on your page.",o):t("No internal links were found on the page.",o):e.error==="internal-links-too-few"?this.personalize?t("Too few internal links on your page.",o):t("Too few internal links on the page.",o):e.error==="invalid-ratio"?t("The ratio of internal links to external links is uneven.",o):this.personalize?t("Your page has a correct number of internal and external links.",o):t("The page has a correct number of internal and external links.",o));r(this,"linksRatioBody",e=>{const s=g();return{code:t("Internal:",o)+" "+e.value.internal+"<br>"+t("External:",o)+" "+e.value.external,message:t(`Add links to internal and external resources that are useful for your readers. For Internal links, make sure the links are highly relevant to the subject you're writing about. For external links, make sure you link to high-quality sites - Google penalizes pages that link to "spammy" sites (ones that break the Google webmaster guidelines).`,o)+"<br><br>"+t("It's impossible to cover every aspect of a subject on a single page, but your readers may be fascinated by some detail you barely touch on. If you link to a resource where they can learn more, they'll be grateful. What's more, you'll be rewarded with higher rankings!",o),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?s.aioseo.urls.staticHomePage:null}});r(this,"canonicalTagHead",e=>e.error==="canonical-missing"?this.personalize?t("No canonical link tag found on your page.",o):t("No canonical link tag found on the page.",o):this.personalize?t("Your page is using the canonical link tag.",o):t("The page is using the canonical link tag.",o));r(this,"canonicalTagBody",e=>{const s=g();return{code:e.value,message:t(`Every page on your site should have a <link> tag with a 'rel="canonical"' attribute. The link tag should go inside the page's head tag, and it should contain the page's "correct" URL.`,o)+"<br><br>"+t(`If you've republished an article from another source (such as another site or a different section of your own site) then you need to pick which URL is the "correct" one and use that!`,o),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?`${s.aioseo.urls.staticHomePage}&aioseo-tab=advanced&aioseo-scroll=aioseo-post-canonical-url&aioseo-highlight=aioseo-post-canonical-url`:null}});r(this,"noindexHead",e=>e.error==="noindex"?this.personalize?t("Your page contains a noindex header or meta tag.",o):t("The page contains a noindex header or meta tag.",o):this.personalize?t("Your page does not contain any noindex header or meta tag.",o):t("The page does not contain any noindex header or meta tag.",o));r(this,"noindexBody",()=>{const e=g();return{message:t("Only ever use noindex meta tag or header on pages you want to keep out of the reach of search engines!",o),buttonText:t("Edit Your Page",o),buttonLink:e.aioseo.data.staticHomePage?`${e.aioseo.urls.staticHomePage}&aioseo-tab=advanced&aioseo-scroll=aioseo-post-robots-setting&aioseo-highlight=aioseo-post-robots-setting`:null}});r(this,"wwwCanonicalizationHead",e=>e.error==="www-canonicalization"?this.personalize?t("The www and non-www versions of your URL are not redirected to the same site.",o):t("The www and non-www versions of the URL are not redirected to the same site.",o):this.personalize?t("Both the www and non-www versions of your URL are redirected to the same site.",o):t("Both the www and non-www versions of the URL are redirected to the same site.",o));r(this,"wwwCanonicalizationBody",()=>{const e=g();return{message:t(`Decide whether you want your site's URLs to include a "www", or if you prefer a plain domain name. There are marketing pros and cons for each choice, but neither one is better or worse for SEO purposes - as long as you're consistent.`,o)+"<br><br>"+t('You should use HTTP redirections (301 permanant redirects) to pass PageRank from the "wrong" URLs to the standard (canonical) ones. That way, your content will still benefit from backlinks if someone makes a mistake and uses the wrong URL.',o),buttonText:t("Edit Your Page",o),buttonLink:e.aioseo.data.staticHomePage?e.aioseo.urls.staticHomePage:null}});r(this,"robotsRulesHead",e=>e.error==="no-robots"?this.personalize?t("Your robots.txt file is missing or unavailable.",o):t("The robots.txt file is missing or unavailable.",o):e.value.match(/disallow:/i)?this.personalize?t('Your site has a robots.txt file which includes one or more "disallow" directives.',o):t('The site has a robots.txt file which includes one or more "disallow" directives.',o):this.personalize?t("Your site has a robots.txt file.",o):t("The site has a robots.txt file.",o));r(this,"robotsRulesBody",e=>{const s=g();return{code:e.error==="no-robots"?null:e.value,message:t("Make sure that you only block parts you don't want to be indexed.",o)+"<br><br>"+t("You can manually create a robots.txt file and upload it to your site's web root. A simpler option is to use a plugin for your CMS platform.",o)+"<br><br>"+a(t("%1$s has a full suite of tools to manage the robots.txt file, along with other related technologies, like XML Sitemaps.",o),"AIOSEO"),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?s.aioseo.urls.staticHomePage:null}});r(this,"openGraphHead",e=>e.error==="ogp-missing"?t("Some Open Graph meta tags are missing.",o):e.error==="ogp-duplicates"?t("Duplicate Open Graph meta tags were found.",o):t("All the required Open Graph meta tags have been found.",o));r(this,"openGraphBody",e=>{const s=g();return{code:e.value?e.value.join("<br>"):null,message:t("Insert a customized Open Graph meta tag for each important page on your site. The standard is very well documented - you can learn more from Facebook's developer pages.",o)+"<br><br>"+a(t("%1$s provides a simple but powerful interface to craft your Open Graph data. You get immediate feedback with an interactive preview, and you don't have to mess around with raw HTML markup.",o),"AIOSEO"),buttonText:t("Edit Your Page",o),buttonLink:s.aioseo.data.staticHomePage?`${s.aioseo.urls.staticHomePage}&aioseo-tab=social&social-tab=facebook&aioseo-scroll=aioseo-post-settings-facebook&aioseo-highlight=aioseo-post-settings-facebook`:s.aioseo.urls.aio.socialNetworks+"#/facebook"}});r(this,"schemaHead",e=>e.error==="schema-missing"?this.personalize?t("No Schema.org data was found on your page.",o):t("No Schema.org data was found on the page.",o):this.personalize?t("We found Schema.org data on your page.",o):t("We found Schema.org data on the page.",o));r(this,"schemaBody",()=>{const e=g();return{message:a(t("%1$s makes it extremely easy to add highly relevant Schema.org markup to your site. It has a simple graphical interface, so you don't have to get your hands dirty with complex HTML markup.",o),"AIOSEO"),buttonText:t("Edit Your Page",o),buttonLink:e.aioseo.data.staticHomePage?`${e.aioseo.urls.staticHomePage}&aioseo-tab=schema&aioseo-scroll=aioseo-post-schema&aioseo-highlight=aioseo-post-schema`:null}});r(this,"hasImgExpiresHead",e=>e.error==="image-expires-missing"?this.personalize?t('Your server is not using "expires" headers for your images.',o):t('The server is not using "expires" headers for the images.',o):this.personalize?t('Your server is using "expires" headers for your images.',o):t('The server is using "expires" headers for the images.',o));r(this,"hasImgExpiresBody",()=>({message:t('If you use the Apache or NGINX web servers, you can edit the configuration files to set the "expires" header for all image files. For Apache, you can also use a ".htaccess" file to change the settings for each folder.',o)+"<br><br>"+t("Alternatively, you can use a CMS plugin to simplify the process - it's a more user-friendly option. WordPress has a host of caching plugins, and most of them give you options to control the caching headers.",o)}));r(this,"unminifiedJsHead",e=>e.error==="js-unminified"?t("Some Javascript files don't seem to be minified.",o):t("All Javascript files appear to be minified.",o));r(this,"unminifiedJsBody",e=>({codeAlt:e.error!=="js-unminified"?null:e.value.join(`
`),message:t("JavaScript files appear in many places, including frameworks (like Bootstrap), themes and templates, and third-party plugins.",o)+"<br><br>"+t("We recommend tracking down where the un-minified JavaScript files come from",o)+"<br><br>"+t("There are server-side tools (including WordPress plugins) to automatically minify JavaScript files.",o)}));r(this,"unminifiedCssHead",e=>e.error==="css-unminified"?t("Some CSS files don't seem to be minified.",o):t("All CSS files appear to be minified.",o));r(this,"unminifiedCssBody",e=>({codeAlt:e.error!=="css-unminified"?null:e.value.join(`
`),message:t("CSS files appear in many places, including frameworks (like Bootstrap), themes and templates, and third-party plugins.",o)+"<br><br>"+t("We recommend tracking down where the un-minified CSS files come from.",o)+"<br><br>"+t("There are server-side tools (including WordPress plugins) to automatically minify CSS files.",o)}));r(this,"pageObjectsHead",e=>{const s=this.personalize?a(t("Your page makes %1$d requests.",o),e.total):a(t("The page makes %1$d requests.",o),e.total);return e.error==="page-objects-too-many"?s+" "+t("More than 20 requests can result in slow page loading.",o):s});r(this,"pageObjectsBody",e=>({code:e.error!=="page-objects-too-many"?null:t("Images:",o)+" "+e.value.images+"<br>"+t("JavaScript:",o)+" "+e.value.js+"<br>"+t("CSS:",o)+" "+e.value.css,message:t("Try to replace embedded objects with HTML5 alternatives.",o)}));r(this,"pageSizeHead",e=>{let s=a(t("The size of the HTML document is %1$d KB.",o),Math.round(e.value/1e3));return e.error==="page-size-too-big"?s+" "+t("This is over our recommendation of 50 KB.",o):(33>Math.round(e.value/1e3)&&(s+=" "+t("This is under the average of 33 KB.",o)),s)});r(this,"pageSizeBody",()=>({message:t("In order to reduce page size, remove any unnecessary tags from your markup. This includes developer comments, which are invisible to your users - search engines ignore the text in comments, too.",o)+"<br><br>"+t("Sometimes inline CSS is a culprit. A little inline CSS can help your page render faster. Too much will bloat the HTML file and increase the page loading time.",o)+"<br><br>"+t(`You can reduce CSS repetition with HTML class and ID attributes. Often the same rules will be repeated across many page elements, embedded in each tag's "style" attribute. You can extract them into a single "style" tag and use classes and ID's to target each element.`,o)+"<br><br>"+t("Removing white space can also have an impact on your HTML page's size. White space characters like carriage returns and tabs are ignored by the browser, but they make the markup easier for developers to read. So you should always strip them from your templates or themes before you use them in a production environment.",o)}));r(this,"responseTimeHead",e=>e.error==="response-time-too-long"?this.personalize?a(t("The response time of your page is %1$f seconds. It is recommended to keep it equal to or below 0.2 seconds.",o),e.value):a(t("The response time of the page is %1$f seconds. It is recommended to keep it equal to or below 0.2 seconds.",o),e.value):this.personalize?t("Your response time is under 0.2 seconds.",o):t("The response time is under 0.2 seconds.",o));r(this,"responseTimeBody",()=>({message:t("If you want to continue to improve your response time, the simplest and fastest fix is to use a caching plugin. Caching plugins keep a cached version of each page on your site. Instead of building the page from scratch, the server will send the cached copy.",o)+"<br><br>"+t("You can get an even greater boost in speed with a content delivery network service. These services host a copy of your content on multiple servers spread out across the globe. A user's request is handled by the edge server that's closest to their physical location, so the content arrives incredibly fast.",o)}));r(this,"visiblePluginsHead",e=>e.error==="plugins-visible"?this.personalize?t("Plugins from your website are publicly visible.",o)+" ("+e.value.length+")":t("Plugins from the website are publicly visible.",o)+" ("+e.value.length+")":this.personalize?t("You have no visible plugins!",o):t("There are no visible plugins.",o));r(this,"visiblePluginsBody",e=>({code:e.error!=="plugins-visible"?null:e.value.join("<br>"),message:t("It's a great idea to try and hide the plugins you have visible. From time to time vulnerabilities are found in plugins and if your site is not updated in a timely fashion, outdated plugins and themes can be exploited.",o)}));r(this,"visibleThemesHead",e=>e.error==="themes-visible"?this.personalize?a(t("Anyone can see that you are using the %1$s theme.",o),e.value[0]):a(t("Anyone can see that they are using the %1$s theme.",o),e.value[0]):this.personalize?t("Your theme is not visible!",o):t("The theme is not visible.",o));r(this,"visibleThemesBody",()=>({message:t("It's a great idea to try and hide the theme you have visible. From time to time vulnerabilities are found in themes and if your site is not updated in a timely fashion, outdated plugins and themes can be exploited.",o)}));r(this,"directoryListingHead",e=>e.error==="directory-listing-open"?this.personalize?t("Directory Listing seems to be enabled on your server.",o):t("Directory Listing seems to be enabled on the server.",o):this.personalize?t("Directory Listing seems to be disabled on your server.",o):t("Directory Listing seems to be disabled on the server.",o));r(this,"directoryListingBody",()=>({message:t(`Fortunately, every popular web server has options to prevent directory listings. They'll show a "403 forbidden" message instead.`,o)+"<br><br>"+t("Alternatively, you can create an empty index.php file and save it in every directory on your site. That's an approach that WordPress uses and it works well.",o)}));r(this,"googleSafeBrowsingHead",e=>e.error==="google-safe-browsing"?this.personalize?t("It looks like your site has been added to one of Google's malwares lists.",o):t("It looks like this site has been added to one of Google's malwares lists.",o):this.personalize?t("Google has not flagged your site for malware!",o):t("Google has not flagged this site for malware.",o));r(this,"googleSafeBrowsingBody",()=>({message:t("Google Safe browsing shows warnings and alerts to users if they visit a suspicious website. If you are flagged by Google Safe Browsing, you should take immediate steps to fix that.",o)}));r(this,"secureConnectionHead",e=>e.error==="insecure-connection"?this.personalize?t("Your site is not using a secure transfer protocol (https).",o):t("The site is not using a secure transfer protocol (https).",o):this.personalize?t("Your site is using a secure transfer protocol (https).",o):t("The site is using a secure transfer protocol (https).",o));r(this,"secureConnectionBody",()=>({message:t("If you aren't using an SSL certificate for your site that means you are losing a lot of potential traffic. We recommend getting an SSL certificate installed immediately.",o)}))}}const T=new N;const W={components:{SvgCaret:Y,SvgCircleCheck:R,SvgCircleClose:C,SvgCircleInformation:M,SvgGear:j,TransitionSlide:D},props:{test:{type:String,required:!0},result:{type:Object,required:!0},showInstructions:Boolean},data(){return{active:!1,loading:!1}},computed:{getIcon(){return this.result.status==="passed"?"svg-circle-check":this.result.status==="error"?"svg-circle-close":this.result.status==="warning"?"svg-gear":"svg-circle-information"},getTestTitle(){return T.personalize=this.showInstructions,T.head(this.test,this.result)},getBody(){return T.personalize=this.showInstructions,T.body(this.test,this.result)}}},q={class:"aioseo-seo-site-analysis-result"},F={class:"result-header"},U={class:"result-icon"},J={class:"result-content"},$={class:"result-body"},V={key:0,class:"result-code"},K=["innerHTML"],X={key:1,class:"result-code-alt"},Q=["innerHTML"],Z={key:3,class:"result-action"};function ee(u,e,s,h,l,i){const _=v("svg-caret"),w=v("base-button"),p=v("transition-slide");return n(),c("div",q,[y("div",F,[y("div",U,[(n(),b(L(i.getIcon),{class:H(s.result.status)},null,8,["class"]))]),y("div",J,f(i.getTestTitle),1),s.showInstructions||i.getBody.code||i.getBody.codeAlt?(n(),c("div",{key:0,class:H(["result-toggle",{active:l.active}]),onClick:e[0]||(e[0]=d=>l.active=!l.active)},[x(_)],2)):m("",!0)]),s.showInstructions||i.getBody.code||i.getBody.codeAlt?(n(),b(p,{key:0,active:l.active},{default:B(()=>[y("div",$,[i.getBody.code?(n(),c("div",V,[y("pre",null,[y("code",{innerHTML:i.getBody.code},null,8,K)])])):m("",!0),i.getBody.codeAlt?(n(),c("div",X,[y("pre",null,[y("code",null,f(i.getBody.codeAlt),1)])])):m("",!0),i.getBody.message&&s.showInstructions?(n(),c("div",{key:2,class:"result-message",innerHTML:i.getBody.message},null,8,Q)):m("",!0),i.getBody.buttonLink&&s.showInstructions?(n(),c("div",Z,[x(w,{href:i.getBody.buttonLink,tag:"a",type:"blue",size:"medium",onClick:e[1]||(e[1]=d=>l.loading=!0),loading:l.loading},{default:B(()=>[A(f(i.getBody.buttonText),1)]),_:1},8,["href","loading"])])):m("",!0)])]),_:1},8,["active"])):m("",!0)])}const te=z(W,[["render",ee]]);const oe={components:{CoreGoogleSearchPreview:O,CoreSeoSiteAnalysisResult:te},mixins:[E],props:{section:{type:String,required:!0},allResults:{type:Object,required:!0},showGooglePreview:Boolean,showInstructions:Boolean},data(){return{separator:void 0,searchPreviewDomain:null,strings:{basic:this.$t.__("Basic SEO",this.$td),advanced:this.$t.__("Advanced SEO",this.$td),performance:this.$t.__("Performance",this.$td),security:this.$t.__("Security",this.$td)}}},methods:{filterResults(u){const e={...u};if(["searchPreview","mobileSearchPreview","mobileSnapshot","keywords","keywordsInTitleDescription"].forEach(l=>{e[l]&&delete e[l]}),this.section==="all-items")return e;const h={passed:"good-results",warning:"recommended-improvements",error:"critical"};return Object.keys(e).forEach(l=>{const i=e[l];h[i.status]!==this.section&&delete e[l]}),e},shouldShowGroup(u){return Object.keys(this.filterResults(this.allResults[u])).length}},mounted(){var u;if(((u=this.allResults.advanced)==null?void 0:u.searchPreview)??null){const e=document.createElement("div");e.innerHTML=this.allResults.advanced.searchPreview;const s=e.querySelector(".domain");s&&(this.searchPreviewDomain=s.innerText)}}},se={class:"aioseo-seo-site-analysis-results"},re={key:1,class:"group-header"},ie={key:2,class:"group-header"},ae={key:3,class:"group-header"},ne={key:4,class:"group-header"};function le(u,e,s,h,l,i){const _=v("core-google-search-preview"),w=v("core-seo-site-analysis-result");return n(),c("div",se,[s.showGooglePreview&&s.section==="all-items"?(n(),b(_,{key:0,domain:l.searchPreviewDomain,title:u.parseTags(s.allResults.basic.title.value),description:u.parseTags(s.allResults.basic.description.value)},null,8,["domain","title","description"])):m("",!0),i.shouldShowGroup("basic")?(n(),c("div",re,f(l.strings.basic),1)):m("",!0),(n(!0),c(k,null,S(i.filterResults(s.allResults.basic),(p,d)=>(n(),b(w,{key:d,test:d,result:p,"show-instructions":s.showInstructions},null,8,["test","result","show-instructions"]))),128)),i.shouldShowGroup("advanced")?(n(),c("div",ie,f(l.strings.advanced),1)):m("",!0),(n(!0),c(k,null,S(i.filterResults(s.allResults.advanced),(p,d)=>(n(),b(w,{key:d,test:d,result:p,"show-instructions":s.showInstructions},null,8,["test","result","show-instructions"]))),128)),i.shouldShowGroup("performance")?(n(),c("div",ae,f(l.strings.performance),1)):m("",!0),(n(!0),c(k,null,S(i.filterResults(s.allResults.performance),(p,d)=>(n(),b(w,{key:d,test:d,result:p,"show-instructions":s.showInstructions},null,8,["test","result","show-instructions"]))),128)),i.shouldShowGroup("security")?(n(),c("div",ne,f(l.strings.security),1)):m("",!0),(n(!0),c(k,null,S(i.filterResults(s.allResults.security),(p,d)=>(n(),b(w,{key:d,test:d,result:p,"show-instructions":s.showInstructions},null,8,["test","result","show-instructions"]))),128))])}const Be=z(oe,[["render",le]]);export{Be as C};
