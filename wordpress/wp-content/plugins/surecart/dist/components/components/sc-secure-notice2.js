import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";const scSecureNoticeCss=":host{display:block;--sc-secure-notice-icon-color:var(--sc-color-gray-300);--sc-secure-notice-font-size:var(--sc-font-size-small);--sc-secure-notice-color:var(--sc-color-gray-500)}.notice{color:var(--sc-secure-notice-color);font-size:var(--sc-secure-notice-font-size);display:flex;align-items:center;gap:5px}.notice__text{flex:1;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap}.notice__icon{color:var(--sc-secure-notice-icon-color);margin-right:5px}",ScSecureNotice=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow()}render(){return h("div",{class:"notice",part:"base"},h("svg",{class:"notice__icon",part:"icon",xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",viewBox:"0 0 512 512",fill:"currentColor"},h("path",{d:"M368,192H352V112a96,96,0,1,0-192,0v80H144a64.07,64.07,0,0,0-64,64V432a64.07,64.07,0,0,0,64,64H368a64.07,64.07,0,0,0,64-64V256A64.07,64.07,0,0,0,368,192Zm-48,0H192V112a64,64,0,1,1,128,0Z"})),h("span",{class:"notice__text",part:"text"},h("slot",{name:"prefix"}),h("slot",null),h("slot",{name:"suffix"})))}static get style(){return scSecureNoticeCss}},[1,"sc-secure-notice"]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-secure-notice"].forEach((e=>{"sc-secure-notice"===e&&(customElements.get(e)||customElements.define(e,ScSecureNotice))}))}export{ScSecureNotice as S,defineCustomElement as d};