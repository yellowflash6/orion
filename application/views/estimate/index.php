<script type="text/javascript">
    $(function()
    {
        initTableGrid($("#gridTable"),"Estimates");
    });
</script>

<div id="gridTable">
    <table class="yfTable" align="center" border="1">
        <tr>
            <th>Sl No</th>
            <th>Feature</th>
            <th>Development Hours</th>
            <th>Testing Hours</th>
            <th>Comments</th>
        </tr>
        <?php
            $item_no = 1;
            foreach($estimates as $estimate_item): ?>
            <tr>
                <td align="center"><?php echo $item_no;//$estimate_item['id']; ?></td>
                <td><?php echo $estimate_item['feature']; ?></td>
                <td align="center"><?php echo $estimate_item['dev_hours']; ?></td>
                <td align="center"><?php echo $estimate_item['test_hours']; ?></td>
                <td><textarea style="color:black" disabled='true' rows=4 cols=30><?php echo $estimate_item['comments']; ?></textarea></td>
            </tr>
            <?php $item_no++; ?>
        <?php endforeach ?>
    </table>
</div>