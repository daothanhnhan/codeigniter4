<h1>Test ajax</h1>

<p id="result">ket qua ajax</p>
<button type="button" onclick="chay_js()">Click</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
function chay_js () {
	$.ajax({
		url: '/ajax',
		data: {
			name: 'tuan'
		},
		dataType: 'json',
		success: function(response) {
			$('#result').html(response);
		}
	});
	// alert('test');
}
</script>