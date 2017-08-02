$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $("div.alert").delay(3000).slideUp();
        $("#addImages").click(function(){
			$("#insert").append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
		});

		$("a#del_img").on('click',function(){
			var url="http://localhost:8088/framework/laravel_project/admin/product/delimg/";
			var idHinh=$(this).parent().find("img").attr("idHinh");
			var _token=$("form[name='frmEditProduct']").find("input[name='_token']").val();
			var idname=$(this).parent().find("img").attr("id");
			var img_src=$(this).parent().find("img").attr("src");
			$.ajax({
				url:url + idHinh,
				type:'GET',
				cache:false,
				data:{"_token":_token,"idHinh":idHinh,"urlHinh":img_src},
				success:function(data){
					if(data=="OK"){
						$("#"+idname).remove();
					}else{
						alert("Error!");
					}
				}
			});
		});
});
function  xacnhanxoa(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;
}
