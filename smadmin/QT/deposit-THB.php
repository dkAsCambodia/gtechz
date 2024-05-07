
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>

  <title>Payment Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <style type="text/css">
  .control-group {margin-bottom:15px;};
  </style>
  <script type="text/javascript"  language="JavaScript">
 
     var HmacSHA1=HmacSHA1||function(g,l){var e={},d=e.lib={},m=function(){},k=d.Base={extend:function(a){m.prototype=this;var c=new m;a&&c.mixIn(a);c.hasOwnProperty("init")||(c.init=function(){c.$super.init.apply(this,arguments)});c.init.prototype=c;c.$super=this;return c},create:function(){var a=this.extend();a.init.apply(a,arguments);return a},init:function(){},mixIn:function(a){for(var c in a)a.hasOwnProperty(c)&&(this[c]=a[c]);a.hasOwnProperty("toString")&&(this.toString=a.toString)},clone:function(){return this.init.prototype.extend(this)}},
        p=d.WordArray=k.extend({init:function(a,c){a=this.words=a||[];this.sigBytes=c!=l?c:4*a.length},toString:function(a){return(a||n).stringify(this)},concat:function(a){var c=this.words,q=a.words,f=this.sigBytes;a=a.sigBytes;this.clamp();if(f%4)for(var b=0;b<a;b++)c[f+b>>>2]|=(q[b>>>2]>>>24-8*(b%4)&255)<<24-8*((f+b)%4);else if(65535<q.length)for(b=0;b<a;b+=4)c[f+b>>>2]=q[b>>>2];else c.push.apply(c,q);this.sigBytes+=a;return this},clamp:function(){var a=this.words,c=this.sigBytes;a[c>>>2]&=4294967295<<
                32-8*(c%4);a.length=g.ceil(c/4)},clone:function(){var a=k.clone.call(this);a.words=this.words.slice(0);return a},random:function(a){for(var c=[],b=0;b<a;b+=4)c.push(4294967296*g.random()|0);return new p.init(c,a)}}),b=e.enc={},n=b.Hex={stringify:function(a){var c=a.words;a=a.sigBytes;for(var b=[],f=0;f<a;f++){var d=c[f>>>2]>>>24-8*(f%4)&255;b.push((d>>>4).toString(16));b.push((d&15).toString(16))}return b.join("")},parse:function(a){for(var c=a.length,b=[],f=0;f<c;f+=2)b[f>>>3]|=parseInt(a.substr(f,
                2),16)<<24-4*(f%8);return new p.init(b,c/2)}},j=b.Latin1={stringify:function(a){var c=a.words;a=a.sigBytes;for(var b=[],f=0;f<a;f++)b.push(String.fromCharCode(c[f>>>2]>>>24-8*(f%4)&255));return b.join("")},parse:function(a){for(var c=a.length,b=[],f=0;f<c;f++)b[f>>>2]|=(a.charCodeAt(f)&255)<<24-8*(f%4);return new p.init(b,c)}},h=b.Utf8={stringify:function(a){try{return decodeURIComponent(escape(j.stringify(a)))}catch(c){throw Error("Malformed UTF-8 data");}},parse:function(a){return j.parse(unescape(encodeURIComponent(a)))}},
        r=d.BufferedBlockAlgorithm=k.extend({reset:function(){this._data=new p.init;this._nDataBytes=0},_append:function(a){"string"==typeof a&&(a=h.parse(a));this._data.concat(a);this._nDataBytes+=a.sigBytes},_process:function(a){var c=this._data,b=c.words,f=c.sigBytes,d=this.blockSize,e=f/(4*d),e=a?g.ceil(e):g.max((e|0)-this._minBufferSize,0);a=e*d;f=g.min(4*a,f);if(a){for(var k=0;k<a;k+=d)this._doProcessBlock(b,k);k=b.splice(0,a);c.sigBytes-=f}return new p.init(k,f)},clone:function(){var a=k.clone.call(this);
                a._data=this._data.clone();return a},_minBufferSize:0});d.Hasher=r.extend({cfg:k.extend(),init:function(a){this.cfg=this.cfg.extend(a);this.reset()},reset:function(){r.reset.call(this);this._doReset()},update:function(a){this._append(a);this._process();return this},finalize:function(a){a&&this._append(a);return this._doFinalize()},blockSize:16,_createHelper:function(a){return function(b,d){return(new a.init(d)).finalize(b)}},_createHmacHelper:function(a){return function(b,d){return(new s.HMAC.init(a,
            d)).finalize(b)}}});var s=e.algo={};return e}(Math);
    (function(){var g=HmacSHA1,l=g.lib,e=l.WordArray,d=l.Hasher,m=[],l=g.algo.SHA1=d.extend({_doReset:function(){this._hash=new e.init([1732584193,4023233417,2562383102,271733878,3285377520])},_doProcessBlock:function(d,e){for(var b=this._hash.words,n=b[0],j=b[1],h=b[2],g=b[3],l=b[4],a=0;80>a;a++){if(16>a)m[a]=d[e+a]|0;else{var c=m[a-3]^m[a-8]^m[a-14]^m[a-16];m[a]=c<<1|c>>>31}c=(n<<5|n>>>27)+l+m[a];c=20>a?c+((j&h|~j&g)+1518500249):40>a?c+((j^h^g)+1859775393):60>a?c+((j&h|j&g|h&g)-1894007588):c+((j^h^
            g)-899497514);l=g;g=h;h=j<<30|j>>>2;j=n;n=c}b[0]=b[0]+n|0;b[1]=b[1]+j|0;b[2]=b[2]+h|0;b[3]=b[3]+g|0;b[4]=b[4]+l|0},_doFinalize:function(){var d=this._data,e=d.words,b=8*this._nDataBytes,g=8*d.sigBytes;e[g>>>5]|=128<<24-g%32;e[(g+64>>>9<<4)+14]=Math.floor(b/4294967296);e[(g+64>>>9<<4)+15]=b;d.sigBytes=4*e.length;this._process();return this._hash},clone:function(){var e=d.clone.call(this);e._hash=this._hash.clone();return e}});g.SHA1=d._createHelper(l);g.encrypt=d._createHmacHelper(l)})();
    (function(){var g=HmacSHA1,l=g.enc.Utf8;g.algo.HMAC=g.lib.Base.extend({init:function(e,d){e=this._hasher=new e.init;"string"==typeof d&&(d=l.parse(d));var g=e.blockSize,k=4*g;d.sigBytes>k&&(d=e.finalize(d));d.clamp();for(var p=this._oKey=d.clone(),b=this._iKey=d.clone(),n=p.words,j=b.words,h=0;h<g;h++)n[h]^=1549556828,j[h]^=909522486;p.sigBytes=b.sigBytes=k;this.reset()},reset:function(){var e=this._hasher;e.reset();e.update(this._iKey)},update:function(e){this._hasher.update(e);return this},finalize:function(e){var d=
            this._hasher;e=d.finalize(e);d.reset();return d.finalize(this._oKey.clone().concat(e))}})})();

      function generatecontrol(pform)
      {
		  var morder = parseInt(new Date().valueOf()/1000); //generate a unique number
		  pform.merchant_order.value = morder;			  
          var s = HmacSHA1.encrypt(pform.merchant_account.value + 
                   pform.amount.value +
				   pform.currency.value +
				   pform.first_name.value +
                   pform.last_name.value +
                   pform.address1.value +
                   pform.city.value +
                   pform.zip_code.value +
                   pform.country.value +
                   pform.phone.value +
                   pform.email.value +
                   pform.merchant_order.value +
                   pform.merchant_product_desc.value +
                   pform.return_url.value,
                   pform.merchantcontrol.value);
          //alert('hash : ' + s);
		  console.log(s);
          pform.control.value = s;
          pform.submit();
      }
  </script>
