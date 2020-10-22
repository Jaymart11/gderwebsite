<style>
#uploadFile{
	display:none;
}
</style>
<div style="float:right;">
    <form action = 'modules/banner_upload.php' enctype='multipart/form-data' method='POST' id="uploadImage">
        <input type="hidden" id="TXTlid" value="0" name="lid" />
        <label class="btn btn-info btn-md"> <i class="fas fa-paperclip"></i>Attach File
        <input class='btn' type='file' name = 'images[]' multiple = 'multiple' id="uploadFile" accept=".jpg, .jpeg, .png, .gif" />
        </label>
    </form>
</div>
<h1>Banner</h1>
<div id="banner_cont"></div> 
<script>
$(document).ready(function(){
	$("#banner_cont").load("modules/banner_load.php")
	
		
	$("#uploadFile").change(function(){
		$("#uploadImage").submit();
	});
	
	$("#uploadImage").submit(function(event){
		if ($("#uploadFile").val()){			
			event.preventDefault();
			$(this).ajaxSubmit({
				beforeSubmit:function(){
					$(".progress").show();
					$(".progressstat").html("0%");
				}, uploadProgress: function(event, position, total, percentageComplete){
					$(".progressstat").html(percentageComplete + "%");
				}, success:function(){
					$(".progress").hide();
					$("#banner_cont").load("modules/banner_load.php")
				},
				resetForm: true
			});
		}
		return false;
	});
})
</script>