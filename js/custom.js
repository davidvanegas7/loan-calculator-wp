jQuery("#range_33").ionRangeSlider({
    min: 3000,
    step: 100,
    max: 80000,
    from: 10000,
    from_min: 3000,
    from_max: 80000,
    grid: true,
	prefix: "$",
	onChange: function (data) {
        jQuery("#loan-mount").val("$"+data.from);
        calculateMonthly();
    },
});

jQuery("#range_34").ionRangeSlider({
    min: 1,
    max: 180,
    from: 12,
    from_min: 1,
    from_max: 180,
    grid: true,
    onChange: function (data) {
        jQuery("#loan-duration").val(data.from);
        calculateMonthly();
    },
});

function calculateMonthly(){
    var textamount = jQuery("#loan-mount").val(); 
    var $amount =  parseInt(textamount.replace('$',''));
    var $months = parseFloat(jQuery("#loan-duration").val()) ;
    var $rate =  parseFloat(jQuery("#loan-rate").val())/(12*100) ;
    var $result = ( $rate / (1 - Math.pow((1+$rate), ($months * -1)) ) ) * $amount;
    jQuery("#label-monthly-rate").html($result.toFixed(2));
}

jQuery("#loan-mount, #loan-duration, #loan-rate").keyup(function() {
    calculateMonthly();
});

calculateMonthly();