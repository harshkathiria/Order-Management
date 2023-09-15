    
//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="text"  name="title[]" id="title_'+i+'"  class="form-control "></td>';
	html += '<td><input type="text" class="form-control ChangNo" id="qty_'+i+'"  name="qty[]"></td>';
	html += '<td><input type="text"  name="rate[]" id="rate_'+i+'"   class="form-control ChangNo"></td>';
	html += '<td><input type="text"  name="amount[]" id="amount_'+i+'" class="form-control totalbillings"></td>';
	html += '</tr>';
	$('table').append(html);
	
	i++;
});
//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});

$(document).on('change keyup blur','.ChangNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#qty_'+id[1]).val();
	price = $('#rate_'+id[1]).val();
	if( quantity!='' && price !='' ) $('#amount_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
	calculateTotal();
});


//total price calculation 
function calculateTotal(){
	subTotal = 0 ; total = 0; 
	$('.totalbillings').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#subTotal').val( subTotal.toFixed(2) );
	calculateAmountDue();
	calculateAmountPre()
}

$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});
$(document).on('change keyup blur','#PrePending',function(){
	calculateAmountPre();
});
function calculateAmountPre(){
	amountPaid = $('#PrePending').val();
	total = $('#subTotal').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) + parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
		$('.amountAfterpre').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total );
		$('.amountAfterpre').val( total );
	}
}
//due amount calculation
function calculateAmountDue(){
	amountPaid = $('#amountPaid').val();
	total = $('#amountAfterpre').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total );
	}
}


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function () {
    $('#invoiceDate').datepicker({format: "dd/mm/yyyy"});
});
