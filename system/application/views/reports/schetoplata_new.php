<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Счет на оплату</title>
    <link rel="stylesheet" href="/css/fullpage.css" type="text/css">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png">
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body class="portrait">
<table class="border-table block">
    <tbody>
    <tr>
        <td align="center">Бенефициар <?php echo $org->org_name; ?> БИН <?php echo $org->bin; ?></td>
        <td align="center" class="nowrap">ИИК <?php echo $org->IIK; ?></td>
        <td align="center" class="nowrap">КБе <?php echo $org->Bank_kbe; ?></td>
    </tr>
    <tr>
        <td align="center">Банк бенефициара <?php echo $org->bank_name; ?></td>
        <td align="center" class="nowrap">БИК <?php echo $org->bank_bik; ?></td>
        <td align="center" class="nowrap">Код назначения платежа 710</td>
    </tr>
    </tbody>
</table>

<?php
$d = explode("-", $schetfactura_date->date);
$schetfactura_date->date = $d['2'] . '.' . $d['1'] . '.' . $d['0'];
$d = explode("-", $firm->dogovor_date);
$firm->dogovor_date = $d['2'] . '.' . $d['1'] . '.' . $d['0'];
$sno_date = strlen($data_schet) == 0 ? $schetfactura_date->date : $data_schet;
?>
<h3 align="center">Счет на оплату №<?php echo $number; ?> от <?php echo $sno_date; ?></h3>

<p>
    Поставщик: БИН <?php echo $org->bin; ?>, ИИК <?php echo $org->IIK; ?> в <?php echo $org->bank_name; ?>
    БИК <?php echo $org->bank_bik; ?>, <?php echo $org->org_name . ", " . $org->address; ?>
</p>

<p>Покупатель: БИН <?php echo $firm->bin ?>, ИИК <?php echo $firm->raschetnyy_schet; ?> в <?php echo $bank->name; ?>
    БИК <?php echo $bank->mfo; ?>, <?php echo $firm->name . ", " . $firm->address; ?></p>

<p>Договор: Договор на поставку электроэнергии
    №<?php echo $firm->dogovor . " от " . $firm->dogovor_date . " года"; ?></p>

<table class="border-table block">
    <thead>
    <tr>
        <th>№</th>
        <th>Код</th>
        <th>Наименование</th>
        <th>Количество</th>
        <th>Единица</th>
        <th>Цена</th>
        <th>Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sum = 0;
    $sum_nds = 0;
    ?>
    <?php for ($j = 0, $i = 1; $j < count($t); $j++): ?>
        <tr>
            <td align="center"><?php echo $i++; ?></td>
            <td></td>
            <td align="center">Электроэнергия</td>
            <td class="td-number"><?php echo prettify_number($t[$j]['kvt'],0); ?></td>
            <td align="center">кВт/час</td>
            <td class="td-number"><?php echo $t[$j]['tariff_value_nds']; ?></td>
            <td class="td-number"><?php echo prettify_number($t[$j]['sum_with_nds']); ?></td>
            <?php
            $sum += $t[$j]['sum_with_nds'];
            $sum_nds += $t[$j]['sum_nds'];
            ?>
        </tr>
    <?php endfor; ?>
    <tr>
        <td colspan="5"></td>
        <td align="right"><b>Итого</b></td>
        <td class="td-number"><b><?php echo prettify_number($sum); ?></b></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td align="right" colspan="2"><b>В том числе НДС</b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_nds); ?></b></td>
    </tr>
    </tbody>
</table>
<br>
<p>Всего на сумму <?php echo $sum; ?> тенге</p>
<p>Всего к оплате <?php echo num2str($sum); ?></p>

<br>
<table class="block">
    <tbody>
    <tr>
        <td width="33%" align="right">Директор </td>
        <td width="33%">_______________________________</td>
        <td width="33%" align="left"><?php echo $org->director; ?></td>
    </tr>
    <tr>
        <td colspan="3"><br>
    </tr>
    <tr>
        <td colspan="3"><br>
    </tr>
    <tr>
        <td align="right">Главный бухгалтер</td>
        <td>_______________________________</td>
        <td align="left"><?php echo $org->glav_buh; ?></td>
    </tr>
    <tr>
        <td colspan="3"><br>
    </tr>
    <tr>
        <td colspan="3"><br>
    </tr>
    <tr>
        <td align="right">Исполнитель</td>
        <td>_______________________________</td>
        <td align="left">______________________</td>
    </tr>
    </tbody>
</table>

</body>
</html>