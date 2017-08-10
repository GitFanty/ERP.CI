<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<table width="1500px" class="list">
  			<tr><td class='H' align="center" colspan="8"><h3>其他支出单记录</h3></td></tr>
  		</table>
		<table class="table" width="1500"  border="1">
			<thead>
				<tr>
				    <th width="100" align="center">单据日期</th>
				    <th width="150" align="center">单据编号</th>
				    <th width="120" align="center">供应商</th>
					<th width="60" align="center">结算账户</th>
					<th width="60" align="center">付款金额</th>
					<th width="200" align="center">支出类别</th>
					<th width="60" align="center">金额</th>
					<th width="100" align="center">备注</th>	
				</tr>
			</thead>
			<tbody>
			    <?php 
				  $i = 1;
				  $n = 1;
				  $amount = 0;
				  foreach($list as $arr=>$row) {
				      $postData = unserialize($row['postData']);
				      $n = isset($postData['entries']) ? count($postData['entries'])+1 : 1;
				?>
				<tr target="id">
				    <td rowspan="<?php echo $n?>" ><?php echo $row['billDate']?></td>
					<td rowspan="<?php echo $n?>" ><?php echo $row['billNo']?></td>
					<td rowspan="<?php echo $n?>" ><?php echo $row['contactNo'].' '.$row['contactName'];?></td>
					<td rowspan="<?php echo $n?>" ><?php echo $row['accountNumber'].' '.$row['accountName']?></td>
					<td rowspan="<?php echo $n?>" ><?php echo $row['amount']?></td>
					
				<?php 
				$i = 1;
				foreach($postData['entries'] as $arr1=>$row1) {
					$amount += abs($row1['amount']);
					if ($i==1) {
				?>
				    
					<td ><?php echo $category[$row1['categoryId']]?></td> 
					<td ><?php echo $row1['amount']?></td>
					<td ><?php echo $row1['description']?></td>
				</tr>
				<?php } else {?>
				<tr target="id">
					<td ><?php echo $category[$row1['categoryId']]?></td> 
					<td ><?php echo $row1['amount']?></td>
					<td ><?php echo $row1['description']?></td>
				</tr>
				<?php }$i++;}?>
				<tr target="id">
					<td >合计</td>
					<td ><?php echo $amount?></td>
					<td ></td>
				</tr>
				<?php $amount = 0;$n = 1;}?>		
 </tbody>
</table>	


 