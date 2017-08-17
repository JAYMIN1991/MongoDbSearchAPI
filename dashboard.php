<?php
include_once 'header.php';
if ( isset($_SESSION) ) {
	if ( !isset($_SESSION['id']) && !isset($_SESSION['userlevel']) ) {
		@header('location:'.LOGIN);
		exit;
	}
}
?>
<label class="control-label pull-right"><a href="logout.php">Logout</a> </label>
<div id="wrap">
    <div class="container">
        <div class="row">
            <form class="form-horizontal" action="import/import-main.php" method="post" name="upload_excel"
                  enctype="multipart/form-data">
                <fieldset>
                    <! --Form Name-->
                    <legend> Upload a . txt, .csv, .xls, .xlsx file</legend>

                    <! --File Button-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton"> Select File </label>
                        <div class="col-md-4">
                            <input type="file" required multiple="multiple" name="file" id="file" class="input-large">
                        </div>
                    </div>

                    <! --Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"> Import data </label>
                        <div class="col-md-4">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data
                                    - loading - text="Loading..."> Upload
                            </button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>
</body>

</html>
