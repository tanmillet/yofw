<div style="float:right;width:100%;text-align:center">
<form class="form-search" action="" method="get" style="margin-bottom:5px">
    <div class="input-append">
	<select name="position_id">
   	<option value="1" <?php if($position_id== 1) echo  "selected"?>>用户名</option>
   	<option value="2" <?php if($position_id== 2) echo  "selected"?>>邮箱</option>
    </select>
    <input type="text" class="input-medium search-query span4" name="text" value="<?php echo $_GET['text'];?>"/>
    <input type="hidden" name="m" value="<?php echo $_GET['m'];?>" />
    <input type="hidden" name="p" value="<?php echo $_GET['p'];?>" />
    <button type="submit" class="btn btn-primary">Search</button>
	</div>	
	</form>
</div>
<table class="table table-bordered table-striped table-hover dataTable">
   
	<thead>
	<tr>
		<th >用户名</th>
		<th>联系电话</th>
		<th>邮箱</th>
		<th>注册时间</th>
		<th>最后登陆时间</th>
		<th>用户状态</th>
		<th>白名单</th>
		<th>可供操作</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($datas as $val):?>
	<tr >
		<td style="text-align:center;vertical-align:middle;"><?php echo $val['username'];?></td>
		<td style="text-align:center;vertical-align:middle;"><?php echo $val['tell'];?></td>
		<td style="text-align:center;vertical-align:middle;"><?php echo $val['email'];?></td>
		<td style="text-align:center;vertical-align:middle;"><?php echo date("Y-m-d H:i:s",$val['reg_time']);?></td>
		<td style="text-align:center;vertical-align:middle;"><?php if(empty($val['last_login_time'])){ echo "未登录";}else{echo date("Y-m-d H:i:s",$val['last_login_time']);}?></td>
		<td style="text-align:center;vertical-align:middle;"  id= "exec_<?php echo $val['user_id']?>" ><?php if($val['status'] == 1){ echo "禁止登录"; }else{ echo "正常";}?></td>
		<td style="text-align:center;vertical-align:middle;" class="iswhite_<?php echo $val['user_id'];?>"><?php echo $val['white'] ? '<span class="badge badge-success">是</span>' : "否";?></td>
		<td style="text-align:center;vertical-align:middle;">
			<a class="btn btn-info" target="_blank"  href="?m=<?php echo $_GET['m'];?>&p=income&user_name=<?php echo $val['username'];?>" title="平台币流水">平台币流水</a>
			<a class="btn btn-info show-form-modal" href="?m=<?php echo $_GET['m'];?>&p=view&user_id=<?php echo $val['user_id'];?>" title="详细">详细</a>
			<a id="sysid_<?php echo $val['user_id'];?>"   href='javascript:void(0)' class='btn btn-danger' sysid="<?php echo $val['user_id'];?>"  status = "<?php echo $val['status']?>" title="消息"><?php if($val['status'] == 1){echo '解封';}else{ echo '封号';}?></a>
			<a class="btn btn-success setwhite_<?php echo $val['user_id']?>" href="#" style="display:<?php echo $val['white'] ? 'none' : "";?>" onclick="white(<?php echo $val['user_id']?>,1)">设置白名单</a>
			<a class="btn btn-warning cancerwhite_<?php echo $val['user_id']?>" href="#" style="display:<?php echo $val['white'] ? '' : "none";?>" onclick="white(<?php echo $val['user_id']?>,0)">取消白名单</a>
			<a class="btn" href="admin.php?m=message&p=add&to_username=<?php echo $val['username'];?>" target="_blank">发站内信</a>
		</td>
	</tr>
	
	<?php endforeach;?>
	</tbody>
</table>
<?php echo $page->show();?>

<script>
	$(".btn-danger").click(function(){
			id = $(this).attr('sysid');
			status = $(this).attr('status');
			var url = '?m=user&p=update';
	       	if(confirm("确定要执行吗？")){
	       		$.ajax({
					type: 'GET',
					data:{id:id,status:status},
					url: url,
					success: function(data){
						if(data.ok==1){
							$("#sysid_"+id).html(data.tip);
							$("#sysid_"+id).attr("status",data.status);
							$("#exec_"+id).html(data.msg);
						}else{
							alert(data.tip)
						}
					},
					dataType: "json"
				});
		    }
			
		}); 
function white(user_id,val){
	if(confirm("确定吗？")){
		$.get("?m=user&p=white","val="+val+"&user_id="+user_id,function(ret){
			if(ret.ok){
				if(val){
					$(".cancerwhite_"+user_id).show();
					$(".setwhite_"+user_id).hide();
					$(".iswhite_"+user_id).html('<span class="badge badge-success">是</span>');
				}else{
					$(".cancerwhite_"+user_id).hide();
					$(".setwhite_"+user_id).show();
					$(".iswhite_"+user_id).html('否');
				}
			}else{
				alert(ret.tip);
			}
		},"json");
	}
}
</script>