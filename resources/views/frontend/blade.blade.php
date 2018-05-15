@extends('layouts.frontend.app') @section('content')
<div class="container">
	<div style="width: 90%; margin: 0 auto;">
		<table
			class="table table-responsive  table-condensed table-hover table table-striped">
			<tr>
				<th>接口名称</th>
				<th>接口描述</th>
				<th>METHOD</th>
				<th>参数</th>
			</tr>
		
		<?php foreach($methods as $method):?>
		<tr>
				<td><?php echo  $method->name?></td>
				<td><a
					href="<?php echo url('/'.$method->router.'/'.$method->name)?>"><?php echo  substr($method->desc?:$method->doc['description'],0,50)?></a>
				</td>
				<td><?php echo strtoupper($method->doc['method']??'')?></td>
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
