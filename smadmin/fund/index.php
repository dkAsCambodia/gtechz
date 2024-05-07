<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Javascript API playground</title>
  <!-- Fundraise Up: the new standard for online giving -->
<script>(function(w,d,s,n,a){if(!w[n]){var l='call,catch,on,once,set,then,track'
.split(','),i,o=function(n){return'function'==typeof n?o.l.push([arguments])&&o
:function(){return o.l.push([n,arguments])&&o}},t=d.getElementsByTagName(s)[0],
j=d.createElement(s);j.async=!0;j.src='https://cdn.fundraiseup.com/widget/'+a;
t.parentNode.insertBefore(j,t);o.s=Date.now();o.v=4;o.h=w.location.href;o.l=[];
for(i=0;i<7;i++)o[l[i]]=o(l[i]);w[n]=o}
})(window,document,'script','FundraiseUp','AJZSDMZE');</script>
<!-- End Fundraise Up -->
<!-- Puts Fundraise Up into test mode so that you can experiement with the JavaScript events. -->
<script> window.fundraiseup_livemode = false; </script>
<script src="https://kit.fontawesome.com/5fa6121404.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='https://codepen.io/fundocs/pen/XWYqQKZ.css'>
</head>
<body>

  <a href="#XTGWFZFR" style="display: none"></a> 
  <script>
    /* Events to try:
    1. checkoutOpen -> Fires whenever Checkout is opened
    2. checkoutClose -> Fires whenever Checkout is closed, regardless of whether a conversion occurs.
    3. donationComplete -> Fires at the point of conversion in Checkout.
    */
    FundraiseUp.on('checkoutOpen', function(details) {	
        console.log(details);
      });

    
  </script>
</body>
</html>
<?php   ?>