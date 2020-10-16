<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div id="ok-inscription" class="alert alert-success text-center" role="alert">
			Inscription Terminée! Veuillez vous connecter!
		</div>
		<div id="nok-inscription" class="alert alert-danger text-center" role="alert">
			Veuillez remplir les champs vide
		</div>
		<div id="nokmdp-inscription" class="alert alert-danger text-center" role="alert">
			Mot de passe different
		</div>
		<div id="pseudo-nok" class="alert alert-danger text-center" role="alert">
			Psudo déja utilisé
		</div>
			<div class="card">
				<div class="card-header bg-info">
					<div class="card-title"><h5 class="text-center">Inscription sur E-sera</h5></div>
				</div>
				<div class="card-body bg-light">
					<div class="row">
						<div class="col-md-5">
							<p >Nom :</p>
							<p >Prenom :</p>
							<p >Pseudo :</p>
							<p >Mot de passe :</p>
							<p >Retapez le mot de passe :</p>
						</div>
						<div class="col-md-7">
							<input type="text" id="nom" class="form-control" name="nom">
							<input type="text" id="prenom" class="form-control mt-1" name="prenom">
							<input type="text" id="pseudo" class="form-control mt-1" name="pseudo">
							<input type="password" id="password" class="form-control mt-1" name="motdepasse">
							<input type="password" id="Cpassword" class="form-control mt-1" name="Cmotdepasse">
						</div>
						<button id="btninscription" class="btn btn-info mt-2 ml-auto mr-auto" style="width: 150px;">Inscription</button>
					</div>	
				</div>
			</div>
	</div>
	<div class="col-md-3"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#ok-inscription").hide();
		$("#nok-inscription").hide();
		$("#nokmdp-inscription").hide();
		$("#pseudo-nok").hide();

		$(document).on("click","#btninscription", function(){
			$.ajax({
				type: 'POST',
				url: site_url + 'index.php/Inscription/inscrire',
				data: {
					nom: $("#nom").val(),
					prenom: $("#prenom").val(),
					pseudo: $("#pseudo").val(),
					password: $("#password").val(),
					Cpassword: $("#Cpassword").val(),
				},
				success: function(){
					$("#ok-inscription").show();
					$("#nom").val(""),
					$("#prenom").val(""),
					$("#pseudo").val(""),
					$("#password").val(""),
					$("#Cpassword").val(""),
					setTimeout(function(){
						$("#ok-inscription").hide();
					},2000)
				},
				error: function(data){
					if(data.status == 404){
						$("#nok-inscription").show();
						setTimeout(function(){
							$("#nok-inscription").hide();
						},2000)
					}
					else if(data.status == 503){
						$("#pseudo-nok").show();
						setTimeout(function(){
							$("#pseudo-nok").hide();
						},2000)
					}
					else{
						$("#nokmdp-inscription").show();
						setTimeout(function(){
							$("#nokmdp-inscription").hide();
						},2000)
					}
				}
			})
		})
		
	})
</script>