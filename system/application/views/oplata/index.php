<html>
<head>
<title>Оборотная ведомость</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>
 <body>
<?php 
 function f_d($var)
{
	if ($var==0) return "&nbsp;"; else
	return sprintf("%22.2f",$var);
}?>
<table>
<h2>Работа с оплатой</h2>
<?php if ($this->session->flashdata('added')=='true') echo "<h3>Оплата добавлена по орг-ции:".$this->session->flashdata('firm_name')."</h3>"; ?>
<br>
<?php echo form_open('billing/adding_oplata'); ?>
 
 Дата <input name=data value='<?php echo $this->session->userdata('data'); ?>'> <br>
  Номер счета <input name=payment_number value='<?php echo $this->session->userdata('number'); ?>'><br>
 Договор: <input name=dogovor ><br>
  Сумма <input name=value ><br>
  Номер документа <input name=document_number ><br>
<input name=nds type=hidden value=12 >
<input type=submit value="Добавить оплату" >

</form>
<br>
Установить период <?php echo form_open('billing/change_oplata_period');?>
<input name=begin_data value='<?php echo $this->session->userdata('begin_data');?>'>
<input name=end_data value='<?php echo $this->session->userdata('end_data');?>'>
<input type=submit value=Подтвердить>
</form>
<br>
<br>
<br>

<tr><th>Номер<br>договора</th><th>Дата<br>оплаты</th><th>Номер<br>счета</th><th>Сумма<br>оплаты</th><th>НДС</th><th>Сумма<br>без НДС</th>
<th align=right>Номер<br>документа</th></tr>
<?php foreach($oplata->result() as $o): 
echo "<tr><td>{$o->dogovor}</td>
<td>{$o->data}</td>
<td>{$o->number}</td>
<td>".(f_d($o->value*1.12))."</td>
<td>".(f_d($o->value*0.12))."</td>
<td>".(f_d($o->value*1.00))."</td>
<td align=right>".$o->document_number."</td>
<td>".anchor('billing/oplata_delete/'.$o->id,'x')."</td>
</tr>";
 endforeach;?>
</table>
</body>
</html>