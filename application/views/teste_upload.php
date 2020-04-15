<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="<?= base_url('acesso/testeUpload/upload'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="text" name="titulo"><br>
    <input type="submit" value="Upload File to Server">
</form>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">Porcentagem: <span class="porcentagem">0%</span></div >
</div>
<div id="status"></div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
	
$(function() {

    var bar = $('.bar');
    var percent = $('.porcentagem');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {

        	if(xhr.responseText == "ok") {
        		window.location.href = "https://www.google.com";
        	}
            //status.html(xhr.responseText);
        }
    });
}); 

</script>

</body>
</html>