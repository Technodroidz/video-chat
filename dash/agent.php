<?php
include_once 'header.php';
?>

<h1 class="h3 mb-2 text-gray-800" id="agentTitle" data-localize="agent"></h1>
<div id="error" style="display:none;" class="alert alert-danger"></div>
<?php if ($_SESSION["tenant"] == 'lsv_mastertenant' || @$_GET['id'] == $_SESSION["agent"]['agent_id']) { ?>

    <div class="row">
        <div class="col-lg-5">
            <div class="p-1">

                <form class="user" name="AgentForm">

                    <div class="form-group">
                        <label  class="requiredred" for="first_name"><h6 data-localize="first_name"></h6></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name">
                    </div>
                    <div class="form-group">
                        <label  class="requiredred" for="last_name"><h6 data-localize="last_name"></h6></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name">
                    </div>
                    <?php if ($_SESSION["tenant"] == 'lsv_mastertenant') { ?>
                        <div class="form-group">
                            <label  class="requiredred" for="email"><h6 data-localize="email"></h6></label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="email">
                        </div>
                        <div class="form-group">
                            <label class="requiredred" for="tenant"><h6 data-localize="tenant"></h6></label>
                            <input type="text" class="form-control" id="tenant"  name="tenant" aria-describedby="tenant">
                        </div>
                        <div class="form-group" id="usernameDiv">
                            <label  class="requiredred" for="username"><h6 data-localize="username"></h6></label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                        </div>
                        <div class="form-group">
                            <label  class="requiredred" for="password"><h6><span data-localize="password"></span> <span id="leftblank"></span></h6></label>
                            <input type="password" class="form-control" id="password"  name="password" autocomplete="new-password">
                        </div>
                    <?php } else { ?>
                        <input type="hidden" class="form-control" id="email">
                        <input type="hidden" class="form-control" id="tenant">
                        <input type="hidden" class="form-control" id="username">
                    <?php } ?>
                    <input type="hidden" class="form-control" id="usernamehidden">
                    <a href="javascript:void(0);" id="saveAgent" class="btn btn-primary btn-user btn-block" data-localize="save">
                        
                    </a>
                    <hr>

                </form>

            </div>
        </div>
    </div>
<?php } ?>
<style>
  .requiredred:before {
    content:" *";
    color: red;
  }
</style>
<?php
include_once 'footer.php';
?>