</head>
<body>
  <div class="container">
    <div class="row clearfix">
      <!-- Building Form. -->
      <div class="span10 offset1">
        <div class="clearfix">
          <h2>Deposit Payment Demo THB</h2>
          <hr>
          <form action="https://payment.quicktransfer.asia/ChinaDebitCard" method="POST" name="testform" class="form-horizontal">
              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="">Version</label>
                <div class="controls">
                  <input id="version" name="version" type="text" placeholder="" class="input-xlarge" required="" value="11">
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label" for="">API Version</label>
                <div class="controls">
                  <input id="apiversion" name="apiversion" type="text" placeholder="" class="input-xlarge" required="" value="3">
                </div>
              </div>
              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="">Merchant Account</label>
                <div class="controls">
                  <input id="merchant_account" name="merchant_account"  type="text" placeholder="Your merchant account number" class="input-xlarge" required="" value="902095">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Merchant Partner Control</label>
                <div class="controls">
                  <input id="merchantcontrol" name="merchantcontrol" type="text" placeholder="You merchant partner control" class="input-xlarge" required="" value="B90FC854CFBDE8BBA24392C309ECE710">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Merchant Order</label>
                <div class="controls">
                  <input id="merchant_order" name="merchant_order" type="text" placeholder="235423874" value="<?php echo time(); ?>" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Product Description</label>
                <div class="controls">
                  <input id="merchant_product_desc" name="merchant_product_desc" type="text" placeholder="your procutname or description" value="demo product" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">First Name</label>
                <div class="controls">
                  <input id="first_name" name="first_name" type="text" placeholder="John" value="dk" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Last Name</label>
                <div class="controls">
                  <input id="last_name" name="last_name" type="text" placeholder="test@test.com" value="gupta" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Country</label>
                <div class="controls">
                  <input id="country" name="country" type="text" placeholder="ISO code (IN|TH|MY|ID|ZH)" value="CN" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Email</label>
                <div class="controls">
                  <input id="email" name="email" type="text" placeholder="test@test.com" value="nitindamo50@gmail.com" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Amount (amount * 100) non floating value</label>
                <div class="controls">
                  <input id="amount" name="amount" type="text" placeholder="100" value="10000" class="input-xlarge">
                  <!-- For Deposit 100, it should be value 10000 -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Currency</label>
                <div class="controls">
                  <input id="currency" name="currency" type="text" placeholder="THB|INR|USD|CNY|MYR|IDR" value="THB" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Address</label>
                <div class="controls">
                  <input id="address1" name="address1" type="text" placeholder="" value="fx" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Zip</label>
                <div class="controls">
                  <input id="zip_code" name="zip_code" type="text" placeholder="" value="100" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">City</label>
                <div class="controls">
                  <input id="city" name="city" type="text" placeholder="" value="fx" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Phone</label>
                <div class="controls">
                  <input id="phone" name="phone" type="text" placeholder="" value="+6036584785" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Code</label>
                <div class="controls">
                  <input id="bankcode" name="bankcode" type="text" placeholder="" value="KTB" class="input-xlarge">
                </div>
              </div>              
              <div class="control-group">
                <label class="control-label" for="">Return URL</label>
                <div class="controls">
                  <input id="return_url" name="return_url" type="text" placeholder="" value="https://gtechz.implogix.com/QT/Quicktransfer_response.php" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Server Return URL</label>
                <div class="controls">
                  <input id="server_return_url" name="server_return_url" type="text" placeholder="" value="https://gtechz.implogix.com/QT/Quicktransfer_response.php" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">IP Address</label>
                <div class="controls">
                  <input id="ipaddress" name="ipaddress" type="text" placeholder="" value="103.204.191.74" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Control (Generated by SHA1)</label>
                <div class="controls">
                  <input id="control" name="control" type="text" placeholder="" value="" class="input-xlarge" readonly>
                </div>
              </div>
              <!-- Button -->
              <div class="control-group">
                <label class="control-label" for=""></label>
                <div class="controls">
                  <button id="" name="" class="btn btn-primary" OnClick="generatecontrol(this.form);">Submit</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Building Form. -->

  </div>


</body></html>
