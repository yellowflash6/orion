<script>
    $(function()
      {
        initTableGrid($("#gridTable"),"Projects");
      });
</script>
<div id="gridTable">
    <table align="center" border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Development Hours</th>
            <th>Testing Hours</th>
            <th>Status</th>
        </tr>
        <?php foreach($projects as $project_item): ?>
            <tr>
                <td><?php echo $project_item['id']; ?></td>
                <td><?php echo anchor('estimate/view/'.$project_item['id'],$project_item['name']); ?></td>
                <td><?php echo $project_item['dev_hours']; ?></td>
                <td><?php echo $project_item['test_hours']; ?></td>
                <td>
                    <?php
                        $project_status = $project_item['status']==1 ? "Active" : "Inactive" ;
                        echo $project_status;
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>