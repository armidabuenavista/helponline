


/*function HCF(u, v) {
		var U = u,
			V = v
		while (true) {
			if (!(U %= V)) return V
			if (!(V %= U)) return U
		}
	}
	//convert a decimal into a fraction
function fraction(decimal) {
		if (!decimal) {
			decimal = this;
		}
		whole = String(decimal).split('.')[0];
		decimal = parseFloat("." + String(decimal).split('.')[1]);
		num = "1";
		for (z = 0; z < String(decimal).length - 2; z++) {
			num += "0";
		}
		decimal = decimal * num;
		num = parseInt(num);
		for (z = 2; z < decimal + 1; z++) {
			if (decimal % z == 0 && num % z == 0) {
				decimal = decimal / z;
				num = num / z;
				z = 2;
			}
		}
		//if format of fraction is xx/xxx
		if (decimal.toString().length == 2 && num.toString().length == 3) {
			//reduce by removing trailing 0's
			decimal = Math.round(Math.round(decimal) / 10);
			num = Math.round(Math.round(num) / 10);
		}
		//if format of fraction is xx/xx
		else if (decimal.toString().length == 2 && num.toString().length == 2) {
			decimal = Math.round(decimal / 10);
			num = Math.round(num / 10);
		}
		//get highest common factor to simplify
		var t = HCF(decimal, num);
		//return the fraction after simplifying it
		return ((whole == 0) ? "" : whole + " ") + decimal / t + "/" + num / t;
	}*/
	// Test it
	//alert(fraction(0.0002)); // "1/5000"
	
	
function fraction(value) {
  if (value == undefined || value == null || isNaN(value))
    return "";

  function _FractionFormatterHighestCommonFactor(u, v) {
      var U = u, V = v
      while (true) {
        if (!(U %= V)) return V
        if (!(V %= U)) return U
      }
  }

  var parts = value.toString().split('.');
  if (parts.length == 1)
    return parts;
  else if (parts.length == 2) {
    var wholeNum = parts[0];
    var decimal = parts[1];
    var denom = Math.pow(10, decimal.length);
    var factor = _FractionFormatterHighestCommonFactor(decimal, denom)
    return (wholeNum == '0' ? '' : (wholeNum + " ")) + (decimal / factor) + '/' + (denom / factor);
  } else {
    return "";
  }
}