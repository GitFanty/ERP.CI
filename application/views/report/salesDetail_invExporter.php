<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
		<table width="1440px" class="list">
  			<tr><td class='H' align="center" colspan="<?php echo $profit==1 ?'12':'8'?>"><h3>销售汇总表（按商品）<h3></td></tr>
  			<tr><td colspan="<?php echo $profit==1 ?'12':'8'?>">日期：<?php echo $beginDate?>至<?php echo $endDate?></td></tr>
  		</table>
  		<table width="1440px" class="list" border="1">
  			<thead>
  				<tr>
  				<th>商品编号</th>
  				<th>商品名称</th>
  				<th>规格型号</th>
  				<th>单位</th>
  				<th>仓库</th>
  				<th>数量</th>
  				<th>单价</th>
  				<th>销售收入</th>
				<?php if ($profit==1) {?>
				<th>单位成本</th>
  				<th>销售成本</th>
  				<th>销售毛利</th>
				<th>毛利率</th>
				<?php }?>
  				</tr>
  			</thead>
  			<tbody>
				 <?php 
				 $sum1 = $sum2 = $sum3 = $sum4 = $sum5 = $sum6 = $sum7 = 0;
				 foreach($list as $arr=>$row){
				     $sum1 += $qty = $row['sumqty']>0 ? -abs($row['sumqty']) : abs($row['sumqty']);   
					 $sum3 += $amount = $row['sumamount'];                   
					 $unitPrice = $qty!=0 ? $amount/$qty : 0;               
					 if ($profit==1) {
						$sum4 += $unitcost = isset($info['inprice'][$row['invId']][$row['locationId']]) ? $info['inprice'][$row['invId']][$row['locationId']] : 0;
						$sum5 += $cost = $unitcost * $qty;               
						$sum6 += $saleProfit = $amount - $cost;           
						$sum7 += $salepPofitRate = ($saleProfit/$amount)*100;                  
					 }
				 ?>
  			       <tr class="link" data-id="<?php echo $row['iid']?>" data-type="<?php echo $row['billType']?>">
  			       <td><?php echo $row['invNumber']?></td>
  			       <td><?php echo $row['invName']?></td>
  			       <td><?php echo $row['invSpec']?></td>
  			       <td><?php echo $row['mainUnit']?></td>
  			       <td><?php echo $row['locationName']?></td>
				   <td class="R"><?php echo str_money($qty,$this->systems['qtyPlaces'])?></td>
  			       <td class="R"><?php echo str_money($unitPrice,$this->systems['qtyPlaces'])?></td>
  			       <td class="R"><?php echo str_money($amount,2)?></td>
				   <?php if ($profit==1) {?>
				   <td class="R"><?php echo str_money($unitcost,2)?></td>
  				   <td class="R"><?php echo str_money($cost,2)?></td>
  				   <td class="R"><?php echo str_money($saleProfit,2)?></td>
				   <td class="R"><?php echo round($salepPofitRate,2)?>%</td>
				   <?php }?>
  			       </tr>
				 <?php 
				 }
				 ?>
  				<tr>
  				<td colspan="5" class="R B">合计：</td>
  				<td class="R B"><?php echo str_money($sum1,$this->systems['qtyPlaces'])?></td>
  				<td class="R B"><?php echo $sum1>0 ? str_money($sum3/$sum1,$this->systems['qtyPlaces']) : 0?></td>
  				<td class="R B"><?php echo str_money($sum3,2)?></td>
				<?php if ($profit==1) {?>
				<td class="R B"><?php echo str_money($sum4,2)?></td>
  				<td class="R B"><?php echo str_money($sum5,2)?></td>
  				<td class="R B"><?php echo str_money($sum6,2)?></td>
				<td class="R B"><?php echo round($sum7,2)?>%</td>
				<?php }?>
  				</tr>
  			</tbody>
  		</table>
 