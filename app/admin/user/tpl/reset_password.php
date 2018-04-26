<form action="" method='post' id='frm'>
<table class="table table-bordered" style="float:left;">
<tr>
<td width='10%'>用户名：</td>
<td width='90%'><input type="text" name="username"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="btn btn-info" value="确认修改" /></td>
</tr>
</table>
</form>

<script>
$(document).ready(function(){
	$("#frm").submit(function(){
		var username = $.trim($("input[name='username']").val());
		if(username == ''){
			alert("用户名不能为空！");return false;
		}	
		if(confirm("你确定要修改用户密码吗？")){
			$.ajax({
				type: "post",
            	url: "/admin.php?m=user&p=reset_password",
            	dataType: "json",
            	data : {username: username},
            	success: function (data) {
            		alert(data.msg);
            	},
        	});
		}

		return false;
	})
})

</script>