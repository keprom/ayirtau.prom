<table>
<tr><td><b>Название тп</b></td></tr>
<?php foreach($query->result() as $row): ?>
<tr><td><?php echo anchor("billing/edit_tp/".$row->id,$row->name); ?></td></tr>
<?php endforeach;?>
</table>

<h4>добавить ТП</h4>
<?php echo form_open("billing/adding_tp"); ?>
Наименование тп <input name="name" />
<input type='hidden' name='ture_id' value='0'>
<br/><br/>
<input type=submit value="добавить тп" />
</form>
