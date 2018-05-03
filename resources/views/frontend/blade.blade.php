@extends('layouts.frontend.app')

@section('content')
<div class="container">
	<div style="width:90%;margin: 0 auto;">
	<table class="table table-responsive  table-condensed table-hover table table-striped">
		<tr>
			<th>接口名称</th>
			<th>接口描述</th>
			<th>参数</th>
		</tr>
		<?php foreach($methods as $method):?>
		<tr>
			<td><?php echo  $method->name?></td>
			<td><a href="<?php echo url('/'.strtolower(strstr(basename(strstr(request()->route()->getAction('controller'),'@',true)),'Controller',true)).'/'.$method->name)?>"><?php echo  $method->desc?></a></td>
			<td>
				<?php if(isset($method->doc['param'])): foreach($method->doc['param'] as $k=>$v):?>
					<li> @param <?php echo $v?></li>
				<?php endforeach;endif;?>
			</td>
		</tr>
		<?php endforeach;?>
	
	</table>
	</div>
	


</div>
@endsection
