<html>
    <head>
        <title>Add Project</title>
    </head>
    <body>
        <div>
            <?php echo validation_errors(); ?>
            <?php echo form_open("project/add_project"); ?>
            <table align="center" border="1">
                <tr>
                    <th>Name</th>
                    <td><input type="text" value="" name="yf_name" /></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" value="Add" name="yf_add_project" /></td>
                </tr>
            </table>
            </form>
        </div>
    </body>
</html>