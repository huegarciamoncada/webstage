<?php $title = "Connexion";?>
<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form name="form1" method="post" action="/webstage/index.php/openCompanySession">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">                
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>