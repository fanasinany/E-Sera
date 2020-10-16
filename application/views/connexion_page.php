<div class="row mt-5">
	<div class="col-md-3"></div>
	<div class="col-md-6">
        <div id="champsvide" class="alert alert-danger text-center" role="alert">
			Veuillez remplir les champs vide
		</div>
		<div id="nok-connexion" class="alert alert-danger text-center" role="alert">
			Identifiants incorrects
		</div>
		<div class="card">
			<div class="card-header bg-info">
				<div class="card-title"><h5 class="text-center">Connexion sur E-sera</h5></div>
			</div>
			<div class="card-body bg-light">
				<div class="row">
					<div class="col-md-4">
						<p >Pseudo :</p><br>
						<p >Mot de passe :</p>
					</div>
					<div class="col-md-8">
						<input type="text" id="pseudo" class="form-control mt-1" name="pseudo">
						<input type="password" id="password" class="form-control mt-3" name="motdepasse">
					</div>
					<button id="btnconnexion" class="btn btn-info mt-2 ml-auto mr-auto" style="width: 150px;">Connexion</button>
				</div>	
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
<script type="text/javascript">
    $(document).ready( function(){
        $("#champsvide").hide();
        $("#nok-connexion").hide();

        $(document).on("click","#btnconnexion", function(){
            $.ajax({
                type:'POST',
                url: site_url + 'index.php/Connexion/login',
                data: {
                    pseudo: $("#pseudo").val(),
                    password: $("#password").val()
                },
                success: function(){
                    window.location.href = site_url + 'index.php/Profil';
                },
                error: function(data){
                    if(data.status == 404){
                        $("#nok-connexion").show();
						setTimeout(function(){
							$("#nok-connexion").hide();
						},2000)
                    }
                    else{
                        $("#champsvide").show();
						setTimeout(function(){
							$("#champsvide").hide();
						},2000)
                    }
                }
            })
        })
    })
</script>