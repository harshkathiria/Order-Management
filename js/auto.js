    
//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="text"  name="pv_title[]" id="title_'+i+'" class="form-control"></td>';
	html += '<td><input type="text" class="form-control pv_date" id="pvdate_'+i+'"  name="pv_date[]"></td>';
	html += '<td><input type="text"  name="start_time[]" id="start_time_'+i+'" class="form-control"></td>';
	<!-- html += '<td><input type="text" data-type="id" name="proid[]" id="proid_'+i+'" disabled="disabled"  class="form-control"></td>';-->
	html += '<td><input type="text"  name="end_time[]" id="end_time_'+i+'" class="form-control"></td>';
	html += '<td><textarea class="form-control" rows="1" name="pv_note[]" id="pv_note_'+i+'"> </textarea></td>';
	html += '</tr>';
	$('table').append(html);
	$(function () {
          $('.pv_date').datepicker({format: "dd/mm/yyyy"});
	});
	i++;
});
$(function () {
    $('.pv_date').datepicker({format: "dd/mm/yyyy"});
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
$(document).on('change keyup blur','.changesNo',function(){
	calculateTotal();
});
$(document).on('change keyup blur','#tax',function(){
	calculateTotal();
});

//total price calculation 
function calculateTotal(){
	subTotal = 0 ; total = 0; 
	$('.changesNo').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#subTotal').val( subTotal.toFixed(2) );
	tax = $('#tax').val();
	if(tax != '' && typeof(tax) != "undefined" ){
		taxAmount = subTotal * ( parseFloat(tax) /100 );
		$('#taxAmount').val(taxAmount.toFixed(2));
		total = subTotal + taxAmount;
	}else{
		$('#taxAmount').val(0);
		total = subTotal;
	}
	$('#totalAftertax').val( total.toFixed(2) );
	calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
	amountPaid = $('#amountPaid').val();
	total = $('#totalAftertax').val();
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
