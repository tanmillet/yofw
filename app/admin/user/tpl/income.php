<table class="table table-bordered table-striped table-hover dataTable">
	<thead>
	<tr>
		<th >用户名</th>
		<th>充值前平台币</th>
		<th>充值后平台币</th>
		<th>订单号</th>
		<th>添加时间</th>
	</tr>
	</thead>

	<tbody>
		<?php foreach ($row as $val) 
		{?>
			<tr>
			<td style="text-align:center;vertical-align:middle;"><?php echo $val['username'];?></td>
			<td style="text-align:center;vertical-align:middle;"><?php echo $val['before'];?></td>
			<td style="text-align:center;vertical-align:middle;"><?php echo $val['after'];?></td>
			<td style="text-align:center;vertical-align:middle;"><?php echo $val['orderid'];?></td>
			<td style="text-align:center;vertical-align:middle;"><?php echo date('Y-m-d H:i:s',$val['add_time']);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $page->show();?>
