<?php foreach ($candidates as   $candidate) { ?>
    <tr>
        <?php foreach ($candidate as  $id => $data) { ?>
            <?php $style = $data == 'Available' ? 'color: green;' : 'color: red;' ?>

            <td style="<?= $id == 4 ? $style : '' ?>"><?= $data ?></td>
        <?php } ?>
    </tr>
<?php } ?>