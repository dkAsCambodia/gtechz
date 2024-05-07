<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signature Generator</title>
  <!-- <script src="https://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha384.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/3.3.1/sha.js"></script>
</head>
<body>

<script>
  // Your input string
  var inputString = "1xoC0b9Mak2r2P4ZBECG23B5qMsbqVLXmor8ghttp://localhost/m2p/m2p_response.phpUSDUSXUSDT TRC201699587126mI7SosPOnQBJ8L8eBrPvCSP7fqD1X5T9GNKZ";

  // Calculate the SHA-384 hash
  var hash = CryptoJS.SHA384(inputString);

  // Get the hexadecimal representation of the hash
  var hexHash = hash.toString(CryptoJS.enc.Hex);

  console.log(hexHash);
</script>

</body>
</html>
