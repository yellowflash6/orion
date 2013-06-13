<html>
    <head>
        <title>Add Estimate</title>
    </head>
    <body>
        <div>
            <?php echo validation_errors(); ?>
            <?php echo form_open("estimate/add_estimate"); ?>
            <table align="center" border="1">
                <tr>
                    <th>Feature</th>
                    <td><input type="text" value="" name="yf_feature" /></td>
                </tr>
                <tr>
                    <th>Development Hours</th>
                    <td><input type="text" value="" name="yf_dev_hours" /></td>
                </tr>
                <tr>
                    <th>Testing Hours</th>
                    <td><input type="text" value="" name="yf_test_hours" /></td>
                </tr>
                <tr>
                    <th>Comments</th>
                    <td><textarea value="" rows="5" cols="20" name="yf_comments"></textarea></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" value="Add" name="yf_add_estimate" /></td>
                </tr>
            </table>
            </form>
        </div>
    </body>
</html>